<script>
	//get basic value
	var totalCount = 
	



	var totalCount = 0;
	var contrainedCount = 0;
	function getTotalCount(){
		$.get("getTotalCount.php", function(result){
			result = parseInt(result);
			updateDataCount += result;
			var appendData = '<h3>Update data count: ' + updateDataCount + '</h3>';
			$('body').html(appendData);
			if(result > 0)
				syncIp2Country();
		});
	}
	
	
	function syncIp2Country(){
		$.get("ip2Country.php", function(result){
			result = parseInt(result);
			updateDataCount += result;
			var appendData = '<h3>Update data count: ' + updateDataCount + '</h3>';
			$('body').html(appendData);
			if(result > 0)
				syncIp2Country();
		});
  	}
  	//syncIp2Country();
</script>


<table>
	<tbody>
		<tr>
			<td class="key">Total hit</td>
			<td class="value"><?php echo $statData["totalCount"]?></td>
		</tr>
		<tr>
			<td class="key">Minimum Delay</td>
			<td class="value"><?php echo $statData["minDelay"]?></td>
		</tr>
		<tr>
			<td class="key">Maximum Delay</td>
			<td class="value"><?php echo $statData["maxDelay"]?></td>
		</tr>
		<tr>
			<td class="key">Average Delay</td>
			<td class="value"><?php echo $statData["avgDelay"]?></td>
		</tr>
	</tbody>
</table>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

	var data = google.visualization.arrayToDataTable([
         ['time delay', 'Number of user'],
         ['Copper', 8.94],            // RGB value
         ['Silver', 10.49],            // English color name
         ['Gold', 19.30],

	 ['Platinum', 21.45], // CSS-style declaration
	]);

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data);
    }
    </script>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>

