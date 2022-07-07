<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();



 if(isset($_GET['gone']))
			  { 
				 ?> <script type="text/javascript">
				 
                 location.href='slider_add.php';
                 </script><?
			  }
			  
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


                  <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">
                    
					  <tr>
					  	<td colspan="6">
					  <form name="form1" method="post" action=""> 
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1"> 
                <tr>
                  <td valign="top" bgcolor="#FFFFFF">
				  <? 
				  
			  /************************for deletion , activation************************/
			  if(isset($_GET['dele']))
			  { 
					$re=mysql_fetch_array(mysql_query("select images from slider1 where id='".$_GET['dele']."'")); 
					@unlink("../upload/slider/".$re['images']); 
					mysql_query("delete from slider1 where id='".$_GET['dele']."'")or die(mysql_error());
					/////////////////////////////////////////////////////////////////////
							//////////for creating xml sitemap/////////////////////////////
							/////////////////////////////////////////////////////////////
								$query = mysql_query ( "select  * FROM slider1 where status=1 ORDER BY id desc" );  
								$xml.="<flash_parameters copyright=\"socusoftFSMTheme\">
										<preferences>
											<global>
												<basic_property movieWidth=\"900\" movieHeight=\"248\" groundinsize=\"0\" html_title=\"Title\" loadStyle=\"Pie\" startAutoPlay=\"true\" continuum=\"true\" socusoftMenu=\"false\" backgroundColor=\"0xfffbf0\" inbordercolor=\"0xffffff\" hideAdobeMenu=\"true\" photoDynamicShow=\"true\" enableURL=\"true\" transitionArray=\"\"/>
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
										$xml.="<slide d_URL=\"../upload/slider/".$row1['images']."\" transition=\"26\" panzoom=\"0\" URLTarget=\"0\" phototime=\"2\" url=\"\" title=\"".$row1['name']."\" width=\"900\" height=\"248\"/> \n";
									} 
										############# END LOOP ############ 
									$xml.="</album>
</flash_parameters>"; 
									/////////for creating xml file 
									$file_handle = fopen('../images/slides.xml','w');
									fwrite($file_handle,$xml);
									fclose($file_handle); 
					$_SESSION['sess_msg']='<div align=center class=correct>Image deleted successfully....</div>'; 
					header("Location: slider_gallery.php?start=".$_REQUEST['start']."&parent_id=".$_REQUEST['parent_id']);		
					exit; 
			 }
			  if(isset($_GET['ban']))
				{
					mysql_query("update slider1  set status=0 where id=".$_GET['ban']);
					$_SESSION['sess_msg']='<div align=center class=correct>Image Deactivated successfully....</div>';
					header("Location: slider_gallery.php?start=".$_REQUEST['start']."&parent_id=".$_REQUEST['parent_id']);		
					exit;
				}
				if(isset($_GET['unban']))
				{
					mysql_query("update slider1  set status=1 where id=".$_GET['unban']);
					$_SESSION['sess_msg']='<div align=center class=correct>Image Activated successfully....</div>';
					header("Location: slider_gallery.php?start=".$_REQUEST['start']."&parent_id=".$_REQUEST['parent_id']);		
					exit;
				}
				 
				$start=0;
				if(isset($_GET['start'])and $_GET['start']!='')$start=$_GET['start'];
				$pagesize=15; 
				$qry1=mysql_query("select *  from slider1")or die(mysql_error());
				$qry=mysql_query("select * from slider1 order by id DESC limit $start, $pagesize")or die(mysql_error()); 
				$reccnt=mysql_num_rows($qry1);  
				/**********************************************************************/
			  echo "<br>".$_SESSION['sess_msg']; 
           ?> 	<?  include("fckeditor/fckeditor.php");
