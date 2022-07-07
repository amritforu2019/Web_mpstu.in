<?php ob_start(); include('../con_base/functions.inc.php');   master_main();

	/*if(isset($_GET['dele']))
	{
	mysqli_query($DB_LINK,"delete from tbl_staff where id=".$_GET['dele']);
	$_SESSION['sess_msg']="Record Deleted";
	header("Location: ".$_GET['back']); 
	exit;
	}*/

  if(isset($_POST['demoid']))
  {

for($k=100002;$k<=100011;$k++)
{
$qur=mysqli_query($DB_LINK,"select * from tbl_staff where m_id='".$k."'   ") or die(mysqli_error());




 if(mysqli_num_rows($qur)>0  )
 {

    for($i=1;$i<=10;$i++)
    {

    $qr_counter=mysqli_query($DB_LINK,"select * from tbl_staff where r_id='".$k."'  ") or die(mysqli_error());
    $counter_member=mysqli_num_rows($qr_counter); 
   

    if($counter_member<10) 
    {
      $login_id='KS'.rand(10000000,99999999);  
      echo $k.' For '.$counter_member.' Then '. $login_id.'<br>' ;           
    
  
  $qur = mysqli_query( $DB_LINK, "select * from tbl_staff order by id desc")or die( mysqli_error() );
  $city = mysqli_fetch_array( $qur );
  $p_id = $city[ 'm_id' ];
  $m_id = $p_id + 1;
  $_SESSION['member_id']=$m_id;
  //Placer//
  //rec_anyleg( $DB_LINK, $_POST[ 'r_id' ], $_POST[ 'placing' ] );
  //$p_id = $_SESSION['placer_id'];
  
  $p_id = $k;  
  $m_verify=0; 
     
    $sqlst=mysqli_query($DB_LINK,"select * from state where state_id='34'") or die(mysqli_error());
    $datas_name=mysqli_fetch_array($sqlst);
    $stname=$datas_name['state'];   
    
      
    $sqlct=mysqli_query($DB_LINK,"select * from city where city_id='1273'") or die(mysqli_error());
    $datac_name=mysqli_fetch_array($sqlct);
    $ctname=$datac_name['city'];     
  
  


    mysqli_query( $DB_LINK, "insert into tbl_staff set 
      title='Mr',
       p_id='" . $p_id . "',
       m_id='" . $m_id . "', 
       r_id='" . $p_id . "',
     login_id='$login_id',
       placing='" . $i. "',
        name='KS Cash Admin',
     email='test@gmail.com', 
     address='Varanasi', 
     state='34', 
     city='1273', 
     pin='221010',
     state_n='$stname',
     city_n='$ctname',
     m_verify='$m_verify',
     `nom_name`='Nominee name',
     nom_rel='Nominee relation',
          doj='" . date( 'Y-m-d' ) . "',
           mobile='" . rand(10000000,99999999) . "',            
             pass='1234',
              regdate='" . date( "Y-m-d" ) . "', 
               ipaddress='" . $_SERVER[ 'REMOTE_ADDR' ] . "' " )or die( mysqli_error() );

    }

    //$_SESSION['msg']=array('success', 'Demo Id Generated');
  }
  
}

}

  }
	
	if(isset($_GET['dact']))
	{ 
	mysqli_query($DB_LINK,"update tbl_staff set status='0' where id=".$_GET['dact']);
	//$_SESSION['sess_msg']="Rocord Disabled";
	$_SESSION['msg']=array('success', 'Account Disable Now.');
	header("Location: ".$_GET['back']); 
	exit;
	}
	
	if(isset($_GET['act']))
	{ 
	mysqli_query($DB_LINK,"update tbl_staff set status='1' ,act_date='".date('Y-m-d')."' where id=".$_GET['act']);
	//$_SESSION['sess_msg']="Rocord Active";
	
	$sql="SELECT * FROM  tbl_staff  where id='".$_GET['act']."'  ";
$result =mysqli_query($DB_LINK,$sql);
$get_data_c=mysqli_fetch_array($result); 


		$text='Dear '.$get_data_c['name'].' Your account is activated and verified successfully , now you can check your account and add new joining. Regards '.$SITE_NAME;

 
  $data ="mobile=".$msg_contact."&pass=".$msg_pass."&senderid=".$msg_sender_id."&to=".$get_data_c['mobile']."&msg=".$text."";

  
// Send the POST request with cURL
$ch = curl_init('http://tsms.friendzitsolutions.biz/sendsms.aspx?'); //note https for SSL
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); //This is the result from Textlocal
curl_close($ch);

	$_SESSION['msg']=array('success', 'Account Enable Now.');
	header("Location: ".$_GET['back']); 
	exit;
	}
	if(isset($_GET['sms']))
	{
		
$sql="SELECT * FROM  tbl_staff  where id='".$_GET['sms']."'  ";
$result =mysqli_query($DB_LINK,$sql);
$get_data_c=mysqli_fetch_array($result); 


		$text='Dear '.$get_data_c['name'].' Thank You for registration. Your user id is '.$get_data_c['m_id'].' and mobile is '.$get_data_c['mobile'].', password is '.$get_data_c['pass'].' Regards '.$SITE_NAME;

 
  $data ="mobile=".$msg_contact."&pass=".$msg_pass."&senderid=".$msg_sender_id."&to=".$get_data_c['mobile']."&msg=".$text."";

  
// Send the POST request with cURL
$ch = curl_init('http://tsms.friendzitsolutions.biz/sendsms.aspx?'); //note https for SSL
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); //This is the result from Textlocal
curl_close($ch);

