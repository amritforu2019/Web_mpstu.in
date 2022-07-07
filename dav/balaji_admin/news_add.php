<? ob_start();
require_once("../config/functions.inc.php") ;
require_once("fckeditor/fckeditor.php") ;
validate_admin();
unset($_SESSION['dup_caption']);
?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 
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
<style type="text/css">
.style1 {font-weight: bold}
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
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E1F0FF">
	    <tr bgcolor="#e1f0ff">
	      <td height="29" bgcolor="#66CCCC" class="heading"><strong>Add  New &amp; Updates:</strong></td>
	      </tr>
	    <tr>
	      <td height="252" bgcolor="#FFFFFF"><form name="form1" method="post" action="news_add.php">
	        <p>
	          <?
			  
			  if(isset($_GET['edit']))
			  {
				  $_SESSION['naukri']=$_GET['edit'];
				  $ty=$_GET['edit'];
				  $qry=mysql_query("select * from news  where id='$ty' ")or die(mysql_error());
				  $row=mysql_fetch_array($qry);
				  $_SESSION['city']=$row['city'];
				  $cid=$_SESSION['city'];
				  
		      }
			  if(isset($_POST['go']))
			  {
			 	  
			   	  
				if(!isset($_SESSION['naukri']))
				  	{
						//////////////////////////////////////////////////////////////////////////////
						//////////////////Checking for duplicate caption name/////////////////////////
						/////////////////////////////////////////////////////////////////////////////
						
						
					
						/////////////////////////////////////////////////////////////////////////////////////////
						 if(!isset($_SESSION['naukri']))
						{
			  
				  mysql_query("insert into news set  title='".addslashes($_POST['title'])."', posted_on=now(), descr='".addslashes($_POST['descr'])."',  status=1")or die(mysql_error());
				  $sess_msg="News Added Successfully";
				  $_SESSION['sess_msg']=$sess_msg;
				  header("Location: news_list.php?parent_id=".$_POST['parent_id']);
				  }
			  }
			  else
			  {
			  //////////////////////////////////////////////////////////////////////////////
					//////////////////Checking for duplicate caption name/////////////////////////
					/////////////////////////////////////////////////////////////////////////////
				
				/////////////////////////////////////////////////////////////////////////////////////////
				 if($_SESSION['naukri'])
				 {
			 
			   $bn=stripslashes($_SESSION['naukri']);
			 
			  mysql_query("update news set title='".addslashes($_POST['title'])."',posted_on=now(), descr='".addslashes($_POST['descr'])."' where id='$bn'")or die(mysql_error());
			 $sess_msg="News Updated Successfully";
			 unset($_SESSION['naukri']);
	          $_SESSION['sess_msg']=$sess_msg;
			  header("Location: news_list.php?parent_id=".$_POST['parent_id']);
			  }
			   }
			  } 
			  
			  ?>
	          </p>
	        <p></p>
	        <table width="100%" border="0" cellspacing="4" cellpadding="2">
	          <tr>
	            <td height="22" class="hometext"><div align="right" class="smalltext style1">
	              <div align="right">Title :</div>
	              </div></td>
	            <td><input name="title" type="text" class="bodytext" id="cname" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['title']); else echo  stripslashes($title);?>"></td>
	            </tr>
                 
	          <tr>
	            <td height="22" colspan="2" class="hometext" ><strong>&nbsp;&nbsp;Description : </strong></td>
	            </tr>
	          <tr  >
	            <td height="22" colspan="2" >
				<textarea name="descr"  id="descr"><? echo stripslashes($row['descr']);?></textarea>
                      <script type="text/javascript"> 

			CKEDITOR.replace( 'descr',{

				toolbar :

						[

							

							

						

							{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },

							{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', ] },

							{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },

							{ name: 'colors', items : [ 'TextColor','BGColor' ]}, 

							

							'/',

							{ name: 'document', items : [ 'Source','-','Preview','Print','-'] },

							{ name: 'tools', items : [ 'Maximize'] },

							{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },

							{ name: 'editing', items : [ 'Find','Replace','-','SpellChecker'] }, 

							{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','SpecialChar' ] },

							{ name: 'links', items : [ 'Link','Unlink','Anchor' ] }  

							

						],

	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

	filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

});



            </script>
				
				</td>
	            </tr>
	          <tr>
	            <td width="28%" height="22">&nbsp;</td>
	            <td width="72%"><input name="go" type="submit" class="button" id="go2" value="<? if(isset($_SESSION['naukri'])) echo  "Update"; else echo  "Add"?> New &amp; Updates" onClick="return chk();"></td>
	            </tr>
	          </table>
	        <p>&nbsp;</p>
	        </form></td>
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