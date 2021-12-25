<?php

    // configuration
    require("../includes/config.php");
	//GET ID
	$rows = query("SELECT ID,USER_IP FROM TIMESTAMP WHERE country = '' LIMIT 500");

	if ($rows === false)
		die("Log ip to country failed!");

	if (count($rows) == 0)
		die("0");

	
/*	
	$db = mysql_connect($server, $username, $password) or die(mysql_error());
	      mysql_select_db($dbname) or die(mysql_error());
*/		
	
	echo count($rows);
	foreach($rows as $row)
	{
		//UPDATE country
		//print_r($row);
		$queryString = 'SELECT 
			    c.country 
			FROM 
			    ip2nationCountries c,
			    ip2nation i 
			WHERE 
			    i.ip < INET_ATON("'.trim($row["USER_IP"]).'") 
			    AND 
			    c.code = i.country 
			ORDER BY 
			    i.ip DESC 
			LIMIT 0,1';
	
//		list($countryName) = mysql_fetch_row(mysql_query($sql));
	
		$query = query($queryString);
			
		if(count($query) == 0)
			$countryName = 'Private';
		else
			$countryName = $query[0]['country'];
	
		// Output full country name
		$queryString = "UPDATE TIMESTAMP SET country = '". $countryName ."' WHERE ID = ". $row['ID'];
		//echo $queryString . '<br/>';
		
		$query = query($queryString);
	}
?>


