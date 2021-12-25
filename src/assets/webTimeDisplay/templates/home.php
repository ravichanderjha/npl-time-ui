<style>
body
{
	min-width:1330px;
	min-height:620px;
}
body, a, h1
{
	color:#000066;
}
a, a:hover
{
	text-decoration:none;
}
table
{
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
	background:#fff;
	//background:rgba(255,255,255, 0.5);
	box-shadow: 0 0 10px 5px rgba(255,255,255,0.5);
	width: 80%;
}
.english_heading
{
	display:none;
}

.other_time
{
box-shadow: 0px 1px 0px 0px rgb(255, 255, 255) inset; background: rgb(249, 249, 249) linear-gradient(to bottom, rgb(249, 249, 249) 5%, rgb(233, 233, 233) 100%) repeat scroll 0% 0%; border: 1px solid rgb(220, 220, 220); cursor: pointer; color: rgb(102, 102, 102); font-family: Arial; font-size: 28px; font-weight: bold; text-decoration: none; text-shadow: 0px 1px 0px rgb(255, 255, 255);
}
clock_diff
{
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

.drop_icon {
	display: inline-block;
	width: 0;
	height: 0;
	margin-left: 2px;
	vertical-align: middle;
	border-top: 4px solid;
	border-right: 4px solid transparent;
	border-left: 4px solid transparent;
}
</style>

  <script src="js/today-clock.js?v=1"></script>

  <script>
	function change_heading()
	{
		if(is_heading_eng)
		{
			is_heading_eng = 0;
			$('.english_heading').hide();
			$('.hindi_heading').show();			
		}
		else
		{
			is_heading_eng = 1;
			$('.hindi_heading').hide();
			$('.english_heading').show();
		}
	}

	var is_heading_eng = 0;
	setInterval("change_heading()", 3000);

	var xhr;

$(document).ready(function() {

	$('.chart_button').click(function(){
		var chart_name = $(this).attr("chart");
		var id = $(this).attr("href");
		
		if(xhr)
			xhr.abort();

		xhr = $.post("get_chart.php", 
			{
				chart: chart_name
			},
			function(data){
				$(id).html(data);
		});
	});	
	
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
										<tr class="hindi_heading">
											<td style="font-size: 54;margin:1px;line-height:70px;">भारतीय मानक समय (भा. मा. स.)</td>
										</tr>
									  	<tr class="hindi_heading">
											<td style="font-size: 18;text-decoration:none;">(सीएसआईआर-राष्ट्रीय भौतिक प्रयोगशाला द्वारा अनुरक्षित)</td>
										</tr>
										<tr class="english_heading">
											<td style="font-size: 60;margin:1px;line-height:70px;">Indian Standard Time (IST)</td>
										</tr>
									  	<tr class="english_heading">
											<td style="font-size: 18;text-decoration:none;">(Maintainted by CSIR- National Physical Laboratory)</td>
										</tr>
									  	<tr>
								  			<td style="font-size:150;margin-bottom:30px;"><a class="date_time timer"></a></td>
									  	</tr>
									  	<tr>
											<td class="date_time" style="font-size:35;color:#c47529;">(UTC + 5:30), <a class="day" style="color:#c47529;"></a> <a class="year" style="color:#c47529;"></a></td>
									  	</tr>
									</tbody>
								</table>
					  		</td>
					  	</tr>
				  	</tbody>
				  </table>
	  		</td>
  		</tr>
  		<tr class="ist_clock">
  			<td>
				<table style="margin-top:10px;background:rgba(0, 0, 102, 0.5);">
					<tbody>
						<tr>
							<td id="utc" class="other_time">
								<h1 style="font-size: 25;margin:1px;">UTC(NPLI)</h1>
								<h1 class="date_time timer" style="font-size:35;"></h1>
							</td>
							<td id="lst" class="other_time">
								<h1 style="font-size: 18;margin:1px;">Time in your Time Zone</h1>
								<h1 class="date_time timer" style="font-size:35;"></h1>
							</td>
							<td id="device_clock" class="other_time">
								<h1 style="font-size: 18;margin:1px;">Time of your Device Clock</h1>
								<h1 class="date_time timer" style="font-size:35;"></h1>
							</td>
							<td id="clock_diff" class="other_time">
								<h1 style="font-size: 18;margin:1px;">Time Difference</h1><h1 style="font-size: 15;">(Time Zone and Device Clock)</h1>
								<h1 id="diff_amt" style="font-size: 25;"></h1>
							</td>
							<td class="other_time" style="display:none;background:lavenderblush;">
								<h1 style="font-size: 20;margin:1px;color:#c47529;">How to Sync with NTP</h1>
								<a href="how_to_sync.php"><h1 style="font-size: 25;color:#c47529;">Click Here</h1></a>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
  		</tr>
<!---
  		<tr>
  			<td>
				<ul class="nav nav-tabs">
				    <li class="dropdown active">
				    	<a class="dropdown-toggle" data-toggle="dropdown">Web Time User</a>
				    	<ul class="dropdown-menu">
				    		<li>
				    			<a class="chart_button" chart="current_web" data-toggle="tab" href="#current_web_user">Current Users</a>
				    		</li>
				    		<li>
				    			<a class="chart_button" chart="last_day_web" data-toggle="tab" href="#home">Last Day Users</a>
				    		</li>
				    	</ul>
				    	
			    	    </li>
				    <li class="dropdown">
				    	<a class="dropdown-toggle" data-toggle="dropdown">NTP Server User</a>
				    	<ul class="dropdown-menu">
				    		<li>
				    			<a class="chart_button" chart="last_day_14_139_60_106" data-toggle="tab" href="#14_139_60_106">14.139.60.106</a>
				    		</li>
				    		<li>
				    			<a class="chart_button" chart="last_day_14_139_60_107" data-toggle="tab" href="#14_139_60_107">14.139.60.107</a>
				    		</li>
				    	</ul>
				    	
			    	    </li>
				</ul>
				  
				<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  
				<div class="tab-content">
				    <div id="current_web_user" class="tab-pane fade in active" style="position:relative;">
					    <img src="img/loading.gif"/>
				    </div>

				    <div id="home" class="tab-pane fade in active" style="position:relative;">
					    <img src="img/loading.gif"/>
				    
				    </div>


				    <div id="14_139_60_106" class="tab-pane fade in active" style="position:relative;">
					    <img src="img/loading.gif"/>
				    	
				    </div>

				    <div id="14_139_60_107" class="tab-pane fade in active" style="position:relative;">
					    <img src="img/loading.gif"/>
				    
				    </div>

				</div>
  			</td>
  		</tr>
--->
  	</tbody>
  </table>

<script>
<?php
	echo 'timer = ' . time() . '*1000 + 5.5 * 3600000';
?>

	display_date_time(timer, $('#ist'));
//				startclock();
		</script>
