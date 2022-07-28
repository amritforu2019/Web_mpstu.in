<?php ob_start();  include("../con_base/functions.inc.php"); master(); ?>
<?

if(isset($_POST["upd"]))
{
 
 $partyqry="update  `tbl_student` set   `category` ='".$_POST["category"]."' , `seat` ='".$_POST["seat"]."' , `course` ='".$_POST["course"]."' , 
`fee`='".$_POST["fee"]."'  ,`student_id` ='".$_POST["student_id"]."', `enr_no` ='".$_POST["enr_no"]."' ,  `name` 
='".$_POST["name"]."' , `f_name`='".$_POST["f_name"]."', `cont` ='".$_POST["cont"]."', `cont2`  ='".$_POST["cont2"]."', 
`religion` ='".$_POST["religion"]."' ,  `year`='".$_POST["year"]."'  , `subject` ='".$_POST["subject"]."' ,  `address` 
='".$_POST["address"]."',dob ='".$_POST["dob"]."' , fee ='".$_POST["fee"]."'   where `id`='".$_POST["edit"]."'  ";
 

if(mysql_query($partyqry))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Updated Successfully";
	?>
<script>
location.href="student_list";
</script>
<?php
}
exit;
}


if(isset($_POST["save"]))
{
 
 echo $partyqry="INSERT INTO  `tbl_student` set `session` ='".$_POST["session"]."' , `category` ='".$_POST["category"]."' , `seat` ='".$_POST["seat"]."' , `course` ='".$_POST["course"]."' , 
`fee`='".$_POST["fee"]."' ,`on_dt`='".date("Y-m-d")."' ,`student_id` ='".$_POST["student_id"]."', `enr_no` 
='".$_POST["enr_no"]."' ,  `name` ='".$_POST["name"]."' , `f_name`='".$_POST["f_name"]."', `cont` ='".$_POST["cont"]."', 
`cont2`  ='".$_POST["cont2"]."', `religion` ='".$_POST["religion"]."' ,  `year`='".$_POST["year"]."'  , `subject` ='".$_POST["subject"]."' ,  `address` ='".$_POST["address"]."'  ,is_act='1' ,dob ='".$_POST["dob"]."'  ";
 

if(mysql_query($partyqry))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Saved Successfully";
?>
<script>
location.href="student_list";
</script>
<?php  } 
exit;
} 


if(($_REQUEST['del'])!=''){
mysql_query("delete from tbl_student where id=".$_REQUEST['del']." ");
header("Location:student_list");
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Deleted Successfully";
exit;}



