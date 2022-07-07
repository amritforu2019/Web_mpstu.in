<?php  
 
  require_once("../con_base/functions.inc.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>

<script type="text/javascript" src="ddaccordion.js"></script>


<title><?php echo $ADMIN_HTML_TITLE;?></title>
</head>
<body>
<div class="top">
	<div class="topleftm"><?php echo $ADMIN_HTML_TITLE;?></div>
    <div class="toprigtm">
    
    </div>
    <div class="c"></div>
</div>
	
   
    <div class="conten">
    <h1>Welcome to Login Page</h1>
    	<form name="form2" method="post" action="login">

                    <table width="40%" border="0" align="center" cellpadding="6" cellspacing="0">

                      <tr>

                        <td colspan="2" class="red"><?php echo $_SESSION['sess_msg']; unset($_SESSION['sess_msg']); ?>

                        <input name="back" type="hidden" id="back" value="<?php echo $_REQUEST['back']?>"></td>
                      </tr>

                      <tr>

                        <td width="31%" class="hometext">Username :</td>

                        <td width="69%" class="hometext"><input name="loginid" type="text" class="textbox" id="loginid" required></td>
                      </tr>

                      <tr>

                        <td class="hometext">Password :</td>

                        <td class="hometext"><input name="password" type="password" class="textbox" id="password" required></td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td><label for="PersistentCookie"><input id="PersistentCookie" name="PersistentCookie" type="checkbox" value="yes" />
                           
                        Stay signed in</label></td>
                      </tr>
                      <tr>

                        <td>&nbsp;</td>

                        <td><input name="Submit2" type="submit" class="subm" value="Submit">

                          &nbsp;<span class="boldlisting">&nbsp;</span></td>
                      </tr>
                    </table>

      </form>
        
    </div>
<?php 
include('footer.php');
?>
</body>
</html>
<?php ob_end_flush();  session_destroy();?>