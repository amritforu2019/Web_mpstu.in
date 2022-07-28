<?php
error_reporting(0);
ob_start();
require_once("config/functions.inc.php");
 if($_REQUEST['typ']=='')
 {
 
  header('location: feed_student?typ=1');
 exit;
 
 }
 
 if(isset($_POST['frmsub']))
 {
 //echo "INSERT INTO  `feed_student` set `typ`='".trim($_POST['typ'])."' ,`dt`=now() ,`name`='".trim($_POST['name'])."' ,`contact`='".trim($_POST['contact'])."' ,`roll` ='".trim($_POST['roll'])."',`course`='".trim($_POST['course'])."' ,`sem` ='".trim($_POST['sem'])."', `year`='".trim($_POST['year'])."' , `subj` ='".trim($_POST['subj'])."', `f_name` ='".trim($_POST['f_name'])."', `edulev` ='".trim($_POST['edulev'])."' , `pass_yr` ='".trim($_POST['pass_yr'])."', `work` ='".trim($_POST['work'])."', `a` ='".trim($_POST['a'])."' , `b` ='".trim($_POST['b'])."' , `c`='".trim($_POST['c'])."' , `d`='".trim($_POST['d'])."' , `e` ='".trim($_POST['e'])."'  , `f` ='".trim($_POST['f'])."' ,  `g` ='".trim($_POST['g'])."' , `h` ='".trim($_POST['h'])."', `i` ='".trim($_POST['i'])."' , `j` ='".trim($_POST['j'])."' , `k`  ='".trim($_POST['k'])."', `l` ='".trim($_POST['l'])."' , `m` ='".trim($_POST['m'])."' , `n` ='".trim($_POST['n'])."' , `o` ='".trim($_POST['o'])."' , `p` ='".trim($_POST['p'])."' , `q` ='".trim($_POST['q'])."' ";
 
 
 if(mysql_query("INSERT INTO  `feed_student` set `typ`='".trim($_POST['typ'])."' ,`dt`=now() ,`name`='".trim($_POST['name'])."' ,`contact`='".trim($_POST['contact'])."' ,`roll` ='".trim($_POST['roll'])."',`course`='".trim($_POST['course'])."' ,`sem` ='".trim($_POST['sem'])."', `year`='".trim($_POST['year'])."' , `subj` ='".trim($_POST['subj'])."', `f_name` ='".trim($_POST['f_name'])."', `edulev` ='".trim($_POST['edulev'])."' , `pass_yr` ='".trim($_POST['pass_yr'])."', `work` ='".trim($_POST['work'])."', `paper` ='".trim($_POST['paper'])."',dep= '".trim($_POST['dep'])."', `a` ='".trim($_POST['a'])."' , `b` ='".trim($_POST['b'])."' , `c`='".trim($_POST['c'])."' , `d`='".trim($_POST['d'])."' , `e` ='".trim($_POST['e'])."'  , `f` ='".trim($_POST['f'])."' ,  `g` ='".trim($_POST['g'])."' , `h` ='".trim($_POST['h'])."', `i` ='".trim($_POST['i'])."' , `j` ='".trim($_POST['j'])."' , `k`  ='".trim($_POST['k'])."', `l` ='".trim($_POST['l'])."' , `m` ='".trim($_POST['m'])."' , `n` ='".trim($_POST['n'])."' , `o` ='".trim($_POST['o'])."' , `p` ='".trim($_POST['p'])."' , `q` ='".trim($_POST['q'])."' "))
 {
 $_SESSION['msg']='Feedback Saved successfully Thanks !!';
 header('location: feed_student?typ='.$_POST['typ']);
 exit;
 
 }
 
 
 }
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
                            	<h1><? if($_REQUEST['typ']=='1') echo 'Student’s Feedback Form /  छात्र प्रतिक्रिया प्रपत्र  ';
   if($_REQUEST['typ']=='2') echo 'Student’s Feedback Form for Curriculum';
   if($_REQUEST['typ']=='4') echo 'Feedback from Parents';
   if($_REQUEST['typ']=='3') echo 'Alumni  Feedback  Form / पूर्व छात्रों द्वारा फीडबैक फॉर्म ';
   ?></h1>
                                <div class="col-lg-8">
                                
        <div class="table-responsive">                         
 <form id="form1" name="form1" method="post" action="">

       
                                      <table class="table table-bordered">
   <tr>
   <td colspan="2">
   <?=$_SESSION['msg'];$_SESSION['msg']='';?>
   </td>
   </tr>
   
   <tr>
    <td colspan="2" align="center" >
      <? 
   if($_REQUEST['typ']=='1') echo 'Dear  Student, Please tick the following and give us your opinion on the following.<br />
  प्रिय  छात्र, कृपया  का  निशान लगाएं तथा हमें निम्नलिखित पर अपनी राय दे । ';
   if($_REQUEST['typ']=='2') echo ' Dear Student, Please give your opinion about curriculum.  It is for the improvements in semesters. <br /> प्रिय छात्र , कृपया पाठ्यक्रम के बारे में अपनी राय दे। यह सेमेस्टर में सुधार के उद्देश्य के लिए है।';
   if($_REQUEST['typ']=='4') echo ' Feedback from Parents';
   if($_REQUEST['typ']=='3') echo 'Your valuable inputs and suggestions will be of great use to improve the quality of our academic programs and enhance the credibility of the College. <br>
