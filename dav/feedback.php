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
                            	<h1>Student???s Feedback Form / ??????????????? ????????????????????????????????? ????????????????????? </h1>
                                <div class="col-lg-8">
                                
                                <div class="feedbox">
                                	<div class="feedbox1">
                                    	<div class="feedbox4"><p>Dear Student, Please tick the following and give us your opinion on the following.</p>
											<p>??????????????? ???????????????, ??????????????? ?????? ??????????????? ??????????????? ????????? ???????????? ?????????????????????????????? ?????? ???????????? ????????? ?????? ??? </p>
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
                                    	<div class="col-sm-3 feedbox2">Course ??????????????? </div>
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
                                    	<div class="col-sm-3 feedbox2">Semester (????????????????????????) :-</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Year ????????????  :-</div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-3 feedbox2">Subject  ????????????  :- </div>
                                        <div class="col-sm-9 feedbox3"><input type="text" value="" class="textbx1" placeholder=""></div>
                                        <div class="c"></div>
                                    </div>
                                    
                                </div>
                                	
                                    
                                    <!--<div class="feedbox">
                                	<div class="feedbox1">
                                    	<div class="feedbox4"><p><strong>Section  /  ????????? ???  A </strong></p></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="feedbox4"><p>?????????????????? ?????? ???????????? ????????? ???????????? ??????????????? </p></div>
                                    </div>
                                	<div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2"><strong>Sl.<br> ????????????</strong></div>
                                        <div class="col-sm-5 feedbox2">Aspects<br> ???????????? </div>
                                        <div class="col-sm-2 feedbox2">Very Good<br> ???????????? ??????????????? </div>
                                        <div class="col-sm-2 feedbox2">Good<br> ??????????????? </div>
                                        <div class="col-sm-2 feedbox03">Average<br> ????????????????????? </div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">His Motivation to students            ???????????? ?????????????????? ????????????????????? ?????? ????????? ????????????????????? </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">Subject  clarity  ???????????? ???????????????????????? </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">Subject  clarity  ???????????? ???????????????????????? </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    <div class="feedbox1">
                                    	<div class="col-sm-1 feedbox2">1</strong></div>
                                        <div class="col-sm-5 feedbox2">Subject  clarity  ???????????? ???????????????????????? </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"> </div>
                                        <div class="col-sm-2 feedbox2 text-center"><input type="radio"></div>
                                        <div class="col-sm-2 feedbox03 text-center"><input type="radio"></div>
                                        <div class="c"></div>
                                    </div>
                                    
                                    
                                    
                                </div>-->
                                 <div class="table-responsive">          
                                      <table class="table table-bordered">
                                        	<tr>
                                            	<th colspan="5">Section  /  ????????? ???  A </th>
                                            </tr>
                                            <tr>
                                            	<td colspan="5">?????????????????? ?????? ???????????? ????????? ???????????? ??????????????? </td>
                                            </tr>
                                          <tr>
                                            <th>Sl. ???????????? </th>
                                            <th>Aspects ???????????? </th>
                                            <th>Very Good ???????????? ??????????????? </th>
                                            <th>Good ??????????????? </th>
                                            <th>Average ????????????????????? </th>
                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>Subject  clarity  ???????????? ???????????????????????? </td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>Subject  clarity  ???????????? ???????????????????????? </td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td>1</td>
                                            <td>Subject  clarity  ???????????? ???????????????????????? </td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                      </table>
                                      </div>
                                      <div class="table-responsive">          
                                      <table class="table table-bordered">
                                        	
                                            
                                          <tr>
                                            <th width="74%">Section  /  ????????? ???  B </th>
                                            <th width="6%">Yes ????????? </th>
                                            <th width="5%">No ?????? </th>
                                            <th width="15%">No Comments ????????? ????????????????????? ???????????? </th>
                                          </tr>
                                          <tr>
                                            <td><p>Will you suggest him to teach the same subject to your juniors also?</p><p> ???????????? ?????? ????????????, ???????????? ?????????????????? ?????? ??????  ????????? ???????????? ?????????????????? ?????? ???????????? ??????????????? ? </p></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td><p>Will you suggest him to teach the same subject to your juniors also?</p><p> ???????????? ?????? ????????????, ???????????? ?????????????????? ?????? ??????  ????????? ???????????? ?????????????????? ?????? ???????????? ??????????????? ? </p></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                            <td><input type="radio"></td>
                                          </tr>
                                          <tr>
                                            <td><p>Will you suggest him to teach the same subject to your juniors also?</p><p> ???????????? ?????? ????????????, ???????????? ?????????????????? ?????? ??????  ????????? ???????????? ?????????????????? ?????? ???????????? ??????????????? ? </p></td>
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
