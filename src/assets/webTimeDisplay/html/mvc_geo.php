<?php
	include('../includes/config.php');
	
	$country_hits = [];
	
	//get country name
	$query_string = 'SELECT DISTINCT host_country FROM `NTP_HIT`';
	
	$countries = query($query_string);
	

	if($countries === false)
	{
		echo "Page Error!";
		die();
	}
	
	foreach($countries as $country)
	{

		$query_string = 'SELECT COUNT(*) as result FROM NTP_HIT WHERE host_country = "'. $country["host_country"] .'"';
	
		$result = query($query_string);
		
		$country_hits[$country["host_country"]] = $result[0]["result"];
	}
	
	
		render("mvc_geo_tem.php", ["country_hits" => $country_hits]);
?>
