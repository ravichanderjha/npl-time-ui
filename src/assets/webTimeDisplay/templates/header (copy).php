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
		<script type="text/javascript" src="npl_ajax.js"></script>

		<script type="text/javascript" src="js/coolclock.js"></script>
		<script type="text/javascript" src="js/moreskins.js"></script>

		<style type="text/css">
		.clock {
		float:left; 
		display:block; 
		margin:10px; 
		padding:10px; 
		background-color:#fff;
		-moz-box-shadow: 3px 3px 3px #999; 
		-moz-border-radius:5px;
		-webkit-box-shadow: 3px 3px 3px #999; 
		-webkit-border-radius:5px;
		}

		<!--
		hr {border-width:1px 0px 0px; border-style:dashed; border-color:#666666; height:1px;}
		th,td {line-height:20px; font-size:14px;}
		a:link {color:blue;}
		a:visited {color:blue;}
		a:hover {color:green;}
		INPUT.txtbox {border:0 solid; background-color:#FFFFFF; font-size:20px; color:#000000; font-weight:bold;}
		#Details {display:none;}
		-->
		</style>
		<script type="text/javascript">
		<!--
		var ServerList = ["/cgi-bin/ntp_client"];
		var Text = {
		error:    "<h3>Status : Time information capture failed.<\/h3>",
		warning:  "<h3>Status : Time information capture incomplete.<\/h3>",
		normal:   "<h3>Status : Time information capture completed.<\/h3>",
		incompat: "<h3>Your browser is not compatible with this page. Please use another browser.<\/h3>",
		correct: " correct.",
		fast:    " second(s) fast.",
		slow:    " second(s) slow." };
		-->
		</script>
		
		<!---ravi web time content end --->
		
		<link type="text/css" rel="stylesheet" media="all" href="/modules/aggregator/aggregator.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/node/node.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/poll/poll.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/system/defaults.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/system/system.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/system/system-menus.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/user/user.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.orghttp://nplindia.org/sites/all/modules/cck/theme/content-module.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.orghttp://nplindia.org/sites/all/modules/date/date.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.orghttp://nplindia.org/sites/all/modules/dhtml_menu/dhtml_menu.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.orghttp://nplindia.org/sites/all/modules/filefield/filefield.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.orghttp://nplindia.org/sites/all/modules/nice_menus/nice_menus.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/modules/nice_menus/nice_menus_default.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/modules/taxonomy_list/taxonomy_list.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/modules/thickbox/thickbox.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/modules/thickbox/thickbox_ie.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/modules/forum/forum.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/modules/cck/modules/fieldgroup/fieldgroup.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/modules/views/css/views.css?J">
		<link type="text/css" rel="stylesheet" media="all" href="http://nplindia.org/sites/all/themes/fbg/css/style.css?J">


		<script type="text/javascript" src="coolclock.js"></script>
		<script type="text/javascript" src="moreskins.js"></script>
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
    <p class="row1">CSIR-National Physical Laboratory</p>
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
	
