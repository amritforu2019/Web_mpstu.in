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

		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">

            <tr>

              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Joining Categories :</strong></td>

            </tr>

            <tr>

              <td bgcolor="#FFFFFF">
              ///////////////////////////////////////////////////////////////////////////
              
              
              
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