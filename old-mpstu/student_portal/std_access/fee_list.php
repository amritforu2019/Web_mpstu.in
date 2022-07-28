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
location.href="fee_list";
</script>
<?php
}
exit;
}


if(isset($_POST["save"]))
{
 
 
$partyqry="INSERT INTO  `tbl_fee`  set `session` ='".$_POST["session"]."' , `category` ='".$_POST["category"]."' , `seat` ='".$_POST["seat"]."' , `course` ='".$_POST["course"]."' , `fee` ='".$_POST["fee"]."' ,`info` ='".$_POST["info"]."',on_dt='".date("Y-m-d")."'   ";

if(mysqli_query($DB_LINK,$partyqry))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Saved Successfully";
?>
<script>
location.href="fee_list";
</script>
<?php  } 
exit;
} 


if(($_REQUEST['del'])!=''){
mysqli_query($DB_LINK,"delete from tbl_fee where id=".$_REQUEST['del']." ");
header("Location:fee_list");
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
    <table width="40%" border="0" align="center"   cellpadding="5" cellspacing="0">
     
      <tr>
        <td  ><?  echo $_SESSION['msg']; unset($_SESSION['msg']);?></td>
      </tr>
      <tr>
        <td  ><select name="session" id="session"   class="textbox validate[required] "  >
         <option value=""  >Select Session</option>
         <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_session where status=1  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if( $country_fetch['status']==1 ||$editrow['session']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select>
<input name="edit" type="hidden" class="textbox" id="edit"   value="<?php echo $editrow['id']; ?>"/></td>
      </tr>
      <tr>
        <td  >
<select name="category" class="textbox validate[required] " id="category">
<option value="" >..Select Category..</option>
 <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_category  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['category']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
 
</select></td>
      </tr>
      <tr>
        <td  ><select name="seat" class="textbox validate[required] " id="seat">
          <option value="" >..Select Seat..</option>
          <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_seat  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['seat']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <? } ?>
         </select></td>
      </tr>
      <tr>
        <td  ><select name="course" id="course"   class="textbox validate[required] "  >
         <option value=""  >Select Course</option>
         <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_course  order by title asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select></td>
      </tr>
      <tr>
        <td  ><input name="fee"  type="number" class="textbox validate[required] text-input" value="<?php echo $editrow['fee']; ?>" id="fee"  placeholder="Enter Fees"/></td>
      </tr>
      <tr>
        <td  ><textarea name="info" rows="4"  class="textbox  " id="info"  placeholder="Other Info"><?php echo ($editrow['info']); ?></textarea></td>
      </tr>
      <tr>
        <td  ><?php if($_REQUEST['edit']!='') { ?>
          <input name="upd" type="submit" class="subm" id="upd"  value="Update : <?php echo $editrow['name']; ?>"/>
          <?php } else { ?>
          <input name="save" type="submit" class="subm" id="save"  value="Save"/>
        <?php } ?></td>
      </tr>
    </table>
 
 </form>
  <br />
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0"  >
 
      <thead>
      <tr   class="bg1">
        <td     >SN</td>
        <td    >Course</td>
        <td    >Seat</td>
        <td  >Category</td>
        <td    >Session</td>
        <td    >Fees</td>
        <td   >Info</td>
        <td    >On_date</td>
        <td    >Action</td>
      </tr></thead>
      <?php
	 /* if(isset($_POST['searchdata']))
	  {
	  $where=" where name like '%".$_POST['txtserch']."%' or fname like '%".$_POST['txtserch']."%' or regno like '%".$_POST['txtserch']."%'  ";
	  }*/
	   $q=1;
      	$qry=mysqli_query($DB_LINK,"select * from tbl_fee $where order by course asc")or die(mysqli_error($DB_LINK)); 
		$counter=mysqli_num_rows($qry);  
		while($row=mysqli_fetch_array($qry)){ extract($row);		
	  ?>
      <tr>
        <td     ><?php echo $q++; ?></td>
        <td    ><?php echo $row["course"]; ?></td>
        <td    ><?php echo $row["seat"]?></td>
        <td    ><?php echo $row["category"]?></td>
        <td     ><?php echo $row["session"]?> </td>
       <td    > <?php echo $row["fee"]?><br /></td>
        <td    ><?php echo $row["info"]?></td>
        <td    ><?php echo date_dm($row["on_dt"]);?></td>
       <td    >
         &nbsp;<?php if($_SESSION['master_mpstu_rolid']==3) { ?>
           <a  title="Edit record" href="fee_list?edit=<?php echo $row["id"];?>" >
               <i class="fas fa-edit color-slateblue"></i>
           </a>  <a title="Delete Record" href="fee_list?del=<?php echo $row["id"];?>" onClick="return del();">
               <i class="fas fa-trash-alt color-tomato"></i>
           </a>

       <?php }  ?></td>
      </tr>
      
      <? }  ?>
    </table>
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
