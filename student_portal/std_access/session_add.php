<?php   include("../con_base/functions.inc.php"); 
if(isset($_GET['edit']))
{
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from tbl_session  where id='$ty' ")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry);	
}
if(isset($_POST['go']))
{
mysqli_query($DB_LINK,"insert into tbl_session set  title='".addslashes($_POST['title'])."', posted_on=now(),  status=0 ")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Session Added Successfully";
header("Location: session_list");
exit;
}
if(isset($_POST['go2']))
{	 			 
mysqli_query($DB_LINK,"update tbl_session set title='".addslashes($_POST['title'])."',posted_on=now() where id='".$_POST['edit']."'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Session Updated Successfully";			
header("Location: session_list");
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
  <h1>Add / Update Session </h1>
  <form name="form1" method="post" action="session_add" id="formID" class="formular validationEngineContainer">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
       <tr>
        <td width="28%" height="22" align="left" class="hometext">Session :</td>
        <td width="72%"><input name="title" type="text" class="textbox validate[required] text-input" id="title" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['title']); else echo  stripslashes($title);?>" />
          <input type="hidden" value="<?php echo $_REQUEST['edit']?>" name="edit" id="edit" /></td>
      </tr>
       <?php /*?>  <tr>
        <td height="22" align="left" class="hometext" >Validity Days : </td>
        <td height="22" align="left" class="hometext" ><input name="days" type="text" class="textbox validate[required] text-input" id="days" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['days']); else echo  stripslashes($days);?>
" /></td>
      </tr>
   <tr>
        <td height="22" align="left" class="hometext" >Amount :</td>
        <td height="22" align="left" class="hometext" ><input name="descr" type="text" class="textbox validate[required] text-input" id="descr" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['descr']); else echo  stripslashes($descr);?>
"></td>
      </tr><?php */?>
     
      <tr>
        <td height="22" colspan="2" align="center"><?php if($_REQUEST['edit']!='') { ?>
          <input name="go2" type="submit" class="subm" id="go2" value="Update  " />
          <? }  else  { ?>
          <input name="go" type="submit" class="subm" id="go" value="Add " />
          <? } ?></td>
      </tr>
    </table>
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>
