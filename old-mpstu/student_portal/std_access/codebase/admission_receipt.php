<? ob_start();

require_once("../config/functions.inc.php");



$data1="select * from stdreg where  enrol='".$_REQUEST['enr']."'";
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
         <td  align="center"><table width="98%" height="94" border="0" cellpadding="0" cellspacing="0">
           <tr>
             <td width="91%" align="center" valign="top" class="ss"><table width="100%" border="0">
               <tr>
                 <td width="50%" align="center"><table width="98%" height="94" border="1" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="9%" height="90" align="center"><img src="images/logo.png" alt="" width="86" height="89" /></td>
                     <td width="91%" align="center" valign="top" class="ss"><span style="font-size:18px;"> <? echo $_SESSION['collname'];?> </span><br>
                       <span style="font-size:14px;">
                         <? $data1="select * from stdreg where  enrol='".$_REQUEST['enr']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row1=mysqli_fetch_array($rs1); $qry1=mysqli_query($DB_LINK,"select * from college where coll_id='".$_SESSION['collid']."' ");
		  $row11=mysqli_fetch_array($qry1); echo $row11['coll_add']; ?>
                         <br>
                         <? echo $row11['cont']; ?></span><br>
                       <span style="font-size:16px;"> Admission Fees Receipt</span></td>
                   </tr>
                 </table>
                   <table width="98%" border="0" cellspacing="0" cellpadding="0" >
                     <tr>
                       <td align="center" style=""></td>
                     </tr>
                     <tr>
                       <td style="" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-collapse:collapse;">
                         <tr>
                           <td ><table width="100%" height="98" border="1" cellpadding="6" cellspacing="0"  >
                             <tr>
                               <td colspan="2" align="center" bgcolor="#999999">Academic Session<strong> <? echo $row1['sess']

?></strong></td>
                               <td colspan="2" align="center" bgcolor="#999999">Office Copy</td>
                             </tr>
                             <tr>
                               <td width="21%" align="left">Student Enrol No.:</td>
                               <td><strong> <? echo $row1['enrol'];?> </strong><strong> </strong></td>
                               <td width="17%" align="left">Date: </td>
                               <td width="22%"><strong>
                                 <?=date('d-M-Y',strtotime($row1['admdate']))?>
                               </strong></td>
                             </tr>
                             <tr>
                               <td align="left">Student Name :</td>
                               <td><strong> <? echo $row1['name']

?></strong></td>
                               <td align="left">Father Name</td>
                               <td><strong> <? echo $row1['fname']

?></strong></td>
                             </tr>
                             <tr>
                               <td align="left">Course :</td>
                               <td><strong>
                                 <? global $c_name; if( $row1['typ']=='R')
  {
	  $c_name=$row1['admcou'];
	  $item_qry=mysqli_query($DB_LINK,"select * from subjects where sub_id='".$row1['admcou']."'")or die(mysqli_error($DB_LINK)); 
	   
	   $item_list=mysqli_fetch_array($item_qry);
	     

	  echo  $item_list['sub_name'];
  }
  else
  if( $row1['typ']=='N')
  {
	   ''.$c_name=$row1['course'];
	  
	   $item_qry=mysqli_query($DB_LINK,"select * from subjects where sub_id='".$row1['course']."'")or die(mysqli_error($DB_LINK)); 
	   
	   $item_list=mysqli_fetch_array($item_qry);
	     

	  echo $item_list['sub_name'];
  }
      ?>
                               </strong></td>
                               <td align="left">Session</td>
                               <td><strong><? echo $row1['sess']

?></strong></td>
                             </tr>
                             <tr>
                               <td align="left">Subjects:</td>
                               <td colspan="3">1. <strong><? echo $row1['sub1']

?></strong> 2. .<strong><? echo $row1['sub2']

?> 3. .<strong><? echo $row1['sub3']

