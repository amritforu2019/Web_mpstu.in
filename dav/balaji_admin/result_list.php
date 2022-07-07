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
function load_page(val)
{
	location.href='result_list.php?parent_id='+val;
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
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Result &amp; Exam :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><form name="form1" method="post" action="result_add.php">
                <br> 
				<? 	 		
				if(isset($_GET['del']))
				{
						$arr=$_GET['del'];	 				
						mysql_query("delete from result_n_exam  where id='$arr'")or die(mysql_error()); 
						$sess_msg="Result &amp; Exam Deleted Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: result_list.php?parent_id=".$_GET['parent_id']);
						exit;
 				}
					if(isset($_GET['ban']))
					{
						mysql_query("update result_n_exam  set status=0 where id=".$_GET['ban']);
						$sess_msg="Result &amp; Exam Suspended Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: result_list.php?parent_id=".$_GET['parent_id']);
						exit;
					}
					if(isset($_GET['unban']))
					{
						mysql_query("update result_n_exam set status=1 where id=".$_GET['unban']);
						$sess_msg="Result &amp; Exam Activated Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: result_list.php?parent_id=".$_GET['parent_id']);
						exit;
					}
					if($_GET['parent_id']=='all') 	
					{ 
						$where=""; 
					}  
					else 
					{
						$where=" where parent_id='".$_GET['parent_id']."' ";
					}
				  $q=mysql_query("select * from result_n_exam $where order by id desc");
				  $count=mysql_num_rows($q); 
				  ?>

                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                        <td class="bodytext"><strong>Select Category :  </strong></td>
                        <td>
						<select name="category" class="bodytext" id="category" style="width:282px;"  onChange="javascript:load_page(this.value);"> 
							<option value="all">All</option>
                            <?
								$country_qry=mysql_query("select * from result_cat order by name asc")or die(mysql_error());
								while($country_fetch=mysql_fetch_array($country_qry)) {
							?>
                            <option value="<? echo $country_fetch['id']?>" <? if($_GET['parent_id']==$country_fetch['id'] || $row['parent_id']==$country_fetch['id']) echo "selected";?>><? echo normalall_filter($country_fetch['name'])?></option> 
                            <? }  ?>
                        </select></td> 
                    <td width="24%" align="right" valign="top"><input name="gone" type="submit" class="button" id="gone2" value="Add Result &amp; Exam" onClick="location.href='result_add.php'"></td>
                  </tr>
                  <tr>
                    <td class="bodytext">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="right" valign="top">&nbsp;</td>
                  </tr>
                </table>
                <table width="98%" border="0" align="center" cellpadding="1" cellspacing="1">
					<? if($_SESSION['sess_msg']){?>
                  <tr>
                     <td colspan="5" align="center" class="correct"><? echo stripslashes($_SESSION['sess_msg']); ?> </td>
                  </tr>
				  <tr> 
                    <td height="10" colspan="5"> </td>
                  </tr>
				  <? } if($count!=0) { ?> 
                  <tr>
                    <td width="9%" bgcolor="#ADD8F8" align="center"><strong> SNo.</strong></td>
                    <td width="64%" height="27" bgcolor="#ADD8F8" style="padding-left:10px;"><strong>Result &amp; Exam Title </strong></td>
                    <td width="13%" align="center" bgcolor="#ADD8F8"><strong>Date</strong></td>
                    <td width="14%" align="center" bgcolor="#ADD8F8"><strong>Action</strong></td>
                  </tr>
                 		<? $i=1;
						   while($row=mysql_fetch_array($q)){
						   extract($row);
						 ?>
                  <tr bgcolor="#F2F2F2">
                    <td align="center"><?  echo $i;?></td>
                    <td style="padding:10px;">
					<a href="<? echo $link ?>" style="color:#000;"><strong><?php if(strlen(normal_filter($title))>70) echo ucfirst(substr((normal_filter($title)),0,70)),"..."; else echo ucfirst(normal_filter($title));?></strong></a><br><font style="font-size:10px;"><?php if(strlen(normal_filter($location))>70) echo ucfirst(substr((normal_filter($location)),0,70)),"..."; else echo ucfirst(normal_filter($location));?></font>					</td>
                    <td align="center" style="padding:10px;"><?php echo dmy_date($date);?></td>
                    <td align="center" style="padding-left:10px;"> <a href="result_add.php?edit=<? echo $id?>" title="Edit Result &amp; Exam"><img src="images/but_edit_small.gif" alt="Edit" width="22" height="22" border="0"></a> <a href="result_list.php?del=<?  echo $id?>&amp;parent_id=<? echo $parent_id?>" onClick="return del();" title="Delete Result &amp; Exam"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>
                        <? if($status==0){?>
                      <a href="result_list.php?unban=<? echo $id?>&amp;parent_id=<? echo $parent_id?>" title="Activate"><img src="images/but_unban_small.gif" alt="Unban Result &amp; Exam" width="22" height="22" border="0"></a>
                      <? }
						  else { ?>
                        <a href="result_list.php?ban=<?  echo $id?>&amp;parent_id=<? echo $parent_id?>" title="Suspend" ><img src="images/but_ban_small.gif" alt="Ban Result &amp; Exam" width="22" height="22" border="0"></a>
                      <? } ?></td>
                  </tr>
                 	 <?  $i++; } ?>
                </table>
               		 <? }  else { echo'</table>'?>
					
                <div align="center"><span class="red"><strong>Currently 
                  No Result &amp; Exam Available, Please</strong></span> <a href="result_add.php?yahoo=sfsfs">Add First</a> 
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