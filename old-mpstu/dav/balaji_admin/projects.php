
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
    <td width="750" align="center">
	<div id="mid"> 
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#f0becf">
              <tr bgcolor="e77817">
                <td height="29" bgcolor="#5287BD" class="heading"><strong>Edit / Add Latest Projects</strong></td>
              </tr>
              <tr>
                <td height="252" bgcolor="#FFFFFF"><form name="form1" method="post" action="" enctype="multipart/form-data">
                  <?  

			if($_REQUEST['id']!='')
			{

						  $qry=mysql_query("select * from project where id='".$_REQUEST['id']."'  ")or die(mysql_error());

						  $row=mysql_fetch_array($qry);
			}

						
					
	  if(isset($_POST['go2']))

					  {		 require_once("uploader.php");	
		 
if(isset($_FILES['uploaded_file']))
									{
										upload("../upload/flash_images/");
										
										if(mysql_query("update project set name='".addslashes($_POST['name'])."',`typ` ='".addslashes($_POST['typ'])."',`city` ='".addslashes($_POST['city'])."',`add`='".addslashes($_POST['add'])."' ,`state`='".addslashes($_POST['state'])."' ,`description`='".addslashes($_POST['description'])."' ,`img` ='$finame',`map`='".addslashes($_POST['map'])."' ,`descr`='".addslashes($_POST['descr'])."' ,`fac`='".addslashes($_POST['fac'])."' where id='".addslashes($_POST['hidid'])."'"))
								{
									echo "<script>alert('Project updated');location.href='pro_list.php';</script>";
								}
									}
									else
									{
												if(mysql_query("update project set name='".addslashes($_POST['name'])."',`typ` ='".addslashes($_POST['typ'])."',`city` ='".addslashes($_POST['city'])."',`add`='".addslashes($_POST['add'])."' ,`state`='".addslashes($_POST['state'])."' ,`description`='".addslashes($_POST['description'])."' ,`map`='".addslashes($_POST['map'])."' ,`descr`='".addslashes($_POST['descr'])."' ,`fac`='".addslashes($_POST['fac'])."' where id='".addslashes($_POST['hidid'])."'"))
								{
									echo "<script>alert('Project updated Successfully');location.href='pro_list.php';</script>";
								}
									}
							

						} 
						
						 if(isset($_POST['go']))
					  {		
					  require_once("uploader.php");
									if(isset($_FILES['uploaded_file']))
									{
										upload("../upload/flash_images/");
								if(mysql_query("insert into project set name='".addslashes($_POST['name'])."',`typ` ='".addslashes($_POST['typ'])."',`city` ='".addslashes($_POST['city'])."',`add`='".addslashes($_POST['add'])."' ,`state`='".addslashes($_POST['state'])."' ,`description`='".addslashes($_POST['description'])."' ,`img` ='$finame',`map`='".addslashes($_POST['map'])."' ,`descr`='".addslashes($_POST['descr'])."' ,`fac`='".addslashes($_POST['fac'])."' "))
								{
									echo "<script>alert('Project Add');location.href='pro_list.php';</script>";
								}
								
								}
								else
								{
									echo "<script>alert('Select image');</script>";
								}
								
					} 

						 

					?><input type="hidden" name="hidid" value="<? echo $_REQUEST['id']; ?>"> 
             
                  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                    <!--<tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Thumbnail :</strong></td>
                      <td><input name="uploaded_file_small" type="file" id="uploaded_file_small" size="32"></td>
                    </tr>-->
                    <tr>
                      <td width="23%" height="22" align="right" nowrap class="hometext"><strong>Project Name</strong></td>
                      <td colspan="2"><input name="name" type="text" id="name" value="<? echo stripslashes($row['name']);?>"></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>City</strong></td>
                      <td><strong>
                      <input name="city" type="text" id="city" value="<? echo stripslashes($row['city']);?>">
                      </strong></td>
                      <td align="center"><?  if($_REQUEST['id']!=''){ ?><strong> Old Image</strong><? }?></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>State</strong></td>
                      <td><strong>
                      <input name="state" type="text" id="state" value="<? echo stripslashes($row['state']);?>">
                      </strong></td>
                      <td align="center"></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Description</strong></td>
                      <td width="42%"><textarea name="description" cols="50" rows="2" id="description" ><? echo stripslashes($row['description']);?></textarea></td>
                      
                      
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Location Address</strong></td>
                      <td width="42%"><textarea name="add" cols="50" rows="5" id="add" ><? echo stripslashes($row['add']);?></textarea></td>
                      
                      <td width="35%" rowspan="4" valign="top"><?	if($_REQUEST['id']!=''){ ?><a href="../upload/flash_images/<?  echo stripslashes($row['img']);?>" > <img src="../upload/flash_images/<?  echo stripslashes($row['img']);?>" width="220" height="188" hspace="0" vspace="0"></a>
<?
			}?></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Project Type</strong></td>
                      <td><select name="typ" id="typ">
                        <option selected>--Select--</option>
                        <option <? if ($row['typ']=='Commercial') echo 'selected';?>>Commercial</option>
                        <option <? if ($row['typ']=='Residential') echo 'selected';?>>Residential</option>
                      </select></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Main Image</strong></td>
                      <td><input name="uploaded_file" type="file" id="uploaded_file" size="30"></td>
                    </tr>
                    <tr>
                      <td height="22" align="right" nowrap class="hometext"><strong>Location Map Code</strong></td>
                      <td><textarea name="map" cols="50" rows="5" id="map" ><? echo stripslashes($row['map']);?></textarea></td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3" align="center" nowrap class="hometext"><strong>Project description</strong></td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3" align="center" nowrap class="hometext"><strong>
                      <? $oFCKeditor = new FCKeditor('descr');
							   $oFCKeditor->BasePath = 'fckeditor/';
							   if(isset($row['descr'])) $oFCKeditor->Value = stripslashes($row['descr']); else $oFCKeditor->Value = stripslashes($descr) ;
							   $oFCKeditor->Width  = '100%' ;
							   $oFCKeditor->Height = '250' ;
							   $oFCKeditor->Create();
							?>
                      </strong></td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3" align="center" nowrap class="hometext"><span class="hometext"><strong>Facilities</strong></span></td>
                    </tr>
                    <tr>
                      <td height="22" colspan="3" align="center" nowrap class="hometext"><strong>
                        <? $oFCKeditor = new FCKeditor('fac');
							   $oFCKeditor->BasePath = 'fckeditor/';
							   if(isset($row['fac'])) $oFCKeditor->Value = stripslashes($row['fac']); else $oFCKeditor->Value = stripslashes($fac) ;
							   $oFCKeditor->Width  = '100%' ;
							   $oFCKeditor->Height = '250' ;
							   $oFCKeditor->Create();
							?>
                      </strong></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center" nowrap class="hometext">
                      <?
                      	if($_REQUEST['id']!='')
						{
		
					  ?>
                       <input name="go2" type="submit" class="button" id="go2" value="Update Projects" onClick="return chk();"></td>
                
                      <?
                      
						}
						else
						{
						?>
                         <input name="go" type="submit" class="button" id="go" value="Add  Projects" onClick="return chk();">
                    
                        <? }?>
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