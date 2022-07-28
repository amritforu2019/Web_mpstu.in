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
         <td height="29" bgcolor="#0c5994" class="heading"><strong>Change Password :</strong></td>
       </tr>

      <tr>

        <td  bgcolor="#FFFFFF"><?

				$qry=mysql_query("select pass from admin_login where id=1")or die(mysql_error());

				$row=mysql_fetch_array($qry)or die(mysql_error());

				if($row['pass']!="")

				$_SESSION['bn']=$row['pass'];

				if(isset($_POST['go']))

				{

				$opass=$_SESSION['bn'];

				$cpass=trim($_POST['cpass']);

				$pass=trim($_POST['pass']);

				if((empty($cpass))||(empty($pass)))

				{

				$msg="Password/ConfirmPassword Can not be blank";

				session_register("msg");

				}

				else if($cpass!=$pass)

				{

				$msg="Confirm Password is not matching ";

				session_register("msg");

				}

				if(!isset($msg))

				{

				$qr=mysql_query("update admin_login  set pass='".enc($pass)."' where pass='$opass' and id=1")or die(mysql_error());

				$msg=" Password updated Succesfully ";

				session_register("msg");

				

				header("Location: passchange.php");

				}

				}

				?>

            <form name="form1" method="post" action="passchange.php">

              <table width="90%" border="0" align="center" cellpadding="2" cellspacing="5">

                <tr>

                  <td colspan="2" class="red" align="center"><?  echo $_SESSION['msg']; ?>

                      <div align="center"></div></td>

                </tr>

                <tr>

                  <td width="29%" class="bodytext"><div align="right" class="middletext">Old 
                      Password :</div></td>

                  <td width="71%"><input name="opass" type="text" class="bodytext" id="opass3"  value=<? echo dec($row['pass']); ?> size="45"></td>

                </tr>

                <tr>

                  <td class="bodytext"><div align="right" class="middletext">New Password 
                      :</div></td>

                  <td><input name="pass" type="password" class="bodytext" id="pass" size="45"></td>

                </tr>

                <tr>

                  <td class="bodytext"><div align="right" class="middletext">Confirm 
                      Password :</div></td>

                  <td><input name="cpass" type="password" class="bodytext" id="cpass" size="45"></td>

                </tr>

                <tr>

                  <td height="36" colspan="2"><div align="center">

                      <input name="go" type="submit" class="button" id="go" value="Update Password">

                  </div></td>

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
<? ob_end_flush();
?>