<? require_once("../config/functions.inc.php"); 
if(isset($_SESSION['sess_admin_id']))
header("Location:admin_home.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/index.css" type="text/css">
<!--[if IE]>
<style type="text/css">
#mid{
	height:300px;
}
</style>
<![endif]-->
</head>
<body onLoad="document.form2.loginid.focus();">
<div id="wrap">
	<div id="top"></div>
	<div id="mid">
		<div id="content-wrap" align="center"> 

<form name="form2" method="post" action="login.php"> 
<input name="back" type="hidden" id="back" value="<? echo $_REQUEST['back']?>"> 
    <table class="login" cellpadding="0" cellspacing="0" width="200">
        <tbody>
	
		<tr>
            <td align="left"><b>Login</b></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Username</td>
            <td> 
			<input id="loginid" name="loginid" size="16" tabindex="1" type="text"></td>
        </tr>
        <tr class="row2">
            <td>Password</td>
            <td><input id="password" name="password" size="16" tabindex="2" type="password"></td>
        </tr>
        <tr>
            <td style="text-align: center;">&nbsp;</td>
            <td align="left"><a href="forgot.php" style="color:#000; margin-left:5px;">Forgot Password?</a></td>
        </tr>
        <tr>
          <td style="text-align: center;">&nbsp;</td>
          <td align="left"><input value="Login" class="input-button" tabindex="3" type="submit" name="Submit2"></td>
        </tr>
    </tbody></table> 
</form> 
</div>
</div>
<div id="bot">
</div>
<div style="line-height:15px;">Copyright <? echo $current_year+0;?>- <? echo $current_year+1;?><strong> <br>
<? echo $SITE_NAME; ?></strong> All Rights Reserved</div>
</div> 

</body>
</html>
