<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyDAIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
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

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
      }
    </script>
    <div id="regions_div" style="width: 900px; height: 500px;"></div>

