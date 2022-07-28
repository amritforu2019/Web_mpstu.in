<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
if($_REQUEST['del']!='')
			{

						  if(mysql_query("delete from flate where id='".$_REQUEST['del']."'  ")or die(mysql_error()))
						  {
							  echo "<script>alert('Flate Deleted');location.href='pro_list.php';</script>";
						  }

						  
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
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#274663">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#0c5994" class="heading">Project Flate List</td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form name="form1" method="post" action="">
				   
					 <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF"> 
				    <tr>
				      <td colspan="5" align="center" bgcolor="#add8f8"><a href="flate_add.php?id=<? echo $_REQUEST['id'];?>"><input type="button" name="button" id="button" value="Add New flate"></a></td>
				      </tr>
				    <tr> 
                      <td width="8%" bgcolor="#add8f8" align="center"><strong>SNo.</strong></td>
                      <td width="29%"  bgcolor="#add8f8" class="text2"><strong> Name</strong></td>
					  <td width="35%" bgcolor="#add8f8" align="center"><strong>Area</strong></td>
					  <td width="21%" align="center" bgcolor="#add8f8"><strong>Image</strong></td>
					  <td width="7%" bgcolor="#add8f8" align="center"><strong>Action</strong></td>
                    </tr>
                   <?php
				   $query_content=mysql_query("select * from flate where pid='".$_REQUEST['id']."' order by id asc");
				  
				   $k=1; while($content_res=mysql_fetch_array($query_content)){
				   @extract($content_res);?>
				    <tr <?php if($k%2==0)echo 'bgcolor="#FFFFFF"';else echo'bgcolor="#F2F2F2"';?>> 
                      <td align="center" > 
                        <?php echo $k;?>.                      </td>
                      <td><?php echo ucfirst($content_res['name']);?></td>
					  <td align="center" ><?php echo ucfirst($content_res['area']);?></td>
					  <td align="center" ><a href="../upload/flash_images/<?  echo stripslashes($content_res['img']);?>" > <img src="../upload/flash_images/<?  echo stripslashes($content_res['img']);?>" width="137" height="88" hspace="0" vspace="0"></a></td>
					  <td align="center" > <a href="flate.php?id=<?=$_REQUEST['id'];?>&del=<?=$content_res['id'];?>"><img src="images/but_delete_small.gif" alt="Edit Details" width="22" height="22" border="0"></a></td>
                    </tr>
					<?php $k++; } ?>  
                  </table>
				
            </form>
			     </td>
	        </tr> 
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
<? ob_end_flush();
?>
<script> show(1);</script>