
<? ob_start();
error_reporting(0);
require_once("../config/functions.inc.php");
validate_admin();

include("fckeditor/fckeditor.php");
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
    <td width="750" align="center" valign="top">
	<div id="mid"> 
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f0becf">
              <tr bgcolor="e77817">
                <td height="29" bgcolor="#5287BD" class="heading"><strong> Add  Project Flate</strong></td>
              </tr>
              <tr>
                <td height="252" valign="top" bgcolor="#FFFFFF"><form name="form1" method="post" action="" enctype="multipart/form-data">
                  <?  
						 if(isset($_POST['go']))
					  {		
					  require_once("uploader.php");
									if(isset($_FILES['uploaded_file']))
									{
										upload("../upload/flash_images/");
								if(mysql_query("insert into flate set name='".addslashes($_POST['name'])."',`area`='".addslashes($_POST['area'])."' ,`img` ='$finame' ,pid='".addslashes($_POST['hidid'])."'"))
								{
									echo "<script>alert('Flate Add');location.href='pro_list.php';</script>";
								}
								
								}
								else
								{
									echo "<script>alert('Select image');</script>";
								}
					} 

						 

					?><input type="hidden" name="hidid" value="<? echo $_REQUEST['id']; ?>"> 
             
                  <table width="80%" border="0" align="center" cellpadding="2" cellspacing="4">
                    <!--<tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Thumbnail :</strong></td>
                      <td><input name="uploaded_file_small" type="file" id="uploaded_file_small" size="32"></td>
                    </tr>-->
                    <tr>
                      <td width="32%" height="22" align="right" nowrap class="hometext"><strong> Name</strong></td>
                      <td width="68%"><input name="name" type="text" id="name" value="<?  echo stripslashes($row['name']);?>"></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Area</strong></td>
                      <td><strong>
                      <input name="area" type="text" id="area" value="<?  echo stripslashes($row['city']);?>">
                      </strong></td>
                    </tr>
                    <tr>
                      <td align="right" nowrap class="hometext"><strong>Main Image</strong></td>
                      <td><input name="uploaded_file" type="file" id="uploaded_file" size="30"></td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center" nowrap class="hometext">
                
                         <input name="go" type="submit" class="button" id="go" value="Add  Flate" onClick="return chk();">
                    
                       
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