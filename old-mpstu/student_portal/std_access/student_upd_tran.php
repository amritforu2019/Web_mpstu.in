<?php   include("../con_base/functions.inc.php");   ?>
<?

if(isset($_POST["upd"]))
{
 
 $partyqry="update tbl_student set 
is_paid='1',
pay_dt='".$_POST['pay_dt']."',
pay_amt='".$_POST['pay_amt']."',
pay_mode='Online' ,
trn_id='".$_POST['trn_id']."',
trn_id_m='".$_POST['trn_id_m']."' ,
trn_id_b='".$_POST['trn_id_b']."',
email='".$_POST['email']."' 
 where  `id`='".$_POST["edit"]."'  ";
 
 
if(mysqli_query($DB_LINK,$partyqry))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Transaction Record Updated Successfully";
	?>
<script>
location.href="student_list";
</script>
<?php
}
exit;
}


 


 


if($_REQUEST['id']!='')
{
	$serchqry="select * from tbl_student where id='".$_REQUEST['id']."' ";
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
       <td>Course</td>
        <td>

  <input name="edit" type="hidden" class="textbox" id="edit"   value="<?php echo $editrow['id']; ?>"/>

        <select name="course" id="course"   class="textbox validate[required] "  >
         <option value=""  >Select Course</option>
         <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_course  order by title asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
         <option value="<? echo $country_fetch['title']?>" <? if(  $editrow['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
         <?  } ?>
        </select></td>
      </tr>
      
      <tr>
       <td>Enrollment No.</td>
       <td><input name="enr_no" type="text" class="textbox validate[required] " id="enr_no"   value="<?php echo $editrow['enr_no']; ?>"/></td>
      </tr>
     
      <tr>
       <td>Name</td>
       <td><input name="name" type="text" class="textbox validate[required] " id="name"   value="<?php echo $editrow['name']; ?>"/></td>
      </tr>

       <tr>
       <td>Email</td>
       <td><input name="email" type="text" class="textbox validate[required] " id="email"   value="<?php echo $editrow['email']; ?>"/></td>
      </tr>


      <tr>
       <td>Payment date</td>
       <td><input name="pay_dt" type="text" class="textbox validate[required] " id="pay_dt" placeholder="yyyy-mm-dd   only this format"   value="<?php echo $editrow['pay_dt']; ?>"/></td>
      </tr>
      <tr>
       <td>Merchant Transaction Id</td>
       <td><input name="trn_id_m" type="text" class="textbox validate[required] " id="trn_id_m"   value="<?php echo $editrow['trn_id_m']; ?>"/></td>
      </tr>
        <tr>
       <td>Atom Transaction Id</td>
       <td><input name="trn_id" type="text" class="textbox  " id="trn_id"   value="<?php echo $editrow['trn_id']; ?>"/></td>
      </tr>
      
      <tr>
       <td>Bank Transaction ID</td>
       <td><input name="trn_id_b" type="text" class="textbox   " id="trn_id_b"   value="<?php echo $editrow['trn_id_b']; ?>"/></td>
      </tr>
      
       <td>Payment Amount</td>
       <td><input name="pay_amt" type="text" class="textbox validate[required] " id="pay_amt"   value="<?php echo $editrow['pay_amt']; ?>"/></td>
      </tr>
       
      <tr>
       <td colspan="2" align="center"> 
         <input name="upd" type="submit" class="subm" id="upd"  value="Update : <?php echo $editrow['name']; ?>"/>
          </td>
      </tr>
    </table>
 
 </form>
  
</div>
<?php include('footer.php');?>
</body>
</html>
