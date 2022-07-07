<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
$qry=mysql_query("select * from global_setting")or die(mysql_error());
$row=mysql_fetch_array($qry)or die(mysql_error());
if(isset($_POST['go']))
{
$site_name=mysql_real_escape_string($_POST['site_name']); 
$site_title=mysql_real_escape_string($_POST['site_title']);
$site_admin_title=mysql_real_escape_string($_POST['site_admin_title']);
$title=mysql_real_escape_string($_POST['title']);
$metakey=mysql_real_escape_string($_POST['metakey']);
$metades=mysql_real_escape_string($_POST['metades']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$mobile=mysql_real_escape_string($_POST['mobile']);
$f=mysql_real_escape_string($_POST['f']);
$l=mysql_real_escape_string($_POST['l']);
$t=mysql_real_escape_string($_POST['t']);
$y=mysql_real_escape_string($_POST['y']);
$g=mysql_real_escape_string($_POST['g']);

$qr=mysql_query("update global_setting  set site_url='".$_POST['site_url']."' , site_name='$site_name', site_short_name='$site_short_name',  site_admin_title='$site_admin_title', email='$email', title='$title', phone='".$_POST['phone']."', address='".addslashes($_POST['address'])."', paypal_id='".$_POST['paypal_id']."',f='".$f."',l='".$l."',t='".$t."',y='".$y."',g='".$g."' where id=1")or die(mysql_error());
$_SESSION['sess_msg']="Site Setting Updated successfully..";
header("Location: site_setting.php");
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
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
      <tr>
        <td height="29"  bgcolor="#0c5994" class="heading"><strong>Site Settings  :</strong></td>
      </tr>
      <tr>
        <td height="252" bgcolor="#FFFFFF"> 
            <form name="form1" method="post" action="site_setting.php">
              <table width="90%" border="0" align="center" cellpadding="4" cellspacing="5">
                <tr>
                  <td colspan="2" class="red" align="center"><span class="correct">
                    <?  echo $_SESSION['sess_msg']; ?>
                  </span>
                      <div align="center"></div></td>
                </tr>
                <tr>
                  <td width="30%" class="bodytext"><div align="right" class="middletext">Site Name :</div></td>
                  <td width="70%" class="bodytext"><input name="site_name" type="text" class="bodytext" id="opass3"  value="<? echo stripslashes($row['site_name']); ?>" size="45"></td>
                </tr>
				<tr>
                  <td width="30%" class="bodytext"><div align="right" class="middletext">Site Url :</div></td>
                  <td width="70%" class="bodytext"><input name="site_url" type="text" class="bodytext" id="site_url"  value="<? echo stripslashes($row['site_url']); ?>" size="45"></td>
                </tr>
                <tr>
                  <td class="bodytext"><div align="right" class="middletext">Site Short Name :</div></td>
                  <td class="bodytext"><input name="site_short_name" type="text" class="bodytext" id="opass"  value="<? echo stripslashes($row['site_short_name']); ?>" size="45"></td>
                </tr>
                <tr>
                  <td class="bodytext"><div align="right">Admin Title : </div></td>
                  <td class="bodytext"><input name="site_admin_title" type="text" class="bodytext" id="site_admin_title"  value="<? echo stripslashes($row['site_admin_title']); ?>" size="45"></td>
                </tr>
                <tr>
                  <td class="bodytext"><div align="right" class="middletext">Email Id :</div></td>
                  <td class="bodytext"><input name="email" type="text" class="bodytext" id="email"  value="<? echo stripslashes($row['email']); ?>" size="45"></td>
                </tr>
				<tr>
                  <td class="bodytext"><div align="right" class="middletext">Phone Number:</div></td>
                  <td class="bodytext"><input name="phone" type="text" class="bodytext" id="phone"  value="<? echo stripslashes($row['phone']); ?>" size="45"></td>
                </tr>
				<tr>
                  <td class="bodytext"><div align="right" class="middletext">Contact Person :</div></td>
                  <td class="bodytext"><input name="paypal_id" type="text" class="bodytext" id="paypal_id"  value="<? echo stripslashes($row['paypal_id']); ?>" size="45"></td>
                </tr> 
				<tr>
                  <td class="bodytext"><div align="right" class="middletext">Address :</div></td>
                  <td class="bodytext"> 
                  <textarea name="address" id="address" style="width:250px; height:100px;"><? echo stripslashes($row['address']); ?></textarea>
                  </td>
                </tr>  
				<tr>
                  <td class="bodytext"><div align="right" class="middletext">Title(Homepage) :</div></td>
                  <td class="bodytext"><input name="title" type="text" class="bodytext" id="title"  value="<? echo stripslashes($row['title']); ?>" size="45"></td>
                </tr>   
                <tr>
                  <td height="36" colspan="2" class="bodytext"><div align="center">
                      <input name="go" type="submit" class="button" id="go" value="Update Site Settings">
                  </div></td>
                </tr>
                
                <tr>

				  <td colspan="2" valign="top" bgcolor="#D8D6FE" class="bodytext">Other Importent Links</td>

				  </tr>

				<tr>

				  <td valign="top" bgcolor="#D8D6FE" class="bodytext">Facebook</td>

				  <td bgcolor="#D8D6FE" class="bodytext"><input name="f" type="text" class="bodytext" id="f" value="<? echo stripslashes($row['f']); ?>" size="45"></td>

				  </tr>

				<tr>

				  <td valign="top" bgcolor="#D8D6FE" class="bodytext">LinkedIn</td>

				  <td bgcolor="#D8D6FE" class="bodytext"><input name="l" type="text" class="bodytext" id="l" value="<? echo stripslashes($row['l']); ?>" size="45"></td>

				  </tr>

				<tr>

				  <td valign="top" bgcolor="#D8D6FE" class="bodytext">Twitter</td>

				  <td bgcolor="#D8D6FE" class="bodytext"><input name="t" type="text" class="bodytext" id="t" value="<? echo stripslashes($row['t']); ?>" size="45"></td>

				  </tr>

				<tr>

				  <td valign="top" bgcolor="#D8D6FE" class="bodytext">Youtube</td>

				  <td bgcolor="#D8D6FE" class="bodytext"><input name="y" type="text" class="bodytext" id="y" value="<? echo stripslashes($row['y']); ?>" size="45"></td>

				  </tr>

				<tr>

				  <td valign="top" bgcolor="#D8D6FE" class="bodytext">Google_Plus</td>

				  <td bgcolor="#D8D6FE" class="bodytext"><input name="g" type="text" class="bodytext" id="g" value="<? echo stripslashes($row['g']); ?>" size="45"></td>

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
<? ob_end_flush(); ?>