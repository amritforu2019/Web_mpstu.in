<?php ob_start(); include('../con_base/functions.inc.php');   master_main();
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Approved Payout List</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
 
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div  class="main-content">
    <div class="main-content-inner">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Payout </a></li>
          <li class="active">Approved Payout List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1>Approved Payout List </h1>
        </div>
        
       
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
               <?php
 $where='';
if(isset($_REQUEST['ser'])) { $where=" where i_name like '%".$_REQUEST['ser']."%' or email like '%".$_REQUEST['ser']."%' or mobile like '%".$_REQUEST['ser']."%'  "; } 
$getdata_qry=mysqli_query($DB_LINK,"select * from `tbl_payout` where status='1' $where order by id desc limit 0,500   ");
$count=mysqli_num_rows($getdata_qry);
 ?>
                <table class="table table-striped  " id="example">
                  <thead>
                    <tr>
                      <th>#</th> 
                      <th>Member</th>
                      <th>Level</th>
                      <th>Pay Amount</th>                       
                      <th>Pay Date</th>
                      <th>Status</th>
                      <th>Approved Date</th>
                      
                      
                       
                    </tr>
                  </thead>
                  <?php if($count!=0) {  ?>
                  <tbody>
                    <?php $i=1; while($getresult=mysqli_fetch_array($getdata_qry)) { extract($getresult);
									
								 
									  ?>
                    <tr>
                      <td><?php echo $i;?> </td>
                      <td><?php echo $getresult['m_id'];?><br>  
                      <?php echo $getresult['name'];?> 
                       </td>
                       <td><?php echo $getresult['b_level'];?> </td>
                       <td><?php echo $getresult['pay_amt'];?> </td>
                       <td><?php echo date_dmy_small($getresult['pay_dt']);?></td>
                      <td  >
                         <?php if($getresult['status']==1) { ?>
                        Approved <i class="fa fa-check text-success fa-lg"></i>
					   <?php } else { ?>
                        Pending <i class="fa fa-times text-danger  fa-lg"></i> 
					   <?php }  ?>
                       </td>
                      <td><?php echo date_dmy_small($getresult['apr_dt']);?></td>
                       
                   
                    
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
  </div>
  <?php include('include/footer.php');?>

  <!-- /.main-content -->
 <?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
 
?>