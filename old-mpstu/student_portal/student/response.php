<?php
ob_start();
require_once("../con_base/functions.inc.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
 <TITLE> Payment Status Update </TITLE>
</HEAD>

<BODY>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td>
   <?php if($_POST['f_code']=="Ok"){ ?>
    Success : Your Transaction is been Successfully Completed.<br>
    Student Id : <?php echo $_POST['udf5'];?><br>
    Transaction Id : <?php echo $_POST['mmp_txn'];?><br>
    Merchant Transaction Id : <?php echo $_POST['mer_txn'];?><br>
    Amount : <?php echo $_POST['amt'];?><br>
    Date : <?php echo $_POST['date'];?><br>
    Bank Transaction : <?php echo $_POST['bank_txn'];?><br>
    Email : <?php echo $_POST['udf2'];?><br>
    Mobile : <?php echo $_POST['udf3'];?><br>


    <?php
    mysqli_query($DB_LINK,"update tbl_student set is_paid='1',pay_dt='".date("Y-m-d")."',pay_amt='".$_POST['amt']."',email='".$_POST['udf2']."',  
pay_mode='Online' ,trn_id='".$_POST['mmp_txn']."',trn_id_m='".$_POST['mer_txn']."' ,trn_id_b='".$_POST['bank_txn']."'  where enr_no='".$_POST['udf5']."' ");
    ?>


    <a href="index.php"  >Go To Home Page</a>
   <?php } else { ?>
    Failure : Your Transaction couldnot be processed.
<a href="index.php">Go to home page </a>

 <?php
    mysqli_query($DB_LINK,"update tbl_student set is_paid='0',pay_dt='".date("Y-m-d")."',pay_amt='".$_POST['amt']."',email='".$_POST['udf2']."',  
pay_mode='Online' ,trn_id='".$_POST['mmp_txn']."',trn_id_m='".$_POST['mer_txn']."' ,trn_id_b='".$_POST['bank_txn']."'  where enr_no='".$_POST['udf5']."' ");
    ?>


   <?php } ?>
  </td>
 </tr>
</table>
</BODY>
</HTML>
