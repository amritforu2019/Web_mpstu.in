<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Validating</title>
</head>

<body>
<center><img src="images/progressbar.gif"  /> </center>
</body>
</html>
<?php
require_once "../con_base/functions.inc.php";
$back=$_REQUEST['back'];
$session_expire_time=20*60;//20 minutes since last request
$current_timestamp=time(); 
$tmpuserid=$_COOKIE['user'];
$tmppassword=($_COOKIE['user_data']);
$sql = "select * from admin_login where user='$tmpuserid' ";
$ip=get_ip();
$result=mysqli_query($DB_LINK,$sql);
$GetRows=mysqli_num_rows($result);
if($GetRows>0)
{
$line=mysqli_fetch_array($result);
if($line['pass']==$tmppassword)
{
	$userid=strtolower($tmpuserid);
	$sess_admin_id=strtolower($tmpuserid);
	$_SESSION['master']=$sess_admin_id;
	$_SESSION['master_main']=$sess_admin_id;
	$_SESSION['master_username']=$line['username'];	
	ip_store($ip);	
	if($back!='')echo "<script>location='".$back."';</script>"; 
	else
	echo "<script>location='home';</script>";
	exit;	
}
else
{
			session_destroy();
			
			$cookie_name = "user_data";
			$cookie_value = '';
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
			
			$cookie_name = "user";
			$cookie_value = '';
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
			echo "<script>location='index';</script>";
			exit();
}
}
else
{
		session_destroy();
		
		$cookie_name = "user_data";
		$cookie_value = '';
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		
		$cookie_name = "user";
		$cookie_value = '';
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
		echo "<script>location='index';</script>";
		exit();
}
ob_end_flush();
?>