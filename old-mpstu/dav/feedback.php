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
                    <div class="row1">
						<?php include('header.php');?>
                        	<div class="leftbx-13">
                            	<h1>Student’s Feedback Form / छात्र प्रतिक्रिया प्रपत्र </h1>
                                <div class="col-lg-8">
                                
                                <div class="feedbox">
                                	<div class="feedbox1">
                                    	<div class="feedbox4"><p>Dear Student, Please tick the following and give us your opinion on the following.</p>
											<p>प्रिय छात्र, कृपया का निशान लगाएं तथा हमें निम्नलिखित पर अपनी राय दे । </p>
                                        </div>
                                    </div>
                                	<div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Student Name</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder="Student Name"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Student Contact</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Student Roll No</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Course कोर्स </div>
                                        <div class="col-sm-9 feedbox3">
                                        	<select id="course" name="course" style="margin-top:7px;">
                                                 <option value="">Select Course</option>
                                                 <option>B.A.(Arts)</option>
                                                 <option>B.A. (S, Sci)</option>
                                                 <option>B.Com </option>
                                                 <option>M.A. </option>
                                                 <option>M.Com.</option>
                                                 <option>Ph.D.</option>
                                         	</select>
                                         </div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Semester (सेमेस्टर) :-</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Year वर्ष  :-</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Subject  विषय  :- </div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    
                                </div>
                                	
                                    
                                    <!--<div class="feedbox">
                                	<div class="feedbox1">
                                    	<div class="feedbox4"><p><strong>Section  /  खंड –  A </strong></p></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="feedbox4"><p>शिक्षक के बारे में आपके विचार </p></div>
                                    </div>
                                	<div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2"><strong>Sl.<br> क्रम</strong></div>
                                        <div class="col-sm-5 feedbox2">Aspects<br> पहलू </div>
                                        <div class="col-sm-2 feedbox2">Very Good<br> बहुत अच्छा </div>
                                        <div class="col-sm-2 feedbox2">Good<br> अच्छा </div>
                                        <div class="col-sm-2 feedbox03">Average<br> सामान्य </div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">His Motivation to students            उनके द्वारा छात्रों के लिए प्रेरणा </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">Subject  clarity  विषय स्पष्टता </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">Subject  clarity  विषय स्पष्टता </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">Subject  clarity  विषय स्पष्टता </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    
                                    
                                    
                                </div>-->
                                 <div class="table-responsive">          
                                      <table class="table table-bordered">
                                        	<tr>
                                            	<th colspan="5">Section  /  खंड –  A </th>
                                            </tr>
                                            <tr>
                                            	<td colspan="5">शिक्षक के बारे में आपके विचार </td>
                                            </tr>
                                          <tr>
                                            <th>Sl. क्रम </th>
                                            <th>Aspects पहलू </th>
                                            <th>Very Good बहुत अच्छा </th>
                                            <th>Good अच्छा </th>
                                            <th>Average सामान्य </th>
                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>Subject  clarity  विषय स्पष्टता </td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>Subject  clarity  विषय स्पष्टता </td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>Subject  clarity  विषय स्पष्टता </td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                      </table>
                                      </div>
                                      <div class="table-responsive">          
                                      <table class="table table-bordered">
                                        	
                                            
                                          <tr>
                                            <th width="74%">Section  /  खंड –  B </th>
                                            <th width="6%">Yes हाँ </th>
                                            <th width="5%">No ना </th>
                                            <th width="15%">No Comments कोई टिप्पणी नहीं </th>
                                          </tr>
                                          <tr>
                                            <td><p>Will you suggest him to teach the same subject to your juniors also?</p><p> क्या आप उनको, अपने जूनियर को भी  वही विषय पढ़ाने की सलाह देंगे ? </p></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td><p>Will you suggest him to teach the same subject to your juniors also?</p><p> क्या आप उनको, अपने जूनियर को भी  वही विषय पढ़ाने की सलाह देंगे ? </p></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td><p>Will you suggest him to teach the same subject to your juniors also?</p><p> क्या आप उनको, अपने जूनियर को भी  वही विषय पढ़ाने की सलाह देंगे ? </p></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          
                                      </table>
                                      </div>
                                </div>
                                <div class="col-lg-4"></div>
                                <div class="c"></div>
                            </div>
                     
                          <?php include("foot_top.php"); ?>
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
