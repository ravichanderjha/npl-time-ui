<?php
	require_once("../includes/config.php");
	
	//get counrty list

	$countryHitCount = [['Country', 'Number of user']];

	$sqlQuery = "SELECT country, COUNT(*) as count FROM TIMESTAMP GROUP BY country order BY COUNT(*) DESC";

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
