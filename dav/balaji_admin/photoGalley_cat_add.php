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
                   <td height="30" colspan="2" bgcolor="#000" class="heading"><strong>Add Photo Gallery Category:</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form name="form1" method="post" action="photoGalley_cat_add.php" enctype="multipart/form-data"> 

				  <?  

					  if(isset($_GET['edit']))

					  { 

						  $ty=$_GET['edit'];

						  $qry=mysql_query("select * from photogallery_cat  where id='$ty' ")or die(mysql_error());

						  $row=mysql_fetch_array($qry);

						  $_SESSION['cap_use']=$row['name']; 

					  } 

					  if(isset($_POST['go']))

					  {

						  if($_POST['edit']!='') { 

								mysql_query("update photogallery_cat set name='".addslashes($_POST['name'])."' where id='".$_POST['edit']."'")or die(mysql_error());

								$sess_msg="Photo Gallery Category Updated Successfully";

								$_SESSION['sess_msg']=$sess_msg;

								header("Location: photoGalley_cat.php"); 

						 } 

						 else {   

								  mysql_query("insert into photogallery_cat set name='".addslashes($_POST['name'])."', status=1")or die(mysql_error());

								  $sess_msg="Photo Gallery Category Added Successfully";

								  $_SESSION['sess_msg']=$sess_msg;

								  header("Location: photoGalley_cat.php");

							 } 

						} 

					?> 

                <table width="300" border="0" align="center" cellpadding="2" cellspacing="4">   

                <tr>

                  <td height="22" align="right" nowrap class="hometext"><strong>Name :</strong></td>

                  <td><input name="name" type="text" id="name" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['name']); else echo stripslashes($name);?>" style="width:255px;"><input name="edit" type="hidden" value="<? echo $_REQUEST['edit'];?>"></td>

                  <td align="left"><input name="go" type="submit" class="button" id="go" value="<? if(isset($_SESSION['naukri'])) echo "Update"; else echo "Add"?> Category" onClick="return chk();"></td>

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