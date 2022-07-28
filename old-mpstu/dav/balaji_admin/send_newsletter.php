<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();  
include("fckeditor/fckeditor.php");

if (isset($_POST['submit']))
{
	$c=0;
	$query=mysql_query("select email from newsletter where status='1'");
	list($Y,$M,$D)=explode("/",date("y/m/d")) ;
	$subject=stripslashes($_POST['title']);
	$message="<html>
		<body>
		<table cellSpacing=0 cellPadding=0 width='505px' align=center style='border:solid 1px #aa170a;'>
		  <tr><td >
			<table cellSpacing=1 cellPadding=2 width='99%' align=center border=0 >
			 <tr>
			 <td style='padding:10px;'><A href=\"http://".$SITE_NAME."/index.php\"><IMG src=\"http://".$SITE_URL."/images/emaillogo.gif\" border=0></A></TD>
			 </tr>
				<tr><td valign='top' style='padding:10px; text-align:justify;'><br>".stripslashes(ucfirst($_POST['message']))."
			   </td></tr> 
			   <tr><td valign='top' style='padding:10px;'><br> Thanks &amp; Regards,<br><b>".$SITE_NAME." Team</b></td></tr>
			</table>
		  </td></tr>
		</table>
		</body>
		</html>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From:'.$SITE_NAME.'<'.$EMAIL_ID.'>' . "\r\n"; 
	while($row=mysql_fetch_array($query))  
	{ 
		@extract($row);   
		 @mail($email,$subject,$message,$headers);
		 $c=$c+1; 
	}
	$_SESSION['mails']=" $c newsletter email sents.";
	header("Location:newsletter.php");		
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css"> 
<script language="javascript">

function chk()
{
if(document.form1.name.value=="")
{
alert("- Please enter Subject-");
return false;
}  
 
if(document.form1.title.value=="")
{
alert("- Please enter Subject-");
return false;
} 

return true;
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
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#274663">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#000" class="heading"><strong>Manage Newsletter</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form action="send_newsletter.php" method="post" enctype="multipart/form-data" name="form1">
                  <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#333333">
                    <tr>
                      <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="5" cellspacing="5">
                          <? if($_SESSION['sess_msg']){ ?>
                          <tr>
                            <td colspan="2" align="center" bgcolor="#FFFFFF" class="red"><? echo $_SESSION['sess_msg']; ?><span class="vali"></span> </td>
                          </tr>
                          <?  } ?>
                          <? if($_REQUEST['parent_id']==0) { ?>
                          <? } ?>
                          <tr>
                            <td width="30%" height="22" bgcolor="#FFFFFF" class="hometext"><div align="right" class="smalltext">
                                <div align="right">Subject :</div>
                            </div></td>
                            <td width="72%" bgcolor="#FFFFFF"><input name="cat" type="hidden" value="<? echo $_REQUEST['parent_id'];?>">
                                <input name="title" type="text" class="bodytext" id="cname" size="50" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['title']); else echo stripslashes($title);?>"></td>
                          </tr>
                          <tr>
                            <td height="22" valign="top" bgcolor="#FFFFFF" class="hometext"><div align="right">Newsletter 
                              :</div></td>
                            <td bgcolor="#FFFFFF">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="22" colspan="2" bgcolor="#FFFFFF" class="hometext"><? $oFCKeditor = new FCKeditor('message');
								 $oFCKeditor->BasePath = 'fckeditor/';  
								$oFCKeditor->Width  = '100%' ;
								$oFCKeditor->Height = '600' ;
								$oFCKeditor->Create();
							 ?></td>
                            </tr>
                          <tr>
                            <td height="22" bgcolor="#FFFFFF" class="hometext">&nbsp;</td>
                            <td bgcolor="#FFFFFF"><input name="submit" type="submit" class="button" id="go2" value="Send" onClick="return chk();"></td>
                          </tr>
                      </table></td>
                    </tr>
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