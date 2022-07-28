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
<script>
function ch1()
{
var nm=confirm("ARE you sure you want to delete banner_adv");
if(nm)
return true;
else
return false;
}
function val()
{
if(document.form1.type.value=="")
{
alert("Please Select Type");
return false;
}
return true;
}

function load_page(val)
{
	location.href='banner_adv_add.php?type='+val;
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
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#0c5994" class="heading"><strong>Manage Flash Images</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" align="center">
				      <form action="banner_adv_add.php" method="post" enctype="multipart/form-data" name="form1"> 
                    <?
			 		extract($_POST);	
					  if(isset($_GET['edit']))
					  {
					   $_SESSION['naukri']=stripslashes($_GET['edit']);
					   $ty=$_GET['edit'];
						$qry=mysql_query("select * from banner_adv where  id='$ty'")or die(mysql_error());
					   $row=mysql_fetch_array($qry)or die(mysql_error());
					   }
					   
						 if(isset($_GET['yahoo'])|| isset($_POST['add']))
					  {
					  
					 
					  }
					  if(isset($_POST['go']))
					  {
					 
					  $burl=mysql_real_escape_string($_POST['burl']);
					  $alttag=mysql_real_escape_string($_POST['alttag']);
								   
					   if(isset($_SESSION['naukri']))
					   {
					    	require_once("uploader.php");
							include_once("ImageResizeFactory.php");
							if(isset($_FILES['uploaded_file']))
									{
										upload("../upload/banner_adv/");
										$a=$_SESSION['naukri'];
										if($finame!="")
										{ 
											$rw=mysql_query("select * from banner_adv where id='$a'");
											$rw1=mysql_fetch_array($rw)or die(mysql_error());
											$x=$rw1['blocation'];
											unlink("../upload/banner_adv/$x"); 
											$srcFile = "../upload/banner_adv/".$finame;  
											$q=mysql_query("update banner_adv set type='".$_POST['type']."', blocation='$finame', burl='$burl', alttag='$alttag' where id='$a'")or die(mysql_error());
											header("Location: banner_adv_list.php?type=".$_REQUEST['type']);
										} 
									else
										{
											$q=mysql_query("update banner_adv set type='".$_POST['type']."', burl='$burl', alttag='$alttag'  where id='$a'")or die(mysql_error());
											$_SESSION['sess_msg']="Updated Successfully";
											header("Location: banner_adv_list.php?type=".$_REQUEST['type']);
										}
									}
					   }
					   else
					   {
					    	require_once("uploader.php");
							include_once("ImageResizeFactory.php");
								if(isset($_FILES['uploaded_file']))
									{
										upload("../upload/banner_adv/");
										if($finame!="")
										{ 
											$q=mysql_query("insert into banner_adv values(NULL, '".$_POST['type']."', '$finame', '$burl', '$alttag')") or die(mysql_error());
											header("Location: banner_adv_list.php?type=".$_REQUEST['type']);
										}
										$_SESSION['sess_msg']=$co;
									}
								else
								{
									$_SESSION['sess_msg']="Please Select image for uploading";
								}
					   }
					   
					   } 
			  ?>
                    <table width="75%" border="0" align="center" cellpadding="2" cellspacing="4">
                      <tr>
                        <td  colspan=2 class="vali" align="center"></td>
                      </tr>
                      <tr>
                        <td height="32" colspan="2" class="articles"><div class="red">
                            <div align="center"><? echo $_SESSION['sess_msg'];  ?></div>
                        </div></td>
                      </tr> 
					  <tr>
                        <td class="bodytext"> 
                          <div align="left" class="smalltext">Type :</div></td>
						  <td>
						  	<select name="type" onChange="javascript:load_page(this.value);">
						  	  <option value="1"  <? if($type=='1') echo 'selected="selected"';?>>Image</option>
						  	  <option value="2" <? if($type=='2') echo 'selected="selected"';?>>Flash</option>
							</select>
						</td>
                      </tr>
                      <tr>
                        <td class="bodytext"><span class="smalltext"> 
                          </span>
                          <div align="left" class="smalltext">Upload Image :</div></td><td><input name="uploaded_file" type="file" id="uploaded_file" size="30"></td>
                      </tr>
					   <tr>
                        <td class="bodytext"></td>
                        <td style="color:#FF0000; font:11px Verdana, Arial, Helvetica, sans-serif;"> Add 235px x 90px for better view</td>
                      </tr>
                      <tr <? if($_GET['type']=="2" or $row['type']=="2") {?>style="display:none" <? } ?>>
                        <td height="22" class="bodytext"><div align="left"><span class="smalltext">Link : </span> </div>
                            <div align="left" class="smalltext"></div></td>
                        <td> 
                          <input name="burl" type="text" class="bodytext" id="burl" value="<? if(isset($row['burl'])) echo $row['burl']; else echo $burl; ?>" size="40">
                        </td>
                      </tr>
					   <tr <? if($_GET['type']=="2" or $row['type']=="2") {?>style="display:none" <? } ?>>
                        <td class="bodytext"></td>
                        <td style="color:#FF0000; font:11px Verdana, Arial, Helvetica, sans-serif;">Type Link without http://</td>
                      </tr>
                      <tr>
                        <td width="19%" height="22">&nbsp;</td>
                        <td width="81%"><input name="go" type="submit" class="button" id="go" value="Add Flash Image" onClick="return val();" >                        </td>
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
<? ob_end_flush(); ?>