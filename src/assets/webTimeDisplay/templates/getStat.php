<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>

	//Functions
	var minDelay = false;
	var maxDelay = false;
	var totalCount = false;
	var barData = [];
	
	function getTotalCount(){
		$.get("getTotalCount.php", function(result){
			totalCount = result;
			var appendData = "<tr><td>Total Count</td><td> "+ result + "</td></tr>";
			$('#statData').append(appendData);
		});
	}

	function getMinimumDelay(){
		$.get("getMinimumDelay.php", function(result){
			minDelay = result;
			
			var appendData = "<tr><td>Minimum Delay</td><td> "+ result + "</td></tr>";
			$('#statData').append(appendData);
		});
	}


	function getMaxDelay(){
		$.get("getMaxDelay.php", function(result){
			maxDelay = result;
			var appendData = "<tr><td>Maximum Delay</td><td> "+ result + "</td></tr>";
			$('#statData').append(appendData);
		});
	}


	function getAvgDelay(){
		$.get("getAvgDelay.php", function(result){
			var appendData = "<tr><td>Average Delay</td><td> "+ result + "</td></tr>";
			$('#statData').append(appendData);
		});
	}

	google.charts.load('current', {packages: ['corechart', 'bar']});

	function drawBasic() {

		var data = google.visualization.arrayToDataTable(barData);

	      var chart = new google.visualization.ColumnChart(
		document.getElementById('chart_div'));

	      chart.draw(data);
	    }


	function getDelayCount(){
		if(maxDelay == false || minDelay == false || totalCount == false)
		{
			console.log('No Value');
 			setTimeout(getDelayCount, 3000);
 			return;
		}
		getData = "getDelayCount.php?maxDelay=" + maxDelay + "&minDelay=" + minDelay + "&totalCount=" + totalCount;
		$.get(getData, function(result){
			barData = JSON.parse(result);
			console.log(barData);
			google.charts.setOnLoadCallback(drawBasic);
		});
	}


	function getCountryWiseHit(){
		getData = "getCountryWiseHit.php";
		$.get(getData, function(result){
		      google.charts.load('current', {
			'packages':['geochart'],
			// Note: you will need to get a mapsApiKey for your project.
			// See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
			'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
		      });
		      google.charts.setOnLoadCallback(drawRegionsMap);

		      function drawRegionsMap() {
			countryWiseHitData = JSON.parse(result);
			var data = google.visualization.arrayToDataTable(countryWiseHitData);

			var options = {};

			var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

			chart.draw(data, options);
			
			google.charts.setOnLoadCallback(drawCountryWiseHit);
		      }
		      
		      		      
		});
	}
	var countryWiseHitData;
	function drawCountryWiseHit() {
		plotCountryWiseHitData = [];
		for(i=0;i<10;i++)
			plotCountryWiseHitData[i] = countryWiseHitData[i];

		var data = google.visualization.arrayToDataTable(plotCountryWiseHitData);

	      var chart = new google.visualization.ColumnChart(
		document.getElementById('countryHit'));

	      chart.draw(data);
	    }
	

	//get basic value
	getTotalCount();
	getMinimumDelay();
	getMaxDelay();
	getAvgDelay();
	getDelayCount();


	getCountryWiseHit();




</script>

    <div id="regions_div" style="width: 900px; height: 500px;"></div>
    <div id="countryHit" style="width: 900px; height: 500px;"></div>
<table>
	<tbody id="statData">
	</tbody>
</table>

<table>
	<tbody id="delayCount">
	</tbody>
</table>

    <div id="chart_div" style="width: 900px; height: 500px;"></div>


