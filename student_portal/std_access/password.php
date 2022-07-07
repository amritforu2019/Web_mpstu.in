<?php   include("../con_base/functions.inc.php");   ?>
<?
$qry=mysqli_query($DB_LINK,"select pass from admin_login where user='".$_SESSION['master']."'")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry)or die(mysqli_error($DB_LINK));


if(isset($_POST['go']))
{
if(mysqli_query($DB_LINK,"update admin_login  set pass='".enc(trim($_POST['cpass']))."' where user='".$_SESSION['master']."' and pass='".enc(trim($_POST['opass']))."'"))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Password updated Succesfully</span>";
header("Location: password");
exit;
}
else
{
$_SESSION['msg']="<span style='color:red; font-size:14px;'>Old Password Not correct !!!</span>";
header("Location: password");
exit;
}
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
  <h1>Change / Update Password</h1>
  <form name="form1" method="post" action="password" id="formID" class="formular validationEngineContainer">
    <table width="50%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="2"  align="center"><?  echo $_SESSION['msg']; unset($_SESSION['msg']);?>
          <div align="center"></div></td>
      </tr>
      <tr>
        <td width="39%" class="bodytext"><div align="right" class="middletext">Old 
            
            Password :</div></td>
        <td width="61%"><input name="opass" type="text" class="textbox validate[required] text-input" id="opass3"  value="<? //echo dec($row['pass']); ?>" ></td>
      </tr>
      <tr>
        <td class="bodytext"><div align="right" class="middletext">New Password 
            
            :</div></td>
        <td><input name="pass" type="password" class="textbox validate[required] text-input" id="pass" ></td>
      </tr>
      <tr>
        <td class="bodytext"><div align="right" class="middletext">Confirm 
            
            Password :</div></td>
        <td><input name="cpass" type="password" class="textbox validate[required,equals[pass]] text-input" id="cpass" ></td>
      </tr>
      <tr>
        <td height="36" colspan="2"><div align="center">
            <input name="go" type="submit" class="subm" id="go" value="Update Password">
          </div></td>
      </tr>
    </table>
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>