<?php   include("../con_base/functions.inc.php");


if(($_REQUEST['del'])!=''){
mysqli_query($DB_LINK,"delete from tbl_result_marks where res_id=".$_REQUEST['del']." ");
header("Location:result_list");
$_SESSION['msg']="<span style='color:green; font-size:14px;'>Record Deleted Successfully";
exit;}



/*if($_REQUEST['edit']!='')
{
	$serchqry="select * from tbl_fee where id='".$_REQUEST['edit']."' ";
	$qs=mysqli_query($DB_LINK,$serchqry);
	$editrow=mysqli_fetch_array($qs);
	
}*/
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

<title>Result List</title>
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css" />
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css" />
<script src="codebase/dhtmlxcalendar.js"></script>

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
<h1> Result List</h1>

  <form action="" method="post"  name="productsform" id="productsform" autocomplete='off'  >
    <table width="100%"  border="1"  cellpadding="5" cellspacing="0"  >
 
      <thead>
      <tr  >
        <th     >SN</th>
        <th    >Course</th>
        <th    >Year / Sem</th>
        <th    >Student Info</th>
        <th    >Session</th>
        <th    >Status</th>
        <th   >Declaration Date</th>
        <th    >On_date</th>
        <th    >Action</th>
      </tr></thead>
      <?php
	 /* if(isset($_POST['searchdata']))
	  {
	  $where=" where name like '%".$_POST['txtserch']."%' or fname like '%".$_POST['txtserch']."%' or regno like '%".$_POST['txtserch']."%' and session='$curr_session';  ";
	  }*/
      $curr_session=get_curr_session();
	   $q=1;
      	$qry=mysqli_query($DB_LINK,"SELECT DISTINCT res_id FROM `tbl_result_marks` where is_lock=1 ")or die(mysqli_error($DB_LINK));
		$counter=mysqli_num_rows($qry);  
		while($row=mysqli_fetch_object($qry)){
		    $sql_fulldata="Select * from tbl_result_marks where res_id='".$row->res_id."'";
            $qry_fulldata=mysqli_query($DB_LINK,$sql_fulldata);
            $result_fulldata=mysqli_fetch_object($qry_fulldata);

	  ?>
      <tr>
        <td     ><?php echo $q++; ?></td>
        <td    ><?php echo $result_fulldata->course ; ?></td>
        <td    ><?php echo $result_fulldata->year ; ?></td>
        <td    >Roll No. : <?php echo $result_fulldata->roll_no ; ?><br>
        Name  : <?php echo get_student_data($result_fulldata->roll_no,$result_fulldata->session,"name");?>
            <br>
            Enrollment No  : <?php echo get_student_data($result_fulldata->roll_no,$result_fulldata->session,"enr_no");?></td>
        <td    ><?php echo get_student_data($result_fulldata->roll_no,$result_fulldata->session,"session");?></td>
        <td    ><?php echo $result_fulldata->r_status ; ?></td>
        <td    ><?php echo date_dm($result_fulldata->rdd);?></td>
        <td    ><?php echo date_dm($result_fulldata->on_update);?></td>
       <td    >
           <a title="View Result" href="result_view?roll_no=<?php echo $result_fulldata->roll_no;?>" target="_blank">
               <i class="fas fa-info-circle color-mediumseagreen"></i>
           </a>
         &nbsp;<?php if($_SESSION['master_mpstu_rolid']==3) { ?>

              <a title="Delete Result" href="result_list?del=<?php echo $row->res_id;?>" onClick="return del();">
               <i class="fas fa-trash-alt color-tomato"></i>
           </a>

       <?php }  ?></td>
      </tr>
      
      <?php }  ?>
    </table>
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
