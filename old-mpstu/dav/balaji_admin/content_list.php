<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
include("fckeditor/fckeditor.php");
if(isset($_REQUEST['page_id']))
{
$qry=mysql_query("select * from content where id='".$_REQUEST['page_id']."'")or die(mysql_error());
$row=mysql_fetch_array($qry);}
if(isset($_REQUEST['update'])){
require_once("uploader.php");
if(isset($_FILES['uploaded_file']))
{
upload("../upload/flash_images/");
if($finame!="")
{ 
$where = ", img='$finame'";
}
}
mysql_query("update content set content='".addslashes($_POST['content'])."',title='".addslashes($_POST['title'])."',last_edit=now() $where where id='".$_POST['hidid']."'")or die(mysql_error()); 
$_SESSION['sess_msg']="Content updated successfully..";
header("Location:content_list.php");
exit;
}
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
                   <td height="30" colspan="2" bgcolor="#0c5994" class="heading"><strong><? if(isset($_REQUEST['page_id'])){echo $row['page'];} else {echo'Content Management';}?></strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form name="form1" method="post" action="content_list.php" enctype="multipart/form-data">
					  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
					  	<? if($_SESSION['sess_msg']) {?>
						<tr>
							<td height="10" colspan="2"></td>
						</tr>
						<tr> 
						  <td colspan="2" align="center" class="correct">
							 <? echo $_SESSION['sess_msg'];  ?>						  </td>
						</tr>
						<? } ?>
						<tr><td height="10" colspan="2"></td></tr>  
						<? if(isset($_REQUEST['page_id'])){ ?> 
						<tr>
						  <td><strong>Image :</strong></td>
						  <td><input name="uploaded_file" type="file" id="uploaded_file" size="30"></td>
					    </tr>
						<tr> 
						  <td><strong>Page Title :</strong></td>
						  <td> <input name="title" type="text" class="bodytext" id="title" size="80" value="<? if(isset($_GET['page_id'])) echo stripslashes($row['title']); else echo stripslashes($_POST['title']);?>"></td>
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
					 <table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#FFFFFF"> 
				    <tr> 
                      <td width="8%" bgcolor="#add8f8" align="center"><strong>SNo.</strong></td>
                      <td  bgcolor="#add8f8" class="text2"><strong>Page</strong></td>
					  <td width="28%" bgcolor="#add8f8" align="center"><strong>Last Edited</strong></td>
                      <td width="15%" bgcolor="#add8f8" align="center"><strong>Edit</strong></td>
                    </tr>
                   <?php
				   $query_content=mysql_query("select * from content order by page asc");
				   $reccnt=mysql_num_rows($query_content);
				   $k=1; while($content_res=mysql_fetch_array($query_content)){
				   @extract($content_res);?>
				    <tr <?php if($k%2==0)echo 'bgcolor="#FFFFFF"';else echo'bgcolor="#F2F2F2"';?>> 
                      <td align="center" bgcolor="#f2f2f2" class="text2"> 
                        <?php echo $k;?>.                      </td>
                      <td bgcolor="#f2f2f2"><a href="content_list.php?page_id=<?=$id;?>" title="Edit Content" style="color:#000;"><?php echo ucfirst($content_res['page']);?></a></td>
					  <td align="center" bgcolor="#f2f2f2"> <?php echo date_dmy($last_edit);?></td>
                      <td align="center" bgcolor="#f2f2f2"> <a href="content_list.php?page_id=<?=$id;?>"><img src="images/but_edit_small.gif" alt="Edit Details" width="22" height="22" border="0"></a></td>
                    </tr>
					<?php $k++; } ?>  
                  </table>
				 <? } ?> 
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