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

<title>Add_New_Result</title>
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
<?php include('header.php');?>
<div class="conten">
  <h1>Add_New_Result</h1>
  <form name="form1" method="post" action="result_add.php" id="formID" class="formular validationEngineContainer">
    <table width="40%" border="0" align="center" cellpadding="5" cellspacing="0">
       <tr>
           <td  >Session :

               <?php   $currsess=get_curr_session();?>
               <select name="session" id="session"   class="textbox validate[required] "  >
                   <option value=""  >Select Session</option>
                   <?php $country_qry=mysqli_query($DB_LINK,"select * from tbl_session   order by id asc")or die(mysqli_error($DB_LINK));
                   while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
                       <option value="<? echo $country_fetch['title']?>"
                           <?php
                           if(isset($_POST['session'] )) {
                           if($_POST['session']==$country_fetch['title']) echo "selected"; } ?>><? echo normalall_filter($country_fetch['title'])?></option>
                   <?php  } ?>
               </select>
              </td>

        <td ><input name="roll_no" placeholder="Enter Roll No :"
                    type="text" class="textbox validate[required] text-input" id="roll_no" size="50"
                    value="<?php if(isset($_POST['roll_no'] ))  echo $_POST['roll_no'];?>" />
          <input type="hidden" value="<?php echo time();?>" name="res_id" id="res_id" /></td>
           <td> <input name="go2" type="submit" class="subm" id="go2" value="Find Student" /></td>
      </tr>   </table>
  </form>
<?php if(isset($_POST['go2'] ))
    {
    $sql="SELECT * FROM  tbl_student  where  	student_id='".$_POST['roll_no']."'  and session='".$_POST['session']."' ";
    $result =mysqli_query($DB_LINK,$sql);
    if(mysqli_num_rows($result)>0)
        {
        $data =mysqli_fetch_object($result);
    ?>

      <table width="60%" border="1" align="center" cellpadding="5" cellspacing="0" style="text-transform: uppercase;">
          <tr>
              <td class="bg1">Roll NO.</td>
              <td><?php echo $data->student_id;?> </td>
              <td class="bg1">Enrollment No.</td>
              <td><?php echo $data->enr_no;?></td>
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
              <td colspan="3"> <?php echo ($data->subject_title);?></td>
          </tr>


      </table>
    <form name="form2" method="post"   id="formID2" class="formular validationEngineContainer">

    <table width="70%"  border="1" align="center" cellpadding="5" cellspacing="0" style="text-transform: uppercase;margin-top: 10px">
          <tr>
              <td class="bg2">NAME OF PAPER / SUBJECT	</td>
              <td class="bg2">TOTAL MARKS	</td>
              <td class="bg2"   > PRACTICAL </td>
              <td class="bg2"    > THEORY </td>
              <td class="bg2"   > TOTAL OBTAINED MARKS</td>
              <td class="bg2"   > ADD
                  <a href="javascript:void(0)" onClick="view_result();" title="show all result data">
                      <i class="fas fa-sync-alt color-orange fa-spin"></i>
                  </a>
              </td>
          </tr>
          <tr>
              <td ><input name="subject" placeholder="Enter Subject"  type="text" class="textbox validate[required] text-input" id="subject" size="50" /></td>
              <td ><input name="m_mark" placeholder="Total Marks"  type="text" class="textbox validate[required,custom[integer]] text-input" id="m_mark"   /></td>
              <td ><input name="obt_mark_1" placeholder="Obtain Marks"  type="text" class="textbox validate[required,custom[integer]] text-input" id="obt_mark_1"   /></td>
              <td ><input name="obt_mark_2" placeholder="Obtain Marks"  type="text" class="textbox validate[required,custom[integer]] text-input" id="obt_mark_2"   /></td>
              <td ><input name="t_mark" placeholder="Obtain Marks"  type="text" class="textbox validate[required,custom[integer]] text-input" id="t_mark"   /></td>
              <td > <input name="add_res" type="button" class="subm" id="add_res" value="Add" onclick="add_student_result()" /></td>

          </tr>
      </table>

        <table width="70%"  border="0" align="center" cellpadding="5" cellspacing="0"
               style="text-transform: uppercase; margin-top: 20px;">

        <tr>
                <td id="update_result"></td>
            </tr>
        </table>

        <table width="70%"  border="0" align="center" cellpadding="5" cellspacing="0"
               style="text-transform: uppercase;
">

            <tr>
                <td  >Result Status</td>
                <td  ><select id="r_status" name="r_status" class="textbox validate[required] ">
                        <option>Clear</option>
                        <option>Not Clear</option>
                    </select></td>
                <td>Result Declaration Date</td>
                <td>  <input name="rdd" type="text" class="textbox validate[required] " id="rdd" />
                </td>
                <td id="update_result_final"><input name="save" type="button" onclick="final_save()" class="subm" id="save"  value="Save Result"/></td>
            </tr>
        </table>
    </form>
      <?php } else echo '<span class="color-tomato">Sorry Student not found</span>'; } ?>




</div>
<?php include('footer.php');?>
<script>
    function view_result()
    {
        var roll_no=$("#roll_no").val();
        var session=$("#session").val();
        ///alert(session)
        $.ajax({
            type: "POST",
            url: "ajax_result_view.php",
            data: 'roll_no=' + roll_no+'&session='+session ,
            success: function(data) {
                $("#update_result").html(data);

            },
            beforeSend: function() {
                $("#update_result").html('Processing.. ');
            }
        });
    }
    function add_student_result() {
        var subject=$("#subject").val();
        var m_mark=$("#m_mark").val();
        var obt_mark_1=$("#obt_mark_1").val();
        var obt_mark_2=$("#obt_mark_2").val();
        var t_mark=$("#t_mark").val();
        var roll_no=$("#roll_no").val();
        var res_id=$("#res_id").val();
        var session=$("#session").val();

       // alert(session);
        
         $.ajax({
            type: "POST",
            url: "ajax_result_add.php",
            data: 'subject=' + subject + '&m_mark=' + m_mark+ '&obt_mark_1=' + obt_mark_1+ '&obt_mark_2=' + obt_mark_2+ '&t_mark=' + t_mark+ '&roll_no=' + roll_no+ '&res_id=' + res_id+'&session='+session,
            success: function(data) {
                //$("#update_result").html(data);
                view_result();
                 $("#subject").val("");
                $("#subject").focus();
                $("#obt_mark_1").val("");
                $("#obt_mark_2").val("");
                $("#t_mark").val("");


            },
            beforeSend: function() {
                $("#update_result").html('Processing.. ');
            }
        });
    }

    function final_save() {
        var rdd=$("#rdd").val();
        var r_status=$("#r_status").val();
        var roll_no=$("#roll_no").val();
        var res_id=$("#res_id").val();
        var session=$("#session").val();

        $.ajax({
            type: "POST",
            url: "ajax_result_final_save.php",
            data: 'rdd=' + rdd + '&r_status=' + r_status+ '&roll_no=' + roll_no+ '&res_id=' + res_id+ '&session=' + session,
            success: function(data) {
                //$("#update_result").html(data);
               window.location.href="result_list.php"
                },
            beforeSend: function() {
                $("#update_result_final").html('Processing.. ');
            }
        });
    }

</script>
</body>
</html>
<? ob_end_flush(); ?>
