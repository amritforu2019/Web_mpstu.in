<?php   include("../con_base/functions.inc.php");
if(isset($_REQUEST['add'])){
    $page = strtolower(clean('A New Page Added').'');
    if(mysqli_query($DB_LINK,"insert into  content set title='A New Page Added',page='$page' ")) {
        $_SESSION['sess_msg']="<span style='color:green; font-size:14px;'>Page Added successfully..</span>";
        header("Location:content_list");
        exit;
    }
    else {
        $_SESSION['sess_msg'] = "<span style='color:red; font-size:14px;'>Sorry !! Same page alraedy found</span>";
        header("Location:content_list");
        exit;
    }


}

if(isset($_REQUEST['page_id']))
{
$qry=mysqli_query($DB_LINK,"select * from content where id='".$_REQUEST['page_id']."'")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry);}

if(isset($_REQUEST['update'])){
    $page = strtolower(clean($_POST['title']).'');
    $sql="update content set content='".addslashes($_POST['content'])."', title='".addslashes($_POST['title'])."' ,  page='$page'   where id='".$_POST['hidid']."'";
    if(mysqli_query($DB_LINK,$sql)) {
        $_SESSION['sess_msg']="<span style='color:green; font-size:14px;'>Page Updated successfully..</span>";
        header("Location:content_list");
        exit;
    }
    else {
        $_SESSION['sess_msg'] = "<span style='color:red; font-size:14px;'>Sorry !! Same page alraedy found</span>";
        header("Location:content_list");
        exit;
    }
}

if(isset($_REQUEST['del_page_id'])){
	

mysqli_query($DB_LINK,"delete from content  where id='".$_REQUEST['del_page_id']."'")or die(mysqli_error($DB_LINK)); 
$_SESSION['sess_msg']="<span style='color:green; font-size:14px;'>Page Removed successfully..</span>";
header("Location:content_list");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<title><?php echo $ADMIN_HTML_TITLE;?></title>

<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			$(".submit").click(function(){
				jQuery("#formID").validationEngine('validate');
			})
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Change / Update Pages</h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer" enctype="multipart/form-data">

					  <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
					  	<?php if(isset($_SESSION['sess_msg'])) {?>

						<tr> 
						  <td colspan="2" align="center" class="correct">
							 <?php echo $_SESSION['sess_msg']; unset($_SESSION['sess_msg']);  ?>						  </td>
						</tr>
						<?php } ?>
						<tr><td height="10" colspan="2" align="right"><input name="add" type="submit" class="subm" id="add"   value="Add New Page"></td></tr>
						<?php if(isset($_REQUEST['page_id'])){ ?> 
						
						<tr> 
						  <td  >Page Title :</td>
						  <td  > <input name="title" type="text" class="textbox" id="title" size="80" value="<?php if(isset($_GET['page_id'])) echo stripslashes($row['title']); else echo stripslashes($_POST['title']);?>"></td>
						</tr>
                      <!--  <tr>
						  <td>Image If Needed :</td>
						  <td> <label for="uploaded_file"></label>
<input name="uploaded_file" type="file" class="textbox" id="uploaded_file"></td>
						</tr>-->
						<tr>
                            <td>Page Content : </td>
						  <td  >
							<textarea name="content"  id="content"><?php if(isset($_GET['page_id'])) echo stripslashes($row['content']); else echo stripslashes($_POST['content']);?></textarea>
                        <script type="text/javascript"> 

			CKEDITOR.replace( 'content',{

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
							
							<input type="hidden" name="hidid" value="<?php echo $_REQUEST['page_id']; ?>">						  </td>
						</tr>
						<tr> 
						  <td   colspan="2" align="center">
                              <input name="update" type="submit" class="subm" id="update2" onClick="return chk();" value="Update Content">
                          </td>
					    </tr>
					  </table>
						<?php } else { ?>
					 <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF"> 
				    <tr> 
                      <td width="7%" align="center"  bgcolor="#add8f8">SNo.</td>
                      <td width="34%"  bgcolor="#add8f8" >Title</td>
                      <td width="34%"  bgcolor="#add8f8" >Page Url</td>
<!--<td width="21%" align="center"  bgcolor="#add8f8">Img</td>-->
					  <td   align="center"  bgcolor="#add8f8">Last Edited</td>
                      <td width="11%" align="center"  bgcolor="#add8f8">Action</td>
                    </tr>
                   <?php
				   $query_content=mysqli_query($DB_LINK,"select * from content order by page asc");
				   $reccnt=mysqli_num_rows($query_content);
				   $k=1;
				   while($content_res=mysqli_fetch_array($query_content)){
				   @extract($content_res);?>
				    <tr > 
                      <td align="center" > 
                        <?php echo $k;?>.                      </td>
                      <td><a href="content_list.php?page_id=<?php echo $id;?>" title="Edit Content" style="color:#000;"><?php echo ucfirst($content_res['title']);?></a></td>
                        <td> <?php echo ($content_res['page']);?> </td>
                        <!--<td align="center">
                            <?php /*if($content_res['img']!='') { */?>
                                <img src="../upload/flash_images/<?php /*echo $content_res['img']; */?>" height="60" /> <br/
                            <a href="content_list.php?imgr=<?php /*echo $id;*/?>">Remove Image</a>
                            <?php /*} else echo 'No Image'; */?>
                        </td>-->
					  <td align="center"> <?php echo date_dmy($content_res['last_edit']);?></td>
                      <td align="center"> <a href="content_list.php?page_id=<?php echo $id;?>">
                              <i class="fas fa-edit color-slateblue"></i>
                          </a>
                    <?php if($_SESSION['master_username']=='Developer') { ?>
                        <a href="content_list.php?del_page_id=<?php echo $id;?>" onClick="return del()">
                            <i class="fas fa-trash-alt color-tomato"></i>
                        </a>
                    <?php } ?>
                      </td>
                    </tr>
					<?php $k++; }?>
                  </table>
				 <?php } ?> 
       
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<?php ob_end_flush(); ?>