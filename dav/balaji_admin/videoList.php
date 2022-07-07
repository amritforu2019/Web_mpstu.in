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

<style type="text/css">

body {
	 background:url(../images/small.gif);  
	 margin:0 auto;
}

</style>
<script language="javascript">
function load_page(val)
{
	location.href='video_list.php?type='+val;
}
</script></head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td width="750" align="center">
    <div id="mid"> 
    
    
    
    
    
    
    
    
    
    
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#000000">
              <tr>
                <td height="29"  class="heading"><strong>Manage Videos : </strong></td>
              </tr>
              
              
				
              
              <tr>
                <td height="252" bgcolor="#FFFFFF" valign="top"><form name="form1" method="post" action="videoAdd.php">
                  <br>
                  <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                   
                      <td width="15%" align="right" valign="middle"><input name="gone" type="button" value="Add Video" onClick="location.href='videoAdd.php'"></td>
                    </tr>
                  </table>
                  <div align="center" class="correct"><? echo stripslashes($_SESSION['sess_msg']); ?></div>
                  <p>
                    <? 

				if(isset($_GET['del']))

				{

						$arr=$_GET['del']; 		

						$re=mysql_fetch_array(mysql_query("select thumb from video where id='".$arr."'")); 

						@unlink("../upload/video/thumb/".$re['thumb']); 	

						mysql_query("delete from video where id='$arr'")or die(mysql_error());  

						$sess_msg="Deleted Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: videoList.php");

						exit; 

				}

					if(isset($_GET['ban']))

					{

						mysql_query("update video  set status=0 where id=".$_GET['ban']);

						$sess_msg="Suspended Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: videoList.php");

						exit;

					}

					if(isset($_GET['unban']))

					{

						mysql_query("update video set status=1 where id=".$_GET['unban']);

						$sess_msg="Activated Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: videoList.php");

						exit;

					} 
					
					$cat=$_POST['categary'];
				  if($cat!='')
				  {
				  $q=mysql_query("select * from video where categary = '".$cat."'");

				  $count=mysql_num_rows($q);
				  }else
				  {
					$q=mysql_query("select * from video");

				  $count=mysql_num_rows($q);  
				  }
				  if($count!=0)

				  {
$aa=0;
				  ?>
                
                  <table width="212" border="0" align="center" cellpadding="2" cellspacing="2">
                  <tr><td align="center" colspan="2"><font size="+1" color="#FF0000"><? echo $categary?></font></td></tr>
                    <tr>
                      <? $i=$start+1; $k=$i; while($row=mysql_fetch_array($q)){ extract($row);
					  $aa++;?>
                      <td align="center" width="80">
                      
                      <?=normal_filter($row['video']);?>

<?=normal_filter($row['name']);?>

					    
                        <span class="bodytext">&nbsp;&nbsp;<a href="videoAdd.php?edit=<?  echo $id?>" title="Edit Page">
                        
                        
                        <img src="images/but_edit_small.gif" alt="Edit Photo Gallery Category" width="22" height="22" border="0"></a> <a href="videoList.php?del=<?  echo $id?>" onClick="return del();" title="Delete Photo Gallery Category"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0">
                        
                        
                        
                        </a>
                          <? if($status==0){?>
                          <a href="videoList.php?unban=<?  echo $id?>" title="Activate Photo Gallery Category" ><img src="images/but_unban_small.gif" alt="Unban Page" width="22" height="22" border="0"></a>
                          <? }

						  else { ?>
                          <a href="videoList.php?ban=<?  echo $id?>" title="Suspend Photo Gallery Category" ><img src="images/but_ban_small.gif" alt="Ban Page" width="22" height="22" border="0"></a>
                          <? } ?>
                        </span></td>
                      <? if($k%2==0) echo "</tr><tr>"; ?>
                      <? $i++; $k++;}}?>
                    </tr>
                  </table>
                                    
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
<? ob_end_flush(); ?>