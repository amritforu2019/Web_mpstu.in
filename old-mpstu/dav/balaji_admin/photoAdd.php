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
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: 11px;
}
-->
</style>
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
                   <td height="30" colspan="2" bgcolor="#000" class="heading"><strong> Add Photo in <? if($_GET['pid']!='') $cat=mysql_fetch_array(mysql_query("select name from photogallery_cat where id='".$_REQUEST['pid']."'")); echo $cat['name'];?></td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form action="photoAdd.php" method="post" enctype="multipart/form-data" name="form1">

              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f0becf"> 

                <tr>

                  <td bgcolor="#FFFFFF"> 

                      <?  

						  if(isset($_GET['edit']))

						  { 

							  $ty=$_GET['edit'];

							  $qry=mysql_query("select * from gallery  where id='$ty' ")or die(mysql_error());

							  $row=mysql_fetch_array($qry);  

						  }  

						  if(isset($_POST['go']))

						  { 

								require_once("uploader4.php");   

								require("thumbcreator.php");

								if($_FILES['uploaded_file_gallery']['name']!="")

									{

										upload_gallery();   

										cropImage(200, 150, '../upload/gallery/'.$finame_gallery, $bg_ext_gallery , '../upload/gallery/thumb/'.$finame_gallery);

										if($_POST['featured']=='yes') {

										cropImage(684, 381, '../upload/gallery/'.$finame_gallery, $bg_ext_gallery , '../upload/gallery/homepage/'.$finame_gallery); 

										}

										$where=" , images='$finame_gallery' " ; 

									}

								mysql_query("insert into gallery set name='".$_POST['name']."', pid='".$_POST['pid']."',featured='".$_POST['featured']."' $where,status=1")or die(mysql_error()); 

								$sess_msg="Image Added Successfully";

								$_SESSION['sess_msg']=$sess_msg; 

								header("Location: photoGallery.php?pid=".$_POST['pid']); 

							} 

			 	 		?>

                      <br> 

                    <table width="100%" border="0" cellspacing="4" cellpadding="4">  

					<? if($_SESSION['sess_msg']){?> 

                        <tr>

                          <td colspan="2" align="center" class="red">&nbsp;<? echo $_SESSION['sess_msg']; ?></td>

                        </tr>

						<? } ?>   

                        <tr>

                          <td height="22" align="right" valign="top"><strong>Upload Image :</strong></td>

                          <td valign="top">

                          <input name="uploaded_file_gallery" type="file" id="uploaded_file_gallery" size="30"><input name="pid" type="hidden" value="<? echo $_REQUEST['pid'];?>">	<br>
<span class="style1">Upload Image ( height  850px width auto according image) </span></td>

                        </tr>  

						  

						<tr>

                          <td height="22" align="right"> <strong> Title :</strong> </td>

                          <td><input name="name" type="text" id="name" style="width:245px;"  value="<? if(isset($_GET['edit'] )) echo stripslashes($row['name']); else echo stripslashes($name);?>"></td>

                        </tr>  

						

						<!--<tr>

                          <td height="22" align="right" valign="top"> <strong> Tagline :</strong> </td>

                          <td><input name="tagline" type="text" id="tagline" style="width:245px;"  value="<? if(isset($_GET['edit'] )) echo stripslashes($row['tagline']); else echo stripslashes($tagline);?>"> <br> 

                          <font style="font:10px arial; color:#ff0000;">for homepage flash</font></td>

                        </tr> 

						

						<tr>

                          <td height="22" align="right"> <strong> Featured :</strong> </td>

                          <td><input name="featured" type="checkbox" value="yes" <? if($_GET['edit'] and $row['featured']=='yes') echo 'checked'; elseif($featured=='yes') echo 'checked';?>></td>

                        </tr> -->  

						 

                        <tr>

                          <td width="30%" height="22">&nbsp;</td>

                          <td>

						  <input name="gone" type="button" value="Back" onClick="window.history.back()">

						  <input name="go" type="submit" class="button" id="go2" value="<? if($_REQUEST['edit']) echo "Edit"; else echo "Add";?> Image" onClick="return chk();"></td>

                        </tr> 

                    </table>

                  </td>

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