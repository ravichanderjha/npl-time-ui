<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr" class="js" lang="en">
	<head>
		<title>NPL-India Web Time Display</title>
		
		<!---ravi web time content start --->
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>

		<script type="text/javascript" src="json2.js"></script>
		<!---<script type="text/javascript" src="npl_ajax.js"></script>--->

		<script type="text/javascript" src="js/coolclock.js"></script>
		<script type="text/javascript" src="js/moreskins.js"></script>

		<script type="text/javascript">
		var ServerList = ["/cgi-bin/ntp_client"];
		var Text = {
		error:    "<h3>Status : Time information capture failed.<\/h3>",
		warning:  "<h3>Status : Time information capture incomplete.<\/h3>",
		normal:   "<h3>Status : Time information capture completed.<\/h3>",
		incompat: "<h3>Your browser is not compatible with this page. Please use another browser.<\/h3>",
		correct: " correct.",
		fast:    " second(s) fast.",
		slow:    " second(s) slow." };
		</script>
		
		<!---ravi web time content end --->
		
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/themes/fbg/css/style.css?J">

	</head>
	
	<body id="en" onunload="stopclock()" onload="CoolClock.findAndCreateClocks();startclock()">

	<header>
	<section id="section-top" class="section section-top">
		<div id="header-logo" class="header header-logo">
			<div id="header-top"><div id="block-block-44" class="block block-block">

  <div class="content">
    <div class="logo">
<a href="/" title="Home">
<img src="http://nplindia.org/sites/all/themes/fbg/logo.png" alt="Home">
</a>
</div>  </div>
</div>
<div id="block-block-45" class="block block-block">

  <div class="content">
    <h2 class="col-md-12">CSIR-National Physical Laboratory</h2>
<p class="row2">"National Measurement Institute of India"</p>
  </div>
</div>
<div id="block-block-46" class="block block-block">

  <div class="content">
    <div class="logo-csir"><a href="" title="Home"><img src="http://nplindia.org/sites/all/themes/fbg/logo-csir.png" alt="Home"></a>
</div>  </div>
</div>
</div>
		</div>
		<div class="cf"></div>
	</section>
	</header>
	
