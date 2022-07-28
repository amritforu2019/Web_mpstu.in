<?php ob_start(); include('../con_base/functions.inc.php');   master_main();
if(isset($_GET['del']))
{
    mysqli_query($DB_LINK,"delete from tbl_contact_qry where id=".$_GET['del']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Deleted Successfully');
    header("location:contact-alumni");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Alumni Registration Data :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
<script type="text/javascript">
function cp(a,b,c)
{
	window.location.href="cust_list?txtsearch="+a+"&fdt="+b+"&tdt="+c;
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
           <li class="active">Alumni Registration Data</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1>Alumni Registration Data</h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <!--<a href="job_reg"  class="btn btn-primary" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a>--> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div><table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>#</th>
                      
                       <th>Contact Person</th>
                      
                       <th>On Date</th>
                       <th>Passing Year /Session </th>
                      
                       
                        
                      <th>Messege</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php
				$i=1; 
				$qry=mysqli_query($DB_LINK,"select * from tbl_contact_qry where typ='Alumni Registration'  order by id desc");
				foreach($qry as $row)
				{  
					
					?>
                    <tr class="table-activity">
                      <td><?php echo $i;?></td>
                      <td>
                      <?php if($row['s_name']!='') echo $row['s_name']; ?>
                      <?php if($row['contact']!='') echo '<br>'.$row['contact']; ?>
                      <?php if($row['email']!='') echo '<br>'.$row['email']; ?>
                        
                      <div class="tools action-buttons"><?php /*?> <a href="job_edit?edit=<?php echo $row['id'];?>" title="Edit" class="blue"><i class="ace-icon fa fa-pencil bigger-125"></i></a>
                       
                       <?php if($row['status']==1){ ?>
                        <a href="job_list?ban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>
                        <?php } else  { ?>
                        <a href="job_list?unban=<?php echo $row['id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>
                        <?php }?><?php */?>
                       <a class="red"onClick="return del(<?php echo $row['id'];?>, 'contact-alumni')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a> 
                       </div>
                      </td>
                      
                      
                       
   <td><?php echo  date('d/m/y', strtotime($row['subscription_date']));?></td>
   <td><?php echo $row['subject'];?></td>
                      
                       
                        
                          
                       <td>  <?php echo $row['msg'];?>  </td> 
                        
                         
                        
                        
                     </tr>
                    <?php $i++; } ?>
                </tbody>
                
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
  <!-- /.main-content -->
  <?php include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>