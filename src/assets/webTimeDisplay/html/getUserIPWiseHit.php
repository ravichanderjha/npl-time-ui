<?php
	require_once("../includes/config.php");
	
	//get counrty list

	$countryHitCount = [['Country', 'Number of user']];

	$sqlQuery = "SELECT USER_IP, COUNT(*) as count FROM TIMESTAMP GROUP BY USER_IP order BY COUNT(*) DESC LIMIT 10";

	$countryList = query($sqlQuery);
	if ($countryList === false)
		die("Log ip to country failed!");
				
	foreach($countryList as $country)
	{
		$appendData = [$country["country"], (int)$country["count"]];
		array_push($countryHitCount, $appendData);
	}
	echo json_encode($countryHitCount);
?>
