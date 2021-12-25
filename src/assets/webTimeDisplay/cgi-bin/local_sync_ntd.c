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
#include <netdb.h>

#define NTP_TIMESTAMP_DELTA 2208988800ull

#define NTD_DISPLAY_COUNT 1

// Structure that defines the 48 byte NTP packet protocol.

void error( char* msg )
{
    perror( msg ); // Print the error message to stderr.
    
    exit( 0 ); // Quit the process.
}

int main( int argc, char* argv[ ] )
{
	int i;
	char *ntd_display[] = {"8.8.8.8", "8.8.4.4"};
	
	char buffer[80];
	
	time_t ltime = time(0);

	struct tm *info;
	info = localtime( &ltime );
	
	strftime(buffer,80,"%x %X", info);
	
	int ntd_year, ntd_month, ntd_day, ntd_hour, ntd_minute, ntd_second;
	
	printf("%s\n", buffer );
	sscanf(buffer, "%d/%d/%d %d:%d:%d", &ntd_month, &ntd_day, &ntd_year, &ntd_hour, &ntd_minute, &ntd_second);
	
	// Print the time we got from the server, accounting for local timezone and conversion from UTC time.
		
	printf( "second:%d\nTime: %s",ntd_second, ctime( ( const time_t* ) &ltime ) );
	
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
	
	ntd_packet packet = { 0x55, 0xaa, 0x00, 0x00, 0x00, 0x01, 0x00, 0xc1, 0x00, 0x00, 0x00, 0x00, 0x00, 0x00, 0x0f, 0x00, 0x00, 0x00, 0x0f, 0x00, 0x10, 0x00, year, month, day, hour, minute, second, 0x00, 0x00, 0x0d, 0x0a };
/*
	ntdpacket.header = { 0x55,0xaa,0x00,0x00,0x00,0x01,0x00,0xc1,0x00,0x00,0x00,0x00,0x00,0x00,0x0f,0x00,0x00,0x00,0x0f,0x00,0x10,0x00,0x00,0x00,0x00,0x00,0x00,0x00 };
	ntdpacket.footer = { 0x00,0x00,0x0d,0x0a };

	ntdpacket.header = "hello \n";
	ntdpacket.footer = "a";
*/


	sockfd = socket( AF_INET, SOCK_STREAM, 0 ); // Create a TCP socket.

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

	n = write( sockfd, ( char* ) &packet, sizeof( ntd_packet ) );

	if ( n < 0 ) 
		error( "ERROR writing to socket" );

	// Wait and receive the packet back from the server. If n == -1, it failed.

	//n = read( sockfd, ( char* ) &packet, sizeof( ntd_packet ) );
}
