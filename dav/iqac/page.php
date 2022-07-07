<?php
error_reporting(0);
//ob_start();
require_once("config/functions.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?=$SITE_TITLE?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/simple-sidebar.css" rel="stylesheet" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.loopmovement.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>

<body>
<!-- Sidebar -->
<div id="wrapper">
<?php include('left.php');?>
           <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            
           <!-- <div class="mobilem"><a href="#menu-toggle" class="clickbtn " id="menu-toggle"><img src="images/click-here.png" alt="" class="img-responsive"></a></div>-->
                <div class="row">
                    <div class="col-lg-12">
						<?php   include('header.php');?>
                        
                        <div class="leftbx-13">
                            	<h1>About us</h1>
                                <p> The DAV Post Graduate College was established by its mother institution, Arya Vidya Sabha, Kashi. The idea behind its establishment was to open an institution in the heart of the city and under the umbrella of Banaras Hindu University which should cater the value and skill based education to the students.</p><p>

Two disciples of Mahamana Pt. Madan Mohan Malviya Ji, viz. Pt. Ram Narayan Mishra and Shri Gauri Shankar Prasad were instrumental in establishing the College. The College was established in 1938 as an Intermediate College recognized by Banaras Hindu University. It got degree status from the University in 1947 and permanent affiliation in 1954. The College started running undergraduate courses in the faculty of Arts, Social Sciences and Commerce, and in 2008 the University allowed the College to start Ph.D.</p><p>

Research and Post Graduate courses in four subjects namely, Commerce, Sociology, Economics and History. The College is catering with distinction not only to the needs of the students of the eastern districts of U.P. but also the adjoining States too. Because of this the University has allowed the College to start PG Courses in three more subjects viz. Psychology, Political Science & English from session i.e. 2010-11 and Ph.D. research in English from this session.</p>
                            </div>
                      
                          <?php include("foot_top.php"); ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <div class="c"></div>
   <!--pc-->
      <?php include("foot.php"); ?>
    
    <!--end-->
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<script type="text/javascript">
	$('.box1').loopmovement({
		'direction':'top', 	
		'speed':20
	});
	$('.box2').loopmovement({
		'direction':'top', 	
		'speed':30
	});
	$('.box3').loopmovement({
		'direction':'top', 	
		'speed':80
	});
</script> 
                       
  
</body>

</html>
