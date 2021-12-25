
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netdb.h>

#define NTP_TIMESTAMP_DELTA 2208988800ull

void error( char* msg )
{
    perror( msg ); // Print the error message to stderr.
    
    exit( 0 ); // Quit the process.
}

int main( int argc, char* argv[ ] )
{
	char *it_str = getenv("QUERY_STRING");
	
	if(!strlen(it_str))
		return 0;

	printf("Content-type:application/JSON\n\n\
		{\n\
		 \"id\": \"npl-ntp-webserver\",\
		 \"it\": %s,\
		",it_str);

	struct timeval currentTime;
	gettimeofday(&currentTime, NULL);
	printf("\
	\"ncrt\": %u.%3d,\
	", currentTime.tv_sec, currentTime.tv_usec*1000);

	int sockfd, n; // Socket file descriptor and the n return result from writing/reading from the socket.
	
	int portno = 123; // NTP UDP port number.
	
	char* host_name = "14.139.60.107"; // NTP server host-name.
	
	// Structure that defines the 48 byte NTP packet protocol.
	
	typedef struct 
	{
		
		unsigned li   : 2;       // Only two bits. Leap indicator.
		unsigned vn   : 3;       // Only three bits. Version number of the protocol.
		unsigned mode : 3;       // Only three bits. Mode. Client will pick mode 3 for client.
		
		uint8_t stratum;         // Eight bits. Stratum level of the local clock.
		uint8_t poll;            // Eight bits. Maximum interval between successive messages.
		uint8_t precision;       // Eight bits. Precision of the local clock.
		
		uint32_t rootDelay;      // 32 bits. Total round trip delay time.
		uint32_t rootDispersion; // 32 bits. Max error aloud from primary clock source.
		uint32_t refId;          // 32 bits. Reference clock identifier.
		
		uint32_t refTm_s;        // 32 bits. Reference time-stamp seconds.
		uint32_t refTm_f;        // 32 bits. Reference time-stamp fraction of a second.
		
		uint32_t origTm_s;       // 32 bits. Originate time-stamp seconds.
		uint32_t origTm_f;       // 32 bits. Originate time-stamp fraction of a second.
		
		uint32_t rxTm_s;         // 32 bits. Received time-stamp seconds.
		uint32_t rxTm_f;         // 32 bits. Received time-stamp fraction of a second.
		
		uint32_t txTm_s;         // 32 bits and the most important field the client cares about. Transmit time-stamp seconds.
		uint32_t txTm_f;         // 32 bits. Transmit time-stamp fraction of a second.
		
	} ntp_packet;                 // Total: 384 bits or 48 bytes.
	
	// Create and zero out the packet. All 48 bytes worth.
	
	ntp_packet packet = { 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 };
	
	memset( &packet, 0, sizeof( ntp_packet ) );
	
	// Set the first byte's bits to 00,011,011 for li = 0, vn = 3, and mode = 3. The rest will be left set to zero.
	
	*( ( char * ) &packet + 0 ) = 0x1b; // Represents 27 in base 10 or 00011011 in base 2.
	
	// Create a UDP socket, convert the host-name to an IP address, set the port number,
	// connect to the server, send the packet, and then read in the return packet.

	struct sockaddr_in serv_addr; // Server address data structure.
	struct hostent *server;	     // Server data structure.
	
	sockfd = socket( AF_INET, SOCK_DGRAM, IPPROTO_UDP ); // Create a UDP socket.
	
	if ( sockfd < 0 ) 
		error( "ERROR opening socket" );
	
	server = gethostbyname( host_name ); // Convert URL to IP.
	
	if ( server == NULL ) 
		error( "ERROR, no such host" );
	
	// Zero out the server address structure.
	
	bzero( ( char* ) &serv_addr, sizeof( serv_addr ) );
	
	serv_addr.sin_family = AF_INET;
	
	// Copy the server's IP address to the server address structure.
	
	bcopy( ( char* )server->h_addr, ( char* ) &serv_addr.sin_addr.s_addr, server->h_length );
	
	// Convert the port number integer to network big-endian style and save it to the server address structure.
	
	serv_addr.sin_port = htons( portno );
	
	// Call up the server using its IP address and port number.
	
	if ( connect( sockfd, ( struct sockaddr * ) &serv_addr, sizeof( serv_addr) ) < 0 ) 
		error( "ERROR connecting" );
	
	// Send it the NTP packet it wants. If n == -1, it failed.

	n = write( sockfd, ( char* ) &packet, sizeof( ntp_packet ) );
	
	if ( n < 0 ) 
		error( "ERROR writing to socket" );
	
	// Wait and receive the packet back from the server. If n == -1, it failed.
	
	n = read( sockfd, ( char* ) &packet, sizeof( ntp_packet ) );
	
	if ( n < 0 ) 
		error( "ERROR reading from socket" );
	
	// These two fields contain the time-stamp seconds as the packet left the NTP server.
	// The number of seconds correspond to the seconds passed since 1900.
	// ntohl() converts the bit/byte order from the network's to host's "endianness".

	packet.txTm_s = ntohl( packet.txTm_s ); // Time-stamp seconds.
	packet.txTm_f = ntohl( packet.txTm_f ); // Time-stamp fraction of a second.

	packet.rxTm_s = ntohl( packet.rxTm_s ); // Time-stamp seconds.
	packet.rxTm_f = ntohl( packet.rxTm_f ); // Time-stamp fraction of a second.
	
	// Extract the 32 bits that represent the time-stamp seconds (since NTP epoch) from when the packet left the server.
	// Subtract 70 years worth of seconds from the seconds since 1900.
	// This leaves the seconds since the UNIX epoch of 1970.
	// (1900)------------------(1970)**************************************(Time Packet Left the Server)
	
	//time_t txTm = ( time_t ) ( packet.txTm_s - NTP_TIMESTAMP_DELTA ); 

	
	// Print the time we got from the server, accounting for local timezone and conversion from UTC time.
		

	uint32_t nstt_txTm = packet.txTm_s - NTP_TIMESTAMP_DELTA ; 
	uint32_t nsrt_rxTm = packet.rxTm_s - NTP_TIMESTAMP_DELTA ; 

	uint32_t time_f =  ( (packet.txTm_f >> 9) & 0x007fffff) | 0x3f800000;

	float *time_ptr = (float*) &time_f;

	int nstt_frac = (int) ((float)(*time_ptr - 1) * 1000000);

	time_f =  ( (packet.rxTm_f >> 9) & 0x007fffff) | 0x3f800000;
	time_ptr = (float*) &time_f;
	int nsrt_frac = (int) ((float)(*time_ptr - 1) * 1000000);

	gettimeofday(&currentTime, NULL);
	printf("\
	 \"nctt\": %u.%3d,\
	 \"nsrt\": %u.%3d,\
	 \"nstt\": %u.%3d\
	}\
	", currentTime.tv_sec, currentTime.tv_usec*1000, nsrt_rxTm, nsrt_frac, nstt_txTm, nstt_frac);

	return 0;
}
