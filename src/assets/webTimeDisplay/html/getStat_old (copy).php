<?php
    require_once("../includes/config.php");

	$totalCount = query("SELECT COUNT(*) as totalCount FROM TIMESTAMP LIMIT 500");
	if ($totalCount === false)
		die("Log ip to country failed!");
	$statData["totalCount"] = $totalCount[0]["totalCount"];

	$minDelay = query("SELECT MIN(`NTP_SERVER_TRANSMIT` - (`USER_TRANSMIT` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2)) as minDelay FROM TIMESTAMP LIMIT 500");
	if ($minDelay === false)
		die("Log ip to country failed!");
	$statData["minDelay"] = $minDelay[0]["minDelay"];

	$maxDelay = query("SELECT MAX(`NTP_SERVER_TRANSMIT` - (`USER_TRANSMIT` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2)) as maxDelay FROM TIMESTAMP LIMIT 500");
	if ($maxDelay === false)
		die("Log ip to country failed!");
	$statData["maxDelay"] = $maxDelay[0]["maxDelay"];

	$avgDelay = query("SELECT AVG(`NTP_SERVER_TRANSMIT` - (`USER_TRANSMIT` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2)) as avgDelay FROM TIMESTAMP LIMIT 500");
	if ($avgDelay === false)
		die("Log ip to country failed!");
	$statData["avgDelay"] = $avgDelay[0]["avgDelay"];
	
	$barCount = 500;
	
//	echo ($statData["maxDelay"] + abs($statData["minDelay"]))/$barCount;

	$division = ($statData["maxDelay"] + abs($statData["minDelay"]))/$barCount;
	
	$timeDelayCount = [];
	
	for($i=0; $i< $barCount; $i++)
	{
		$sqlQuery = "SELECT COUNT((`NTP_SERVER_TRANSMIT` - (`USER_TRANSMIT` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2)) < " . strval($i*$division + $statData["minDelay"]) . ") as delayCount FROM TIMESTAMP LIMIT 500";
		$delayCount = query($sqlQuery);
		if ($delayCount === false)
			die("Log ip to country failed!");
		$timeDelayCount[$i] = $delayCount[0]["delayCount"];
	}

/*	
	while($i<$maxDelay + 1)
	{
		
		$i += $division
	}
*/	
	print_r($timeDelayCount);
    //render("getStat.php", ["statData" => $statData]);
?>
