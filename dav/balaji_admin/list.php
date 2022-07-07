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
		<table width="100%" border="0" align="center" cellpadding="5" cellspacing="3" bgcolor="#FFFFFF" style="font-size:14px; line-height:25px;"> 
				    <tr>
				      <td height="25" colspan="6" align="center" bgcolor="#FFFFFF" style="color: font-size: 16px;"><a href="pro.php">Add New prorerty Details</a>&nbsp;</td>
	      </tr>
				    <tr> 
                          <td width="5%" height="25" align="center" bgcolor="#8FBC14" style="color: font-size: 16px;"><strong>SNo.</strong></td>
                          <td width="28%" align="center"  bgcolor="#8FBC14" class="text2"><strong>Property Name</strong></td>
                          <td width="29%" bgcolor="#8FBC14" align="center"><strong>Property Type</strong></td>
                          <td width="20%" bgcolor="#8FBC14" align="center"><strong>City</strong></td>
                          <td width="10%" bgcolor="#8FBC14" align="center"><strong>Action</strong></td>
                          <td width="8%" bgcolor="#8FBC14" align="center"><strong>Details</strong></td>
                    </tr>
                   <?php
				   $query_content=mysql_query("select * from prop  order by id asc");
				   $k=1; while($content_res=mysql_fetch_array($query_content)){ @extract($content_res);?>
				    <tr <?php if($k%2==0)echo 'bgcolor="#FFFFFF"';else echo'bgcolor="#F2F2F2"';?>> 
                      <td align="center" style="color:#000000"><strong><?php echo $k;?>.</strong></td>
                      <td align="center" style="color:#000000"><strong><?php echo ucfirst($content_res['pfor']);?></strong></td>
					  <td align="center" style="color:#000000"><strong><?php echo ucfirst($content_res['pcat']);?></strong></td>
					  <td align="center" style="color:#000000"><strong><?php echo ucfirst($content_res['pcity']);?></strong></td>
					  <td align="center" >
                      <a href="list.php?del=<?=$id;?>" onClick="return del();"><img src="images/but_delete_small.gif" alt="Edit Details" width="22" height="22" border="0"></a>
                       <? if($flag==0){?>

                      <a href="list.php?unban=<?  echo $id?>" title="Activate Photo Gallery Category" ><img src="images/but_unban_small.gif" alt="Unban Page" width="22" height="22" border="0"></a>

                      <? }

						  else { ?>

                        <a href="list.php?ban=<?  echo $id?>" title="Suspend Photo Gallery Category" ><img src="images/but_ban_small.gif" alt="Ban Page" width="22" height="22" border="0"></a>

                      <? } ?><td align="center" > <a href="project.php?id=<?=$id;?>" style="font-size:12px;"> More</a></td>
                    </tr>
					<?php $k++; } ?>  
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