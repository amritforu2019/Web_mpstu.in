<?php ob_start(); include('../con_base/functions.inc.php'); master_main();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: Dashboard</title>
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
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index.php">Home</a> </li>
          <li class="active">Dashboard</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <div class="page-header">
          <h1> Today : <?php echo date("l, F jS, Y");?> <span class="text-success pull-right"> 
            </span></h1>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
              <div class="col-sm-6">
                <div class="widget-box transparent">
                  <!--<div class="widget-header widget-header-flat">
                    <h4 class="widget-title lighter"> <i class="ace-icon fa fa-bell icon-animated-bell"></i> Depo Reminder Alert</h4>
                    <div class="widget-toolbar"> <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a> </div>
                  </div>-->
                  <div class="widget-body">
                    <div class="widget-main no-padding">
                      <!--<table class="table table-bordered table-striped">
                      <?php
                       $qry=mysqli_query($DB_LINK,"select * from customer  where fullpay=0 and booked=1 and status=1 order by name asc") ;
					   if(mysqli_num_rows($qry) > 0){
					   ?>
                     
                        <thead class="thin-border-bottom">
                          <tr>
                          <th> <i class="ace-icon fa fa-caret-right blue"></i>SN </th>
                            <th> <i class="ace-icon fa fa-caret-right blue"></i>Name</th>
                            <th class="hidden-480"> <i class="ace-icon fa fa-caret-right blue"></i>EMI <i class="ace-icon fa fa-inr bigger-110"></i></th>
                            <th> <i class="ace-icon fa fa-caret-right blue"></i>View </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
					   $count=1;
				foreach($qry as $row)
				{
					?>
                          <tr>
                            <td><?php echo $count;?></td>
                           <td> <b class="green"><?php echo $row['name'];?></b></td>
                           <td>
                           <b class="blue">
						   
						   <?php 
						   
					  $qry1=mysqli_query($DB_LINK,"select * from flat_booking where customer_id=".$row['id']);
				$row1=mysqli_fetch_array($qry1);
			 
				$qry2=mysqli_query($DB_LINK,"select * from emi_status where flatbook_id='".$row1['id']."' limit 1  ") or die(mysqli_error());
				$row2=mysqli_fetch_array($qry2);
						   echo $row2['emi'];
						   ?></b>
                           </td>
                           <td class="hidden-480"><a title="Click To View Details" href="emi_reminder?remin=<?php echo $row['id'];?>"><span class="label label-info arrowed-right arrowed-in">
                       View
                      
                            </span></a></td>
                          </tr>
                        <?php $count++; } ?>
                      </tbody>
                      <?php } else{?>
                     <tbody>
                    <tr>
                    <td colspan="4">
                    	<div class="text-center" style="color:#F00;">
                        <?php echo "Currently no record available";?>
                        </div>
                    </td>
                    </tr>
                    </tbody>
                    <?php }?>
                      </table>-->
                    </div>
                    <!-- /.widget-main -->
                  </div>
                  <!-- /.widget-body -->
                </div>
              </div>
              <!--<div class="col-sm-6">
                <div class="row">
                  <div class="widget-box">
                    <div class="widget-header widget-header-flat">
                      <h4 class="widget-title smaller"> <i class="ace-icon fa fa-bell icon-animated-bell"></i> Enquiry Alerts </h4>
                      <div class="widget-toolbar"> <a href="#" data-action="collapse"> <i class="ace-icon fa fa-chevron-up"></i> </a> </div>
                    </div>
                    <div class="widget-body">
                      <div class="widget-main">
                        <table class="table table-bordered table-striped">
                      <?php 
					$qry=mysqli_query($DB_LINK,"select * from remarks r, enquiry e, login l where r.enqid=e.enqid and e.status=0 and r.nextcalldate='".date("Y-m-d")."' and e.tuser=l.id") ;
					  if(mysqli_num_rows($qry) > 0){
						  ?>
                        <thead class="thin-border-bottom">
                          <tr>
                          <th> <i class="ace-icon fa fa-caret-right blue"></i>SN </th>
                            <th> <i class="ace-icon fa fa-caret-right blue"></i>View </th>
                            <th> <i class="ace-icon fa fa-caret-right blue"></i>Name </th>
                            <th class="hidden-480"> <i class="ace-icon fa fa-caret-right blue"></i>Mobile </th>
                            <th class="hidden-480"> <i class="ace-icon fa fa-caret-right blue"></i>User </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
					  $count=1;
					  foreach($qry as $row)
					  {
					  ?>
                          <tr>
                            <td><?php echo $count;?></td>
                            
                            <td class="hidden-480"><span class="label label-success arrowed-right arrowed-in">
                            <a href="#" class="show-pop-delay pull-left" data-content="<p>Remark : <?php echo $row['remarks'];?></p>" data-delay-show="150" data-delay-hide="100"  data-title="Remark Detail" data-placement="right" style="color: #fff; text-decoration: none;">
                      <?php echo 'View';?>
                      </a>
                            </span></td>
                           <td> <b class="blue"><?php echo $row['Customer_Name'];?></b></td>
                           <td><b class="orange"><?php echo $row['Mobile'];?></b></td>
                           <td><b class="blue"><?php echo $row['user'];?></b></td>
                          </tr>
                        <?php $count++;}?>
                      </tbody>
                     <?php } else{?>
                     <tbody>
                    <tr>
                    <td colspan="4">
                    	<div class="text-center" style="color:#F00;">
                        <?php echo "Currently no record available";?>
                        </div>
                    </td>
                    </tr>
                    </tbody>
                    <?php }?>
                      </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.col -->
    <!-- /.row -->
  </div>
  <!-- /.page-content -->
  <!-- /.main-content -->
  <?php include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
ob_end_flush();
?>