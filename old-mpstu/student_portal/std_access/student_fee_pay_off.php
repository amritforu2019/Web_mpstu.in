<?php
/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan. 
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna. 
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus. 
 * Vestibulum commodo. Ut rhoncus gravida arcu. 
 */

/**
 * Copyright (c) 2017. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

  include("../con_base/functions.inc.php");  
if(isset($_POST["upd"]))
{

$partyqry="update  `tbl_student` set   `rec_no` ='".$_POST["rec_no"]."' , `pay_dt` ='".$_POST["pay_dt"]."' , `pay_amt` 
='".$_POST["pay_amt"]."'    , is_paid='1', pay_mode='Offline' where `enr_no`='".$_POST["edit"]."'  ";


if(mysqli_query($DB_LINK,$partyqry))
{
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Updated Successfully";

    $qry1=mysqli_query($DB_LINK,"select * from tbl_student where enr_no='".trim($_POST["edit"])."'    ")or die(mysqli_error($DB_LINK));

        $row_std=mysqli_fetch_array($qry1);
    $text="Dear student ".$row_std['name']." for course ".$row_std['course']." Rs. ".$row_std['fee']." is paid successfully on date ".$row_std['pay_dt'].". From DAV PG College";


    $data = "user=balajidemo&pass=123456&sender=smdemo&phone=".trim($row_std['cont'])."&text=".$text."&priority=sdnd&stype=normal";


    $ch = curl_init('http://tra.sms.balajisoftwaresolution.com/api/sendmsg.php?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);


	?>
<script>
    alert('Fees Paid Successfully');
    location.href="student_fee_pay_rep";
    //location.href="student_receipt?id=<?=$_POST["edit"];?>";
</script>
    <?php
    }
    exit;
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
<h1> Student Fees Payment</h1>
   
 
  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
      


              <?  if($_REQUEST['id']!='') {

                  $xquer=mysqli_query($DB_LINK,"select * from tbl_student where enr_no='".trim($_REQUEST['id'])."'    ")or die(mysqli_error($DB_LINK));

                  $row_std0=mysqli_fetch_array($xquer);







                  $qry1=mysqli_query($DB_LINK,"select * from tbl_student where enr_no='".trim($_REQUEST['id'])."'    ")or die(mysqli_error($DB_LINK));
                  if(mysqli_num_rows($qry1)>0)
                  {
                      $row_std=mysqli_fetch_array($qry1);
                      ?>
                      <br>
                      <table width="60%"  border="1"  cellpadding="5" cellspacing="0" align="center" style="background-color:#ffffff ">
<tr>
    <td>Student Id :</td>
    <td><?=$row_std['student_id'];?>
        <input name="edit" type="hidden" class="textbox" id="edit"   value="<?php echo $row_std['enr_no']; ?>"/>
        <input name="pay_amt" type="hidden" class="textbox" id="pay_amt"   value="<?php echo $row_std['fee']; ?>"/></td>
</tr>
                          <tr>
                              <td>Enrollment No. :</td>
                              <td><?=$row_std['enr_no'];?></td>
                          </tr>
                          <tr>
                              <td>Name :</td>
                              <td><?=$row_std['name'];?></td>
                          </tr>
                          
                          <input type="hidden" name="enr_no" id="enr_no" value="<? echo $row_std['enr_no']?>" />
                          <tr>
                              <td>Payment Amount</td>
                              <td><?=$row_std['fee'];?></td>
                          </tr>
                          <tr>
                              <td>Date Of Payment</td>
                              <td><input name="pay_dt" type="text" class="textbox validate[required] " id="dob"   value="<?php   echo date('Y-m-d')?>"/></td>
                          </tr>
                          <tr>
                              <td>Receipt No. (Optional)</td>
                              <td><input name="rec_no" type="text" class="textbox validate[required] " id="rec_no"   value=" "/></td>
                          </tr>
                          <tr>
                              <td colspan="2" align="center"> <input name="upd" type="submit" class="subm" id="upd"  value="Pay Now"/>
                                   </td>
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
