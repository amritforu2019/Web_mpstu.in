<?php ob_start(); include('../con_base/functions.inc.php'); master_main();
require_once 'get_categories.php';
$categoryList = fetchCategoryTree(1);

if(isset($_POST['submit']))
{
	 
	// restricting duplicate entry
	$dup_entry=mysqli_num_rows(mysqli_query($DB_LINK,"select * from tbl_jobs where title='".$_POST['title']."'"));
 
	if($dup_entry==0)
	{
     $i1='';
		 require_once("uploader-file-master.php");
     if (isset($_FILES['uploaded_file'])) 
    {
          uploadmaster("../assets/upload/attachment/", 'uploaded_file');
          if ($finame != '') 
          {
              $f1= $finame;
              $i1=" , attachment='$f1'  ";
          }
      }
		 
		$url = strtolower(clean($_POST['title']).'.html'); 
	 
		$q=mysqli_query($DB_LINK,"INSERT INTO  tbl_jobs 
						 set
						`title`='".$_POST['title']."', 
						`status`='1',  
						 userid=".$_SESSION['master_userid'].",  
						 ipaddress='".$_SERVER['REMOTE_ADDR']."',
						`category`='".$_POST['category']."', 
						`c_name`='".$_POST['c_name']."', 
						`addr`='".$_POST['addr']."', 
						`city`='".$_POST['city']."', 
						`contact`='".$_POST['contact']."', 
						`email`='".$_POST['email']."', 
						`descr`='".$_POST['descr']."',
						`last_date`='".date('Y-m-d',strtotime($_POST['last_date']))."',
						  url='$url',
						  typ='job'
              $i1
						  ");
		
		if(mysqli_insert_id($DB_LINK))
		{
			$_SESSION['msg']=array('success', 'Inserted Successfully');
    		header("location:job_list");
    		exit;
		}
		else
		{
			$_SESSION['msg']=array('error', 'Oops. Something went wrong');
    		header("location:job_reg");
			exit;
		}
	}
	else
	{
		$_SESSION['msg']=array('warning', 'Already Exist');
    	header("location:job_reg");
		exit;
	}
}	


if(isset($_POST['save']))
{
	$loc='';
	foreach ($_POST['location'] as $selectedOption)
    $loc.=$selectedOption.",";
	 
  $qry="INSERT INTO `tbl_job` set
 `c_id`='".trim($_POST['c_id'])."' ,
`j_title`='".trim($_POST['j_title'])."' ,
`s_detail`='".trim($_POST['s_detail'])."' ,
`exp`='".trim($_POST['exp'])."' ,
`location`='".trim($loc)."' ,
`keys`='".trim($_POST['keys'])."' ,
`jdesc`='".trim($_POST['jdesc'])."' ,
`jsal`='".trim($_POST['jsal'])."' ";
 
 
 if(mysqli_query($DB_LINK,$qry))
 {
	   $_SESSION['msg']=array('success', 'Job Details Saved successfully !!');
	    header("location:job_list");
    		exit;
 }
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title> Jobs Add :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Jobs & Trainees</a></li>
          <li class="active">Add New Job</li>
        </ul>
        <!-- /.breadcrumb -- -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Add New Job </h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
        <div class="col-xs-2">
        </div>
          <div class="col-xs-7">
            <!--autocomplete="off" PAGE CONTENT BEGINS -->
            
            <form class="enquiry-form"   name="frm1" enctype="multipart/form-data"  id="frm1" action="" method="post">
        <input type="hidden"  name="c_id" id="c_id" value="<?php echo  $_SESSION['c_id'];?>" readonly>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               
            <div class="form-group">
                <!--<label>Job Title</label>-->
                <input type="text" name="j_title" id="j_title" required  class="form-control" placeholder="Job Title">
            </div>
               <div class="form-group">
                <!--<label>Sort Details</label>-->
                <input type="text" name="s_detail" id="s_detail" required  class="form-control" placeholder="Sort Details">
            </div>
            
            <div class="form-group">
               
               
       <select class="form-control" name="job_app_type" id="job_app_type" required onChange="change_jat(this.value);">
        <option value="">Select Job Applicant Type</option>
        <option value="Fresher">Fresher</option>
        <option value="Experience">Experience</option>

<option value="Fresher and Experience">Fresher and Experience Both</option>     
        </select>
               
               <script>
               function change_jat(val)
			   {
				   if(val!='')
				   {
					   if(val=='Experience' || val=='Fresher and Experience')
					   document.getElementById("exp_selecter").style.display="block";
					   else
					   document.getElementById("exp_selecter").style.display="none";
				   }
			   }
               </script>
            </div>
            
            <div class="form-group" style="display:none;" id="exp_selecter">
               <!-- <label>Exp</label>-->
               
       <select class="form-control" name="exp" id="exp" >
        <option value="">Experience In Year</option>
        <option>0</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10+</option>
        </select>
               
               
            </div>
            
            <div class="form-group">
                <!--<label>Job Location</label> chosen-select multi-select-->
               
               
               <select  multiple  name="location[]" id="location" required class=" form-control">
        <option value="">Select Job Location</option>
          
       <?php
 $qry_foo3=mysqli_query($DB_LINK,"select * from states_cities    order by city asc") or die(mysqli_error());
                foreach($qry_foo3 as $row_foo3)
                { ?><option value="<?php echo $row_foo3['city'];?>"><?php echo $row_foo3['city'];?></option>
                    <?php } ?>
        </select>
            </div>
            
             <div class="form-group">
              <!--  <label>Key Skill</label>-->
              
              <select class="form-control" name="keys" id="keys" required>
        <option value="">Select Key Skills</option>
       <?php
 $qry_foo3=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id=1  and status=1   order by title asc") or die(mysqli_error());
                foreach($qry_foo3 as $row_foo3)
                { ?><option value="<?php echo $row_foo3['title'];?>"><?php echo $row_foo3['title'];?></option>
                    <?php } ?>
        </select>
        
        
                
            </div>
            
             <div class="form-group">
                 <label>Job Description</label> 
                <textarea placeholder="Job Description" name="jdesc"  cols="3" rows="" class="form-control" id="editor"></textarea>
                 <?php include("../assets/main/ckeditor.sc.php");?>
            </div>
            
            <div class="form-group">
               <!-- <label>Salary Package</label>-->
               <input type="text" name="jsal" id="jsal" required    class="form-control" placeholder="Salary Package here like 10k to 25k">
            </div>
            
          
             
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" name="save" class="btn-success btn">Post Job</button>
        </div>
        </form>
            <?php /*?><form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Job Title </label>
                <div class="col-sm-9">
                  <input name="title" type="text" class="form-control" id="title" placeholder="Enter Title" required>
                </div>
              </div>
               
              <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" >Category </label>
                    <div class="col-sm-9">
                      <select   name="category" class="chosen-select form-control" id="form-field-select-4" required >
                        <option value="">Select Category</option>
                         <?php foreach($categoryList as $cl) { ?>
                  <option value="<?php echo $cl["id"] ?>"  ><?php echo $cl["title"]; ?></option>
                  <?php } ?>                       
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Contact Person </label>
                <div class="col-sm-9">
                  <input name="c_name" type="text" class="form-control" id="c_name" placeholder="Enter Contact Person Name" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Address </label>
                <div class="col-sm-9">
                  <input name="addr" type="text" class="form-control" id="addr" placeholder="Enter Address" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> City </label>
                <div class="col-sm-9">
                  <input name="city" type="text" class="form-control" id="city" placeholder="Enter City Name" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Phone No </label>
                <div class="col-sm-9">
                  <input name="contact" type="text" class="form-control" id="contact" placeholder="Enter Phone No" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Email Id </label>
                <div class="col-sm-9">
                  <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email Id" required>
                </div>
              </div>
              
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Last Date </label>
                <div class="col-sm-9">
                  <input name="last_date" type="text" class="form-control" id="last_date" placeholder="Enter Last Date DD-MM-YYYY" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Description </label>
                <div class="col-sm-9">
                  <textarea name="descr" class="form-control" id="descr" placeholder="Enter Job Description"></textarea>
                 
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right">Attachment </label>
                <div class="col-sm-4">
                  <input name="uploaded_file" type="file" id="id-input-file-2" >
                  ( PDF or Doc Files Optional)
                </div>
              </div>
              
            <?php /*?>  <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Posted By </label>
                <div class="col-sm-9">
                 <select   name="posted_by" class="chosen-select form-control" id="posted_by" required  onChange="upd_data(this.value)">
                 <option value="" selected>POSTED BY</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="OTHER">OTHER</option>                     
                      </select>
                      
                </div>
              </div>
              
              <div class="form-group" id="post_upd" style="display:none;">
                <label class="col-sm-2 control-label no-padding-right"> OTHER </label>
                <div class="col-sm-9">
                  
                      <input name="other" type="text" class="form-control" id="other" placeholder="Enter Others Name"  >
                       
                </div>
              </div><?php * ?>
              <div class="form-group">
              <div class="col-sm-3 control-label no-padding-right"></div>
              <div class="col-md-9 no-padding-right" style="padding-left: 125px;">
              
                <button class="btn btn-info" type="submit" name="submit" data-last="Finish"> <i class="ace-icon fa fa-check bigger-110"></i> Submit </button>
                <button class="btn btn-default" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> Reset</button>
              </div>
            </div>
            </form><?php */?>
          </div>
        </div>
      </div>
      <!-- /.col -->
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
  <!-- /.main-content -->
  <?php include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
<script>
function upd_data(vals)
{
	if(vals!='')
	{
		if(vals=='ADMIN')
		{
			document.getElementById("post_upd").style.display='none';
		}
		if(vals=='OTHER')
		{
			document.getElementById("post_upd").style.display='block';
		}
	}
	else
	document.getElementById("post_upd").style.display='none';
}
</script>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>