<script>
	var updateDataCount = 0;
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
  	syncIp2Country();
</script>