if(isset($_REQUEST['page_id']))
{
$qry=mysql_query("select * from slider1 where id='".$_REQUEST['page_id']."'")or die(mysql_error());
$row=mysql_fetch_array($qry);}
if(isset($_REQUEST['update'])){
mysql_query("update slider1 set content='".addslashes($_POST['content'])."',name='".addslashes($_POST['title'])."',last_edit=now() where id='".$_POST['hidid']."'")or die(mysql_error()); 
$_SESSION['sess_msg']="Content updated successfully..";
header("Location:slider_gallery.php");
exit;
} ?>
                      <table width="98%" border="0" align="center" cellpadding="2" cellspacing="1">
                        <tr bgcolor="#0066CC">
                            
                          <td align="left" valign="top" bgcolor="#FFFFFF"> </td>
                          <td align="right" bgcolor="#FFFFFF"><a href="slider_add.php">Add New Image</a></td>
                        </tr>
						<? if($reccnt!=0){?>
                        
						<tr>
						 <td colspan="3" align="center" bgcolor="#FFFFFF">
                         
                         
                         
                         
                         
                         
                         	<? if(isset($_REQUEST['page_id'])){ ?> 
                            
                            <table width="100%" >
						<tr> 
						  <td><strong>Page Title :</strong></td>
						  <td> <input name="title" type="text" class="bodytext" id="title" size="80" value="<? if(isset($_GET['page_id'])) echo stripslashes($row['name']); else echo stripslashes($_POST['title']);?>"></td>
						</tr>
						<tr> 
						   <td colspan="2">&nbsp;</td>
						</tr>
						<tr> 
						  <td colspan="2">
							<? $oFCKeditor = new FCKeditor('content');
							   $oFCKeditor->BasePath = 'fckeditor/';
							   if(isset($row['content'])) $oFCKeditor->Value = stripslashes($row['content']); else $oFCKeditor->Value = stripslashes($content) ;
							   $oFCKeditor->Width  = '100%' ;
							   $oFCKeditor->Height = '450' ;
							   $oFCKeditor->Create();
							?>
							<input type="hidden" name="hidid" value="<? echo $_REQUEST['page_id']; ?>"> 
						  </td>
						</tr>
						<tr> 
						  <td height="44">&nbsp;</td>
						  <td><input name="update" type="submit" class="search" id="update2" onClick="return chk();" value="Update Content"></td>
						</tr>
					  </table>
						<? } else { ?>
						 <table width="100%" border="0" cellpadding="0" cellspacing="0">
						  <tr>
						  <? $i=$start+1; $count=0; $k=$i; while($row=mysql_fetch_array($qry)){ extract($row); $count++;?> 
							<td>
							 
						 	<table width="100%" border="0" cellpadding="3" cellspacing="3">
                            <tr><td width="4%" valign="top"><? echo $count; ?></td>
                            <td width="47%" align="center" valign="top"><a href="slider_gallery.php?page_id=<?=$row['id'];?>" title="Edit Content" style="color:#000;"><? echo $row['name']; ?></a></td>
                              <td width="43%" align="center">
							  <a href="../upload/slider/<? echo $row['images']; ?>">
							  	<img src="../upload/slider/<? echo $row['images']; ?>" alt="<? echo $row['name'];?>" width="162" height="129" border="0"></a><br> 
						  	  <strong><? echo $row['name'];?></strong>							  </td>
                           
                              <td width="6%" height="40" align="center">  <a href="slider_gallery.php?dele=<?  echo $id?>&start=<? echo $_REQUEST['start'] ?>&parent_id=<? echo $_REQUEST['parent_id'] ?>" onClick="return del();" title="Delete Category"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>
                                <? if($status==0){?>
                                <a href="slider_gallery.php?unban=<?  echo $id?>&start=<? echo $_REQUEST['start'] ?>&parent_id=<? echo $_REQUEST['parent_id'] ?>" title="Unban Category" ><img src="images/but_unban_small.gif" alt="Unban Category" width="22" height="22" border="0"></a>
                                <? }
						  else { ?>
                                <a href="slider_gallery.php?ban=<? echo $id?>&start=<? echo $_REQUEST['start'] ?>&parent_id=<? echo $_REQUEST['parent_id'] ?>" title="Ban Category"><img src="images/but_ban_small.gif" alt="Ban Category" width="22" height="22" border="0"></a>
                                <? } ?></td>
                            </tr>
                          </table>							</td>
							   <? if($k%1==0) echo "</tr><tr>"; ?>
							<? $i++; $k++;}}}?>
						  </tr>
						</table> <br> 
						<table width="98%" border="0" align="center" cellpadding="2" cellspacing="5">
                        <tr>
                          <td align="center" ><?   if($reccnt==0) { ?>
                              <span class="red">No Image Available...<a href="slider_add.php?parent_id=<? echo $_GET['parent_id'];?>" class="boldlisting">Add First</a></span>
                              <?
		}?>                          </td>
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