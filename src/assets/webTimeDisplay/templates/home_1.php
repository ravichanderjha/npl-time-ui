<style>

a, a:hover
{
	text-decoration:none;
	color:#333;
}
table
{
	display:block;
	margin: auto;
	text-align:center;
	width:100%;
}
tr, th, td
{
	padding:0px;
}
.ist_clock
{
	background:rgba(255,255,255, 0.5);
	box-shadow: 0 0 10px 5px rgba(255,255,255,0.5);
	width: 80%;
}



</style>

  <script src="js/today-clock.js?v=1"></script>

  <script>

$(document).ready(function() {
  var resize = function() {
    var w = $(window).width(), h = $(window).height(),  // Viewport dimensions
      d1 = $('.today-clock'), d2 = $('.today-tell-time'),
      d1wh, d2w;

    if (h / w < 1 / 4) {  // Excess width. Restrict combined height of our divs to viewport height.
      d1wh = h;
      d2w = h * 3;
    } else {              // Excess height. Restrict width of our divs to viewport width.
      d1wh = w / 4;
      d2w = w * 3 / 4;
    }

    // Allow for our margins
    d1wh -= 24;
    d2w -= 24;

    d1.css({
      width: d1wh + 'px',
      height: d1wh + 'px'
    });
    d2.css({
      width: d2w + 'px',
      height: d1wh + 'px'
    });
  };

  $(window).resize(resize);

  // Fire a resize event
  var evt = document.createEvent('UIEvents');
  evt.initUIEvent('resize', true, false, window, 0);
  window.dispatchEvent(evt);
});
  </script>
  
  <table class="ist_clock">
  	<tbody>
	  	<tr>
	  		<td>
		  		<h1 style="color:navy;font-size:30px;">सीएसआईआर-एनपीएल भारतीय मानक समय (आई एस टी) का अनुरक्षण करता है |</h1>	
	  		</td>
  		</tr>
	  	<tr>
	  		<td>
		  		<h1 style="color:navy;font-size:30px;">Indian Standard Time (IST) maintained by CSIR-NPL(INDIA)</h1>	
	  		</td>
	  	</tr>
	  	</tr>
	  		<td>
				  <table>
				  	<tbody>
					  	<tr>
					  		<td>
								<div class="today-clock" ></div>
					  		</td>
					  		<td class="today-tell-time">
								<table id="ist">
									<tbody>
									  	<tr>
								  			<td style="font-size:150;margin-bottom:30px;"><a class="date_time timer"></a></td>
									  	</tr>
									  	<tr>
											<td class="date_time" style="font-size:35;">(UTC +5:30), <a class="day"></a>, <a class="year"></a></td>
									  	</tr>
									</tbody>
								</table>
					  		</td>
					  	</tr>
				  	</tbody>
				  </table>
	  		</td>
  		</tr>
  	</tbody>
  </table>
  <div class="ist_clock">
	<div class="today-tell-time" id="ist">
		<h1 style="color: #fff;font-size: 60;margin:1px;">Indian Standard Time (IST)</h1>
		<h5 style="color: #fff;font-size: 18;text-decoration:none;">(Maintainted by CSIR- National Physical Laboratory)</h5>
	</div>
</div>

  <div class="ist_clock">
	<div id="lst" class="other_time">
		<h1 style="font-size: 25;margin:1px;">Time in your Country</h1>
		<h1 class="date_time timer" style="font-size:35;"></h1>
	</div>
	
	<div id="clock_diff">
		<h3 style="font-size: 25;color:#fff;margin:1px;">Clock Diffrence</h3>
		<h2 style="font-size: 25;color:#fff;"></h2>
	</div>

	<div id="device_clock" class="other_time">
		<h1 style="font-size: 25;margin:1px;">Your Device Clock</h1>
		<h1 class="date_time timer" style="font-size:35;"></h1>
	</div>

  </div>
<script>
<?php
	echo 'timer = ' . time() . '*1000 + 5.5 * 3600000';
?>

	display_date_time(timer, $('#ist'));
//				startclock();
		</script>

