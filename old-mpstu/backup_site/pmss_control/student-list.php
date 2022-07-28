<?php ob_start(); include('../con_base/functions.inc.php'); master_main();
 //include("super_user.php");
if(isset($_GET['del']))
{
    mysqli_query($DB_LINK,"delete from std_list where id=".$_GET['del']);
	
	$_SESSION['suc_msg']="Deleted Succesfully";
	header("Location: student-list");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: Student List</title>
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
          <li><a href="">Student T.C.</a></li>
          <li class="active">Student List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Student List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="student-add.php"  class="btn btn-primary " type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
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
                     <th>SNo. </th>
                     <th>TC NO. </th>   
                     <th>Name </th>   
                     <th>Father's Name </th>
                     <th>Course  </th>
                     <th>Roll No </th>
                     <th>View TC</th>  
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <form action="" method="post" name="cform">
                  <?php $count=1;
				$qry=mysqli_query($DB_LINK,"select * from std_list order by id desc") ;
				foreach($qry as $row)
				{ 
				?>
                  <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $row['reg'];?></td>
                    <td><?php echo ($row['name']);?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['course'];?></td>
                    <td><?php echo $row['center'];?></td>
                    <td data-title="Action"><a class="various2 fancybox.iframe" href="../upload/student/<?php echo trim($row['img']);?>" ><i class="fa fa-search fa-lg"></i> </a>  </td>
                    <td data-title="Action">

                      <a 
                       href="student-add?id=<?php echo $row['id'];?>" ><i class="fa fa-edit fa-lg"></i> </a> 
                      &nbsp;

                     <a href="student-list?del=<?php echo $row['id'];?>"><i class="fa fa-trash fa-lg red" onClick="return confirm('Are you sure you want to delete <?php echo $row['user'];?> ?')"></i> </a></td>
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