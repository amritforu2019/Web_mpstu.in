<? ob_start();
require_once("../config/functions.inc.php") ;
require_once("fckeditor/fckeditor.php") ;
validate_admin();

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
alert("- Please enter Result Category Title- ");
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
		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
            <tr>
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Result Category :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><form name="form1" method="post" action="result-cat_add.php">
                <p>
                  <?
			  if(isset($_GET['yahoo']))
			  {
			  	
			  	
			 }
			  if(isset($_POST['gone']))
			 { 
			 		  	
			 }
			  if(isset($_GET['edit']))
			  {
				  $_SESSION['naukri']=$_GET['edit'];
				  $ty=$_GET['edit'];
				  $qry=mysql_query("select * from result_cat where id='$ty' ")or die(mysql_error());
				  $row=mysql_fetch_array($qry);
				  $_SESSION['cap_use']=$row['html_name'];
				  
		      }
			  if(isset($_POST['go']))
			  {
			 	  
			   	  if(count($_POST['show_on'])!=0)
					{
						$Show_on=implode(",",$_POST['show_on']);
					}
					$html_name=$_POST['html_name'];
				if(!isset($_SESSION['naukri']))
				  	{ 
				  mysql_query("insert into result_cat set name='".addslashes($_POST['name'])."', status=1")or die(mysql_error());
				  $sess_msg="Result Category Added Successfully";
				  $_SESSION['sess_msg']=$sess_msg;
				  header("Location: result-cat_list.php"); 
			  }
			  else
			  {  
			  $bn=stripslashes($_SESSION['naukri']);
			  mysql_query("update result_cat set name='".addslashes($_POST['name'])."' where id='$bn'")or die(mysql_error());
			 $sess_msg="Result Category Details Updated Successfully";
	          $_SESSION['sess_msg']=$sess_msg;
			   header("Location: result-cat_list.php"); 
			   }
			  } 
			  ?>
                </p> 
                <table width="100%" border="0" cellspacing="4" cellpadding="2">
                  <tr>
                    <td align="right"> Result Category Title : </td>
                    <td><input name="name" type="text" id="cname3" size="50" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['name']); else echo stripslashes($_POST['name']);?>"></td>
                  </tr> 
                  <tr>
                    <td width="28%" height="22">&nbsp;</td>
                    <td width="72%"><input name="go" type="submit" class="button" id="go2" value="<? if(isset($_SESSION['naukri'])) echo "Update"; else echo "Add"?> Result Category" onClick="return chk();">                    </td>
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
<script> show(1);</script>