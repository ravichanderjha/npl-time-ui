<table>
	<tbody>
<?php
    require_once("../includes/config.php");

	$host_ips = query("Select distinct host_ip from NTP_HIT");	

	foreach($host_ips as $host_ip)
	{
		$query_string = "Select COUNT(*) as result from NTP_HIT where host_ip = '". $host_ip["host_ip"] . "'";
		$count_ips = query($query_string);
		
		echo '<tr><td>' . $host_ip["host_ip"] . "</td><td>" . $count_ips[0]["result"] . '</td></tr>';
	}

?>
	</tbody>
</table>
