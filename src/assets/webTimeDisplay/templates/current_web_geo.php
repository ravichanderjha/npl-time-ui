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
								<script type='text/javascript'>
								     google.charts.load('current', {
								       'packages': ['geochart'],
								       // Note: you will need to get a mapsApiKey for your project.
								       // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
								       'mapsApiKey': 'AIzaSyAfRq1uLZysRfSotbtcTIqz3kGdj4ASIlw'
								     });
								     google.charts.setOnLoadCallback(drawMarkersMap);

								      function drawMarkersMap() {
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
									domain:'IN',
									displayMode: 'markers',
									colorAxis: {colors: ['green', 'blue']}
								      };

								      var chart = new google.visualization.GeoChart(document.getElementById('web_current_geo'));
								      chart.draw(data, options);
								    };
								</script>
							    <div id="web_current_geo" style="width:100%;"></div>
							    
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

									var chart = new google.visualization.PieChart(document.getElementById('web_current_pi'));

									chart.draw(data, options);
								      }
								    </script>

								    <div id="web_current_pi" style="position:absolute;width:25%;bottom:1px;"></div>
							    
				    <table style="width: 100%;">
				    	<tbody>
				    		<tr>
				    			<td style="width: 70%;">
				    			</td>
				    			<td style="width: 30%;">
				    			</td>
				    		</tr>
				    	</tbody>
				    </table>


