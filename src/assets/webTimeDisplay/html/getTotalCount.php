<?php
    require_once("../includes/config.php");
    
	$sqlQuery = "SELECT COUNT(*) as totalCount FROM TIMESTAMP";
	$totalCount = query($sqlQuery);
	if ($totalCount === false)
		die("Log ip to country failed!");
	echo $totalCount[0]["totalCount"];
?>
