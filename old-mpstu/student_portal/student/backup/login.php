<?php ob_start();
 require_once "con_base/functions.inc.php";
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . ""); 
header("Cache-Control: no-store, must-revalidate");
header("Pragma: no-cache");
$back=$_POST['back'];
$session_expire_time=20*60;
$current_timestamp=time(); 
$tmpuserid=trim($_POST['loginid']);
$tmppassword=trim($_POST['password']);
$sql = "select * from reg where email='$tmpuserid' and pass='$tmppassword'  "; //and rolid='3'
$result=mysqli_query($DB_LINK,$sql);
$GetRows=mysqli_num_rows($result);

if($line=mysqli_fetch_array($result))
{
	$userid=strtolower($tmpuserid);
	$sess_admin_id=strtoupper($tmpuserid);
	$_SESSION['sess_admin_id']=$sess_admin_id;
	$_SESSION['sess_comp_id']=$line['id'];
	$_SESSION['sess_comp_ids']=$line['id'];
	$_SESSION['sess_comp']=$line['name'];
	$_SESSION['sess_rollid']=$line['rolid'];
	$_SESSION['sess_user']=$line['user'];
	$_SESSION['sess_year']=$line['year'];
	if($line['r_typ']=='customer')
	{
	$_SESSION['r_typ']=$line['r_typ'];
	


header("location: index1.php?".time());

	}
	
	if($line['r_typ']=='service')
	{
	$_SESSION['r_typ']=$line['r_typ'];
header("location: affiliates/");

	}exit();	
}
else
{
$sess_msg="";
?>
<script>alert('Please Enter Valid Username/Password'); location.href='index1.php';</script>
<?
exit();
}
?>