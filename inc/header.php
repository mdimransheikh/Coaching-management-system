<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>

<?php 
	$db = new Database();
	$fm = new Format();
?>

<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>

<!DOCTYPE HTML>
<html>
<head>
<title>MACS Coaching</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Coaching Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Hind:400,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!--google fonts-->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
</script>
<!-- //end-smoth-scrolling -->
<!-- animated-css -->
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
<!-- animated-css -->
<script src="js/bootstrap.min.js"></script>
<link href="css/galleryeffect.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div class="header">
	<div class="fixed-header">
		    <div class="navbar-wrapper">
		      <div class="container">
		        <nav class="navbar navbar-inverse navbar-static-top">
		            <div class="navbar-header">
		            	<div class="row">
				              <div style="" class="logo wow slideInLeft" data-wow-delay="0.2s">
				                    <a class="navbar-brand" href="index.php"><img src="images/logo-2.jpg" /></a>
				              </div>
				              <div style="float: center;margin-left: 500px"><h1 style="color: #0033CC"><b>Macs Coaching Center</b></h1></div>
			            </div>
		            <div id="navbar" class="navbar-collapse collapse" style="margin-left: 180px;">
			            <nav class="cl-effect-1">
			              <ul class="nav navbar-nav">
			               	<li><a href="index.php">Home</a></li>
			               	<li><a href="about.php">About us</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="result.php">Result</a></li>
							<li><a href="galary.php">Gallary</a></li>
							<li><a href="activities.php">Activities</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="map.php">Campus map</a></li>						
			              </ul>
			            </nav>
		            <!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header").addClass("fixed");
				}else{
					$(".header").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
		            </div>
			        </div>
			        </div>
		            
		            <div class="clearfix"> </div>
		        </nav>
		    </div>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>
</div>
<!--header end here-->