<?php
    require_once("../includes/config.php");


	$sqlQuery = "SELECT AVG(`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) as avgDelay FROM TIMESTAMP";
	$avgDelay = query($sqlQuery);
	if ($avgDelay === false)
		die("Log ip to country failed!");
	echo $avgDelay[0]["avgDelay"];
?>
