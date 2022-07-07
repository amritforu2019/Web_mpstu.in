<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function del()
{
var nm=confirm("Are you sure want to delete ");
if(nm)
return true;
else
return false;
}
</script>
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
		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
            <tr>
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Result Category :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><form name="form1" method="post" action="result-cat_add.php">
                <br> 
				<? 	 		
				if(isset($_GET['del']))
				{
						$arr=$_GET['del'];	 				
						mysql_query("delete from result_cat  where id='$arr'")or die(mysql_error()); 
						$sess_msg="Result Category Deleted Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: result-cat_list.php");
						exit;
 				}
					if(isset($_GET['ban']))
					{
						mysql_query("update result_cat  set status=0 where id=".$_GET['ban']);
						$sess_msg="Result Category Suspended Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: result-cat_list.php");
						exit;
					}
					if(isset($_GET['unban']))
					{
						mysql_query("update result_cat set status=1 where id=".$_GET['unban']);
						$sess_msg="Result Category Activated Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: result-cat_list.php");
						exit;
					}
				 $q=mysql_query("select * from result_cat order by id desc");
				  $count=mysql_num_rows($q);
				  if($count!=0)
				  {
				  ?>

                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="76%" height="32">&nbsp;</td>
                    <td width="24%" align="right" valign="top"><input name="gone" type="submit" class="button" id="gone2" value="Add Result Category" onClick="location.href='result-cat_add.php'"></td>
                  </tr>
                </table>
                <table width="98%" border="0" align="center" cellpadding="1" cellspacing="1">
					<? if($_SESSION['sess_msg']){?>
                  <tr>
                     <td colspan="4" align="center" class="correct"><? echo stripslashes($_SESSION['sess_msg']); ?> </td>
                  </tr>
				  <tr> 
                    <td height="10" colspan="4"> </td>
                  </tr>
				  <? } ?> 
                  <tr>
                    <td width="9%" bgcolor="#ADD8F8" align="center"><strong> SNo.</strong></td>
                    <td width="64%" height="27" bgcolor="#ADD8F8" style="padding-left:10px;"><strong>Result Category Title </strong></td>
                    <td width="27%" bgcolor="#ADD8F8" style="padding-left:10px;"><strong> </strong><strong>Action</strong></td>
                  </tr>
                 		<? $i=1;
						   while($row=mysql_fetch_array($q)){
						   extract($row);
						 ?>
                  <tr bgcolor="#F2F2F2">
                    <td align="center"><?  echo $i;?></td>
                    <td style="padding-left:10px;"> <?php if(strlen(normal_filter($name))>35) echo ucfirst(substr((normal_filter($name)),0,35)),"..."; else echo ucfirst(normal_filter($name));?>					  </td>
                    <td style="padding-left:10px;"> <a href="result-cat_add.php?edit=<? echo $id?>" title="Edit Result Category"><img src="images/but_edit_small.gif" alt="Edit Main Link" width="22" height="22" border="0"></a> <a href="result-cat_list.php?del=<?  echo $id?>" onClick="return del();" title="Delete Result Category"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>
                        <? if($status==0){?>
                      <a href="result-cat_list.php?unban=<?  echo $id?>" title="Activate Main Link" ><img src="images/but_unban_small.gif" alt="Unban Result Category" width="22" height="22" border="0"></a>
                      <? }
						  else { ?>
                        <a href="result-cat_list.php?ban=<?  echo $id?>" title="Suspend Main Link" ><img src="images/but_ban_small.gif" alt="Ban Result Category" width="22" height="22" border="0"></a>
                      <? } ?></td>
                  </tr>
                 	 <?  $i++; } ?>
                </table>
               		 <? }  else { ?>
                <div align="center"><span class="red"><strong>Currently 
                  No Result Category Available, Please</strong></span> <a href="result-cat_add.php?yahoo=sfsfs">Add First</a> 
                  <? }?>
                </div>
               </form></td>
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