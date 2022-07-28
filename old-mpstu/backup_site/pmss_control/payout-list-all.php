<?php ob_start(); include('../con_base/functions.inc.php');   master_main();

	/*if(isset($_GET['dele']))
	{
	mysqli_query($DB_LINK,"delete from tbl_staff where id=".$_GET['dele']);
	$_SESSION['sess_msg']="Record Deleted";
	header("Location: ".$_GET['back']); 
	exit;
	}*/
	
	if(isset($_GET['dact']))
	{ 
	mysqli_query($DB_LINK,"update tbl_payout set status='0' where id=".$_GET['dact']);
	//$_SESSION['sess_msg']="Rocord Disabled";
	$_SESSION['msg']=array('success', 'Disable Payout');
	header("Location: ".$_GET['back']); 
	exit;
	}
	
	if(isset($_GET['act']))
	{ 
	mysqli_query($DB_LINK,"update tbl_payout set status='1',apr_dt=now() where id=".$_GET['act']);
	//$_SESSION['sess_msg']="Rocord Active";
	
	/*$sql="SELECT * FROM  tbl_staff  where id='".$_GET['act']."'  ";
$result =mysqli_query($DB_LINK,$sql);
$get_data_c=mysqli_fetch_array($result); 


		$text='Dear '.$get_data_c['name'].' Your account is activated successfully , now you can login. Regards '.$SITE_NAME;

 
  $data ="mobile=".$msg_contact."&pass=".$msg_pass."&senderid=".$msg_sender_id."&to=".$get_data_c['mobile']."&msg=".$text."";

  
// Send the POST request with cURL
$ch = curl_init('http://tsms.friendzitsolutions.biz/sendsms.aspx?'); //note https for SSL
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); //This is the result from Textlocal
curl_close($ch);*/

	$_SESSION['msg']=array('success', 'Payout activated successfully');
	header("Location: ".$_GET['back']); 
	exit;
	}
	 
	
	 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>All Payout List :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
<script>
function load_page(val)
{
if(val!='')
{
window.location.href="payout-list?ser="+val;
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
          <li><a href="">Payout </a></li>
          <li class="active">All Payout List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1>All Payout List </h1>
        </div>
        
        
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
               <?php
 $where='';
if(isset($_REQUEST['ser'])) { $where=" where i_name like '%".$_REQUEST['ser']."%' or email like '%".$_REQUEST['ser']."%' or mobile like '%".$_REQUEST['ser']."%'  "; } 
$getdata_qry=mysqli_query($DB_LINK,"select * from `tbl_payout` $where order by id desc  limit 0,500   ");
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
                       <a title="Click To confirm" href="payout-list?dact=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-check text-success fa-lg"></i></a> 
					   <?php } else { ?>
                       <a title="Not Confirm" href="payout-list?act=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-times text-danger  fa-lg"></i></a> 
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