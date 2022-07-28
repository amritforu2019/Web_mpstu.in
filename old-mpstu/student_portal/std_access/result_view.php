<?php   include("../con_base/functions.inc.php"); 
if(isset($_POST['save']))
{
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from tbl_session  where id='$ty' ")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry);	
}
/*if(isset($_POST['go']))
{
mysqli_query($DB_LINK,"insert into tbl_session set  title='".addslashes($_POST['title'])."', posted_on=now(),  status=0 ")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Session Added Successfully";
header("Location: session_list");
exit;
}
if(isset($_POST['go2']))
{	 			 
mysqli_query($DB_LINK,"update tbl_session set title='".addslashes($_POST['title'])."',posted_on=now() where id='".$_POST['edit']."'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Session Updated Successfully";			
header("Location: session_list");
exit;
}*/
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>

<title> View Result</title>
<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			$(".submit").click(function(){
				jQuery("#formID").validationEngine('validate');
			})
            jQuery("#formID2").validationEngine();
            $("#add_res").click(function(){
                jQuery("#formID2").validationEngine('validate');
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

    <link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css" />
    <link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css" />
    <script src="codebase/dhtmlxcalendar.js"></script>
    <script>
        var myCalendar;
        jQuery(document).ready(function(){
            myCalendar = new dhtmlXCalendarObject(["rdd", "dob", "doe"]);
        });


    </script>
</head>
<body>
<?php //include('header.php');?>
<div class="conten">
    <?php
    $sql="SELECT * FROM  tbl_student  where  	student_id='".$_GET['roll_no']."'   ";
    $result =mysqli_query($DB_LINK,$sql);

    $data =mysqli_fetch_object($result);
    ?>
    <table width="70%" border="0" align="center" cellpadding="5" cellspacing="0"
           style="text-transform: uppercase;">
        <tr>
            <td style="text-align: center"><h1> MAHARANA PRATAP SCIENCE & TECHNOLOGY UNIVERSITY - TELANGANA</h1></td>

        </tr>
        <tr style="text-align: center"><td><h3><?php echo $data->course;?></h3></td> </tr>
        <tr style="text-align: center"><td><h3>YEAR / SEMESTER : <?php echo $data->year;?></h3></td> </tr>
    </table>




      <table width="70%" border="1" align="center" cellpadding="5" cellspacing="0" style="text-transform: uppercase; margin-top: 20px">
          <tr>
              <td class="bg1" width="15%">Roll NO.</td>
              <td><?php echo $data->student_id;?> </td>
              <td class="bg1" width="15%">Enrollment No.</td>
              <td><?php echo $data->enr_no;?></td>
              <td rowspan="5" valign="center"  align="center" width="15%"  ><img src="../upload/student/image/<?php echo $data->image; ?>" width="100px"></td>
          </tr>
          <tr>
              <td class="bg1">STUDENT NAME</td>
              <td><?php echo $data->name;?></td>
              <td class="bg1" >COURSE</td>
              <td><?php echo $data->course;?></td>
          </tr>
          <tr>

              <td class="bg1">FATHER’S NAME</td>
              <td><?php echo $data->f_name;?></td>
              <td class="bg1">MOTHER'S NAME</td>
              <td><?php echo $data->m_name;?></td>
          </tr>
          <tr>
              <td class="bg1">DATE OF BIRTH</td>
              <td><?php echo date_dm($data->dob);?></td>
              <td class="bg1">SESSION</td>
              <td><?php echo $data->session;?></td>
          </tr>
          <tr>
              <td class="bg1">STATUS</td>
              <td><?php echo $data->seat;?></td>
              <td class="bg1">BRANCH</td>
              <td ><?php echo get_course_branch($data->course);?></td>
          </tr>
          <tr>
              <td class="bg1">Subject</td>
              <td colspan="4"> <?php echo ($data->subject_title);?></td>
          </tr>


      </table>
    <table width="70%"  border="1" align="center" cellpadding="5" cellspacing="0" style="text-transform: uppercase; margin-top: 40px ">
        <tr>
            <td class="bg2">NAME OF PAPER / SUBJECT	</td>
            <td class="bg2" style="text-align: center" >TOTAL MARKS	</td>
            <td class="bg2" colspan="2" style="text-align: center" > OBTAINED MARKS </td>
            <td class="bg2" style="text-align: center"   > TOTAL OBTAINED MARKS</td>

            <!--<td class="bg2"  style="text-align: center"  >ACTION</td>-->

        </tr>
        <?php
        $allm=0;
        $totm=0;
        $sql_data="select * from tbl_result_marks where  `roll_no`='".$_GET['roll_no']."'
           and is_lock='1' order by id asc ";
        $result=mysqli_query($DB_LINK,$sql_data);
        while ($row=mysqli_fetch_object($result))
        {
            ?>
            <tr>
                <td ><?php echo $row->subject;?></td>
                <td  style="text-align: center" ><?php echo $row->m_mark;$allm+=$row->m_mark;?></td>
                <td   style="text-align: center"  ><?php echo $row->obt_mark_1;?></td>
                <td    style="text-align: center"  ><?php echo $row->obt_mark_2;?></td>
                <td   style="text-align: center"   ><?php echo $row->t_mark;$totm+=$row->t_mark;?></td>
                <!--<td style="text-align: center" ><a href="javascript:void(0)" onClick="return del_result(<?php /*echo $row->id;*/?>);" title="Delete ">
                        <i class="fas fa-trash-alt color-tomato"></i>
                    </a></td>-->

            </tr>
        <?php $result_status=$row->r_status; $rdd=$row->rdd; }?>

        <tr>
            <td>Total</td>
            <td style="text-align: center"><?php echo $allm;?></td>
            <td colspan="2"></td>
            <td style="text-align: center"><?php echo $totm;?></td>

        </tr></table>


        <table width="70%"  border="0" align="center" cellpadding="5" cellspacing="0"
               style="text-transform: uppercase;
">

            <tr>
                <td  >Result Status</td>
                <td  ><?php echo $result_status;?></td>
                <td>Result Declaration Date</td>
                <td>
                    <?php echo date_dm($rdd);?>
                </td>
                 </tr>
        </table>





</div>
<?php //include('footer.php');?>

</body>
</html>
<? ob_end_flush(); ?>
