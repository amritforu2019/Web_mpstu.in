<?php ob_start();  require_once("../con_base/functions.inc.php"); 
$sql = "select * from  tbl_student where enr_no='".$_SESSION['sess_enr_no']."'  ";   
$result=mysqli_query($DB_LINK,$sql); 
$get_data_std=mysqli_fetch_array($result);

  $sql = "select * from  tbl_fee where category='".$get_data_std['category']."' and course='".$get_data_std['course']."' and session='".$get_data_std['session']."'  ";   
$result=mysqli_query($DB_LINK,$sql); 
$get_data_std_fee=mysqli_fetch_array($result);
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
					<h3 class="blank1">Student Online Payment</h3>
						<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						<? if($get_data_std['is_paid']==0) { ?>	 
                             <form action="submit.php" method="post"class="form-horizontal">

<INPUT TYPE="hidden" NAME="product" value="NSE">
<INPUT TYPE="hidden" NAME="TType" value="NBFundTransfer">

<INPUT TYPE="hidden" NAME="clientcode" value="007">
<INPUT TYPE="hidden" NAME="AccountNo" value="1234567890">

<INPUT TYPE="hidden" NAME="ru" value="http://davpgcvns.ac.in/student_portel/merchant/response.php">
<input type="hidden" name="bookingid" value="100001"/>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Name : </label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="udf1" value="<?=$get_data_std['name']?>" placeholder="Student Name"  disabled=""/>
									</div>
									 
								</div>
                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email Id : </label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="udf2" value="" placeholder="Student Email Id " required   />
									</div>
									 
								</div>
                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Mobile No : </label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="udf3" value="<?=$get_data_std['cont']?>" placeholder="Student Name"  required />
									</div>
									 
								</div>
                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="udf4" value="<?=$get_data_std['address']?>" placeholder="Student Name"  required  />
									</div>
									 
								</div>
                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Pay Amount</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="focusedinput" name="amount" value="<?=$get_data_std_fee['fee']?>" placeholder="Student Name"  disabled=""/>
									</div>
									 
								</div>
                              
							 
								 
							 
			 
		  
						  <div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									 <input type="submit" class="btn-success btn" name="Submit" value="Pay Now" />
                                    
                                     </div>
							</div>
						 </div>
						</form>
                        
                        <? } else {?>
                        
                        Fees already Paid 
                        <? }
 ?>
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

<?
mysqli_query($DB_LINK,"ALTER TABLE `tbl_student` ADD `pay_dt` DATE NOT NULL ,
ADD `trn_id` VARCHAR( 50 ) NOT NULL ,
ADD `pay_amt` INT NOT NULL ,
ADD `email` VARCHAR( 50 ) NOT NULL ;");
?>
