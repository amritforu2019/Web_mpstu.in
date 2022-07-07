<?php ob_start(); include('../con_base/functions.inc.php'); master_main();
 //include("super_user.php");
if(isset($_GET['del']))
{
    mysqli_query($DB_LINK,"delete from tbl_login where id=".$_GET['del']);
	
	$_SESSION['suc_msg']="User Deleted Succesfully";
	header("Location: user_list");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: User List</title>
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
          <li><a href="">Master Management</a></li>
          <li class="active">User List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> User List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="user_reg.php"  class="btn btn-primary various fancybox.iframe" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"></div>
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
              <table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <form action="" method="post" name="cform">
                  <?php $count=1;
				$qry=mysqli_query($DB_LINK,"select * from tbl_login where role='User' order by id desc") ;
				foreach($qry as $row)
				{ 
				?>
                  <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $row['user'];?></td>
                    <td><?php echo dec($row['pass']);?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td data-title="Action"><a class="various fancybox.iframe" href="user_edit?edit=<?php echo $row['id'];?>" ><i class="fa fa-edit fa-lg"></i> </a> &nbsp; <a href="user_list?del=<?php echo $row['id'];?>"><i class="fa fa-trash fa-lg red" onClick="return confirm('Are you sure you want to delete <?php echo $row['user'];?> ?')"></i> </a></td>
                  </tr>
                  <?php  $count++;}?>
                </form>
                </tbody>
                
              </table>
            </div>
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