<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
if($_REQUEST['del']!='')
			{

						  if(mysql_query("delete from prop where id='".$_REQUEST['del']."'  ")or die(mysql_error()))
						  {
							  echo "<script>alert('Project Deleted');location.href='list.php';</script>";
						  }

						  
			}
			
			if(isset($_GET['ban']))

					{

						mysql_query("update prop  set flag=0 where id=".$_GET['ban']);

						$sess_msg="Photo Gallery Category Suspended Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: list.php");

						exit;

					}

					if(isset($_GET['unban']))

					{

						mysql_query("update prop set flag=1 where id=".$_GET['unban']);

						$sess_msg="Photo Gallery Category Activated Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: list.php");

						exit;

					} 

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td width="750" align="center">
	<div id="mid">  
			<? if($_REQUEST['id']!=''){
						  $qry=mysql_query("select * from prop where id='".$_REQUEST['id']."'  ")or die(mysql_error());
						  $row=mysql_fetch_array($qry); }?>
                          <h1>Property Details  </h1> <img src='images/back.gif' alt=''  class="righmmm" style='cursor:pointer ; float:right;' onclick='window.history.back()' width='60px'/>
       <table width="100%" align="center" cellpadding="8" cellspacing="0" class="bdrAll w100">

								<tr><td width="16%" ><strong>Property For &nbsp;</strong></td>
								  <td width="36%" ><?=$row['pfor']?></td>
								  <td width="17%" ><strong>Property Category </strong></td>
								  <td width="31%" ><?=$row['pcat']?></td></tr>
								<tr>
								  <td ><strong>Area  &nbsp;</strong></td>
								  <td ><?=$row['area']?></td>
								  <td ><strong>Price</strong></td>
								  <td ><?=$row['price']?>
							      <?=$row['pmes']?></td></tr>
								<tr>
								  <td ><strong>Property Facing</strong></td>
								  <td ><?=$row['pface']?></td>
								  <td ><strong>Unit Measure &nbsp;</strong></td>
								  <td ><?=$row['punit']?></td></tr>
								<tr>
								  <td colspan="4" ><strong>Property Images</strong></td>
								  </tr>
								<tr>
								  <td colspan="4" align="center" >
								  
								  <? if($row['pimg1']!='') { ?><a href="../upload/pro/<? echo $row['pimg1']; ?>" rel="lightbox[roadtrip"   title="<? echo $row['pfor'];?>"><img src="../upload/pro/<? echo $row['pimg1']; ?>" alt="<? echo $row['pfor'];?>" width="238" height="191" hspace="15" vspace="5" align="top"></a><? }?>
                                  <? if($row['pimg2']!='') { ?><a href="../upload/pro/<? echo $row['pimg2']; ?>" rel="lightbox[roadtrip"   title="<? echo $row['pfor'];?>"><img src="../upload/pro/<? echo $row['pimg2']; ?>" alt="<? echo $row['pfor'];?>" width="238" height="191" hspace="15" vspace="5" align="top"></a><? }?>
                                 <? if($row['pimg3']!='') { ?><a href="../upload/pro/<? echo $row['pimg3']; ?>" rel="lightbox[roadtrip"   title="<? echo $row['pfor'];?>"><img src="../upload/pro/<? echo $row['pimg3']; ?>" alt="<? echo $row['pfor'];?>" width="238" height="191" hspace="15" vspace="5" align="top"></a><? }?>
                                 <? if($row['pimg4']!='') { ?><a href="../upload/pro/<? echo $row['pimg4']; ?>" rel="lightbox[roadtrip"   title="<? echo $row['pfor'];?>"><img src="../upload/pro/<? echo $row['pimg4']; ?>" alt="<? echo $row['pfor'];?>" width="238" height="191" hspace="15" vspace="5" align="top"></a><? }?>
                                 
                                  </td>
			  </tr>
								<tr>
								  <td ><strong>Property Description</strong></td>
								  <td colspan="3" ><?=$row['pdes']?></td>
						    </tr>
					<tr><td colspan="4" bgcolor="#CFD2FE" ><strong>Property Location
         </strong></td></tr>
								<tr>
								  <td ><strong>Address &nbsp;</strong></td>
								  <td ><?=$row['paddr']?></td>
								  <td ><strong>&nbsp;City </strong></td>
								  <td ><?=$row['pcity']?></td></tr>
								<tr>
								  <td ><strong>State</strong></td>
								  <td ><?=$row['pstat']?></td>
								  <td ><strong>Country &nbsp;</strong></td>
								  <td >India</td></tr>
					<tr><td colspan="4" bgcolor="#CFD2FE" ><strong>Contact Details
         </strong></td></tr>
								<tr>
								  <td ><strong> Name</strong></td>
								  <td ><?=$row['cname']?></td>
								  <td ><strong>Email ID</strong></td>
								  <td ><?=$row['cemail']?></td></tr>
								<tr>
								  <td ><strong>Address</strong></td>
								  <td ><?=$row['caddr']?></td>
								  <td ><strong>City / State</strong></td>
								  <td ><?=$row['cstat']?></td></tr>
								<tr><td ><strong>Country</strong></td>
								  <td >India</td>
								  <td ><strong>Phone / Mobile </strong></td>
								  <td ><?=$row['cmob']?></td></tr>
		
		</table>
	</div>
	</td>
  </tr>
  <tr>
    <td colspan="2"><? require_once("adfooter.php");?></td>
  </tr>
</table> 
</body>
</html>
<? ob_end_flush(); ?>