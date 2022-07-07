<?php
 
  include("../con_base/functions.inc.php"); //  ?>

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
<h1> Student Fees Pay Report</h1>
   
 
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0" align="center">
 
      
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >SN</td>
        <td align="left" bgcolor="#E1FEFF" >Enrol No.</td>
       <td align="left" bgcolor="#E1FEFF" >Student Info</td> 
       <td   align="left" bgcolor="#E1FEFF">Admission Info</td>
        <td   align="left" bgcolor="#E1FEFF">Contact Info</td>


          <td   align="left" bgcolor="#E1FEFF">Fees</td>


      </tr>
      <?php

	  $where=" where is_paid ='0'	   ";

	   $q=1;
      	$qry=mysqli_query($DB_LINK,"select * from tbl_student $where order by name asc")or die(mysqli_error($DB_LINK));
		$counter=mysqli_num_rows($qry);  
		while($row=mysqli_fetch_array($qry)){ extract($row);		
	  ?>
      <tr>
        <td align="left" valign="top"  ><?php echo $q++; ?></td>
        <td align="left" valign="top"  >Enrolment No : <?php echo $row["enr_no"]; ?><br />
Student Id : <?php echo $row["student_id"]; ?><br /> Date Of Birth : <?php echo $row["dob"]; ?> </td>
        <td align="left" valign="top"  ><?php echo $row["name"]; ?><br />
       Father Name : <?php echo $row["f_name"]; ?> <br /><?php echo $row["address"]; ?></td>
        <td align="left" valign="top"  >Course : <?php echo $row["course"]; ?><br />Seat : <?php echo $row["seat"]?><br /> Category : <?php echo $row["category"]?></td>
        <td align="left" valign="top"  >Contact : <?php echo $row["cont"]; ?><br />Alternate Contact : <?php echo $row["cont2"]?><br />Email : <?php echo $row["email"]?> </td>
           <td  align="left" valign="top"  ><?php echo $row["fee"]?>
			    


		   </td>


      </tr>
      
      <? }  ?>
    </table>
 </form> 
</div>
<?php include('footer.php');?>
</body>
</html>
