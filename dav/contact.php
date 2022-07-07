<?php

error_reporting(0);

//ob_start();

require_once("config/functions.inc.php");

?><!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="" />

    <meta name="author" content="" />

    <title>Contact Us</title>

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

                    <div class="row1">

						<?php include('header.php');?>

                        <div class="row">

                        <div class="leftbx-13">

                        <div class="col-lg-6 col-md-6 col-sm-6">

                        <h1>Contact form </h1>

                            <div class="row">

                                <div class="col-xs-6 paddtop" >

                                    <div class="left-inner-addon">

                                        <i class="fa fa-user"></i>

                                        <input type="text" class="form-control" placeholder="Name" />

                                    </div>

                                </div>

                                <div class="col-xs-6 paddtop" >

                                    <div class="left-inner-addon">

                                        <i class="fa fa fa-envelope-o"></i>

                                        <input type="search"  class="form-control" placeholder="Email" />

                                    </div>

                                </div>

                                <div class="col-xs-6 paddtop" >

                                    <div class="left-inner-addon">

                                        <i class="fa fa fa-phone"></i>

                                        <input type="search"  class="form-control" placeholder="Phone" />

                                    </div>

                                </div>

                                <div class="col-xs-6 paddtop" >

                                    <div class="left-inner-addon">

                                        <i class="fa fa fa-pencil"></i>

                                        <input type="search"  class="form-control" placeholder="Subject" />

                                    </div>

                                </div>

                                <div class="col-xs-12 paddtop" >

                                    <div class="left-inner-addon">

                                        <textarea class="form-control" placeholder="Message"></textarea>

                                    </div>

                                </div>

                                <div class="col-xs-12"><input type="submit" value="Send message" class="subbu" /></div>

                            </div>

                        </div>

           					<div class="col-lg-6 col-md-6 col-sm-6">

                            <? $q=mysql_query("select * from category WHERE  id='17' "); $details_fetch=mysql_fetch_array($q); ?>

                            	<h1><?=$details_fetch['weight']?></h1>

                                <p> <?=stripslashes($details_fetch['descr'])?></p>

                                </div>

                                <div class="c"></div>

                                <div class="col-lg-12">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3606.4378676082083!2d83.00656221501205!3d25.323083883837768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2e112fced3d5%3A0x36ee9d3fc3c7fdfb!2sDAV+Post+Graduate+College!5e0!3m2!1sen!2sin!4v1469517473548"   frameborder="0" style="width:100%; height:300px; margin-top:25px; border:#039 2px solid;" allowfullscreen></iframe>
                     
                                </div>

                            </div>

                      </div>

                        

                    </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- /#page-content-wrapper -->

    </div>

    <div class="c"></div>

   <!--pc-->

    <div class="container-fluid">

        <div class="row">

        	<div class="footbx footbx1">

                <div class="col-lg-4 col-md-4 col-sm-4"><p>Copyright © 2015 All Rights Reserved DAV PG College </p></div>

                <div class="col-lg-5 col-md-5 col-sm-5">

                    <ul class="social-network social-circle">

                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>

                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>

                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>

                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>

                    </ul>				

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3"><p>Developed & Managed by <a href="#">Balaji Software Solutions</a></p></div>

                <div class="c"></div>

            </div>

        </div>

    </div>

    

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

