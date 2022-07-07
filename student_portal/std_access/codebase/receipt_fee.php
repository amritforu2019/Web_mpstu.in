<? ob_start();

require_once("../config/functions.inc.php");



$data1="select * from purchase where  billno='".$_REQUEST['bno']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row1=mysqli_fetch_array($rs1);



?>

<style type="text/css">

<!--

body { margin-left:10px;


	

	
}



* {

	font-family:arial;

	font-size:11px;

}

.correct {

	font-size:11px;

	color:#003300;

}

.red {

	color:#FF0000;

	font-size:11px;

}

-->

</style> 

<style type='text/css' media='print'>  

	#print {display : none}  

</style>

<script language="JavaScript" src="calendar_db.js"></script>

<link rel="stylesheet" href="calendar.css">

<title><? echo $ADMIN_HTML_TITLE;?></title>

<style type="text/css">

<!--

.style1 {color: #cc0001}

.style2 {

	color: #FFFFFF;

	font-weight: bold;

}

.style3 {color: #FFFFFF}
.ss {
	font-family:Arial, Helvetica, sans-serif;
	font-size: 13pt;
	
}
.ss br {
	font-size: 13pt;
}
#form1 table tr td table tr td table {
	font-weight: bold;
}
#form1 table tr td div table {
	font-weight: bold;
}
#form1 table tr td table tr td table tr td strong {
	font-weight: normal;
}

-->

</style>

<body>
	 <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <table width="100%">
       <tr>
       <td width="50%" align="center"> 
  
    <table width="98%" height="94" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9%" height="90" align="center"><img src="images/logo.png" alt="" width="86" height="89" /></td>
    <td width="91%" align="center" valign="top" class="ss"><span class="ss"><span style="font-size:18px;">
      <? echo $_SESSION['collname'];?>
    </span><br>
    <span style="font-size:14px;">
    <? $data1="select * from stdreg where  enrol='".$_REQUEST['enr']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row1=mysqli_fetch_array($rs1); $qry1=mysqli_query($DB_LINK,"select * from college where coll_id='".$_SESSION['collid']."' ");
		  $row11=mysqli_fetch_array($qry1); echo $row11['coll_add']; ?>
    <br>
     <? echo $row11['cont']; ?></span><br>
      <span style="font-size:16px;">
      Fees Receipt</span></td>
  </tr>
  
</table>

    
       
  <table width="98%" border="0" cellspacing="0" cellpadding="0" >

	<tr>

    <td align="center" style="">

	

	
		 </td>
  </tr>

  <tr>

    <td style="" valign="top">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-collapse:collapse;">

	

	  <tr>

			    <td >
                
                <table width="100%" height="98" border="1" cellpadding="6" cellspacing="0"  >
 
  
  <tr>
    <td colspan="2" align="center" bgcolor="#999999">Academic Session <strong><? echo $row1['sess']

?></strong></td>
    <td colspan="2" align="center" bgcolor="#999999">Office  Copy</td>
    </tr>
  <tr>
    <td width="21%" align="left">Student Enrol No.:</td>
    <td width="34%"><strong>
      <? echo $row1['enrol'];?>
      </strong><strong>
        
      </strong></td>
    <td width="23%" align="left">Date: </td>
    <td width="22%"><strong><?=date('d-M-Y',strtotime($row1['date']))?>  </strong></td>
  </tr>
  <tr>
    <td align="left">Student Name :</td>
    
 



    <td><strong>  <? echo $row1['name']

?></strong></td>
    <td>Receipt  No.</td>
    <td><strong><? echo $_REQUEST['bno'];?></strong></td>
    </tr>
  <tr>
    <td align="left">Course :</td>
    <td><strong>
      <? global $c_name; 
	 
	 
  
  
	   
	   $c_name=$row1['course'];
	  
	   $item_qry=mysqli_query($DB_LINK,"select * from subjects where sub_id='".$row1['cou_id']."'")or die(mysqli_error($DB_LINK)); 
	   
	   $item_list=mysqli_fetch_array($item_qry);
	     

	  echo $item_list['sub_name'];
 
    ?>
    </strong></td>
    <td align="left">Father Name</td>
    <td><strong><? $data1="select * from stdreg where  enrol='". $row1['enrol']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row2=mysqli_fetch_array($rs1);
