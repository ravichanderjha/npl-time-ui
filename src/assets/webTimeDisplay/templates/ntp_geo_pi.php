
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
          title: 'HITS ANALYSIS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('ntp_geo_pi'));

        chart.draw(data, options);
      }
    </script>

    <div id="ntp_geo_pi" style="width: 900px; height: 500px;"></div>
    
   
