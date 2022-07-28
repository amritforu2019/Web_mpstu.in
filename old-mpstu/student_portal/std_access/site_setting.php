<?php   include("../con_base/functions.inc.php");   
validate_rolid_admin();
$qry=mysqli_query($DB_LINK,"select * from tbl_setting")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry)or die(mysqli_error($DB_LINK));
if(isset($_POST['go']))
{
$site_name=trim($_POST['site_name']);
$site_short_name=trim($_POST['site_short_name']);
$site_title=trim($_POST['site_title']);
$site_admin_title=trim($_POST['site_admin_title']);
$title=trim($_POST['title']);
$email=trim($_POST['email']);
$metatag=trim($_POST['metatag']);
$contenttag=trim($_POST['contenttag']);
$address=trim($_POST['address']);
$f=trim($_POST['f']);
$l=trim($_POST['l']);
$t=trim($_POST['t']);
$y=trim($_POST['y']);
$g=trim($_POST['g']);
$snap=trim($_POST['snap']);
$amaz=trim($_POST['amaz']);
$flip=trim($_POST['flip']);

$webmail=trim($_POST['webmail']);
$mpass=trim($_POST['mpass']);
$host=trim($_POST['host']);
$port=trim($_POST['port']);


$msg_typ=trim($_POST['msg_typ']);
$msg_contact=trim($_POST['msg_contact']);
$msg_pass=trim($_POST['msg_pass']);
$msg_sender_id=trim($_POST['msg_sender_id']);


$qr=mysqli_query($DB_LINK,"update tbl_setting  set site_url='".$_POST['site_url']."' , site_name='$site_name', site_short_name='$site_short_name',  site_admin_title='$site_admin_title', email='$email', title='$title', unit='".$_POST['unit']."', paypal_id='".$_POST['paypal_id']."',metatag='".$metatag."',address='".$address."',contenttag='".$contenttag."',f='".$f."',l='".$l."',t='".$t."',y='".$y."',g='".$g."',snap='".$snap."',amaz='".$amaz."',flip='".$flip."',webmail='$webmail',mpass='$mpass' ,host='$host',port='$port',  `msg_typ`='$msg_typ' , `msg_contact`='$msg_contact', `msg_pass` ='$msg_pass',  `msg_sender_id` ='$msg_sender_id'   where id=1")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="<span style='color:green; font-size:14px;'>Site Setting Updated successfully</span>";
header("Location: site_setting");
exit;
}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<title><?php echo $ADMIN_HTML_TITLE;?></title>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			$(".submit").click(function(){
				jQuery("#formID").validationEngine('validate');
			})
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Change / Update Site Settings</h1>
  <form name="form1" method="post" action="site_setting" id="formID" class="formular validationEngineContainer">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="2"  align="center"><?  echo $_SESSION['sess_msg']; unset($_SESSION['sess_msg']);?>        </td>
      </tr>
      <tr>
        <td>Site Name :</td>
        <td><input name="site_name" type="text" class="textbox validate[required] text-input " id="opass3"  value="<? echo stripslashes($row['site_name']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Site Url :</td>
        <td><input name="site_url" type="text" class="textbox validate[required] text-input " id="site_url"  value="<? echo stripslashes($row['site_url']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Site Short Name :</td>
        <td><input name="site_short_name" type="text" class="textbox validate[required] text-input " id="opass"  value="<? echo stripslashes($row['site_short_name']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Admin Title : </td>
        <td><input name="site_admin_title" type="text" class="textbox validate[required] text-input " id="site_admin_title"  value="<? echo stripslashes($row['site_admin_title']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Email Id :</td>
        <td><input name="email" type="text" class="textbox validate[required] text-input " id="email"  value="<? echo stripslashes($row['email']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Title(Homepage) :</td>
        <td><input name="title" type="text" class="textbox validate[required] text-input " id="title"  value="<? echo stripslashes($row['title']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Mobile :</td>
        <td><input name="unit" type="text" class="textbox" id="unit"  value="<? echo stripslashes($row['unit']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Mobile 2</td>
        <td><input name="metatag" type="text" class="textbox" id="metatag" value="<? echo stripslashes($row['metatag']); ?>" size="45"></td>
      </tr>
      <tr>
        <td>Google Map Code</td>
        <td><textarea name="contenttag" cols="45" rows="4" class="textbox" id="contenttag"><? echo stripslashes($row['contenttag']); ?></textarea></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><textarea name="address" cols="45" rows="3" class="textbox validate[required] text-input " id="address"><? echo stripslashes($row['address']); ?></textarea></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#E3FFDD"   >Other Importent Links</td>
      </tr>
      <tr>
        <td bgcolor="#E3FFDD">Facebook</td>
        <td bgcolor="#E3FFDD"><input name="f" type="text" class="textbox" id="f" value="<? echo stripslashes($row['f']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#E3FFDD">LinkedIn</td>
        <td bgcolor="#E3FFDD"><input name="l" type="text" class="textbox" id="l" value="<? echo stripslashes($row['l']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#E3FFDD">Twitter</td>
        <td bgcolor="#E3FFDD"><input name="t" type="text" class="textbox" id="t" value="<? echo stripslashes($row['t']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#E3FFDD">Youtube</td>
        <td bgcolor="#E3FFDD"><input name="y" type="text" class="textbox" id="y" value="<? echo stripslashes($row['y']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#E3FFDD">Google_Plus</td>
        <td bgcolor="#E3FFDD"><input name="g" type="text" class="textbox" id="g" value="<? echo stripslashes($row['g']); ?>" size="45"></td>
      </tr>
      <tr>
        <td colspan="2" bgcolor="#D9E6FD">Webmail Email Configration</td>
      </tr>
      <tr>
        <td bgcolor="#D9E6FD">Email Id </td>
        <td bgcolor="#D9E6FD"><input name="webmail" type="text" class="textbox" id="webmail" value="<? echo stripslashes($row['webmail']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#D9E6FD">Password</td>
        <td bgcolor="#D9E6FD"><input name="mpass" type="text" class="textbox" id="mpass" value="<? echo stripslashes($row['mpass']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#D9E6FD">Host</td>
        <td bgcolor="#D9E6FD"><input name="host" type="text" class="textbox" id="host" value="<? echo stripslashes($row['host']); ?>" size="45"></td>
      </tr>
      <tr>
        <td bgcolor="#D9E6FD">Port</td>
        <td bgcolor="#D9E6FD"><input name="port" type="text" class="textbox" id="port" value="<? echo stripslashes($row['port']); ?>" size="45"></td>
      </tr>
      <tr>
       <td colspan="2" bgcolor="#FECFCD">SMS Gatway Details</td>
      </tr>
      <tr>
       <td bgcolor="#FECFCD">Contact No.</td>
       <td bgcolor="#FECFCD"><input name="msg_contact" type="text" class="textbox" id="msg_contact" value="<? echo stripslashes($row['msg_contact']); ?>" size="45"></td>
      </tr>
      <tr>
       <td bgcolor="#FECFCD">Password</td>
       <td bgcolor="#FECFCD"><input name="msg_pass" type="text" class="textbox" id="msg_pass" value="<? echo stripslashes($row['msg_pass']); ?>" size="45"></td>
      </tr>
      <tr>
       <td bgcolor="#FECFCD">Sender Id</td>
       <td bgcolor="#FECFCD"><input name="msg_sender_id" type="text" class="textbox" id="msg_sender_id" value="<? echo stripslashes($row['msg_sender_id']); ?>" size="45"></td>
      </tr>
      <tr>
       <td bgcolor="#FECFCD">Type</td>
       <td bgcolor="#FECFCD"><input name="msg_typ" type="text" class="textbox" id="msg_typ" value="<? echo stripslashes($row['msg_typ']); ?>" size="45"></td>
      </tr>
    
      <tr>
        <td colspan="2" align="center"><input name="go" type="submit" class="subm" id="go" value="Update Site Settings">        </td>
      </tr>
    </table>
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
