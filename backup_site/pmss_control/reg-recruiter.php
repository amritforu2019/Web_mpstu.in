<?php ob_start(); include('../con_base/functions.inc.php');   master_main();

	if(isset($_GET['dele']))
	{
	mysqli_query($DB_LINK,"delete from tbl_company where id=".$_GET['dele']);
	$_SESSION['sess_msg']="Record Deleted";
	header("Location: ".$_GET['back']); 
	exit;
	}
	
	if(isset($_GET['dact']))
	{ 
	mysqli_query($DB_LINK,"update tbl_company set flag='0' where id=".$_GET['dact']);
	$_SESSION['sess_msg']="Rocord Disabled";
	header("Location: ".$_GET['back']); 
	exit;
	}
	
	if(isset($_GET['act']))
	{ 
	mysqli_query($DB_LINK,"update tbl_company set flag='1' where id=".$_GET['act']);
	$_SESSION['sess_msg']="Rocord Active";
	header("Location: ".$_GET['back']); 
	exit;
	}
	
	 
	 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Recruiter List :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
<script>
function load_page(val)
{
if(val!='')
{
window.location.href="job-list?ser="+val;
}
}
 
 


</script>
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div  class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Recruiter </a></li>
          <li class="active">Recruiter/Company List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1> Recruiter/Company List </h1>
        </div>
        
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="emp_reg"  class="btn btn-primary" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
        </div> 
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
          <?php
 $where='';
if(isset($_REQUEST['ser'])) { $where=" where i_name like '%".$_REQUEST['ser']."%' or email like '%".$_REQUEST['ser']."%' or mobile like '%".$_REQUEST['ser']."%'  "; } 
$getdata_qry=mysqli_query($DB_LINK,"select * from tbl_company   $where order by id desc   ");
$count=mysqli_num_rows($getdata_qry);
 ?>
            <table class="table table-striped text-uppercase">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Name</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      
                      <th>Password</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php if($count!=0) {  ?>
                  <tbody>
                    <?php $i=1; while($getresult=mysqli_fetch_array($getdata_qry)) { extract($getresult);
									
								 
									  ?>
                    <tr>
                      <td><?php echo $i;?> </td>
                     <td><?php echo $getresult['i_name'];?><br>No Of Emp : <?php echo $getresult['emp_c'];?><br>Get Info From : <?php echo $getresult['get_info'];?> </td>
                      <td><?php echo $getresult['cp_name'];?> </td>
                      <td><?php echo $getresult['email'];?> 
                      
					    </td>
                      <td><?php echo $getresult['mobile'];?> 
                       </td>
                       
                      <td><?php echo $getresult['password'];?></td>
                      <td><?php echo date_dmy_small($getresult['reg_dt']);?></td>
                      <td style="font-size:22px;"><a title="Delete" href="reg-recruiter?dele=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>" onClick="return del();"><i class="fa fa-trash-o text-danger"></i></a>
                         <?php if($getresult['flag']==1) { ?>
                       <a title="Click To confirm" href="reg-recruiter?dact=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-check text-navy "></i></a> 
					   <?php } else { ?>
                       <a title="Not Confirm" href="reg-recruiter?act=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-times text-danger "></i></a> 
					   <?php }  ?>
                       
                       
                      </td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                  <?php } ?>
                </table>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
              
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
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>