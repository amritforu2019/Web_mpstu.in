<? ob_start();
require_once("../config/functions.inc.php");
include("fckeditor/fckeditor.php");
validate_admin();
$q1=mysql_query("select * from questions order by id desc");   
$q2=mysql_fetch_array($q1); 
if(isset($_REQUEST['update'])){
mysql_query("update questions set ans='".addslashes($_POST['ans'])."', a='yes' where id='".$_POST['hidid']."'")or die(mysql_error());  
$email_qry=mysql_fetch_array(mysql_query("select email from members where id='".$q2['user_id']."'")); 
//send mail 
		 	include("../ans_msg.php");
			$message = $msg;
			$headers  = 'MIME-Version: 1.0' . "\r\n"; 	
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= "From: $SITE_NAME <$EMAIL_ID>\r\n";
			mail($email_qry['email'],'Check Your Answer on www.career-ccd.com',$message, $headers); 
$_SESSION['sess_msg']="Answered successfully..";
header("Location:question_list.php"); 
exit;  
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
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Clear Doubts:</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" valign="top">
			  <form name="form1" method="post" action="question_list.php">
                <br> 
				<? 	 		
				if(isset($_GET['del']))
				{
						$arr=$_GET['del'];	 				
						mysql_query("delete from questions  where id='$arr'")or die(mysql_error()); 
						$sess_msg="questions Deleted Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: question_list.php");
						exit;
 				}
					if(isset($_GET['ban']))
					{
						mysql_query("update questions  set status=0 where id=".$_GET['ban']);
						$sess_msg="questions Suspended Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: question_list.php");
						exit;
					}
					if(isset($_GET['unban']))
					{
						mysql_query("update questions set status=1 where id=".$_GET['unban']);
						$sess_msg="questions Activated Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: question_list.php");
						exit;
					}  
				  ?>

                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                 <!-- <tr>
                    <td width="76%" height="32">&nbsp;</td>
                    <td width="24%" align="right" valign="top"><input name="gone" type="submit" class="button" id="gone2" value="Add questions" onClick="location.href='category_add.php'"></td>
                  </tr>-->
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
				  <? if ($_GET['ans']){$que=mysql_fetch_array(mysql_query("select * from questions where id='".$_REQUEST['ans']."'"));?> 
				  <tr> 
                    <td height="10" colspan="4">
						<div style="float:left; font-size:20px; font-weight:bold;">Q.</div> 
						<div style="float:right; width:675px; padding-top:4px;"><? echo $que['que']; ?></div>
						<div style="clear:both; overflow:hidden;"></div>
						<br> 
						<div style="font-size:20px; font-weight:bold;">Answer</div> 
						<? $oFCKeditor = new FCKeditor('ans');
							   $oFCKeditor->BasePath = 'fckeditor/';
							   if(isset($que['ans'])) $oFCKeditor->Value = stripslashes($que['ans']); else $oFCKeditor->Value = stripslashes($que['ans']) ;
							   $oFCKeditor->Width  = '100%' ;
							   $oFCKeditor->Height = '350' ;
							   $oFCKeditor->Create();
							?>
							<input type="hidden" name="hidid" value="<? echo $_REQUEST['ans']; ?>"> <br>
						<input name="update" type="submit" class="search" id="update" onClick="return chk();" value="Clear Doubts">
					</td>
                  </tr>
				  <? } else { $q=mysql_query("select * from questions order by id desc");
				  $count=mysql_num_rows($q);
				  if($count!=0) { ?> 
                  <tr>
                    <td width="9%" bgcolor="#ADD8F8" align="center"><strong> SNo.</strong></td>
                    <td height="27" bgcolor="#ADD8F8" style="padding-left:10px;"><strong>Questions  </strong><strong> </strong></td>
                    <td width="25%" bgcolor="#ADD8F8" align="center"><strong>Action</strong></td>
                  </tr>
                 		<? 
						   $i=1;
						   while($row=mysql_fetch_array($q)){
						   extract($row);
						 ?>
                  <tr bgcolor="#F2F2F2">
                    <td align="center"><?  echo $i;?></td>
                    <td style="padding:10px;"> <?php if(strlen(normal_filter($que))>200) echo ucfirst(substr((normal_filter($que)),0,200)),"..."; else echo ucfirst(normal_filter($que));?>					   </td>
                    <td width="25%" align="center"><a href="viewprofile.php?id=<? echo $user_id?>" title="View Member"><img src="images/but_mem_small.gif" alt="Edit Main Link" width="22" height="22" border="0"></a>
				<? if($a=='no'){?>
					<a href="question_list.php?ans=<? echo $id?>" title="Answer"><img src="images/but_ans_small.gif" alt="Edit Main Link" width="22" height="22" border="0"></a> <? } else {?>
					<a href="question_list.php?ans=<? echo $id?>" title="Edit Answer"><img src="images/but_edit_small.gif" alt="Edit Main Link" width="22" height="22" border="0"></a> <? } ?>
					<a href="question_list.php?del=<?  echo $id?>" onClick="return del();" title="Delete questions"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>
                      <? if($status==0){?>
                      <a href="question_list.php?unban=<?  echo $id?>" title="Activate Main Link" ><img src="images/but_unban_small.gif" alt="Unban questions" width="22" height="22" border="0"></a>
                      <? }
						  else { ?>
                        <a href="question_list.php?ban=<?  echo $id?>" title="Suspend Main Link" ><img src="images/but_ban_small.gif" alt="Ban questions" width="22" height="22" border="0"></a>
                      <? } ?></td>
				  </tr>
                 	 <?  $i++; } } else{  ?>  
						<div align="center"><strong>Currently No questions Available, Please</strong> </div>
					<? } }?> 
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
<? ob_end_flush();
?>
<script> show(1);</script>