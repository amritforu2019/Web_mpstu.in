<?php ob_start(); include('../con_base/functions.inc.php');   master_main();

/*if(isset($_GET['del']))
{

  $qry=mysqli_query($DB_LINK,"select attachment from tbl_jobs where id=".$_GET['del']) or die(mysqli_error());
        $row=mysqli_fetch_array($qry);
        if($row['attachment']!='')
        {
        unlink('../assets/upload/attachment/'.$row['attachment']);
        }


    mysqli_query($DB_LINK,"delete from tbl_jobs where id=".$_GET['del']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Deleted Successfully');
    header("location: job_list");
	exit;
}
if(isset($_REQUEST['ban']))
{
    mysqli_query($DB_LINK,"update tbl_jobs set status=0 where id=".$_GET['ban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Unpublish Successfully');
    header("Location: job_list");
	exit;
}
if(isset($_REQUEST['unban']))
{
    mysqli_query($DB_LINK,"update tbl_jobs set status=1 where id=".$_GET['unban']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Published Successfully');
    header("Location: job_list");
	exit;
}*/
if(isset($_REQUEST['imp_no']))
{
    mysqli_query($DB_LINK,"update tbl_job set imp=0 where id=".$_GET['imp_no']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Marked as Not Importent Successfully');
    header("Location: job_list");
	exit;
}

if(isset($_REQUEST['imp_yes']))
{
    mysqli_query($DB_LINK,"update tbl_job set imp=1 where id=".$_GET['imp_yes']) or die(mysqli_error());
	$_SESSION['msg']=array('success', 'Marked as Importent Successfully');
    header("Location: job_list");
	exit;
}

	if(isset($_GET['del']))
	{
	mysqli_query($DB_LINK,"delete from tbl_job where id=".$_GET['del']);
	 $_SESSION['msg']=array('success', 'Deleted Successfully');
     header("Location: job_list");
	exit;
	}
	
	if(isset($_GET['dact']))
	{ 
	mysqli_query($DB_LINK,"update tbl_job set flag='0' where id=".$_GET['dact']);
	$_SESSION['msg']=array('success', 'Unpublish Successfully');
   header("Location: ".$_GET['back']); 
	exit;
	}
	
	if(isset($_GET['act']))
	{ 
	mysqli_query($DB_LINK,"update tbl_job set flag='1' where id=".$_GET['act']);
	$_SESSION['msg']=array('success', 'Publish Successfully');
   header("Location: ".$_GET['back']); 
	exit;
	}
	
	 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Jobs List :: <?php echo $SITE_NAME;?></title>
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
          <li><a href="">Jobs </a></li>
          <li class="active">Jobs List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1> Jobs List </h1>
        </div>
        <div class="row">
          <div class="col-xs-12 text-right"> <a href="job_reg"  class="btn btn-primary" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a> </div>
        </div>
        <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
                        <?php
 $where='';
if(isset($_REQUEST['ser'])) { $where=" where i_name like '%".$_REQUEST['ser']."%' or email like '%".$_REQUEST['ser']."%' or mobile like '%".$_REQUEST['ser']."%'  "; } 
$getdata_qry=mysqli_query($DB_LINK,"select * from tbl_job   $where order by id desc   ");
$count=mysqli_num_rows($getdata_qry);
 ?>
            <table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">
                <thead>
               <tr>
                      <th>#</th>
                      <th>Company</th>                      
       <th>Job title</th>    
       <th>Exprience</th>    
       <th>Salary</th>    
                      <th>Date</th>
                      <th>Action</th>
                      <th>Publish</th>
                      <th>Imp</th>
                    </tr>
                </thead>
                <?php if($count!=0) {  ?>
                  <tbody>
                     <?php $i=1; while($getresult=mysqli_fetch_array($getdata_qry)) { extract($getresult);
					
					
 $string = strtolower(clean($getresult['j_title'])).'.html';
 if($getresult['seo_url']!=$string)
 {									 
  mysqli_query($DB_LINK,"update tbl_job set seo_url='$string' where id = '".$getresult['id']."' ");
 }  ?>
                    <tr class="table-activity">
                      <td><?php echo $i;?> </td>
                 <td> <?php $st=mysqli_query($DB_LINK,"select * from tbl_company where id='".$getresult['c_id']."'") or die(mysqli_error);
 $get_s=mysqli_fetch_array($st);  ?><a href="#" title="<?php echo $get_s['i_name'];?>">View</a> </td>     	
       <td><?php echo $getresult['j_title']; ?></td>
   
     <!--  <td><?php echo $getresult['s_detail']; ?></td>-->
    <td><?php echo $getresult['exp']; ?></td>
     <?php /*?><td><?php echo $getresult['location']; ?></td>
    <td><?php echo $getresult['keys']; ?></td>
   <td><?php echo $getresult['jdesc']; ?></td><?php */?>
   <td><?php echo data_cutter($getresult['jsal'],20); ?></td>
     
                      <td><?php echo date_dmy_small($getresult['on_dt']);?></td>
                      <td style="font-size:22px;">
                      
                      <a title="Delete" href="#" onClick="return del(<?php echo $getresult['id'];?>,'job_list')" ><i class="fa fa-trash-o text-danger"></i></a>
                      
                      
                      <a title="View" target="_blank" href="../<?php echo $getresult['seo_url'];?>" ><i class="fa fa-eye text-primary"></i></a>
                      
                      
                    
                       
                       
                      </td>
                      <td>
                           <?php if($getresult['flag']==1) { ?>
                       <a title="Click To confirm" href="job_list?dact=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-check text-navy "></i></a> 
					   <?php } else { ?>
                       <a title="Not Confirm" href="job_list?act=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-times text-danger "></i></a> 
					   <?php }  ?></td>
                      
                      <td><?php
					    
					   if($row['imp']==0) 
					   { 
					   echo '<a href="job_list.php?imp_yes='.$getresult['id'].'" class="red"><strong>NO</strong></a>'; 
					   } 
					   else 
					   if($row['imp']==1) 
					   { 
					   echo '<a href="job_list.php?imp_no='.$getresult['id'].'" class="green"><strong>YES</strong></a>'; 
					   } 
					    ?></td>
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