echo $row2['fname']

?></strong></td>
  </tr>
</table></td>
          </tr>
	</table>
<div style="height:340px; vertical-align:top;">
 

	<table width="100%" border="1" cellpadding="6" cellspacing="0" style="   margin-top:10px;">
 <tr>
   <td width="7%" align="center" bgcolor="#999999">Ledger</td>
   <td width="48%" align="left" bgcolor="#999999">Fee Name</td>
   <td colspan="2" align="center" bgcolor="#999999"> Fees Amount </td>
   </tr>
 <? 
 $i=0;
 global $all;
 $data1="select * from purchase where  billno='".$_REQUEST['bno']."'";
$rs1=mysqli_query($DB_LINK,$data1);
while($row1=mysqli_fetch_array($rs1))
{
	
	$i++;
	?>


 
 <tr>
   <td align="center">&nbsp;</td>
   <td align="left"><? echo $row1['fee_name'];?></td>
   <td colspan="2" align="right"><? echo $amt=$row1['amt'];
   $all=$all+$amt;
   ?> /-Rs</td>
   </tr>
 
 <? }?>
 <tr>
   <td rowspan="3" align="center">&nbsp;</td>
   <td rowspan="3" align="center">&nbsp;</td>
   <td align="right">Total :</td>
   <td align="right"><? echo $all;?> /-Rs</td>
 </tr>
 <tr>
   <td width="32%" align="right">Total Paid :</td>
   <td width="13%" align="right"><?  
   $data11="select * from fee_pay where  bno='".$_REQUEST['bno']."'";
$rs11=mysqli_query($DB_LINK,$data11);
$row11=mysqli_fetch_array($rs11);

 echo $row11['pay'];  ?>/-Rs</td>
 </tr>
 <tr>
   <td align="right">Balance :</td>
   <td align="right"><? echo $all-$row11['pay'];?>/-Rs</td>
 </tr>
	  	   

	     <tr>
	        <td colspan="2" align="right" >Signature</td>
	        <td colspan="2" align="right" >&nbsp;</td>
	        </tr>
	          
	     

	      
	  </table>


	  

</div>



</td>
  </tr>
  
  

 
</table>

</td>
 <td width="50%" align="center"> 
 
 
 <table width="98%" height="94" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9%" height="90" align="center"><img src="images/logo.png" alt="" width="86" height="89" /></td>
    <td width="91%" align="center" valign="top" class="ss"><span class="ss"><span style="font-size:18px;">
      <? echo $_SESSION['collname'];?>
    </span><br>
    <span style="font-size:14px;">
    <? $data1="select * from stdreg where  enrol='".$_REQUEST['enr']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row1=mysqli_fetch_array($rs1); $qry1=mysqli_query($DB_LINK,"select * from college where coll_id='".$_SESSION['collid']."' ");
		  $row11=mysqli_fetch_array($qry1); echo $row11['coll_add']; ?>
    <br>
     <? echo $row11['cont']; ?></span><br>
      <span style="font-size:16px;">
           Fees Receipt</span></td>
  </tr>
  
</table>

    
       
  <table width="98%" border="0" cellspacing="0" cellpadding="0" >

	<tr>

    <td align="center" style="">

	

	
		 </td>
  </tr>

  <tr>

    <td style="" valign="top">

	<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-collapse:collapse;">

	

	  <tr>

			    <td >
                
                <table width="100%" height="98" border="1" cellpadding="6" cellspacing="0"  >
 
  
  <tr>
    <td colspan="2" align="center" bgcolor="#999999">Academic Session <strong><? echo $row1['sess']

