<?php ob_start(); include('../con_base/functions.inc.php'); master_main();
 if(isset($_POST['save']))
{
$password=rand(100000,999999);

 $qry="INSERT INTO `tbl_company` set
 `i_name`='".trim($_POST['i_name'])."' ,
`cp_name`='".trim($_POST['cp_name'])."' ,
`addr`='".trim($_POST['addr'])."' ,
`email`='".trim($_POST['email'])."' ,
`mobile` ='".trim($_POST['mobile'])."',
`get_info`='".trim($_POST['get_info'])."' ,
`emp_c`='".trim($_POST['emp_c'])."' ,
`password`='".trim($password)."'
 ";
 
 if(mysqli_query($DB_LINK,$qry))
 {
 
 $_SESSION['c_id']=mysqli_insert_id($DB_LINK); 
  
  $_SESSION['msg']=array('success', 'Company Info Saved successfully !!');

			 
 

header("location:reg-recruiter");  }	
 
  
 
 else
 {
  $_SESSION['msg']=array('error', 'Oops!!Something went wrong'); 
  header("location:emp_reg.html");
 }
exit;
  
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
          <div class="col-xs-8">
            <!--autocomplete="off" PAGE CONTENT BEGINS -->
            
             <form class="enquiry-form"   name="frm1" enctype="multipart/form-data" autocomplete="off" id="frm1" action="" method="post">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                 <input type="text"  name="i_name" id="i_name" required class="form-control" placeholder="Your Company Name">
            </div>
            <div class="form-group">
                <select class="form-control" name="emp_c" required>
                    <option value="">How many employees?</option>
                    <option>1 - 49</option>
                    <option>50 - 149</option>
                    <option>150 - 249</option>
                    <option>250 - 499</option>
                    <option>500 - 1000</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="cp_name" id="cp_name" required  class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
                <input type="text" name="mobile" class="form-control"placeholder="Contact No." id="mobile"   oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  pattern=".{10}" maxlength="10" required>
            </div>
            
             <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" id="email" required>
            </div>
            <div class="form-group">
                 <select class="form-control" required name="get_info">
                    <option value="">How did you hear about us?</option>
                    <option>Social Media</option>
                    <option>Newspaper</option>
                    <option>Magazine</option>
                    <option>Search Engine</option>
                    <option>Other</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button type="submit" name="save" class="btn-primary btn  ">Continue</button>
        </div>
        </form>
            
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