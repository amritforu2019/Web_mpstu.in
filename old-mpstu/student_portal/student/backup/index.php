<?php ob_start();  require_once("../con_base/functions.inc.php"); 
$sql = "select * from  tbl_student where enr_no='".$_SESSION['sess_enr_no']."'  ";   
$result=mysqli_query($DB_LINK,$sql); 
$get_data_std=mysqli_fetch_array($result);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>DAV PG College Student Portel  | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/icon-font.min.css" type='text/css' />
<script src="../js/Chart.js"></script>
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/wow.min.js"></script>
<script> new WOW().init(); </script>
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css' />
<script src="../js/jquery-1.10.2.min.js"></script>
</head>
<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>
 <? include("left.php");?>
 <div class="main-content"> 
  <? include("top.php");?> 
  <div id="page-wrapper">
   <div class="graphs">
    <div class="switches">
     <div class="col-4">
      <div class="col-md-4 switch-right">
       <div class="switch-right-grid">
        <div class="switch-right-grid1">
         <h3>Basic details</h3>
         <p>Student basic details</p>
         <ul>
          <li>Name : <?=$get_data_std['name']?></li>
                    <li>Father / Gaurdian Name : <?=$get_data_std['f_name']?></li>

          <li>Contact No. : <?=$get_data_std['cont']?></li>

          <li>Alternate Contact : <?=$get_data_std['cont2']?></li>

          <li>Address : <?=$get_data_std['address']?></li>

          <li>Date Of Birth : <?=$get_data_std['dob']?></li>
          <li>Category : <?=$get_data_std['category']?></li>

        

         </ul>
        </div>
       </div>
      </div>
      <div class="col-md-4 switch-right">
       <div class="switch-right-grid">
        <div class="switch-right-grid1">
         <h3>Fees Status</h3>
         <p>Online Payment status</p>
         <ul>
           <li>Not Paid</li>

          
         </ul>
        </div>
       </div>
      </div>
      <div class="col-md-4 switch-right">
       <div class="switch-right-grid">
        <div class="switch-right-grid1">
         <h3>Forms details</h3>
         <p>Enrolment no. and other details</p>
         <ul>
            <li>Enrollment No. : <?=$get_data_std['enr_no']?></li>

          <li>Student Id : <?=$get_data_std['student_id']?></li>

          <li>Course : <?=$get_data_std['course']?></li>
 <li>Session : <?=$get_data_std['session']?></li>
 <li>Seat : <?=$get_data_std['seat']?></li>
 <li>Registration date : <?=$get_data_std['on_dt']?></li>

          <!--<li>Fee : <?=$get_data_std['fee']?></li>-->
         </ul>
        </div>
       </div>
      </div>
      <div class="clearfix"></div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <?php require("footer.php"); ?>
</section>
<script src="../js/jquery.nicescroll.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
