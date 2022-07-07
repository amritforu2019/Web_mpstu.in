<?php   include("../con_base/functions.inc.php"); 
if(isset($_GET['edit']))
{
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from tbl_course  where id='$ty' ")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry);	
}
if(isset($_POST['go']))
{
mysqli_query($DB_LINK,"insert into tbl_course set 
 title='".addslashes($_POST['title'])."',
 branch='".addslashes($_POST['branch'])."',
 duration='".addslashes($_POST['duration'])."',
    status=0 ")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Course Added Successfully";
header("Location: course_list");
exit;
}
if(isset($_POST['go2']))
{	 			 
mysqli_query($DB_LINK,"update tbl_course set 
                      title='".addslashes($_POST['title'])."',
                      branch='".addslashes($_POST['branch'])."',
                      duration='".addslashes($_POST['duration'])."'
                       
                       where id='".$_POST['edit']."'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Course Updated Successfully";			
header("Location: course_list");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
 
<title><?php if(isset($_REQUEST['edit'])) echo 'Update'; else echo 'Add'; ?> Course / Programme </title>
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
  <h1><?php if(isset($_REQUEST['edit'])) echo 'Update'; else echo 'Add'; ?> Course / Programme </h1>
  <form name="form1" method="post" action="course_add" id="formID" class="formular validationEngineContainer">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
       <tr>
        <td width="28%" height="22" align="left" class="hometext">Course Name / Programme Name :</td>
        <td width="72%"><input name="title" type="text" class="textbox validate[required] text-input" id="title" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['title']);  ?>" />
          <input type="hidden" value="<?php echo $_REQUEST['edit']?>" name="edit" id="edit" /></td>
      </tr>
        <tr>
            <td width="28%" height="22" align="left" class="hometext">Branch :</td>
            <td width="72%"><input name="branch" type="text" class="textbox validate[required] text-input" id="branch" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['branch']);  ?>" />
               </td>
        </tr>

        <tr>
            <td>Year / Semester</td>
            <td><select name="duration" id="duration"   class="textbox validate[required] "  >
                    <option value=""  >Select Duration</option>
                    <?php
                    for($k=1;$k<=8;$k++)
                    {?>
                    <option value="<?php echo $k?>" <?php if(  $row['duration']==$k) echo "selected";?>><?php echo $k?></option>
                    <?php  } ?>

                </select></td>
        </tr>
     
     
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
