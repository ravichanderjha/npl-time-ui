<style>
html, body {
  height: 100%;
  margin: 0px;
}
body {background-color:#005}

.today-clock {
  max-width: 30%;
  height: 1px;
  margin: 10px;
  display: inline-block;
}
.today-tell-time {
  max-width: 70%;
  height: 1px;
  margin: 10px;
  display: inline-block;
  vertical-align: top;
}
.ist_clock
{
	background:#000;
	opacity:0.8;
	box-shadow: 0 0 10px 5px rgba(255,255,255,0.5);
	text-align: center;
	width: 95%;
	margin: auto;
	margin-bottom:10px;
}
,date_time
{
	font-family:digital-clock-font;
}
a
{
	text-decoration:none;
	color: #fff;
}
.other_time
{
	margin:10px;
box-shadow: 0px 1px 0px 0px rgb(255, 255, 255) inset; background: rgb(249, 249, 249) linear-gradient(to bottom, rgb(249, 249, 249) 5%, rgb(233, 233, 233) 100%) repeat scroll 0% 0%; border-radius: 6px; border: 1px solid rgb(220, 220, 220); display: inline-block; cursor: pointer; color: rgb(102, 102, 102); font-family: Arial; font-size: 28px; font-weight: bold; padding: 5px 60px; text-decoration: none; text-shadow: 0px 1px 0px rgb(255, 255, 255);
}
#clock_diff
{
	display:inline-block;
  -webkit-border-radius: 58;
  -moz-border-radius: 58;
  border-radius: 58px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}
.green
{
  background: #0f0;
}

.red
{
  background: #f00;
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
  <div class="ist_clock">
	<div class="today-clock"></div>
	<div class="today-tell-time" id="ist">
		<h1 style="color: #fff;font-size: 60;margin:1px;">Indian Standard Time (IST)</h1>
		<h5 style="color: #fff;font-size: 18;text-decoration:none;">(Maintainted by CSIR- National Physical Laboratory)</h5>
		<h1 class="date_time timer" style="font-size:110;color:#fff;margin-bottom:30px;"></h1>
		<h3 class="date_time" style="font-size:50;color:#fff;"><a class="day"></a>, <a class="year"></a></h3>
		<h3></h3>
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