?></strong></strong></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                         <div style="height:340px; vertical-align:top;">
                           <table width="100%" border="1" cellpadding="6" cellspacing="0" style="   margin-top:10px;">
                             <tr>
                               <td width="8%" align="center" bgcolor="#999999">Ledger</td>
                               <td width="36%" align="center" bgcolor="#999999">Fee Name</td>
                               <td width="29%" align="center" bgcolor="#999999">Total Fees</td>
                               <td width="27%" align="center" bgcolor="#999999">Paid Amount</td>
                             </tr>
                             <tr>
                               <td width="8%" rowspan="3"  align="center" valign="top"  nowrap style="padding:5px 10px;  ">&nbsp;</td>
                               <td width="36%" rowspan="3" align="center" valign="top" style="padding:5px 10px; "> Admission Fee </td>
                               <td width="29%" align="center" ><?  echo $row1['adfeepay']; ?></td>
                               <td width="27%"  align="Right" ><?
            $feespaid=$row1['adfee'];
			$disc=0;
			$rs=mysqli_query($DB_LINK,"select * from discounts where dt='".$row1['admdate']."' and enrol='".$row1['enrol']."' ") ;
			if($getdata=mysqli_fetch_array($rs))
			{
				
			 $disc=$getdata['amt']	;
				
			}
			?>
                                 <?   if($_REQUEST['flag']==1)
			  {
				  echo $_REQUEST['amt'];
			  }
			  else
			  {
			  echo $feespaid=$feespaid ;
			  } ?></td>
                             </tr>
                             <tr>
                               <td align="right" > Total : </td>
                               <td align="right" ><?  echo $totfee=$feespaid ?></td>
                             </tr>
                             <tr>
                               <td align="right" >Balance</td>
                               <td align="right" ><?   echo $row1['adfeepay']-$totfee; ?></td>
                             </tr>
                                <tr>
	        <td colspan="2" align="right" >Signature</td>
	        <td colspan="2" align="right" >&nbsp;</td>
	        </tr>
	      
                           </table>
                         </div></td>
                     </tr>
                   </table></td>
                 <td width="50%" align="center"><table width="98%" height="94" border="1" cellpadding="0" cellspacing="0">
                   <tr>
                     <td width="9%" height="90" align="center"><img src="images/logo.png" alt="" width="86" height="89" /></td>
                     <td width="91%" align="center" valign="top" class="ss"><span style="font-size:18px;"> <? echo $_SESSION['collname'];?> </span><br>
                       <span style="font-size:14px;">
                         <? $data1="select * from stdreg where  enrol='".$_REQUEST['enr']."'";
$rs1=mysqli_query($DB_LINK,$data1);
$row1=mysqli_fetch_array($rs1); $qry1=mysqli_query($DB_LINK,"select * from college where coll_id='".$_SESSION['collid']."' ");
		  $row11=mysqli_fetch_array($qry1); echo $row11['coll_add']; ?>
                         <br>
                         <? echo $row11['cont']; ?></span><br>
                       <span style="font-size:16px;"> Admission Fees Receipt</span></td>
                   </tr>
                 </table>
                   <table width="98%" border="0" cellspacing="0" cellpadding="0" >
                     <tr>
                       <td align="center" style=""></td>
                     </tr>
                     <tr>
                       <td style="" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-collapse:collapse;">
                         <tr>
                           <td ><table width="100%" height="98" border="1" cellpadding="6" cellspacing="0"  >
                             <tr>
                               <td colspan="2" align="center" bgcolor="#999999">Academic Session<strong> <? echo $row1['sess']

?></strong></td>
                               <td colspan="2" align="center" bgcolor="#999999">Student Copy</td>
                             </tr>
                             <tr>
                               <td width="21%" align="left">Student Enrol No.:</td>
                               <td><strong> <? echo $row1['enrol'];?> </strong><strong> </strong></td>
                               <td width="17%" align="left">Date: </td>
                               <td width="22%"><strong>
                                 <?=date('d-M-Y',strtotime($row1['admdate']))?>
                               </strong></td>
                             </tr>
                             <tr>
                               <td align="left">Student Name :</td>
                               <td><strong> <? echo $row1['name']

