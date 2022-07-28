<?php   include("../con_base/functions.inc.php");   ?>
<?

if(isset($_POST["upd"]))
{
 
 
$partyqry="update `tbl_fee`  set   `category` ='".$_POST["category"]."' , `seat` ='".$_POST["seat"]."' , `course` ='".$_POST["course"]."' , `fee` ='".$_POST["fee"]."' ,`info` ='".$_POST["info"]."',on_dt='".date("Y-m-d")."'  where `id`='".$_POST["edit"]."'";

if(mysqli_query($DB_LINK,$partyqry))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Updated Successfully";
	?>
<script>
location.href="student_import";
</script>
<?php
}
exit;
}


if(isset($_POST["save"]))
{
 
 
 $i=0;
	$j=0;
    $filename=$_FILES["file2"]["tmp_name"];
    if($_FILES["file2"]["size"] > 0)
    { 
		
      $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {  
		$i++;
		if($i>1)
		{

$partyqry="INSERT INTO  `tbl_student` set `session` ='".$_POST["session"]."' , `category` ='".$emapData[10]."' , `seat` ='".$_POST["seat"]."' , `course` ='".$_POST["course"]."' , 
`fee`='".$emapData[12]."' ,`on_dt`='".date("Y-m-d")."' ,`student_id` ='".$emapData[0]."', `enr_no` ='".$emapData[1]."' ,  `name` ='".$emapData[6]."' , `f_name`='".$emapData[7]."', `cont` ='".$emapData[8]."' , `cont2`  ='".$emapData[9]."', `religion` ='".$emapData[11]."' , 
`year`='".$emapData[5]."'  , `subject` ='".$emapData[4 ]."' ,  `address` ='".$emapData[13]."'
 ,is_act='1' ,dob ='".date("Y-m-d",strtotime($emapData[14]))."'   ";
        
		if(mysqli_query($DB_LINK,$partyqry))
		   {
			   $j++;
		   }
		   
		 }     
        
    }
	fclose($file);
    }
	
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Total ".$i." Record found. Total ".$j." Record Saved Successfully";
?>
<script>
location.href="student_import";
</script>
<?php   
exit;
} 


if(($_REQUEST['del'])!=''){
mysqli_query($DB_LINK,"delete from tbl_fee where id=".$_REQUEST['del']." ");
header("Location:student_import");
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Deleted Successfully";
exit;}



if($_REQUEST['edit']!='')
{
	$serchqry="select * from tbl_fee where id='".$_REQUEST['edit']."' ";
	$qs=mysqli_query($DB_LINK,$serchqry);
	$editrow=mysqli_fetch_array($qs);
	
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
<h1> Fees Create / Update / List</h1>
  <form action="" method="post"  enctype="multipart/form-data" name="productform" id="formID" class="formular validationEngineContainer">
    <table width="40%" border="0" align="center" cellpadding="5" cellspacing="0">
     
      <tr>
        <td align="center"><?  echo $_SESSION['msg']; unset($_SESSION['msg']);?></td>
      </tr>
      <tr>
        <td align="center"><select name="session" id="session"   class="textbox validate[required] "  >
         <option value=""  >Select Session</option>
         <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_session  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if( $country_fetch['status']==1 ||$editrow['session']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select>
<input name="edit" type="hidden" class="textbox" id="edit"   value="<?php echo $editrow['id']; ?>"/></td>
      </tr>
      <tr>
        <td align="center"><select name="course" id="course"   class="textbox validate[required] "  >
         <option value=""  >Select Course</option>
         <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_course  order by title asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select></td>
      </tr>
      <tr>
       <td align="center"><select name="seat" class="textbox validate[required] " id="seat">
        <option value="" >..Select Seat..</option>
        <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_seat  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
        <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['seat']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
        <? } ?>
       </select></td>
      </tr>
      <tr>
       <td align="center"><input type="file" name="file2" id="file2"  lass="textbox validate[required] "  /> <a href="sample.csv" title="View Sample Import csv excel file">Sample File</a> </td>
      </tr>
      <tr>
        <td align="center"><?php if($_REQUEST['edit']!='') { ?>
          <input name="upd" type="submit" class="subm" id="upd"  value="Update : <?php echo $editrow['name']; ?>"/>
          <?php } else { ?>
          <input name="save" type="submit" class="subm" id="save"  value="Upload CSV File"/>
        <?php } ?></td>
      </tr>
    </table>
 
 </form>
  
</div>
<?php include('footer.php');?>
</body>
</html>
