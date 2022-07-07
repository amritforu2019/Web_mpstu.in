<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
$_SESSION['slider']='slider';
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
		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
			  <tr>
				<td height="29" bgcolor="#333333"  class="li"><div align="left" style="color:#fff;"><strong>&nbsp;&nbsp;&nbsp;Manage Flash Images :</strong></div></td>
			  </tr> 
              <tr>
                <td height="252" bgcolor="#FFFFFF" valign="top">

<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="76%" height="32">&nbsp;</td>
                        <td width="24%" valign="top">
                        </td>
                      </tr>
                  </table>
                  <table width="85%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">
                      <tr>
                        <td colspan="6" align="center" class="correct"><div align="center"></div></td>
                      </tr>
					  <tr>
					  	<td colspan="6">
					  <form action="slider_add.php" method="post" enctype="multipart/form-data" name="form1">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1"> 
                <tr>
                  <td bgcolor="#FFFFFF"> 
                      <?  
						  if(isset($_GET['edit']))
						  { 
							  $ty=$_GET['edit'];
							  $qry=mysql_query("select * from  slider1  where id='$ty' ")or die(mysql_error());
							  $row=mysql_fetch_array($qry);  
						  } 
						  if(isset($_POST['go']))
						  {
								require_once("uploader3.php");  
								if($_FILES['uploaded_file_gallery']['name']!="")
									{
										upload_gallery();
										$where=" , images='$finame_gallery' " ;
									}
								mysql_query("insert into slider1 set name='".$_POST['name']."' $where,status=1")or die(mysql_error());
								$sess_msg="Image Added Successfully";
								$_SESSION['sess_msg']=$sess_msg;
								/////////////////////////////////////////////////////////////////////
							//////////for creating xml sitemap/////////////////////////////
							/////////////////////////////////////////////////////////////
								$query = mysql_query ( "select  * from  slider1 where status=1 ORDER BY id desc" );  
								$xml.="<flash_parameters copyright=\"socusoftFSMTheme\">
										<preferences>
											<global>
												<basic_property movieWidth=\"800\" movieHeight=\"260\" groundinsize=\"0\" html_title=\"Title\" loadStyle=\"Pie\" startAutoPlay=\"true\" continuum=\"true\" socusoftMenu=\"false\" backgroundColor=\"0xfffbf0\" inbordercolor=\"0xffffff\" hideAdobeMenu=\"true\" photoDynamicShow=\"true\" enableURL=\"true\" transitionArray=\"\"/>
												<title_property showTitle=\"false\" photoTitleColor=\"0xffffff\" backgroundColor=\"0xfffbf0\" alpha=\"30\" autoHide=\"true\"/>
												<music_property path=\"\" stream=\"true\" loop=\"true\"/>
												<photo_property topPadding=\"0\" bottomPadding=\"0\" leftPadding=\"0\" rightPadding=\"0\"/>
												<description_property textleftborder=\"0\" texttopborder=\"2\" enable=\"true\" backgroundColor=\"0x000000\" backgroundAlpha=\"100\"/>
											</global> 
										</preferences>
										<album>\n";
								############# BEGIN LOOP ############
								// for disabling priority and frequency  
								while ( $row1 = mysql_fetch_array ($query))
									{  
										$xml.="<slide d_URL=\"../upload/slider/".$row1['images']."\" transition=\"29\" panzoom=\"0\" URLTarget=\"0\" phototime=\"5\" url=\"\" title=\"".$row1['name']."\" width=\"800\" height=\"260\"/> \n";
									} 
										############# END LOOP ############ 
									$xml.="</album>
</flash_parameters>"; 
									/////////for creating xml file 
									$file_handle = fopen('../images/slides.xml','w');
									fwrite($file_handle,$xml);
									fclose($file_handle); 
								header("Location: slider_gallery.php?parent_id=".$_POST['p_id']); 
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
                          <td height="22" align="right"  class="text2"><strong>Upload Image :</strong></td>
                          <td>
                          <input name="uploaded_file_gallery" type="file" id="uploaded_file_gallery" size="30"><br>
						  <span style="color:#ff0000; font-size:11px;"  class="text2">upload images only 236px X 134px size</span>						  </td>
                        </tr>  
						  
						<tr>
                          <td height="22" align="right"  class="text2"> <strong> Title :</strong> </td>
                          <td><input name="name" type="text" id="name" style="width:274px;"  value="<? if(isset($_GET['edit'] )) echo stripslashes($row['name']); else echo stripslashes($name);?>"></td>
                        </tr>   
                        <tr>
                          <td width="30%" height="22">&nbsp;</td>
                          <td><input name="go" type="submit" class="button" id="go2" value="<? if($_REQUEST['edit']) echo "Edit"; else echo "Add";?> Image" onClick="return chk();">                          </td>
                        </tr> 
                    </table>
                  </td>
                </tr>
              </table>
 			</form>						</td>
					  </tr>
  

                  </table></td>
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