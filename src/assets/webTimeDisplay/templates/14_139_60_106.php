
<?php
	$country_hits = [];
	
	//get country name
	$query_string = 'SELECT DISTINCT country FROM `NTP_HIT`';
	
	$countries = query($query_string);
	
	if($countries === false)
	{
		echo "Page Error!";
		die();
	}
	
	foreach($countries as $country)
	{

		$query_string = 'SELECT COUNT(*) as result FROM NTP_HIT WHERE country = "'. $country["country"] .'"';
	
		$result = query($query_string);
		
		$country_hits[$country["country"]] = $result[0]["result"];
	}
	
?>
							    <script type="text/javascript">
							      google.charts.setOnLoadCallback(drawRegionsMap);

							      function drawRegionsMap() {
								var data = google.visualization.arrayToDataTable([
								  ['Country', 'No. of Hits']
							<?php
								foreach($country_hits as $country => $hit)
								{
									echo ',["'. $country .'", '. $hit .']';
								}
							?>
								]);

								var options = {
									domain:'IN'
								};

								var chart = new google.visualization.GeoChart(document.getElementById('14_139_60_106_geo'));

								chart.draw(data, options);
							      }
							    </script>
							    <div id="14_139_60_106_geo" style="width:100%;"></div>

								<script type="text/javascript">
								      google.charts.load('current', {'packages':['corechart']});
								      google.charts.setOnLoadCallback(drawChart);

								      function drawChart() {

									var data = google.visualization.arrayToDataTable([
									  ['Country', 'No. of Hits']
								<?php
									foreach($country_hits as $country => $hit)
									{
										echo ',["'.$country .'", '. $hit .']';
									}
								?>
									]);

									var options = {
									};

									var chart = new google.visualization.PieChart(document.getElementById('14_139_60_106_geo_pi'));

									chart.draw(data, options);
								      }
								    </script>

								    <div id="14_139_60_106_geo_pi" style="position:absolute;width:25%;bottom:1px;"></div>

