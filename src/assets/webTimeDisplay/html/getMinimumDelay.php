<?php
    require_once("../includes/config.php");
    
    
	$sqlQuery = "SELECT MIN(`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) as minDelay FROM TIMESTAMP";
	$minDelay = query($sqlQuery);
	if ($minDelay === false)
		die("Log ip to country failed!");
	echo $minDelay[0]["minDelay"];
?>