//$_SESSION['sess_msg']="SMS Sent Successfully";
$_SESSION['msg']=array('success', 'SMS Sent Successfully');
	header("Location: ".$_GET['back']); 
	exit;
	}
	
	 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Member List :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
<script>
function load_page(val)
{
if(val!='')
{
window.location.href="member-list?ser="+val;
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
          <li><a href="">Member </a></li>
          <li class="active">Member List</li>
        </ul>
        <!-- /.breadcrumb -->
      </div>
      <div class="page-content">
        <!-- /.page-header -->
          <div class="page-header">
          <h1> Member List </h1>
        </div>
        
        <div class="row">
      <form name="frm" method="POST" action="">
    <div class="col-xs-6  ">
      <input type="text" class="form-control" name="search_data" value="" required placeholder="Search record by Mobile no / Login Id / Name /">
    </div>
    <div class="col-xs-4  ">
       <input type="submit" class="btn btn-success"  name="search" value="Search Record"  />
        <input type="button" class="btn btn-primary" onclick="javascript:location.href='member-list'"  name="res" value="Reset Search"  />
    </div>
    <div class="col-xs-4  ">
    </div>
              <!--<input type="submit" class="btn btn-primary"  name="demoid" value="Add Demo Id loop"  /> -->
 
        

       </div> </form>
        </div> <!-- /.page-header -->
        <div class="row">
          <div class="col-xs-12">
            <div class="clearfix">
              <div class="pull-right tableTools-container"> </div>
            </div>
               <?php
 $where='';
if(isset($_POST['search'])) 
  { 
    $where=" where  name like '%".$_POST['search_data']."%' or login_id like '%".$_POST['search_data']."%' or mobile like '%".$_POST['search_data']."%'  or m_id like '%".$_POST['search_data']."%'  ";
  }  
 ?>
                

     <table class="table table-striped  " id="example1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Member Id</th>
                      <th>Member Data</th>
                    
                      <th>Address</th>
                      <th>Password</th>
                      <th>Date</th>
                      <th>Active</th>
                      <th>View</th>
                      <th>SMS</th>
                       
                    </tr>
                  </thead>
                  <tbody>
<?php

        if (isset($_GET['pageno'])) 
        {
            $pageno = $_GET['pageno'];
        } else 
        {
            $pageno = 1;
        }
        $no_of_records_per_page = 25;
        $offset = ($pageno-1) * $no_of_records_per_page;

         $i=$offset;

        $total_pages_sql = "SELECT COUNT(*) FROM tbl_staff  $where";
        $result = mysqli_query($DB_LINK,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM tbl_staff  $where order by id desc LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($DB_LINK ,$sql);
        while($getresult = mysqli_fetch_array($res_data))
        {
            
        $i++;
          if($getresult['login_id']=='')
          {
            $login_id='KS'.rand(10000000,99999999);
            mysqli_query($DB_LINK,"update tbl_staff set login_id='$login_id' where id=".$getresult['id']);
          }
                  
                 
                    ?>
                    <tr>
                      <td><?php echo $i;?> </td>
                      <td><?php echo $getresult['login_id'];?><br>
            <br>
            Comp : <?php echo $getresult['m_id'];?><br>
            Ref : <?php echo $getresult['r_id'];?></td>
                      <td><?php echo $getresult['name'];?><br>
            <?php echo $getresult['email'];?><br>
                      <?php /*?><?php if($getresult['e_verify']==1) { ?>
                        <i class="fa fa-check text-navy ">Verified</i>  
             <?php } else { ?>
                        <i class="fa fa-times text-danger ">Not verify</i> 
             <?php }  ?> 
            <?php ?><br><?php */?>
            <?php echo $getresult['mobile'];?><br>
                       <?php if($getresult['m_verify']==1) { ?>
                          <i class="fa fa-check text-navy ">Verified</i>  
             <?php } else { ?>
                        <i class="fa fa-times text-danger ">Not verify</i> 
             <?php }  ?> 
                       </td>
                      <td><?php echo $getresult['address'];?><br> <?php echo $getresult['city_n'];?> <?php echo $getresult['state_n'];?> <br><?php echo $getresult['pin'];?></td>
                      <td><?php echo $getresult['pass'];?></td>
                      <td><?php echo date_dmy_small($getresult['regdate']);?></td>
                      <td class="text-center">
                         <?php if($getresult['status']==1) { ?>
                       <a class="blue" title="Click To confirm" href="member-list?dact=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-check text-success "></i> Activated</a> 
             <?php } else { ?>
                       <a class="red"  title="Not Confirm" href="member-list?act=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-times text-danger "></i> Inactive</a> 
                       <?php 
                       $qry_act=mysqli_query($DB_LINK,"select * from `tbl_upgrade` where m_id=".$getresult[ 'm_id' ]) or die(mysqli_error());
                       $row_act=mysqli_fetch_array($qry_act);
                       if($row_act['pay_tranid']!=''){

                       ?> 
                        <br>
                        Payment Date  : <?php echo $row_act['pay_date'];?><br>Tran Id  : <?php echo $row_act['pay_tranid'];?>
                      
             <?php } }   ?>
                       </td>
                      <td style="font-size:22px;">
                       
                        <a title="View Profile" target="_blank" href="profile?id=<?php echo $getresult['id'];?>"  ><i class="fa fa-eye text-primary "></i></a>                       
                       </td> <td style="font-size:22px;">
                       
                       
                       <a title="Send SMS" href="member-list?sms=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>"  ><i class="fa fa-envelope  text-warning"></i></a>
                       
                                             </td>
                      <?php /*?> <td style="font-size:22px;">
                      <a title="Delete" href="member-list?dele=<?php echo $getresult['id'];?>&back=<?php echo $_SERVER['REQUEST_URI'];?>" onClick="return del();"><i class="fa fa-trash-o text-danger"></i></a>
                       </td>
                     <?php */?>
                    </tr>
                    <?php   ?>
                  
            <?php
        }
         
    ?></tbody>
  </table>
<div class="row">
          <div class="col-xs-12 text-center">
    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
  </div>
</div>
                
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
 
 
  <?php include('include/footer.php');?>

  <!-- /.main-content -->
 <?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>