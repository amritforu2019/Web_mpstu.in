<?php   include("../con_base/functions.inc.php");   
 

if(($_REQUEST['del'])!=''){
mysqli_query($DB_LINK,"delete from tbl_student where id=".$_REQUEST['del']." ");
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
        <td colspan="5"   align="center" bgcolor="#E1FEFF" >- : : Filter Option : : -</td>
      </tr>
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >
            <select name="session" id="session"   class="textbox validate[required] "  >
                <option value=""  >Select Session</option>
                <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_session   order by id asc")or die(mysqli_error($DB_LINK));
                while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
                    <option value="<? echo $country_fetch['title']?>" <? if(  $_POST['session']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
                <?  } ?>
            </select></td>
        <td align="left" bgcolor="#E1FEFF" >
            <select name="course" id="course"   class="textbox"  >
          <option value=""  >Select Course</option>
          <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_course  order by title asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
          <option value="<? echo $country_fetch['title']?>" <? if(  $_POST['course']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
          <?  } ?>
        </select></td>
        <td align="left" bgcolor="#E1FEFF" >
            <select name="year" id="year"   class="textbox validate[required] "
                                                    onchange="get_subject(course.value,this.value)"  >
                <option value=""  >Select Year / Semester</option>
                <?php
                for($k=1;$k<=8;$k++)
                {?>
                    <option value="<?php echo $k?>" <?php if(  $_POST['year']==$k) echo "selected";?>><?php echo $k?></option>
                <?php  } ?>

            </select></td>
        <td align="left" bgcolor="#E1FEFF" >
            <select name="category" class="textbox" id="category">
          <option value="" >..Select Category..</option>
          <? $country_qry=mysqli_query($DB_LINK,"select * from tbl_category  order by id asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
          <option value="<? echo $country_fetch['title']?>" <? if(  $_POST['category']==$country_fetch['title']) echo "selected";?>><? echo normalall_filter($country_fetch['title'])?></option>
          <?  } ?>
        </select></td>
        <td align="left" bgcolor="#E1FEFF" ><label>
          <input name="filter" type="submit" class="subm" id="filter" value="Filter" />
        </label></td>
      </tr>
      <tr  >
        <td colspan="2"   align="left" bgcolor="#E1FEFF" >Search by Name / contact / Enrolment No : </td>
        <td colspan="2" align="left" bgcolor="#E1FEFF" ><input name="student_id" type="text" class="textbox   " id="student_id"   value="<?php echo $_POST['student_id']; ?>"/></td>
        <td align="left" bgcolor="#E1FEFF" ><input name="finder" type="submit" class="subm" id="finder" value="Find" /></td>
      </tr>
    
      </table>
    <br />
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0" align="center">
 
      
      <tr  >
        <td   align="left" bgcolor="#E1FEFF" >SN</td>
        <td align="left" bgcolor="#E1FEFF" >Image</td>
        <td align="left" bgcolor="#E1FEFF" >Enrol No.</td>
       <td align="left" bgcolor="#E1FEFF" >Student Info</td>
       <td   align="left" bgcolor="#E1FEFF">Admission Info</td>
        <td   align="left" bgcolor="#E1FEFF">Contact Info</td>
        <td align="left" bgcolor="#E1FEFF">Religion</td>
<!--        <td   align="left" bgcolor="#E1FEFF">Session</td>

          <td   align="left" bgcolor="#E1FEFF">Fees</td>-->



        <td  align="left" bgcolor="#E1FEFF" >Subjects</td>
        <td  align="left" bgcolor="#E1FEFF" >On_date</td>
        <td  align="center" bgcolor="#E1FEFF" >Action</td>
          <!--  <td  align="center" bgcolor="#E1FEFF" >Update_Transaction_ATOM</td> -->
      </tr>
    <?php
if(isset($_POST['filter']))
{
	if($_POST['session']!='')
	  $whr="  and session='".$_POST['session']."' ";
	 if($_POST['course']!='')
	  $whr.=" and course='".$_POST['course']."' ";
    if($_POST['year']!='')
        $whr.=" and year='".$_POST['year']."' ";
	if($_POST['category']!='')
	  $whr.=" and category='".$_POST['category']."' ";

}






if(isset($_POST['finder']))
{
    if($_POST['session']!='')
        $whr="  and session='".$_POST['session']."' ";
    if($_POST['course']!='')
        $whr.=" and course='".$_POST['course']."' ";
    if($_POST['year']!='')
        $whr.=" and year='".$_POST['year']."' ";
    if($_POST['category']!='')
        $whr.=" and category='".$_POST['category']."' ";
	if($_POST['student_id']!='')
	{
		$whr.=" and (name like '%".$_POST['student_id']."%' or enr_no like '%".$_POST['student_id']."%' or cont like '%".$_POST['student_id']."%' or f_name like '%".$_POST['student_id']."%' )  ";
	}
	 
}


	  $where=" where status=1  	 $whr  ";
//echo "select * from tbl_student $where order by id desc";
	  
		
			
		$start=0;
          $pagesize=5000;
          if(isset($_GET['start']))$start=$_GET['start'];
		$Prod=mysqli_query($DB_LINK,"select * from tbl_student $where order by id desc");
       $q=mysqli_query($DB_LINK,"select * from tbl_student $where order by id desc limit $start, $pagesize");
       $count=mysqli_num_rows($q);
       $reccnt=mysqli_num_rows($Prod);
        $P=1;
       if($count!=0)
				  {
				      $i=$start+1;	
			    while($row=mysqli_fetch_array($q))
				{
				extract($row);
	  ?>
      <tr>
        <td align="left" valign="top"  ><?php echo $i++; ?></td>
        <td align="left" valign="top"  ><?php if($row["image"]!='') { ?>
                    <img src="../upload/student/image/<?php echo $row["image"]; ?>" width="100px">
                    <?php } ?></td>
        <td align="left" valign="top"  >Enrolment No : <?php echo $row["enr_no"]; ?><br />
Roll no : <?php echo $row["student_id"]; ?><br /> Date Of Birth : <?php echo $row["dob"]; ?> </td>
        <td align="left" valign="top"  ><?php echo $row["name"]; ?><br />
       Father Name : <?php echo $row["f_name"]; ?><br />
       Mother Name : <?php echo $row["m_name"]; ?> <br /><?php echo $row["address"]; ?></td>
        <td align="left" valign="top"  >Course : <?php echo $row["course"]; ?><br />
            Seat : <?php echo $row["seat"]?><br />
            Category : <?php echo $row["category"]?><br />
            Year/ Sem : <?php echo $row["year"]?><br>
        Fees : <?php echo $row["fee"]?><br>
        Session :  <?php echo $row["session"]?></td>
        <td align="left" valign="top"  >Contact : <?php echo $row["cont"]; ?><br />Alternate Contact : <?php echo $row["cont2"]?><br />Email : <?php echo $row["email"]?>  </td>
        <td align="left" valign="top"  ><?php echo $row["religion"]?></td>



          <td align="left" valign="top"  >
              <?php if(strlen(normal_filter($row["subject_title"]))>50) { echo  substr(normal_filter($row["subject_title"]),0,50)."...";} else { echo  normal_filter($row["subject_title"]);}?>
              </td>
        <td align="left" valign="top"  ><?php echo $row["on_dt"]?></td>
       <td align="center" valign="top"  >

                    <?php if($_SESSION['master_mpstu_rolid']==3) { ?>

           &nbsp;

           <a  title="Edit record" href="student_add?edit=<?php echo $row["id"];?>" >
               <i class="fas fa-edit color-slateblue"></i>
           </a>

           <a title="Delete Record" href="student_list?del=<?php echo $row["id"];?>" onClick="return del();">
               <i class="fas fa-trash-alt color-tomato"></i>
           </a>
           &nbsp;
<?php if($row["is_paid"]!='1') { ?>
           <a  title="Fee Payment" href="student_fee_pay?id=<?php echo $row["enr_no"];?>" >

               <i class="fas fa-rupee-sign color-mediumseagreen"></i>
           </a>
           <?php } } ?>

       </td>
       
       <!--  <td align="center" valign="top"  >
              <a  title="Edit Transaction records given by atom" href="student_upd_tran.php?id=<?php echo $row["id"];?>" >CLICK</a>
             </td> -->
      </tr>
      
      <? }  }  ?>
    </table>
    <p><? require_once("../con_base/paging.inc.php");?></p>
 </form> 
</div>
<?php include('footer.php');?>
</body>
</html>
