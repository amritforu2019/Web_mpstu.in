<?php ob_start();  include("../con_base/functions.inc.php"); master(); ?>
<?

if(($_REQUEST['del'])!=''){
mysql_query("delete from tbl_student where id=".$_REQUEST['del']." ");
header("Location:student_list");
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Deleted Successfully";
exit;}



 
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
<h1> Student List</h1>
   
 
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0" align="center">
 
      
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >SN</td>
        <td align="left" bgcolor="#E1FEFF" >Enrol No.</td>
       <td align="left" bgcolor="#E1FEFF" >Student Info</td> 
       <td   align="left" bgcolor="#E1FEFF">Admission Info</td>
        <td   align="left" bgcolor="#E1FEFF">Contact Info</td>
        <td align="left" bgcolor="#E1FEFF">Religion</td>
        <td   align="left" bgcolor="#E1FEFF">Session</td>
        
        <td  align="left" bgcolor="#E1FEFF" >Subjects</td>
        <td  align="left" bgcolor="#E1FEFF" >On_date</td>
        <td  align="center" bgcolor="#E1FEFF" >Action</td>
      </tr>
      <?php
	 /* if(isset($_POST['searchdata']))
	  {
	  $where=" where name like '%".$_POST['txtserch']."%' or fname like '%".$_POST['txtserch']."%' or regno like '%".$_POST['txtserch']."%'  ";
	  } */
	   $q=1;
      	$qry=mysql_query("select * from tbl_student $where order by course asc")or die(mysql_error()); 
		$counter=mysql_num_rows($qry);  
		while($row=mysql_fetch_array($qry)){ extract($row);		
	  ?>
      <tr>
        <td align="left" valign="top"  ><?php echo $q++; ?></td>
        <td align="left" valign="top"  >Enrolment No : <?php echo $row["enr_no"]; ?><br />
Student Id : <?php echo $row["student_id"]; ?><br /> Date Of Birth : <?php echo $row["dob"]; ?> </td>
        <td align="left" valign="top"  ><?php echo $row["name"]; ?><br />
       Father Name : <?php echo $row["f_name"]; ?> <br /><?php echo $row["address"]; ?></td>
        <td align="left" valign="top"  >Course : <?php echo $row["course"]; ?><br />Seat : <?php echo $row["seat"]?><br /> Category : <?php echo $row["category"]?></td>
        <td align="left" valign="top"  >Contact : <?php echo $row["cont"]; ?><br />Alternate Contact : <?php echo $row["cont2"]?><br /> </td>
        <td align="left" valign="top"  ><?php echo $row["religion"]?></td>
        <td  align="left" valign="top"  ><?php echo $row["session"]?> </td>
      
        <td align="left" valign="top"  ><?php echo $row["subject"]?></td>
        <td align="left" valign="top"  ><?php echo $row["on_dt"]?></td>
       <td align="center" valign="top"  >

           <a title="Delete Record" href="student_list?del=<?php echo $row["id"];?>" onClick="return del();"><img src="images/del.png" /></a>

           &nbsp;

           <a  title="Edit record" href="student_add?edit=<?php echo $row["id"];?>" ><img src="images/edit.png" /></a>

           &nbsp;

           <a  title="Fee Payment" href="student_fee_pay?id=<?php echo $row["id"];?>" >Pay</a>

       </td>
      </tr>
      
      <? }  ?>
    </table>
 </form> 
</div>
<?php include('footer.php');?>
</body>
</html>
