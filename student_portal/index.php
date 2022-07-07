<?php
ob_start();
 require_once("con_base/functions.inc.php"); 
 
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $SITE_NAME;?>  | Student Sign In</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet" /> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css' />
<!---//webfonts---> 
 <!-- Meters graphs -->
<script src="js/jquery-1.10.2.min.js"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="center" >
							<h1>Student Login</h1>
						</div><!---->
						<div class="signin">
							 
							<form name="form2" method="post" action="login">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" name="enr_no" class="user" value="" placeholder="Enter Enrollment No"  required />
								</div>
								 
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" name="dob" class="lock" value=""  placeholder="Enter Date Of Birth (YYYY-MM-DD)" required/>
								</div>
								 
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Login to your Student profile" />
						</form>	 
						</div>
						 
					</div>
				</div>
			</div>
		<?php require("footer.php"); session_destroy(); ?>
	</section>
	
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>