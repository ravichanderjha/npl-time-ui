<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('table').DataTable();
} );
</script>

<h1>TWSTFT Data Analysis</h1>
<table class="display" cellspacing="0" width="100%">
	<tbody>
		<thead>
			<th>PN Code</th>
			<th>Date</th>
			<th>Jitter (Avg)</th>
			<th>Raw Range (Avg)</th>
			<th>Mean Clock Difference (Avg)</th>
			<th>Mean Clock Drift (Avg)</th>
			<th>C/N Ratio (Avg)</th>
		<thead>
<?php
	$pncodes = query("SELECT DISTINCT PNCode FROM satellite ORDER BY PNCode ASC");
	$datecodes = query("SELECT DISTINCT DateCode FROM satellite ORDER BY DateCode ASC");
		
	foreach($pncodes as $pncode)
	{
		foreach($datecodes as $datecode)
		{
			$query_string = "SELECT AVG(Jitter) as jitter_avg, AVG(RawRange) as raw_range_avg, AVG(MeanClDiff) as mean_cl_diff_avg, AVG(MeanClDrift) as mean_cl_drift_avg, AVG(C_No) as c_no_avg  FROM satellite where DateCode = '". $datecode["DateCode"] ."' and PNCode = " . $pncode["PNCode"];
			echo $query_string . "<br>";
			$jitter_avg = query($query_string);

			echo '<tr><td>' . $pncode["PNCode"] . '</td><td>' . $datecode["DateCode"] . '</td><td>' . $jitter_avg[0]["jitter_avg"] .'</td><td>' . $jitter_avg[0]["raw_range_avg"] .'</td><td>' . $jitter_avg[0]["mean_cl_diff_avg"] .'</td><td>' . $jitter_avg[0]["mean_cl_drift_avg"] .'</td><td>' . $jitter_avg[0]["c_no_avg"] .'</td></tr>';
		}
	}
?>
	</tbody>
</table>
