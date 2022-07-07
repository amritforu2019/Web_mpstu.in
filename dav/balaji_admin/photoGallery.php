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
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#274663">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#000" class="heading"><strong> Images of <? if($_GET['pid']!='') $cat=mysql_fetch_array(mysql_query("select name from photogallery_cat where id='".$_REQUEST['pid']."'")); echo $cat['name'];?></strong> </strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form name="form1" method="post" action="photoAdd.php?pid=<? echo $_GET['pid'];?>"> 

              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f0becf"> 

                <tr>

                  <td valign="top" bgcolor="#FFFFFF">

				  <? 

					  /************************for deletion , activation************************/

					  if(isset($_GET['unfeatured']))

						{

							$re=mysql_fetch_array(mysql_query("select images from gallery where id='".$_GET['unfeatured']."'")); 

							@unlink("../upload/gallery/homepage/".$re['images']); 

							mysql_query("update gallery  set featured='no' where id=".$_GET['unfeatured']);

							/////////////////////////////////////////////////////////////

							//////////for creating xml sitemap///////////////////////////

							/////////////////////////////////////////////////////////////

							$query = mysql_query ( "select  * from gallery where featured='yes' order by id desc");  

							$xml.="<flash_parameters copyright=\"socusoftFSMTheme\">

									<preferences>

										<global>

											<basic_property movieWidth=\"494\" movieHeight=\"330\" groundinsize=\"0\" html_title=\"Title\" loadStyle=\"Pie\" startAutoPlay=\"true\" continuum=\"true\" socusoftMenu=\"false\" backgroundColor=\"0xfffbf0\" inbordercolor=\"0xffffff\" hideAdobeMenu=\"true\" photoDynamicShow=\"true\" enableURL=\"true\" transitionArray=\"\"/>

											<title_property showTitle=\"true\" photoTitleColor=\"0xffffff\" backgroundColor=\"0x000000\" alpha=\"30\" autoHide=\"true\"/>

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

									$xml.="<slide d_URL=\"../upload/gallery/homepage/".$row1['images']."\" transition=\"26\" panzoom=\"0\" URLTarget=\"0\" phototime=\"2\" url=\"\" title=\"".$row1['name']."\" width=\"494\" height=\"330\"/> \n";

								} 

									############# END LOOP ############ 

								$xml.="</album>

</flash_parameters>"; 

								/////////for creating xml file 

								$file_handle = fopen('../images/slides.xml','w');

								fwrite($file_handle,$xml);

								fclose($file_handle); 

							$_SESSION['sess_msg']='<div align=center class=correct>Image Un Featured successfully....</div>';

							header("Location: photoGallery.php?start=".$_REQUEST['start']."&pid=".$_REQUEST['pid']);		

							exit;

						}

						

						if(isset($_GET['featured']))

						{

							$re=mysql_fetch_array(mysql_query("select images from gallery where id='".$_GET['featured']."'")); 

							require("thumbcreator.php"); 

							list ($name, $ext) = explode (".", $re['images']); 

							$bg_ext_gallery=$ext;

							cropImage(684, 381, '../upload/gallery/'.$re['images'], $bg_ext_gallery , '../upload/gallery/homepage/'.$re['images']); 

							mysql_query("update gallery  set featured='yes' where id=".$_GET['featured']);

							/////////////////////////////////////////////////////////////

							//////////for creating xml sitemap///////////////////////////

							/////////////////////////////////////////////////////////////

							$query = mysql_query ( "select  * from gallery where featured='yes' order by id desc");  

							$xml.="<flash_parameters copyright=\"socusoftFSMTheme\">

									<preferences>

										<global>

											<basic_property movieWidth=\"494\" movieHeight=\"330\" groundinsize=\"0\" html_title=\"Title\" loadStyle=\"Pie\" startAutoPlay=\"true\" continuum=\"true\" socusoftMenu=\"false\" backgroundColor=\"0xfffbf0\" inbordercolor=\"0xffffff\" hideAdobeMenu=\"true\" photoDynamicShow=\"true\" enableURL=\"true\" transitionArray=\"\"/>

											<title_property showTitle=\"true\" photoTitleColor=\"0xffffff\" backgroundColor=\"0x000000\" alpha=\"30\" autoHide=\"true\"/>

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

									$xml.="<slide d_URL=\"../upload/gallery/homepage/".$row1['images']."\" transition=\"26\" panzoom=\"0\" URLTarget=\"0\" phototime=\"2\" url=\"\" title=\"".$row1['name']."\" width=\"494\" height=\"330\"/> \n";

								} 

									############# END LOOP ############ 

								$xml.="</album>

