<html>
<head>
    <title>Login Processing..</title>
</head>
<body>
<center>
    <h3>
        Login Processing ........
    </h3>
</center>
</body>
</html>
<?php
require_once "../con_base/functions.inc.php";
$tmpuserid=$_POST['loginid'];
$tmppassword=enc($_POST['password']);
$sql = "select * from admin_login where user='$tmpuserid' ";
//$ip=get_ip();
$result=mysqli_query($DB_LINK,$sql);
$GetRows=mysqli_num_rows($result);
if($GetRows>0)
{
$line=mysqli_fetch_array($result);
if($line['pass']==$tmppassword)
{
	 $userid=strtolower($tmpuserid);
	$sess_admin_id=strtolower($tmpuserid);

	$_SESSION['master_sess_mpstu']=$sess_admin_id;
	$_SESSION['master_username']=$line['username'];	
	$_SESSION['master_mpstu_rolid']=$line['rolid'];
	echo "<script>location='home';</script>";
	exit;
}
else
{
	$_SESSION['sess_msg']="Please Enter Valid Username/Password";
	echo "<script>location='index';</script>";
	exit();
}
}
else
{
	$_SESSION['sess_msg']="Please Enter Valid Username/Password";
	echo "<script>location='index';</script>";
	exit();
}

ob_end_flush();
?>