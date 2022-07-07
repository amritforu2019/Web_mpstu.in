<?php
/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

ob_start();  include("../con_base/functions.inc.php"); master(); ?>

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
    <script type="text/javascript">


        function gopage(val1)
        {
            if(val1!='')
            {
                location.href='student_fee_pay?id='+val1;
            }
            else
            {


                document.getElementById('enrol').focus();
                return ;
            }

        }   </script>
</head>
<body onLoad="doOnLoad()">
<?php include('header.php');?>
<div class="conten">
<h1> Student Fees Payment</h1>
   
 
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
      <table width="40%"  border="1"  cellpadding="5" cellspacing="0" align="center" style="background-color:#ffffff ">

<tr>
    <td colspan="2">Student Search</td>


</tr>
          <tr>
              <td>Search by Student Enrolment No</td>
              <td> <input name="enrol" required type="text" class="form-control1" onBlur="gopage(enrol.value);"   value="<? echo $_REQUEST['id'];?>" id="enrol"  placeholder="Enter here Enrolment No."></td>
          </tr>
          <tr>
              <td></td>
              <td>    <input   name="bno" type="hidden"   id="bno" value="<? echo $sno?>">
                  <button class="btn btn-default" name="subm" onClick="gopage(enrol.value);" type="button">Search</button></td>
          </tr>

      </table>


              <?  if($_REQUEST['id']!='') {

                  $xquer=mysql_query("select * from tbl_student where enr_no='".trim($_REQUEST['id'])."'    ")or die(mysql_error());

                  $row_std0=mysql_fetch_array($xquer);







                  $qry1=mysql_query("select * from tbl_student where enr_no='".trim($_REQUEST['id'])."'    ")or die(mysql_error());
                  if(mysql_num_rows($qry1)>0)
                  {
                      $row_std=mysql_fetch_array($qry1);
                      ?>
                      <br>
                      <table width="60%"  border="1"  cellpadding="5" cellspacing="0" align="center" style="background-color:#ffffff ">
<tr>
    <td>Student Id :</td>
    <td><?=$row_std['student_id'];?></td>
</tr>
                          <tr>
                              <td>Enrollment No. :</td>
                              <td><?=$row_std['enr_no'];?></td>
                          </tr>
                          <tr>
                              <td>Name :</td>
                              <td><?=$row_std['name'];?></td>
                          </tr>
                          <tr>
                              <td>Father Name :</td>
                              <td><?=$row_std['f_name'];?></td>
                          </tr>
                          <tr>
                              <td>contact no. :</td>
                              <td><?=$row_std['cont'];?></td>
                          </tr>

                          <input type="hidden" name="enr_no" id="enr_no" value="<? echo $row_std['enr_no']?>" />
                          <tr>
                              <td>Payment Amount</td>
                              <td><?=$row_std['fee'];?></td>
                          </tr>

                      </table>

                      <br>
                      <table width="30%"  border="1"  cellpadding="5" cellspacing="0" align="center" style="background-color:#ffffff ">
                          <tr>
                              <td align="center">Pay Mode</td>
</tr> <tr>
                              <td align="center"><a href="student_fee_pay_off.php?id=<?=$row_std['enr_no'];?>">Offline By Receipt</a></td>
                          </tr> <tr>
                              <td align="center"><a href="student_fee_pay_on.php?id=<?=$row_std['enr_no'];?>">Online By payment gateway</a></td>
                          </tr>



                      </table>
                  <? } else { echo '<span style="color:red">!!! Student not found</span>' ; ?>

                  <? } }?>
              <div class="clearfix"> </div>
          </div>

      </div>
 </form> 
</div>
<?php include('footer.php');?>
</body>
</html>