आपके अपने बहुमूल्य सुझाव, हमारे शैक्षिक कार्यक्रमों की गुणवत्ता में सुधार 
और कॉलेज की विश्वसनीयता बढ़ाने के लिए बहुत काम आयेंगे।
';
   ?>  </td>
    </tr>
   <? if($_REQUEST['typ']=='4') { ?> <tr>
    <td >Parent’s Name: Mr./Ms/Mrs</td>
    <td ><input required class="textbx1"   type="text" name="f_name" id="f_name" /></td>
   </tr> <? } ?>
   <tr>
    <td ><? if($_REQUEST['typ']=='3') echo 'Name of the Alumni
पूर्व छात्र के नाम'; else echo 'Student Name  '; ?></td>
    <td >
     <label>
      <input required class="textbx1"   type="text" name="name" id="name" />
      </label>    </td>
   </tr>
   <tr>
    <td >Student Contact</td>
    <td ><input required class="textbx1"   type="text" name="contact" id="contact" /></td>
   </tr>
   <tr>
    <td >Student Roll No</td>
    <td ><input required class="textbx1"   type="text" name="roll" id="roll" /></td>
   </tr>
   <tr>
    <td ><? if($_REQUEST['typ']=='3') echo 'Degree'; else echo 'Course कोर्स'; ?>    </td>
    <td > 
   <? if($_REQUEST['typ']=='2') { ?>
   <select name="course" id="course">
      <option value="" >Select Course</option>
     <option >Arts Faculty  कला</option>
     <option >Social Science Faculty  सामाजिक विज्ञानं संकाय</option>
     <option >Commerce Faculty वाणिज्य </option>   
     </select>
	 <? } else if($_REQUEST['typ']=='3') { ?>
	  <select name="course" id="course">
      <option value="" >Select Degree</option>
     <option >BA ( Arts  /  S. Sci )</option>
     <option >MA ( Arts  /  S. Sci )</option>
     <option >Ph.D</option>   
     </select>
	 <? }  else { ?>
     <select name="course" id="course">
      <option value="" >Select Course</option>
     <option >B.A.(Arts)</option>
     <option >B.A. (S, Sci)</option>
     <option >B.Com </option>
     <option >M.A. </option>
     <option >M.Com.</option>
     <option >Ph.D.</option>
     </select>
     <? } ?>      </td>
    </tr>
    <? if($_REQUEST['typ']=='2') { ?>
   <tr>
    <td align="left">Student of   आप छात्र हैं </td>
    <td><select name="edulev" id="edulev">
     <option value="" >Select</option>
     <option >UG</option>
     <option >PG</option>
     <option >Research </option>
   
    </select></td>
   </tr>
   <? }    if($_REQUEST['typ']!='3') {?>
   <tr>
    <td align="left"> Semester (सेमेस्टर) :-</td>
    <td><input required class="textbx1"   type="text" name="sem" id="sem" /></td>
   </tr>
   <? }  if($_REQUEST['typ']=='3') {?>
   <tr>
    <td align="left">Departments विभाग </td>
    <td><input required class="textbx1"   type="text" name="dep" id="dep" /></td>
   </tr>
   <tr>
    <td align="left">What  you do ? आप  क्या करते हैं ?</td>
    <td><input required class="textbx1"   type="text" name="work" id="work" /></td>
   </tr>
   <? } ?>
   <tr>
    <td align="left"><? if($_REQUEST['typ']=='3') echo 'Passing';  ?> Year वर्ष  :-</td>
    <td><input required class="textbx1"   type="text" name="year" id="year" /></td>
   </tr> 
   <? if($_REQUEST['typ']!='3') {?> <tr>
    <td align="left"> Subject  विषय  :-  </td>
    <td><input required class="textbx1"   type="text" name="subj" id="subj" /></td>
   </tr>
    <?  }if($_REQUEST['typ']=='2') { ?> <tr>
    <td align="left"> Paper  (पेपर) :-</td>
    <td><input required class="textbx1"   type="text" name="paper" id="paper" /></td>
   </tr>
   <tr>
    <td colspan="2" align="left"> About the Subject and Paper you are  giving your views :<br />वह विषय और पेपर जिसके बारे में आप अपने विचार दे रहे  हैं </td>
    </tr>
    <? } ?>
  </table>
   <? if($_REQUEST['typ']=='4') { ?> 
  <br />
   <table class="table table-bordered">
   
   <tr>
    <td >Sl</td>
    <td >Particulars</td>
    <td >Agree सहमत हैं </td>
    <td >Disagree असहमत </td>
    <td >Neutral तटस्थ </td>
   </tr>
   <tr>
    <td >1</td>
    <td >Your    ward studying in the College is a matter of pride for me.
     आपके    लिए यह गर्व की बात है कि आपका बेटा / बेटी इस कॉलेज मे पढ़ता है। </td>
   <td  > <input required type="radio" name="a"   value="Agree " /></td>
   <td  ><input required type="radio" name="a"   value="Disagree " /></td>
   <td ><input required type="radio" name="a"   value="Neutral " /></td>
  
   </tr>
   <tr>
    <td >2</td>
    <td >Your    ward is improving his knowledge base. 
     अपने    वार्ड के ज्ञान के आधार में सुधार है    । </td>
    <td  > <input required type="radio" name="b"   value="Agree " /></td>
   <td  ><input required type="radio" name="b"   value="Disagree " /></td>
   <td ><input required type="radio" name="b"   value="Neutral " /></td>
 
   </tr>
   <tr>
    <td >4</td>
    <td >The    atmosphere in the College is
     conducive    for learning. 
     सीखने के लिए कॉलेज में    माहौल है अनुकूल। </td>
      <td  > <input required type="radio" name="c"   value="Agree " /></td>
   <td  ><input required type="radio" name="c"   value="Disagree " /></td>
   <td ><input required type="radio" name="c"   value="Neutral " /></td>
 
   </tr>
   <tr>
    <td >5</td>
    <td >College’s    website is very informative and 
     regularly    updated. 
     कॉलेज की वेबसाइट बहुत    जानकारीपूर्ण है और 
     नियमित    रूप से अद्यतन है। </td>
      <td  > <input required type="radio" name="d"   value="Agree " /></td>
   <td  ><input required type="radio" name="d"   value="Disagree " /></td>
   <td ><input required type="radio" name="d"   value="Neutral " /></td>
 
   </tr>
   <tr>
    <td >6 </td>
    <td >Hostel    facilities are good and available. 
     छात्रावास    सुविधा अच्छे और उपलब्ध हैं। </td>
   <td  > <input required type="radio" name="e"   value="Agree " /></td>
   <td  ><input required type="radio" name="e"   value="Disagree " /></td>
   <td ><input required type="radio" name="e"   value="Neutral " /></td>
 
   </tr>
   <tr>
    <td >7 </td>
    <td >The    College administration is cooperative. 
     कॉलेज    प्रशासन सहयोग करता है । </td>
     <td  > <input required type="radio" name="f"   value="Agree " /></td>
   <td  ><input required type="radio" name="f"   value="Disagree " /></td>
   <td ><input required type="radio" name="f"   value="Neutral " /></td>
 
   </tr>
   <tr>
    <td >8 </td>
    <td >Direct    Communication with Principal is easy. 
     प्राचार्य    के साथ सीधे संवाद करना आसान है। </td>
    <td  > <input required type="radio" name="g"   value="Agree " /></td>
   <td  ><input required type="radio" name="g"   value="Disagree " /></td>
   <td ><input required type="radio" name="g"   value="Neutral " /></td>
 
   </tr>
   <tr>
    <td >9 </td>
    <td >The college  is a secured campus for your ward. 
     अपने    वार्ड के लिए कॉलेज, एक सुरक्षित परिसर है। </td>
    <td  > <input required type="radio" name="h"   value="Agree " /></td>
   <td  ><input required type="radio" name="h"   value="Disagree " /></td>
   <td ><input required type="radio" name="h"   value="Neutral " /></td>
 
   </tr>
  </table>
   <br />
  <table class="table table-bordered">
   
  <tr>
   <td ><strong> </strong></td>
   <td colspan="2"  >Your Kind Suggestions for further improvement : आगे की सुधार के लिए आपका सुझाव: 
</td>
  </tr>
  <tr>
   <td  valign="top">&nbsp;</td>
   <td colspan="2"   valign="top"><label>
    <textarea name="i" cols="40" id="i"></textarea>
   </label></td>
   </tr>
  
 </table>
  <? } ?>
    <? if($_REQUEST['typ']=='3') { ?> 
   <br />
 <table class="table table-bordered">
   
   <tr>
    <td colspan="6">  Please give   your assessment of   our College’s   Academic Level. <br />
हमारे कॉलेज के शिक्षा स्तर को मूल्यांकन कीजिए। 
</td>
    </tr>
   <tr>
    <td ></td>
    <td > </td>
    <td >V.Good बहुत अच्छा </td>
    <td >Good अच्छा </td>
    <td >Satisfactory संतोषजनक </td>
    <td >Unsatisfactory असंतोषजनक </td>
   </tr>
   <tr>
    <td >1</td>
    <td > Admission Procedure <br />
     प्रवेश प्रक्रिया </td>
    <td  > <input required type="radio" name="a"  value="Very Good   "    /></te>
   <td  ><input required type="radio" name="a"   value="Good   " /></td>
   <td ><input required type="radio" name="a"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="a"   value="Unsatisfactory  " /></td>
 

   </tr>
   <tr>
    <td >2</td>
    <td >Fee structure    शुल्क संरचना </td>
     <td  > <input required type="radio" name="b"  value="Very Good " /></te>
   <td  ><input required type="radio" name="b"   value="Good   " /></td>
   <td ><input required type="radio" name="b"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="b"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >3</td>
    <td >Environment    वातावरण </td>
   <td  > <input required type="radio" name="c"  value="Very Good " /></te>
   <td  ><input required type="radio" name="c"   value="Good   " /></td>
   <td ><input required type="radio" name="c"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="c"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >4</td>
    <td >Infrastructure &amp;    Lab facilities इन्फ्रास्ट्रक्चर और लैब की सुविधा </td>
   <td  > <input required type="radio" name="d"  value="Very Good " /></te>
   <td  ><input required type="radio" name="d"   value="Good   " /></td>
   <td ><input required type="radio" name="d"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="d"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >5</td>
    <td >Faculty members  प्राध्यापक सदस्य </td>
   <td  > <input required type="radio" name="e"  value="Very Good " /></te>
   <td  ><input required type="radio" name="e"   value="Good   " /></td>
   <td ><input required type="radio" name="e"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="e"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >6</td>
    <td >Project Guidance <br />
     प्रोजेक्ट गाइडेंस (परियोजना निर्देशन) </td>
     <td  > <input required type="radio" name="f"  value="Very Good " /></te>
   <td  ><input required type="radio" name="f"   value="Good   " /></td>
   <td ><input required type="radio" name="f"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="f"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td > 7</td>
    <td >Placement    प्लेसमेंट </td>
    <td  > <input required type="radio" name="g"  value="Very Good " /></te>
   <td  ><input required type="radio" name="g"   value="Good   " /></td>
   <td ><input required type="radio" name="g"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="g"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >8</td>
    <td >Library         पुस्तकालय </td>
    <td  > <input required type="radio" name="h"  value="Very Good " /></te>
   <td  ><input required type="radio" name="h"   value="Good   " /></td>
   <td ><input required type="radio" name="h"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="h"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >9</td>
    <td >Canteen       जलपान गृह </td>
    <td  > <input required type="radio" name="i"  value="Very Good " /></te>
   <td  ><input required type="radio" name="i"   value="Good   " /></td>
   <td ><input required type="radio" name="i"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="i"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >10</td>
    <td >Hostel Facilities छात्रावास की सुविधा </td>
   <td  > <input required type="radio" name="j"  value="Very Good " /></te>
   <td  ><input required type="radio" name="j"   value="Good   " /></td>
   <td ><input required type="radio" name="j"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="j"   value="Unsatisfactory  " /></td>
 
   </tr>
   <tr>
    <td >11</td>
    <td >Overall Rating of the College <br />
     कॉलेज का समग्र मूल्यांकन </td>
   <td  > <input required type="radio" name="k"  value="Very Good " /></te>
   <td  ><input required type="radio" name="k"   value="Good   " /></td>
   <td ><input required type="radio" name="k"   value="Satisfactory  " /></td>
  <td ><input required type="radio" name="k"   value="Unsatisfactory  " /></td>
 
   </tr>
  </table>
   <br />
 <table class="table table-bordered">
   
  <tr>
   <td colspan="3" ><strong> Your Suggestions  आपके सुझाव</strong><strong></strong></td>
   </tr>
  <tr>
   <td  valign="top">1 </td>
   <td   valign="top"><p><strong>Regarding any change in syllabi: </strong>पाठ्यक्रम में किसी भी बदलाव की जरूरत के संबंध में <strong>: </strong></p></td>
   <td   valign="top"><label>
    <textarea name="l" cols="40" id="l"></textarea>
   </label></td>
  </tr>
  <tr>
   <td  valign="top">2 </td>
   <td  valign="top"><p><strong>Regarding Improvements in teaching and learning  Process:</strong><br />
      <strong> </strong>शिक्षण और सीखने की प्रक्रिया में सुधार के बारे में:<strong> </strong></p></td>
   <td  valign="top"><textarea name="m" cols="40" id="m"></textarea></td>
  </tr>
  <tr>
   <td  valign="top">3</td>
   <td  valign="top"><p><strong>Any other  suggestions  </strong>कोई अन्य सुझाव<strong> </strong><strong>:</strong></p></td>
   <td  valign="top"><textarea name="n" cols="40" id="n"></textarea></td>
  </tr>
 </table>
  <? } ?>
    <? if($_REQUEST['typ']=='2') { ?> 
  <br />
 <table class="table table-bordered">
   
  <tr>
   <td colspan="5"   ><strong>Section  /  खंड –  A </strong></td>
  </tr>
  
  <tr>
   <td   ><strong>Sl. क्रम </strong></td>
   <td  ><strong>Aspects  पहलू </strong></td>
   <td  ><strong>Needs  Improvement सुधार की जरुरत</strong></td>
   <td  ><strong>Good  अच्छा </strong></td>
   
  </tr>
  <tr>
   <td   >1</td>
   <td  > Fulfillment  of Objective of the paper पेपर की उद्देश्यों  की पूर्ति 
    </td>
   <td  > <input required type="radio" name="a"   value="Needs  Improvement " /></td>
   <td  ><input required type="radio" name="a"   value="Good   " /></td>
   
  </tr>
  <tr>
   <td   >2</td>
   <td  >His Motivation to students            उनके द्वारा छात्रों के लिए प्रेरणा </td>
   <td  > <input required type="radio" name="b"   value="Needs  Improvement " /></td>
   <td  ><input required type="radio" name="b"   value="Good   " /></td>
    
  </tr>
  <tr>
   <td   >3</td>
   <td  >Relevance of This paper with  Practical  /Lab 
प्रैक्टिकल / लैब के साथ इस पत्र की प्रासंगिकता
</td>
   <td  > <input required type="radio" name="c"   value="Needs  Improvement " /></td>
   <td  ><input required type="radio" name="c"   value="Good   " /></td>
   
  </tr>
  <tr>
   <td   >4 </td>
   <td  >References  that  are  suggested
दिये गये संदर्भ के बारे में 
</td>
  <td  > <input required type="radio" name="d"   value="Needs  Improvement " /></td>
   <td  ><input required type="radio" name="d"   value="Good   " /></td>
    
  </tr>
   
 </table>
  <br />
 <table class="table table-bordered">
   
  <tr>
   <td ><strong>Section  /  खंड –  B</strong></td>
   <td colspan="2"  > 
    <p><strong>Your Opinion / Suggestion for improvement in syllabus</strong><br />
     पाठ्यक्रम में सुधार के लिए आपकी राय / सुझाव<strong> </strong></p></td>
  </tr>
  <tr>
   <td  valign="top">&nbsp;</td>
   <td colspan="2"   valign="top"><label>
    <textarea name="e" cols="40" id="e"></textarea>
   </label></td>
   </tr>
  
 </table>
 <? } ?>
  <? if($_REQUEST['typ']=='1') { ?> 
  <br />
  <table class="table table-bordered">
   
  <tr>
   <td colspan="5"   ><strong>Section  /  खंड –  A </strong></td>
  </tr>
  <tr>
   <td colspan="5"   >शिक्षक के बारे में आपके विचार </td>
  </tr>
  <tr>
   <td colspan="2"   >शिक्षक का नाम </td>
   <td  colspan="3"  ><input required class="textbx1"   type="text" name="a" id="a" /></td>
  </tr>
  <tr>
   <td   ><strong>Sl. क्रम </strong></td>
   <td  ><strong>Aspects  पहलू </strong></td>
   <td  ><strong>Very Good बहुत अच्छा </strong></td>
   <td  ><strong>Good  अच्छा </strong></td>
   <td ><strong>Average सामान्य </strong></td>
  </tr>
  <tr>
   <td   >1</td>
   <td  >Subject  clarity  
    विषय स्पष्टता </td>
   <td  > <input required type="radio" name="b" id="b" value="Very Good " /></td>
   <td  ><input required type="radio" name="b" id="b2" value="Good   " /></td>
   <td ><input required type="radio" name="b" id="b3" value="Average  " /></td>
  </tr>
  <tr>
   <td   >2</td>
   <td  >His Motivation to students            उनके द्वारा छात्रों के लिए प्रेरणा </td>
  <td  > <input required type="radio" name="c" id="c1" value="Very Good " /></td>
   <td  ><input required type="radio" name="c" id="c2" value="Good   " /></td>
   <td ><input required type="radio" name="c" id="c3" value="Average  " /></td>
  </tr>
  <tr>
   <td   >3</td>
   <td  >His Regularity &amp; Punctuality    नियमितता तथा समय का पालन </td>
    <td  > <input required type="radio" name="d" id="d1" value="Very Good " /></td>
   <td  ><input required type="radio" name="d" id="d2" value="Good   " /></td>
   <td ><input required type="radio" name="d" id="d3" value="Average  " /></td>
  </tr>
  <tr>
   <td   >4 </td>
   <td  >His Communication Skill
    उनके संवाद योग्यता </td>
  <td  > <input required type="radio" name="e" id="e1" value="Very Good " /></te>
   <td  ><input required type="radio" name="e" id="e2" value="Good   " /></td>
   <td ><input required type="radio" name="e" id="e3" value="Average  " /></td>
  
  </tr>
  <tr>
   <td >5</td>
   <td  >His Subject Knowledge 
    उनका विषय ज्ञान </td>
   <td  > <input required type="radio" name="f"  value="Very Good " /></te>
   <td  ><input required type="radio" name="f"   value="Good   " /></td>
   <td ><input required type="radio" name="f"   value="Average  " /></td>
  
  </tr>
  <tr>
   <td >6</td>
   <td  >Course Completion by him                 उनके द्वारा पाठ्यक्रम समाप्ति </td>
 <td  > <input required type="radio" name="g"  value="Very Good " /></te>
   <td  ><input required type="radio" name="g"   value="Good   " /></td>
   <td ><input required type="radio" name="g"   value="Average  " /></td>
 
  </tr>
  <tr>
   <td >7</td>
   <td  >His Practical Knowledge       
    उनका ब्यवहारिक ज्ञान </td>
 <td  > <input required type="radio" name="h"  value="Very Good " /></te>
   <td  ><input required type="radio" name="h"   value="Good   " /></td>
   <td ><input required type="radio" name="h"   value="Average  " /></td>
 
  </tr>
  <tr>
   <td >8</td>
   <td  >Outside class interaction with him
    उनसे साथ क्लास के बाहर बातचीत </td>
 <td  > <input required type="radio" name="i"  value="Very Good " /></te>
   <td  ><input required type="radio" name="i"   value="Good   " /></td>
   <td ><input required type="radio" name="i"   value="Average  " /></td>
 
  </tr>
  <tr>
   <td >9</td>
   <td  >His Computer Skill 
    उनका कंप्यूटर ज्ञान </td>
 <td  > <input required type="radio" name="j"  value="Very Good " /></te>
   <td  ><input required type="radio" name="j"   value="Good   " /></td>
   <td ><input required type="radio" name="j"   value="Average  " /></td>
 
  </tr>
  <tr>
   <td >10</td>
   <td  >His Overall Performance 
    उनका सम्पूर्ण प्रदर्शन </td>
 <td  > <input required type="radio" name="k"  value="Very Good " /></te>
   <td  ><input required type="radio" name="k"   value="Good   " /></td>
   <td ><input required type="radio" name="k"   value="Average  " /></td>
 
  </tr>
 </table>
 <br />
 <table class="table table-bordered">
   
  <tr>
   <td  colspan="6"><strong>Section  /  खंड –  B </strong></td>
   <td ><strong>Yes हाँ </strong></td>
   <td  ><strong>No ना </strong></td>
   <td  ><strong>No Comments कोई टिप्पणी नहीं </strong></td>
  </tr>
  <tr>
   <td  colspan="6">Will you suggest him to teach the same subject to your juniors also?
    क्या आप उनको, अपने जूनियर को भी  वही विषय पढ़ाने की सलाह देंगे ? </td>
   <td  > <input required type="radio" name="l"  value="Yes  " /></te>
   <td  ><input required type="radio" name="l"    value="No  "/></td>
   <td ><input required type="radio" name="l"    value="No Comments  " /></td>
 
  </tr>
  <tr>
   <td  colspan="6">Will you suggest him to teach any other subject ? 
    क्या आप उनको, कोई अन्य विषय भी पढ़ाने के लिए सलाह देंगे ? </td>
  <td  > <input required type="radio" name="m"  value="Yes  " /></te>
   <td  ><input required type="radio" name="m"    value="No  "/></td>
   <td ><input required type="radio" name="m"    value="No Comments  " /></td>
 </tr>
 </table>
 <br />
  <table class="table table-bordered">
   
  <tr>
   <td ><strong>Section  /  खंड –  C </strong></td>
   <td colspan="2"  ><strong> Your opinion  आपकी राय </strong></td>
  </tr>
  <tr>
   <td  valign="top">1 </td>
   <td   valign="top">Strengths of the teacher शिक्षक की अध्यापन सामर्थ के विषय में </td>
   <td   valign="top"><label>
    <textarea name="n" cols="40" id="n"></textarea>
   </label></td>
  </tr>
  <tr>
   <td  valign="top">2 </td>
   <td  valign="top">Weakness of the teacher शिक्षक की अध्यापन सीमा के विषय में </td>
   <td  valign="top"><textarea name="o" cols="40" id="o"></textarea></td>
  </tr>
  <tr>
   <td  valign="top">3</td>
   <td  valign="top">Any Suggestion कोई और सुझाव ? </td>
   <td  valign="top"><textarea name="p" cols="40" id="p"></textarea></td>
  </tr>
 </table>
 

 <? } ?> <br />
  <table class="table table-bordered">
   
  <tr>
   <td align="center" ><strong> </strong><strong>
    <label>
    <input required name="frmsub" type="submit" class="btn" id="button" value="Submit your feedback" />
    <input required name="typ" type="hidden" value="<?=$_REQUEST['typ']?>" />
    </label>
   </strong></td>
   </tr>
 </table>
   </form>
   </div>
                                 
                                 
                                </div>
                               
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