</flash_parameters>"; 

								/////////for creating xml file 

								$file_handle = fopen('../images/slides.xml','w');

								fwrite($file_handle,$xml);

								fclose($file_handle); 

							$_SESSION['sess_msg']='<div align=center class=correct>Image Featured successfully....</div>';

							header("Location: photoGallery.php?start=".$_REQUEST['start']."&pid=".$_REQUEST['pid']);		

							exit;

						}

						

					 if(isset($_GET['dele']))

						{ 

							$re=mysql_fetch_array(mysql_query("select images from gallery where id='".$_GET['dele']."'")); 

							@unlink("../upload/gallery/".$re['images']); 

							@unlink("../upload/gallery/thumb/".$re['images']);

							@unlink("../upload/gallery/homepage/".$re['images']); 

							mysql_query("delete from gallery where id='".$_GET['dele']."'")or die(mysql_error()); 

							$_SESSION['sess_msg']='<div align=center class=correct>Image deleted successfully....</div>'; 

							header("Location: photoGallery.php?start=".$_REQUEST['start']."&pid=".$_REQUEST['pid']);		

							exit; 

					 }

					 if(isset($_GET['ban']))

						{

							mysql_query("update gallery  set status=0 where id=".$_GET['ban']);

							$_SESSION['sess_msg']='<div align=center class=correct>Image Deactivated successfully....</div>';

							header("Location: photoGallery.php?start=".$_REQUEST['start']."&pid=".$_REQUEST['pid']);		

							exit;

						}

					if(isset($_GET['unban']))

						{

							mysql_query("update gallery  set status=1 where id=".$_GET['unban']);

							$_SESSION['sess_msg']='<div align=center class=correct>Image Activated successfully....</div>';

							header("Location: photoGallery.php?start=".$_REQUEST['start']."&pid=".$_REQUEST['pid']);		

							exit;

						} 

					$start=0;

					if(isset($_GET['start'])and $_GET['start']!='')$start=$_GET['start'];

					$pagesize=15; 

					$qry1=mysql_query("select *  from gallery where pid='".$_REQUEST['pid']."'")or die(mysql_error());

					$qry=mysql_query("select * from gallery where pid='".$_REQUEST['pid']."' order by id DESC limit $start, $pagesize")or die(mysql_error()); 

					$reccnt=mysql_num_rows($qry1);  

					/**********************************************************************/

					echo "<br>".$_SESSION['sess_msg']; 

				?> 	

                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="1">

                        <tr bgcolor="#0066CC">

                            

                          <td align="left" valign="top" bgcolor="#FFFFFF"> </td>

                          <td align="right" bgcolor="#FFFFFF"> 

						  <input name="gone" type="button" value="Back" onClick="location.href='photoGalley_cat.php'">

						  <input name="gone" type="submit" class="button" id="gone" value="Add Image"></td>

                        </tr>

						<? if($reccnt!=0){?>

                        <tr bgcolor="#0066CC">

                          <td height="27" colspan="3" align="center" bgcolor="#FFFFFF"> </td>

                        </tr>

						<tr>

						 <td colspan="3" align="center" bgcolor="#FFFFFF">

						 <table border="0" cellspacing="10" cellpadding="10">

						  <tr>

						  <? $i=$start+1; $k=$i; while($row=mysql_fetch_array($qry)){ extract($row);?> 

							<td> 

						 	<table border="0" cellspacing="0" cellpadding="0">

                            <tr>

                              <td align="center" valign="top"><? if($featured=='yes'){?>

                                <a href="photoGallery.php?unfeatured=<? echo $id?>&start=<? echo $_REQUEST['start'] ?>&pid=<? echo $_REQUEST['pid'] ?>"  title="Featured Category"><img src="images/featured.gif" alt="Featured" width="22" height="22"  border="0" align="left"></a>

                                <? } ?></td>

                              <td align="center" valign="top">

                                <a href="../upload/gallery/<? echo $row['images']; ?>" target="_blank"> <img src="../upload/gallery/thumb/<? echo $row['images']; ?>" alt="<? echo $row['name'];?>" align="top" style="border:#000000 solid 1px;"></a><br>

                                <strong><? echo strip_filter($row['name'],25);?></strong></td>

                            </tr>

                            <tr>

                              <td height="40" colspan="2" align="center">
							  <a href="photoadd1.php?edit=<?  echo $id?>&pid=<? echo $_REQUEST['pid'] ?>" title="Edit images"><img src="images/but_edit_small.gif" alt="Edit Photo Gallery Category" width="22" height="22" border="0"></a>

							  <? if($featured=='no'){?>

							  <a href="photoGallery.php?featured=<? echo $id?>&start=<? echo $_REQUEST['start'] ?>&pid=<? echo $_REQUEST['pid'] ?>"  title="Featured Category"><img src="images/featured.gif" alt="Featured" width="22" height="22"  border="0"></a>

							  <? } ?>

							  <a href="photoGallery.php?dele=<?  echo $id?>&start=<? echo $_REQUEST['start'] ?>&pid=<? echo $_REQUEST['pid'] ?>" onClick="return del();" title="Delete Category"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>

                                <? if($status==0){?>

                                <a href="photoGallery.php?unban=<?  echo $id?>&start=<? echo $_REQUEST['start'] ?>&pid=<? echo $_REQUEST['pid'] ?>" title="Unban Category" ><img src="images/but_unban_small.gif" alt="Unban Category" width="22" height="22" border="0"></a>

                                <? }

						  else { ?>

                                <a href="photoGallery.php?ban=<? echo $id?>&start=<? echo $_REQUEST['start'] ?>&pid=<? echo $_REQUEST['pid'] ?>" title="Ban Category"><img src="images/but_ban_small.gif" alt="Ban Category" width="22" height="22" border="0"></a>

                                <? } ?></td>

                            </tr>

                          </table>							</td>

							   <? if($k%3==0) echo "</tr><tr>"; ?>

							<? $i++; $k++;}}?>

						  </tr>

						</table> <br> 

						<table width="98%" border="0" align="center" cellpadding="2" cellspacing="5">

                        <tr>

                          <td align="center" ><? if($reccnt==0) { ?><span class="red">No Image Available...<a href="photoAdd.php?yahoo=sf&pid=<? echo $_GET['pid'];?>" class="boldlisting">Add First</a></span> <? } ?></td>

                        </tr>

                    </table>						</td></tr>

                    </table> 

                    <table width="98%" border="0" align="center" cellpadding="2" cellspacing="5">

                        <tr>

                          <td align="center" ><?php include("../config/paging.inc.php"); ?>

                          </td>

                        </tr>

                    </table></td>

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