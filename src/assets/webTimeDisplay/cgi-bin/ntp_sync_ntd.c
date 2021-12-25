/*
 * 
 * Ravi Chander Jha.
 * 
 * Time & Frequency Department
 * 
 * NTD Sync.
 * 
 * Compiled with gcc version 4.7.2 20121109 (Red Hat 4.7.2-8) (GCC).
 * 
 * Tested on Linux 3.8.11-200.fc18.x86_64 #1 SMP Wed May 1 19:44:27 UTC 2013 x86_64 x86_64 x86_64 GNU/Linux.
 * 
 * To compile: $ gcc main.c -o ntpClient.out
 * 
 * Usage: $ ./ntpClient.out
 * 
 */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <netinet/tcp.h>
#include <netdb.h>

#define NTP_TIMESTAMP_DELTA 2208988800ull

#define NTD_DISPLAY_COUNT 1

void error( char* msg )
{
    perror( msg ); // Print the error message to stderr.
    
    exit( 0 ); // Quit the process.
}

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


time_t get_ntp_time( )
{
	printf("getting time...\n");
	int sockfd, n; // Socket file descriptor and the n return result from writing/reading from the socket.
	
	int portno = 123; // NTP UDP port number.
	
	char* host_name = "time.nplindia.org"; // NTP server host-name.	
	
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
	
	// Extract the 32 bits that represent the time-stamp seconds (since NTP epoch) from when the packet left the server.
	// Subtract 70 years worth of seconds from the seconds since 1900.
	// This leaves the seconds since the UNIX epoch of 1970.
	// (1900)------------------(1970)**************************************(Time Packet Left the Server)
	
	return ( time_t ) ( packet.txTm_s - NTP_TIMESTAMP_DELTA ); 
}


int main( int argc, char* argv[ ] )
{
	int i;
	char *ntd_display[] = {"172.16.26.7"};
	int sockfd, n; // Socket file descriptor and the n return result from writing/reading from the socket.	
	
	time_t txTm = get_ntp_time(); 
	
	char buffer[80];
	struct tm *info;
	info = localtime( &txTm );
	
	strftime(buffer,80,"%x %X", info);
	
	int ntd_year, ntd_month, ntd_day, ntd_hour, ntd_minute, ntd_second;
	
	printf("%s\n", buffer );
	sscanf(buffer, "%d/%d/%d %d:%d:%d", &ntd_month, &ntd_day, &ntd_year, &ntd_hour, &ntd_minute, &ntd_second);
	
	// Print the time we got from the server, accounting for local timezone and conversion from UTC time.
		
	printf( "second:%d\nTime: %s",ntd_second, ctime( ( const time_t* ) &txTm ) );
	
	//sync all clock
	for(i = 0; i < NTD_DISPLAY_COUNT; i++)
	{
		if(fork() == 0)
		{
			printf("Syncing %s...", ntd_display[i]);
			sync_ntd(ntd_display[i], ntd_year, ntd_month, ntd_day, ntd_hour, ntd_minute, ntd_second);
		}
	}

	return 0;
}

int sync_ntd(char *ntd_ip, int year, int month, int day, int hour, int minute, int second)
{

	// Structure that defines the 48 byte NTP packet protocol.
	

	int sockfd, n; // Socket file descriptor and the n return result from writing/reading from the socket.
	struct sockaddr_in serv_addr; // Server address data structure.
	struct hostent *server;	     // Server data structure.


	char buffer[100];
	typedef struct 
	{		
		char header[28];

		short year;
		char month;
		char day;

		char hour;
		char minute;
		char second;

		char footer[4];
		
	} ntd_packet;                 // Total: 384 bits or 48 bytes.
	
	// Create and zero out the packet. All 48 bytes worth.
	
	ntd_packet packet = { 0x55, 0xaa, 0x00, 0x00, 0x01, 0x01, 0x00, 0xc1, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x0f, 0x00, 0x00, 0x00, 0x0f, 0x00, 0x10, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, year, month, day, hour, minute, second, 0x00, 0x00, 0x0d, 0x0a};


	sockfd = socket( AF_INET, SOCK_STREAM, 0 ); // Create a TCP socket.
	
	int opt_return, socopt = 8192;
	
	opt_return = setsockopt(sockfd, IPPROTO_TCP, TCP_MAXSEG, &socopt, sizeof(socopt));

	if ( sockfd < 0 ) 
		error( "ERROR opening socket" );

	server = gethostbyname( ntd_ip ); // Convert URL to IP.

	if ( server == NULL ) 
		error( "ERROR, no such host" );

	// Zero out the server address structure.

	bzero( ( char* ) &serv_addr, sizeof( serv_addr ) );

	serv_addr.sin_family = AF_INET;

	// Copy the server's IP address to the server address structure.

	bcopy( ( char* )server->h_addr, ( char* ) &serv_addr.sin_addr.s_addr, server->h_length );

	// Convert the port number integer to network big-endian style and save it to the server address structure.

	serv_addr.sin_port = htons( 10000 ); //10000 is port for time correction

	// Call up the server using its IP address and port number.


	if ( connect( sockfd, ( struct sockaddr * ) &serv_addr, sizeof( serv_addr) ) < 0 ) 
		error( "ERROR connecting" );

	// Send it the NTP packet it wants. If n == -1, it failed.

	n = write( sockfd, ( char* ) &packet, sizeof( ntd_packet )-1 );

	if ( n < 0 ) 
		error( "ERROR writing to socket" );

	// Wait and receive the packet back from the server. If n == -1, it failed.

	n = read( sockfd, ( char* ) &packet, sizeof( ntd_packet ) );
	if ( n < 0 ) 
		error( "ERROR reading to socket" );
}