if($_REQUEST['edit']!='')
{
	$serchqry="select * from tbl_student where id='".$_REQUEST['edit']."' ";
	$qs=mysql_query($serchqry);
	$editrow=mysql_fetch_array($qs);
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="modernizr.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script>
function sbb(val)
{
	if(val!='')
	{
		location.href='master_product.php?brand='+val;
	}
}
</script>
<title><?php echo $ADMIN_HTML_TITLE;?></title>
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css" />
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css" />
<script src="codebase/dhtmlxcalendar.js"></script>
<script>
var myCalendar;
function doOnLoad() {
    myCalendar = new dhtmlXCalendarObject(["doj", "dob", "doe"]);
}


</script>
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
<body onLoad="doOnLoad()">
<?php include('header.php');?>
<div class="conten">
<h1> Student Entry</h1>
  <form action="" method="post"  enctype="multipart/form-data" name="productform" id="formID" class="formular validationEngineContainer">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
     
      <tr>
       <td colspan="2" align="center"><?  echo $_SESSION['msg']; unset($_SESSION['msg']);?></td>
      </tr>
      <tr>
       <td width="31%">Session</td>
        <td width="69%"><select name="session" id="session"   class="textbox validate[required] "  >
         <option value=""  >Select Session</option>
         <? $country_qry=mysql_query("select * from tbl_session  order by id asc")or die(mysql_error());
 while($country_fetch=mysql_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if( $country_fetch['status']==1 ||$editrow['session']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select>
<input name="edit" type="hidden" class="textbox" id="edit"   value="<?php echo $editrow['id']; ?>"/></td>
      </tr>
      <tr>
       <td>Category</td>
        <td>
<select name="category" class="textbox validate[required] " id="category">
<option value="" >..Select Category..</option>
 <? $country_qry=mysql_query("select * from tbl_category  order by id asc")or die(mysql_error());
 while($country_fetch=mysql_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['category']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
</select></td>
      </tr>
      <tr>
       <td>Seat Type</td>
        <td><select name="seat" class="textbox validate[required] " id="seat">
          <option value="" >..Select Seat..</option>
          <? $country_qry=mysql_query("select * from tbl_seat  order by id asc")or die(mysql_error());
 while($country_fetch=mysql_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['seat']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <? } ?>
         </select></td>
      </tr>
      <tr>
       <td>Course</td>
        <td><select name="course" id="course"   class="textbox validate[required] "  >
         <option value=""  >Select Course</option>
         <? $country_qry=mysql_query("select * from tbl_course  order by title asc")or die(mysql_error());
 while($country_fetch=mysql_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select></td>
      </tr>
      <tr>
       <td>Student ID</td>
       <td><input name="student_id" type="text" class="textbox   " id="student_id"   value="<?php echo $editrow['student_id']; ?>"/></td>
      </tr>
      <tr>
       <td>Enrollment No.</td>
       <td><input name="enr_no" type="text" class="textbox validate[required] " id="enr_no"   value="<?php echo $editrow['enr_no']; ?>"/></td>
      </tr>
      <tr>
       <td>Date Of Bith</td>
       <td><input name="dob" type="text" class="textbox validate[required] " id="dob"   value="<?php if($editrow['dob']!='0000-00-00') { echo $editrow['dob'];  } ?>"/></td>
      </tr>
      <tr>
       <td>Name</td>
       <td><input name="name" type="text" class="textbox validate[required] " id="name"   value="<?php echo $editrow['name']; ?>"/></td>
      </tr>
      <tr>
       <td>Father's Name</td>
       <td><input name="f_name" type="text" class="textbox validate[required] " id="f_name"   value="<?php echo $editrow['f_name']; ?>"/></td>
      </tr>
      <tr>
       <td>Contact No</td>
       <td><input name="cont" type="number" class="textbox validate[required] " id="cont"   value="<?php echo $editrow['cont']; ?>"/></td>
      </tr>
      <tr>
       <td>Alternate Contact No</td>
       <td><input name="cont2" type="number" class="textbox   " id="cont2"   value="<?php echo $editrow['cont2']; ?>"/></td>
      </tr>
      <tr>
       <td>Religion</td>
       <td><select name="religion" class="textbox validate[required] " id="religion">
        <option value="" >..Select religion..</option>
        <? $country_qry=mysql_query("select * from tbl_religion  order by id asc")or die(mysql_error());
 while($country_fetch=mysql_fetch_array($country_qry)) { ?>
        <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['religion']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
        <?  } ?>
       </select></td>
      </tr>
      <tr>
       <td>Subject</td>
       <td><input name="subject" type="text" class="textbox validate[required] " id="subject"   value="<?php echo $editrow['subject']; ?>"/></td>
      </tr>
      <tr>
       <td>Year</td>
       <td><input name="year" type="text" class="textbox validate[required] " id="year"   value="<?php echo $editrow['year']; ?>"/></td>
      </tr>
      <tr>
       <td>Address</td>
       <td><textarea name="address" class="textbox validate[required] " id="address"><?php echo $editrow['address']; ?></textarea></td>
      </tr>
        <tr>
            <td>Fees</td>
            <td><input name="fee" type="number" class="textbox validate[required] " id="fee"   value="<?php echo $editrow['fee']; ?>"/></td>
        </tr>
      <tr>
       <td colspan="2" align="center"><?php if($_REQUEST['edit']!='') { ?>
         <input name="upd" type="submit" class="subm" id="upd"  value="Update : <?php echo $editrow['name']; ?>"/>
         <?php } else { ?>
         <input name="save" type="submit" class="subm" id="save"  value="Save"/>
        <?php } ?></td>
      </tr>
    </table>
 
 </form>
 <?php /*?> <br />
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0" align="center">
 
      
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >SN</td>
        <td   align="left" bgcolor="#E1FEFF">Course</td>
        <td   align="left" bgcolor="#E1FEFF">Seat</td>
        <td align="left" bgcolor="#E1FEFF">Category</td>
        <td   align="left" bgcolor="#E1FEFF">Session</td>
        <td  align="right" bgcolor="#E1FEFF" >Fees</td>
        <td align="center" bgcolor="#E1FEFF" >Info</td>
        <td  align="left" bgcolor="#E1FEFF" >On_date</td>
        <td  align="center" bgcolor="#E1FEFF" >Action</td>
      </tr>
      <?php
	 /* if(isset($_POST['searchdata']))
	  {
	  $where=" where name like '%".$_POST['txtserch']."%' or fname like '%".$_POST['txtserch']."%' or regno like '%".$_POST['txtserch']."%'  ";
	  } /
	   $q=1;
      	$qry=mysql_query("select * from tbl_fee $where order by course asc")or die(mysql_error()); 
		$counter=mysql_num_rows($qry);  
		while($row=mysql_fetch_array($qry)){ extract($row);		
	  ?>
      <tr>
        <td align="left"  ><?php echo $q++; ?></td>
        <td align="left"  ><?php echo $row["course"]; ?></td>
        <td align="left"  ><?php echo $row["seat"]?></td>
        <td align="left"  ><?php echo $row["category"]?></td>
        <td  align="left"  ><?php echo $row["session"]?> </td>
       <td align="right"  > <?php echo $row["fee"]?><br /></td>
        <td align="center"  ><?php echo $row["info"]?></td>
        <td align="left"  ><?php echo $row["on_dt"]?></td>
       <td align="center"  ><a title="Delete Record" href="student_list?del=<?php echo $row["id"];?>" onClick="return del();"><img src="images/del.png" /></a>   &nbsp;<a  title="Edit record" href="student_list?edit=<?php echo $row["id"];?>" ><img src="images/edit.png" /></a> </td>
      </tr>
      
      <? }  ?>
    </table>
 </form><?php */?>
</div>
<?php include('footer.php');?>
</body>
</html>
