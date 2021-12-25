<?php
	    require_once("../includes/config.php");

	$plotCount = 0;
	$timeDelayCount;
	function plotGraph($minDelay, $maxDelay, $barCount, $totalCount){
		global $timeDelayCount, $plotCount;
		//echo "Min Delay: " . $minDelay . ", Max Delay: " . $maxDelay . ",Total Count: " . $totalCount; 
		
		$division = (($maxDelay + abs($minDelay))/$barCount);
	
		//echo $division;
	
		$timeDelayCount = [['Delay Range', 'Number of user with time delay']];
	
		for($i=0; $i<= $barCount; $i++)
		{
			$sqlQuery = "SELECT COUNT(*) as count FROM TIMESTAMP WHERE (NTP_SERVER_TRANSMIT - USER_TRANSMIT + (USER_RECEIVE-USER_TRANSMIT)/2) >= " . strval($i*$division + $minDelay) . " AND (NTP_SERVER_TRANSMIT - USER_TRANSMIT + (USER_RECEIVE-USER_TRANSMIT)/2) < " . strval(($i+1)*$division + $minDelay) . "";

			$delayCount = query($sqlQuery);
			if ($delayCount === false)
				die("Log ip to country failed!");
				
			if($plotCount++ > 50)
				break;
				
			else if((int)$delayCount[0]["count"] > 0.70 * $totalCount)
			{
				$totalCount = (int)$delayCount[0]["count"];

				$maxDelay = ($i+1)*$division + $minDelay;
				$minDelay = $i*$division + $minDelay;
		
				plotGraph($minDelay, $maxDelay, $barCount, $totalCount);
				break;
			}
							
			$appendData = [strval($i*$division + $minDelay) . '-' . strval(($i+1)*$division + $minDelay), (int)$delayCount[0]["count"]];
			array_push($timeDelayCount, $appendData);
			//echo "remain: " . strval($maxDelay - $i*$division + $minDelay) . '<br/>';


		}
	}


	$sqlQuery = "SELECT MIN(`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) as minDelay FROM TIMESTAMP WHERE (`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) > 0";
	$minDelay = query($sqlQuery);
	if ($minDelay === false)
		die("Log ip to country failed!");
	$minDelay = $minDelay[0]["minDelay"];

	$sqlQuery = "SELECT MAX(`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) as maxDelay FROM TIMESTAMP WHERE (`NTP_SERVER_TRANSMIT` - `USER_RECEIVE` + (`USER_RECEIVE`-`USER_TRANSMIT`)/2) > 0";
	$maxDelay = query($sqlQuery);
	if ($maxDelay === false)
		die("Log ip to country failed!");
	$maxDelay =  $maxDelay[0]["maxDelay"];
    
	$totalCount = $_GET["totalCount"];
	
	
	if(!isset($maxDelay) || !isset($minDelay))
	{
		die("Please set input data!");	
	}
	$barCount = 10;
	
	plotGraph($minDelay, $maxDelay, $barCount, $totalCount);

	echo json_encode($timeDelayCount);
	
//	echo ($statData["maxDelay"] + abs($statData["minDelay"]))/$barCount;
?>
