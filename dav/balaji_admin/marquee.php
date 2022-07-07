
<? ob_start();
error_reporting(0);
require_once("../config/functions.inc.php");
validate_admin();
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

function load_page(val)

{

	location.href='product_list.php?category='+val;

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
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f0becf">
              <tr bgcolor="e77817">
                <td height="29" bgcolor="#5287BD" class="heading"><strong>Edit / Change Latest News</strong></td>
              </tr>
              <tr>
                <td height="252" bgcolor="#FFFFFF"><form name="form1" method="post" action="" enctype="multipart/form-data">
                  <?  

			

						  $qry=mysql_query("select * from marquee  ")or die(mysql_error());

						  $row=mysql_fetch_array($qry);

						
					
	  if(isset($_POST['go']))

					  {			
		 

								mysql_query("update marquee set name='".addslashes($_POST['names'])."' ")or die(mysql_error());	
								header("location:marquee.php");	
							

						} 

						 

					?>
                  <table width="463" border="0" align="center" cellpadding="2" cellspacing="4">
                    <!--<tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Thumbnail :</strong></td>
                      <td><input name="uploaded_file_small" type="file" id="uploaded_file_small" size="32"></td>
                    </tr>-->
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>news :  </strong></td>
                      <td><textarea name="names" cols="50" rows="5" id="names" ><?  echo stripslashes($row['name']);?> </textarea></td>
                    </tr>
                    <tr>
                      <td height="22" colspan="2" align="center" nowrap class="hometext"><input name="go" type="submit" class="button" id="go" value="Change / Update News" onClick="return chk();"></td>
                    </tr>
                  </table>
                </form></td>
              </tr>
  </table>            <br></td></tr>
<? require_once("adfooter.php");?>
      </table></td>

  </tr>

</table>


</body>

</html>


<? ob_end_flush(); ?>

<script> show(1);</script>