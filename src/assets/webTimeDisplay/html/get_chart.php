<?php
	require_once("../includes/config.php");

	if($_POST["chart"] == "current_web")
	{
		include('../templates/current_web_geo.php');
	}
	elseif($_POST["chart"] == "last_day_web")
	{
		include('../templates/last_day_web_geo.php');
	}
	elseif($_POST["chart"] == "last_day_14_139_60_106")
	{
		include('../templates/14_139_60_106.php');
	}
	elseif($_POST["chart"] == "last_day_14_139_60_107")
	{
		include('../templates/14_139_60_107.php');
	}
?>
