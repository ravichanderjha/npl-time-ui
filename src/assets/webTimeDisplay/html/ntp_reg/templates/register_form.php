    <style type="text/css">
    .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}
.step1 .row {
    margin-bottom:10px;
}
.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
}
.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
}
.dropselectsec {
    width: 68%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.dropselectsec1 {
    width: 74%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.mar_ned {
    margin-bottom:10px;
}
.wdth {
    width:25%;
}
.birthdrop {
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    width: 16%;
    outline: 0;
    font-weight: normal;
}


/* according menu */
#accordion-container {
    font-size:13px
}
.accordion-header {
    font-size:13px;
	background:#ebebeb;
	margin:5px 0 0;
	padding:7px 20px;
	cursor:pointer;
	color:#fff;
	font-weight:400;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px
}
.unselect_img{
	width:18px;
	-webkit-user-select: none;  
	-moz-user-select: none;     
	-ms-user-select: none;      
	user-select: none; 
}
.active-header {
	-moz-border-radius:5px 5px 0 0;
	-webkit-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;
	background:#F53B27;
}
.active-header:after {
	content:"\f068";
	font-family:'FontAwesome';
	float:right;
	margin:5px;
	font-weight:400
}
.inactive-header {
	background:#333;
}
.inactive-header:after {
	content:"\f067";
	font-family:'FontAwesome';
	float:right;
	margin:4px 5px;
	font-weight:400
}
.accordion-content {
	display:none;
	padding:20px;
	background:#fff;
	border:1px solid #ccc;
	border-top:0;
	-moz-border-radius:0 0 5px 5px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px
}
.accordion-content a{
	text-decoration:none;
	color:#333;
}
.accordion-content td{
	border-bottom:1px solid #dcdcdc;
}



@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
    </style>


	<div class="container">
    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
			<h2>Orgnisation Detail</h2>
                        <div class="step1">
                            <div class="row">
		                    <div class="col-md-6">
		                        <label for="exampleInputEmail1">Name</label>
		          
		                        <input name="org_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of your organisation">
					<br/>
		                        <label for="exampleInputEmail1">Phone Number</label>
		                        <input name="org_phone_number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone number">
					<br/>
		                        <label for="exampleInputEmail1">Email</label>
		                        <input name="org_email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
					<br/>
		                        <label for="exampleInputEmail1">Organisation Type</label>
					<select name="org_type" class="dropselectsec">
						<option value=""> Select Highest Education</option>
						<option value="1">Ph.D</option>
						<option value="2">Masters Degree</option>
						<option value="3">PG Diploma</option>
						<option value="4">Bachelors Degree</option>
						<option value="5">Diploma</option>
						<option value="6">Intermediate / (10+2)</option>
						<option value="7">Secondary</option>
						<option value="8">Others</option>
					</select>
					<br/>
		                        <label for="exampleInputEmail1">Category</label>
					<select name="org_category" id="highest_qualification" class="dropselectsec">
						<option value=""> Select Highest Education</option>
						<option value="1">Ph.D</option>
						<option value="2">Masters Degree</option>
						<option value="3">PG Diploma</option>
						<option value="4">Bachelors Degree</option>
						<option value="5">Diploma</option>
						<option value="6">Intermediate / (10+2)</option>
						<option value="7">Secondary</option>
						<option value="8">Others</option>
					</select>

		                    </div>
		                    <div class="col-md-6">
		                        <label for="exampleInputEmail1">Address 1</label>
		                        <input name="org_add1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Last Name">
		                   	<br/>
		                        <label for="exampleInputEmail1">Address 2</label>
		                        <input name="org_add2" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
					<br/>
		                        <label for="exampleInputEmail1">City</label>
		                        <input name="org_city" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
					<br/>
		                        <label for="exampleInputEmail1">State</label>
		                        <input name="org_state" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
					<br/>
		                        <label for="exampleInputEmail1">Pincode</label>
		                        <input name="org_pincode" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
					<br/>
		                        <label for="exampleInputEmail1">Country</label>
		                        <input name="org_country" type="text" class="form-control" id="exampleInputEmail1" placeholder="">

		                    </div>
                        	</div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" id="org_submit" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
			<h2>Representative Detail</h2>
                        <div class="step2">
                            <div class="step_21">
                                <div class="row">
		                    <div class="col-md-6">
		                        <label for="exampleInputEmail1">Name</label>
		                        <input name="ind_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of your organisation">
					<br/>
		                        <label for="exampleInputEmail1">Phone Number</label>
		                        <input name="ind_phone_number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone number">
					<br/>
		                        <label for="exampleInputEmail1">Email</label>
		                        <input name="ind_email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
		                    </div>
		                    <div class="col-md-6">
		                        <label for="exampleInputEmail1">Designation</label>
		                        <input name="ind_designation" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of your organisation">
					<br/>
		                        <label for="exampleInputEmail1">Mobile Number</label>
		                        <input name="ind_mobile_number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone number">
					<br/>
		                    </div>
                                </div>
                            </div>
                            <div class="step-22">
                            
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" id="ind_submit" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="step33">
                        <h5><strong>Technical Specification</strong></h5>
                        <hr>
                            <div class="row mar_ned">
		                    <div class="col-md-6">
		                        <label for="exampleInputEmail1">ISP Name</label>
		                        <input name="isp" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of your organisation">
					<br/>
		                        <label for="exampleInputEmail1">Computing Nodes</label>
		                        <input name="ind_designation" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of your organisation">
					<br/>
		                    </div>
		                    <div class="col-md-6">
		                        <label for="exampleInputEmail1">Static IP Address</label>
		                        <input name="ind_designation" type="text" class="form-control" id="exampleInputEmail1" placeholder="Name of your organisation">
					<br/>
		                    </div>
		                    <div class="col-md-12">
					<label for="exampleInputEmail1">Purpose</label>
					<textarea name="ind_mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Purpose"></textarea>
					<br/>
		                    </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" id="submit_ntp_registration" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <div class="step44">
                            <h5><strong>Completed</strong></h5>
                            
                          
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {


    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


//according menu

$(document).ready(function()
{
//form submit start

	$('#submit_ntp_registration').click(function () {
		if($('input[name=org_name]').val().length == 0)
		{
			alert("Form bharo!");
		}
	});

	$('#org_submit').click(function () {
		if($('input[name=org_name]').val().length == 0)
		{
			alert("Please fill Organisation name");
			return;
		}
		
		if($('input[name=org_phone_number]').val().length == 0)
		{
			alert("Please fill Organisation phone name");
			return;
		}
		if($('input[name=org_email]').val().length == 0)
		{
			alert("Please fill Organisation email address");
			return;
		}
		if($('select[name=org_type]').val().length == 0)
		{
			alert("Please select type");
			return;
		}
		if($('select[name=org_category]').val().length == 0)
		{
			alert("Please select category");
			return;
		}
		if($('input[name=org_add1]').val().length == 0)
		{
			alert("Please fill Address");
			return;
		}
		if($('input[name=org_add2]').val().length == 0)
		{
			alert("Please fill Address");
			return;
		}
		if($('input[name=org_city]').val().length == 0)
		{
			alert("Please fill city name");
			return;
		}
		if($('input[name=org_state]').val().length == 0)
		{
			alert("Please fill State name");
			return;
		}		
		if($('input[name=org_country]').val().length == 0)
		{
			alert("Please fill Country name");
			return;
		}
		if($('input[name=org_pincode]').val().length == 0)
		{
			alert("Please fill your city Pin code");
			return;
		}
		
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
		
	});
	//form person ends



	
	//individual detail

	$('#ind_submit').click(function () {
		if($('input[name=ind_name]').val().length == 0)
		{
			alert("Please fill Person name");
			return;
		}
		
		if($('input[name=ind_phone_number]').val().length == 0)
		{
			alert("Please fill Person phone name");
			return;
		}
		if($('input[name=ind_mobile_number]').val().length == 0)
		{
			alert("Please fill Person phone name");
			return;
		}

		if($('input[name=ind_email]').val().length == 0)
		{
			alert("Please fill Person email address");
			return;
		}
		if($('select[name=ind_designation]').val().length == 0)
		{
			alert("Please select designation");
			return;
		}
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
		
	});



//form person ends


    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
	
	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header').width();
	$('.accordion-content').css({});
	
	//Open The First Accordion Section When Page Loads
	$('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	$('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	$('.accordion-header').click(function () {
		if($(this).is('.inactive-header')) {
			$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
		
		else {
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
	});
	
	return false;
});
	</script>

