<?php
ob_start();
require_once("con_base/functions.inc.php");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE> Payment Success </TITLE>
 </HEAD>

 <BODY>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
  <td>
  <?php if($_POST['f_code']=="Ok"){ ?>
  Success : Your Transaction is been Successfully Completed.
   Student Id : <?php echo $_SESSION['sess_comp_id'];?>
      <br>
   Transaction Id : <?php echo $_POST['mmp_txn'];?><br>
   Merchant Transaction Id : <?php echo $_POST['mer_txn'];?><br>
   Amount : <?php echo $_POST['amt'];?><br>

   Product Id : <?php echo $_POST['prodid'];?><br>
   Date : <?php echo $_POST['date'];?><br>
   Product Id : <?php echo $_POST['prodid'];?><br>
   Bank Transaction : <?php echo $_POST['bank_txn'];?><br>
   Product Id : <?php echo $_POST['udf2'];?><br>
   Product Id : <?php echo $_POST['udf3'];?><br>


   
   <a href="student/" target="_blank">Go To Home Page</a>
  <?php } else { ?>
Failure : Your Transaction couldnot be processed.
  <?php } ?>
 </td>
 </tr>
</table>
 </BODY>
</HTML>