?></strong></td>
                               <td align="left">Father Name</td>
                               <td><strong> <? echo $row1['fname']

?></strong></td>
                             </tr>
                             <tr>
                               <td align="left">Course :</td>
                               <td><strong>
                                 <? global $c_name; if( $row1['typ']=='R')
  {
	  $c_name=$row1['admcou'];
	  $item_qry=mysqli_query($DB_LINK,"select * from subjects where sub_id='".$row1['admcou']."'")or die(mysqli_error($DB_LINK)); 
	   
	   $item_list=mysqli_fetch_array($item_qry);
	     

	  echo  $item_list['sub_name'];
  }
  else
  if( $row1['typ']=='N')
  {
	   ''.$c_name=$row1['course'];
	  
	   $item_qry=mysqli_query($DB_LINK,"select * from subjects where sub_id='".$row1['course']."'")or die(mysqli_error($DB_LINK)); 
	   
	   $item_list=mysqli_fetch_array($item_qry);
	     

	  echo $item_list['sub_name'];
  }
      ?>
                               </strong></td>
                               <td align="left">Session</td>
                               <td><strong><? echo $row1['sess']

?></strong></td>
                             </tr>
                             <tr>
                               <td align="left">Subjects:</td>
                               <td colspan="3">1. <strong><? echo $row1['sub1']

?></strong> 2. .<strong><? echo $row1['sub2']

?> 3. .<strong><? echo $row1['sub3']

?></strong></strong></td>
                             </tr>
                           </table></td>
                         </tr>
                       </table>
                         <div style="height:340px; vertical-align:top;">
                           <table width="100%" border="1" cellpadding="6" cellspacing="0" style="   margin-top:10px;">
                             <tr>
                               <td width="8%" align="center" bgcolor="#999999">Ledger</td>
                               <td width="36%" align="center" bgcolor="#999999">Fee Name</td>
                               <td width="28%" align="center" bgcolor="#999999">Total Fees</td>
                               <td width="28%" align="center" bgcolor="#999999">Paid Amount</td>
                             </tr>
                             <tr>
                               <td width="8%" rowspan="3"  align="center" valign="top"  nowrap style="padding:5px 10px;  ">&nbsp;</td>
                               <td width="36%" rowspan="3" align="center" valign="top" style="padding:5px 10px; "> Admission Fee </td>
                               <td width="28%" align="center" ><?  echo $row1['adfeepay']; ?></td>
                               <td width="28%"  align="Right" ><?
            $feespaid=$row1['adfee'];
			$disc=0;
			$rs=mysqli_query($DB_LINK,"select * from discounts where dt='".$row1['admdate']."' and enrol='".$row1['enrol']."' ") ;
			if($getdata=mysqli_fetch_array($rs))
			{
				
			 $disc=$getdata['amt']	;
				
			}
			?>
                                 <?   if($_REQUEST['flag']==1)
			  {
				  echo $_REQUEST['amt'];
			  }
			  else
			  {
			  echo $feespaid=$feespaid ;
			  } ?></td>
                             </tr>
                             <tr>
                               <td align="right" > Total : </td>
                               <td align="right" ><?  echo $totfee=$feespaid ?></td>
                             </tr>
                             <tr>
                               <td align="right" >Balance</td>
                               <td align="right" ><?   echo $row1['adfeepay']-$totfee; ?></td>
                             </tr>
                             
                                <tr>
	        <td colspan="2" align="right" >Signature</td>
	        <td colspan="2" align="right" >&nbsp;</td>
	        </tr>
	      
                           </table>
                         </div></td>
                     </tr>
                   </table></td>
               </tr>
             </table>               <span style="font-size:16px;"></span></td>
           </tr>
         </table></td>
       </tr>
       </table>
       <div id="print"> 
  
  <input name="button" type="button" id="print2" onClick="window.print();return false;" value=" Print this" /> 
 <a href="index.php"> back
 </a>
 </div>
</form>

</body> 

