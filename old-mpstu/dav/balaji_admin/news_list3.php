<? ob_start();
require_once("../config/functions.inc.php");
include("fckeditor/fckeditor.php");
validate_admin();
if(isset($_REQUEST['gone']))
{

header("location:news_add3.php");

}
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
              <td height="29" bgcolor="#000" class="heading"><strong>Add EVENT CALENDAR / Download forms :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><form name="form1" method="post" action="">
                <br>
                <?
				
				if(isset($_GET['del']))
				{
						$arr=$_GET['del'];						
						mysql_query("delete from news3  where id='$arr'")or die(mysql_error());
						$sess_msg="Page  Deleted Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: news_list3.php");
						exit; 
				}
					if(isset($_GET['ban']))
					{
						mysql_query("update news3  set status=0 where id=".$_GET['ban']);
						$sess_msg="Page Suspended Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: news_list3.php");
						exit;
					}
					if(isset($_GET['unban']))
					{
						mysql_query("update news3 set status=1 where id=".$_GET['unban']);
						$sess_msg="Page Activated Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: news_list3.php");
						exit;
					}
				   
				  
				  $q=mysql_query("select * from news3  order by id asc"); 
				  $count=mysql_num_rows($q);
				  if($count!=0)
				  {
				  ?>
                <table width="85%" height="69" border="0" align="center" cellpadding="0" cellspacing="0">
                 <tr>
                    <td align="right" valign="top"><input name="gone" type="submit" class="button" id="gone2" value="Add EVENT CALENDAR" onClick="location.href='news_add3.php'"></td>
                  </tr>
                </table>
                <table width="85%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">
                  <tr>
                    <td colspan="5" align="center" class="correct"><div align="center"><? echo  stripslashes($_SESSION['sess_msg']); unset($_SESSION['sess_msg']); unset($_SESSION['errorclass']);?></div></td>
                  </tr>
                  <tr   class="li">
                    <td width="9%" bgcolor="#6699FF" class="heading"><strong>&nbsp;&nbsp;SNo.</strong></td>
                    <td width="52%" height="27" bgcolor="#6699FF" class="heading"><strong>EVENT CALENDAR / Download forms</strong></td>
                    <td width="23%"height="27" bgcolor="#6699FF" class="heading"><strong>Posted on</strong></td>
                    <td width="23%" bgcolor="#6699FF" class="heading"><strong>&nbsp;Action</strong></td>
                  </tr>
                  <?
				$i=1;
				while($row=mysql_fetch_array($q))
				{
				extract($row);
				?>
                  <tr bgcolor="#F2F2F2" class="textli">
                    <td align="center" class="bodytext">&nbsp;&nbsp; <? echo  $i;?></td>
                    <td class="bodytext">&nbsp;&nbsp;
                      <? if(strlen(normal_filter($title))>30) { echo  substr(normal_filter($title),0,30)."...";} else { echo  normal_filter($title);}?></td>
                    <td width="23%" class="bodytext"><?php echo date_dm($posted_on);?></td>
                    <td width="23%" class="bodytext">&nbsp;&nbsp;<a href="news_add3.php?edit=<?  echo  $id?>" title="Edit Page"><img src="images//but_edit_small.gif" alt="Edit Main Link" width="22" height="22" border="0"></a> <a href="news_list3.php?del=<?  echo  $id?>" onClick="return del();" title="Delete Page"><img src="images//but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>
                      <? if($status==0){?>
                      <a href="news_list3.php?unban=<?  echo  $id?>" title="Activate Main Link" ><img src="images//but_unban_small.gif" alt="Unban Page" width="22" height="22" border="0"></a>
                      <? }
						  else { ?>
                      <a href="news_list3.php?ban=<?  echo  $id?>" title="Suspend Main Link" ><img src="images//but_ban_small.gif" alt="Ban Page" width="22" height="22" border="0"></a>
                      <? } ?></td>
                  </tr>
                  <?
					$i++;
				} 
				?>
                </table>
                <? }   else { ?>
                <div align="center"><span class="red"><strong>Currently No EVENT CALENDAR Available, Please</strong></span> <span class="leftlinks"><a href="news_add3.php?yahoo=sfsfs" class="headlinks">Add First</a></span></div>
                <? }   ?>
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