?></strong></td>
    <td colspan="2" align="center" bgcolor="#999999">Student Copy</td>
    </tr>
  <tr>
    <td width="21%" align="left">Student Enrol No.:</td>
    <td width="34%"><strong>
      <? echo $row1['enrol'];?>
      </strong><strong>
        
      </strong></td>
    <td width="23%" align="left">Date: </td>
    <td width="22%"><strong><?=date('d-M-Y',strtotime($row1['date']))?>  </strong></td>
  </tr>
  <tr>
    <td align="left">Student Name :</td>
    
 



    <td><strong>  <? echo $row1['name']

?></strong></td>
    <td>Receipt  No.</td>
    <td><strong><? echo $_REQUEST['bno'];?></strong></td>
    </tr>
  <tr>
    <td align="left">Course :</td>
    <td><strong>
      <? global $c_name; 
	 
	 
  
  
	   
	   $c_name=$row1['course'];
	  
	   $item_qry=mysqli_query($DB_LINK,"select * from subjects where sub_id='".$row1['cou_id']."'")or die(mysqli_error($DB_LINK)); 
	   
	   $item_list=mysqli_fetch_array($item_qry);
	     

	  echo $item_list['sub_name'];
 
    ?>
    </strong></td>
    <td align="left">Father Name</td>
    <td><strong><? $data1="select * from stdreg where  enrol='". $row1['enrol']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row2=mysqli_fetch_array($rs1);
echo $row2['fname']

?></strong></td>
  </tr>
</table></td>
          </tr>
	</table>
<div style="height:340px; vertical-align:top;">
 

	<table width="100%" border="1" cellpadding="6" cellspacing="0" style="   margin-top:10px;">
 <tr>
   <td width="7%" align="center" bgcolor="#999999">Ledger</td>
   <td width="48%" align="left" bgcolor="#999999">Fee Name</td>
   <td colspan="2" align="center" bgcolor="#999999"> Fees Amount </td>
   </tr>
 <? 
 $i=0;
 global $all;
 $all=0;
 $data1="select * from purchase where  billno='".$_REQUEST['bno']."'";
$rs1=mysqli_query($DB_LINK,$data1);
while($row1=mysqli_fetch_array($rs1))
{
	
	$i++;
	?>


 
 <tr>
   <td align="center">&nbsp;</td>
   <td align="left"><? echo $row1['fee_name'];?></td>
   <td colspan="2" align="right"><? echo $amt=$row1['amt'];
   $all=$all+$amt;
   ?> /-Rs</td>
   </tr>
 
 <? }?>
 <tr>
   <td rowspan="3" align="center">&nbsp;</td>
   <td rowspan="3" align="center">&nbsp;</td>
   <td align="right">Total :</td>
   <td align="right"><? echo $all;?> /-Rs</td>
 </tr>
 <tr>
   <td width="32%" align="right">Total Paid :</td>
   <td width="13%" align="right"><?  
   $data11="select * from fee_pay where  bno='".$_REQUEST['bno']."'";
$rs11=mysqli_query($DB_LINK,$data11);
$row11=mysqli_fetch_array($rs11);

 echo $row11['pay'];  ?>/-Rs</td>
 </tr>
 <tr>
   <td align="right">Balance :</td>
   <td align="right"><? echo $all-$row11['pay'];?>/-Rs</td>
 </tr>
	  	   

	      
	        <tr>
	        <td colspan="2" align="right" >Signature</td>
	        <td colspan="2" align="right" >&nbsp;</td>
	        </tr>
	      

	      
	  </table>


	  

</div>



</td>
  </tr>
  
  

 
</table>
 
 
 </td>
</tr>
</table>

<div id="print"> 
  
  <input name="button" type="button" id="print2" onClick="window.print();return false;" value=" Print this" /> 
 <a href="index.php"> back
 </a>
 </div>
</form>

</body> 

