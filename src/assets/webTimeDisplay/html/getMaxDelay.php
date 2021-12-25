<?php
    require_once("../includes/config.php");
    
	$sqlQuery = "SELECT MAX(`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) as maxDelay FROM TIMESTAMP";
	$maxDelay = query($sqlQuery);
	if ($maxDelay === false)
		die("Log ip to country failed!");
	echo $maxDelay[0]["maxDelay"];
?>
