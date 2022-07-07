
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
            <table width="60%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f0becf">
              <tr bgcolor="e77817">
                <td height="29" bgcolor="#f0becf" class="heading"><strong>Add Video :</strong></td>
              </tr>
              <tr>
                <td height="252" bgcolor="#FFFFFF"><form name="form1" method="post" action="videoAdd.php" enctype="multipart/form-data">
                  <?  

					  if(isset($_GET['edit']))

					  { 

						  $ty=$_GET['edit'];

						  $qry=mysql_query("select * from video  where id='$ty' ")or die(mysql_error());

						  $row=mysql_fetch_array($qry);

						  $_SESSION['cap_use']=$row['name']; 

					  } 

					  if(isset($_POST['go']))

					  {

						  if($_POST['edit']!='') { 

							if($_FILES['uploaded_file_small']['name']!="")

								{

									

									$where=" , thumb='$finame_small'";

									$rw=mysql_query("select thumb from video where id='".$_POST['edit']."' ")or die(mysql_error());

									$rw1=mysql_fetch_array($rw);

									$x=$rw1['thumb']; 

									@unlink("../upload/video/thumb/$x"); 

								} 

		 

								mysql_query("update video set name='".addslashes($_POST['name'])."',share='".addslashes($_POST['share'])."',categary='".addslashes($_POST['categary'])."',video='".addslashes($_POST['video'])."' $where where id='".$_POST['edit']."'")or die(mysql_error());

								$sess_msg="Video Updated Successfully";

								$_SESSION['sess_msg']=$sess_msg;
?> <script>
                           location.href='videoList.php';
							   //exit;
							    </script><?

						 } 

						 else {   

						 		require_once("uploader12.php");    

								if($_FILES['uploaded_file_small']['name']!=""){

										upload_small();   

										$where=" , thumb='$finame_small'"; 

								}

							if(mysql_query("insert into video set name='".addslashes($_POST['name'])."',share='".addslashes($_POST['share'])."',video='".addslashes($_POST['video'])."',status=1 $where")or die(mysql_error()))
							{

								$sess_msg="Video Added Successfully";

								$_SESSION['sess_msg']=$sess_msg;

								?> <script>
                              location.href='videoList.php';
							   // exit;
							    </script><?

							}
							} 
							 

						} 

					?>
                  <table width="300" border="0" align="center" cellpadding="2" cellspacing="4">
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Title   :</strong></td>
                      <td><input name="name" type="text" id="name" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['name']); else echo stripslashes($name);?>" style="width:255px;">
                        <input name="edit" type="hidden" value="<? echo $_REQUEST['edit'];?>"></td>
                    </tr>
                    <!--<tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Thumbnail :</strong></td>
                      <td><input name="uploaded_file_small" type="file" id="uploaded_file_small" size="32"></td>
                    </tr>-->
                     <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Share Link :</strong></td>
                      <td><input name="share" type="text" id="share" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['share']); else echo stripslashes($share);?>" style="width:255px;"></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Video Code : </strong></td>
                      <td><textarea name="video" style="width:258px;" rows="5" id="textarea"><? if(isset($_GET['edit'] )) echo stripslashes($row['video']); else echo stripslashes($video);?>
                      </textarea>
                        <br>
                        <span style="font-size:10px; color:#ff0000;">Width 300px Height 205px </span></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext">&nbsp;</td>
                      <td><input name="go" type="submit" class="button" id="go" value="<? if(isset($_SESSION['naukri'])) echo "Update"; else echo "Add"?> Video" onClick="return chk();"></td>
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