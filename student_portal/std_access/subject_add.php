<?php   include("../con_base/functions.inc.php"); 
if(isset($_GET['edit']))
{
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from tbl_course_subject  where id='$ty' ")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry);	
}
if(isset($_POST['go']))
{
mysqli_query($DB_LINK,"insert into tbl_course_subject set 
 title='".addslashes($_POST['title'])."',
 year='".addslashes($_POST['year'])."',   
 course='".addslashes($_POST['course'])."',   
 session='".addslashes($_POST['session'])."',   
 status=1 ")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Subject Added Successfully";
header("Location: subject_add");
exit;
}
if(isset($_POST['go2']))
{	 			 
mysqli_query($DB_LINK,"update tbl_course_subject set 
                      title='".addslashes($_POST['title'])."',
                      year='".addslashes($_POST['year'])."', 
                      course='".addslashes($_POST['course'])."' ,
                      session='".addslashes($_POST['session'])."' 
                      where id='".$_POST['edit']."'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Subject Updated Successfully";
header("Location: subject_list");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
 
<title><?php if(isset($_REQUEST['edit'])) echo 'Update'; else echo 'Add'; ?> Subject </title>
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
  <h1><?php if(isset($_REQUEST['edit'])) echo 'Update'; else echo 'Add'; ?> Subject </h1>
  <form name="form1" method="post" action="subject_add" id="formID" class="formular validationEngineContainer">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
            <td colspan="2" align="center" ><div align="center"><?php echo  stripslashes($_SESSION['sess_msg']); unset($_SESSION['sess_msg']); unset($_SESSION['errorclass']);?></div></td>
        </tr>
       <tr>
        <td    class="hometext">Subject Name  :</td>
        <td ><input name="title" type="text" class="textbox validate[required] text-input" id="title" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['title']);  ?>" />
          <input type="hidden" value="<?php echo $_REQUEST['edit']?>" name="edit" id="edit" /></td>
      </tr>
        <tr>
            <td>Year / Semester</td>
            <td><select name="year" id="year"   class="textbox validate[required] "  >
                    <option value=""  >Select Year / Semester</option>
                    <?php
                    for($k=1;$k<=8;$k++)
                    {?>
                        <option value="<?php echo $k?>" <?php if(  $row['year']==$k) echo "selected";?>><?php echo $k?></option>
                    <?php  } ?>

                </select></td>
        </tr>

        <tr>
            <td>Course</td>
            <td><select name="course" id="course"   class="textbox validate[required] "  >
                    <option value=""  >Select Course</option>
                    <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_course  order by title asc")or die(mysqli_error($DB_LINK));
                    while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
                        <option value="<? echo $country_fetch['title']?>" <? if(  $row['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
                    <?  } ?>
                </select></td>
        </tr>

        <tr>
            <td  >Session</td>
            <td  ><select name="session" id="session"   class="textbox validate[required] "  >
                    <option value=""  >Select Session</option>
                    <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_session    order by id asc")or die(mysqli_error($DB_LINK));
                    while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
                        <option value="<? echo $country_fetch['title']?>" <? if( $country_fetch['status']==1 ||$row['session']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
                    <?  } ?>
                </select>
                 </td>
        </tr>
     
     
      <tr>
          <td  > </td>
        <td   ><?php if($_REQUEST['edit']!='') { ?>
          <input name="go2" type="submit" class="subm" id="go2" value="Update  " />
          <? }  else  { ?>
          <input name="go" type="submit" class="subm" id="go" value="Add " />
          <? } ?></td>
      </tr>
        <tr><td  > </td>
            <td    align="right">
                <a href="subject_list" class="subm"   >Subject List</a>
                </td>
        </tr>
    </table>
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>
