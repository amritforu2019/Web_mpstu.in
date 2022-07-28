<?php ob_start(); include('../con_base/functions.inc.php'); 



   

/*if(isset($_GET['payout']))
{
	 
 
	
	
	$getdata_qry=mysqli_query($DB_LINK,"select * from tbl_staff  where  status='1' and  b_upd!='".date('Ymd')."-3' order by id asc  limit 0,1 ");
	foreach( $getdata_qry as $getresult) 
	{ 
	 
	
	
	
	
	  echo $m_id=$getresult['m_id'] ;
	  echo '<br> Name : '.$name=$getresult['name'] ; 
	  $pay_dt=date('Y-m-d');
	  $pay_amt=0 ;
	  echo '<br> Curre Lev : '.$pay_lev=$getresult['b_level'];
	  $pay_lev=$pay_lev+1;
	  
	  $tleft1=0;	  
	  $tleft1=sizeof(explode("~",rec_anyleg_all($getresult['m_id'],'1')))-1;  
	  echo '<br>Total left 1 :'.$tleft1;
	  
	  $tleft2=0;	  
	  $tleft2=sizeof(explode("~",rec_anyleg_all($getresult['m_id'],'2')))-1;  
	  echo '<br>Total left 2 :'.$tleft2;
	  
	  $tright1=0;	  
	  $tright1=sizeof(explode("~",rec_anyleg_all($getresult['m_id'],'3')))-1;  
	  echo '<br>Total right 1 :'.$tright1;
	  
	  $tright2=0;	  
	  $tright2=sizeof(explode("~",rec_anyleg_all($getresult['m_id'],'4')))-1;  
	  echo '<br>Total right 2 :'.$tright2;
	  
  
	  
	  if($pay_lev==1)
	  {
		  if(($tleft1+$tleft2)>=2 && ($tright1+$tright2)>=2)
		  {
			 $getdata_pay=mysqli_query($DB_LINK,"select * from  tbl_payout  where  m_id='".$getresult['m_id']."' and b_level='1'     ");
			 if(mysqli_num_rows($getdata_pay)<1)
			 {	
			
			$pay_amt="1000";
			
			$getdata_qry=mysqli_query($DB_LINK,"INSERT INTO `tbl_payout` set  `m_id`='$m_id', `name`='$name', `pay_dt`='$pay_dt', `status`='0',   `pay_amt`='$pay_amt', b_level='1' ");
			
			mysqli_query($DB_LINK,"update tbl_staff set  b_level='1'  where m_id='$m_id'  ");
	 
		  	echo '<br>Achive First Level Mem ID :  '.$m_id;
			 }
		  }	  
	  }
	  
	  
	  
	   if($pay_lev==2)
	  {
		  if(($tleft1+$tleft2)>=10 && ($tright1+$tright2)>=10)
		  {
			 $getdata_pay=mysqli_query($DB_LINK,"select * from  tbl_payout  where  m_id='".$getresult['m_id']."' and b_level='2'     ");
			 if(mysqli_num_rows($getdata_pay)<1)
			 {	
			
			$pay_amt="1600";
			
			$getdata_qry=mysqli_query($DB_LINK,"INSERT INTO `tbl_payout` set  `m_id`='$m_id', `name`='$name', `pay_dt`='$pay_dt', `status`='0',   `pay_amt`='$pay_amt', b_level='2' ");
			
			mysqli_query($DB_LINK,"update tbl_staff set  b_level='2'  where m_id='$m_id'  ");
	 
		  	echo '<br>Achive Secand Level Mem ID :  '.$m_id;
			 }
		  }	  
	  }
	  
	  
	  
	  if($pay_lev==3)
	  {
		  if(($tleft1+$tleft2)>=42 && ($tright1+$tright2)>=42)
		  {
			 $getdata_pay=mysqli_query($DB_LINK,"select * from  tbl_payout  where  m_id='".$getresult['m_id']."' and b_level='3'     ");
			 if(mysqli_num_rows($getdata_pay)<1)
			 {	
			
			$pay_amt="2560";
			
			$getdata_qry=mysqli_query($DB_LINK,"INSERT INTO `tbl_payout` set  `m_id`='$m_id', `name`='$name', `pay_dt`='$pay_dt', `status`='0',   `pay_amt`='$pay_amt', b_level='3' ");
			
			mysqli_query($DB_LINK,"update tbl_staff set  b_level='3'  where m_id='$m_id'  ");
	 
		  	echo '<br>Achive Third Level Mem ID :  '.$m_id;
			 }
		  }	  
	  }
	   
//$getdata_qry=mysqli_query($DB_LINK,"INSERT INTO `tbl_payout` set  `m_id`='$m_id', `name`='$name', `pay_dt`='$pay_dt', `status`='$status',   `pay_amt`='$pay_amt',   `pay_lev`='$pay_lev' ");
mysqli_query($DB_LINK,"update tbl_staff set   b_upd='".date('Ymd')."-3' where m_id='$m_id'  ");
	}
 exit;
}
	
	if(isset($_GET['dact']))
	{ 
	mysqli_query($DB_LINK,"update tbl_payout set status='0' where id=".$_GET['dact']);
	//$_SESSION['sess_msg']="Rocord Disabled";
	$_SESSION['msg']=array('success', 'Disable Payout');
	header("Location: ".$_GET['back']); 
	exit;
	}	*/
	 
mysqli_close($DB_LINK);
ob_end_flush();
?>