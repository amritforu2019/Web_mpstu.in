<?  include("../con_base/functions.inc.php");

$data1="select * from tbl_student where id='".$_REQUEST['id']."'";

$rs1=mysqli_query($DB_LINK,$data1);

$rowget=mysqli_fetch_array($rs1);
 

 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Bill receipt</title>

<style type='text/css' media='print'>

.print_hide {

	display : none

}

</style>

</head>

<body>

<table width="95%" border="0" align="center" cellpadding="2">

  <tr  >

    <td colspan="2"  align="center" valign="top"  ><img src="../images/logo.png" width="100" align="left" /><h1 style="padding:0px; margin:0px;"><?php echo $SITE_NAME;?> </h1>Kasipur Road, Kandi, Sangareddy District, Telangana, 502285<br /> Website : www.mpstu.co.in </td>

  </tr>

  <tr  >

    <td align="left" valign="top" ><!--Receipt No. :

    <?=$rowget['id'];?>--></td>

    <td align="right" valign="top" >Receipt Date :

    <?=date("d M Y",strtotime($rowget['pay_dt']));?></td>

  </tr>

  <tr  >

    <td colspan="2" align="center" valign="top" style="font-size:20px;"><hr /></td>

  </tr>

  <tr  >

    <td    align="left" valign="top"><?

  

  $qry1=mysqli_query($DB_LINK,"select * from tbl_student where id='".($rowget['id'])."'   ")or die(mysqli_error($DB_LINK)); 

 $row_std=mysqli_fetch_array($qry1);

  ?> Name : <?=$row_std['name'];?>  <br />

      Course : <?=$row_std['course'];?>
      <br>
  

    </td>

    

    <td     align="left" valign="top">Enr No. :
      <?=$row_std['enr_no'];?><br />
Session :
<?=$row_std['session'];?><br>Fee Mode : <?=$row_std['pay_mode'];?></td>

      <tr>

    <td colspan="2" valign="top"  ><hr /></tr>

</table>

<table width="95%" border="0" align="center" cellpadding="2" cellspacing="0">

  <tr valign="top" >

    <td colspan="2" height="200px" valign="top"    >

    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">

        <tr>

          <td width="4%" align="left" bgcolor="#D9D7FF"><strong>#</strong></td>

          <td width="79%" bgcolor="#D9D7FF"><strong>Fees Name</strong></td>

          <td width="17%" align="right" bgcolor="#D9D7FF"><strong>Amount</strong></td>

        </tr>

  

        <tr >

          <td align="left"><? echo $i;?>.</td>

          <td>Admission Fees
<?php if($row_std["rec_no"]!='') { ?><br>Receipt : <?php echo $row_std["rec_no"]; } ?>
           <?php if($row_std["trn_id"]!='') { ?><br>Transaction ID : <?php echo $row_std["trn_id"]; } ?>
           <?php if($row_std["pay_mode"]!='') { ?><br>Payment Mode : <?php echo $row_std["pay_mode"]; } ?>
           <?php if($row_std["trn_id_b"]!='') { ?><br>Bank Transaction Id : <?php echo $row_std["trn_id_b"]; } ?>
          </td>

          <td align="right">Rs <? echo $amt=$row_std['pay_amt'];

   $all=$all+$amt;

   ?> /-</td>

        </tr>

       

  </table>  </tr>

  <tr  >

  <td colspan="2" align="right"   ><hr />  </tr>

  



  <tr  >

    <td align="right" bgcolor="#D9D7FF"   ><strong>Grand Total</strong> </td>

    <td   align="right" bgcolor="#D9D7FF"      ><strong> Rs

      <?php echo $mainamt=$all ;


 

      ?>

      /- </strong></td>

  </tr>

  <tr>

    <td colspan="2" valign="top"  ><hr /></tr>

  <tr>

    <td valign="top"  >In Words : <? echo convert_number_to_words($all-$rowget['f_disc_amt']);?> Ruppes Only /-

    <td align="center"       ><br />

      .................................<br />

      Signature</td>

  </tr>

</table>

<input name="print" type="button"  class="btn-primary  btn print_hide" id="print"  value="Print" onclick="window.print()"  />

<input name="hello" type="button"  class="btn-primary  btn print_hide" id="hello"   value="Back" onclick="javascript:location.href='index'"  />

</body>

</html>

