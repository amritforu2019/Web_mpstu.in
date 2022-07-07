<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Validating</title>
</head>

<body>
<center><img src="images/processing.gif"  /> </center>
</body>
</html>
<?php  
require_once "con_base/functions.inc.php";
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT"); 
header("Cache-Control: no-store, must-revalidate");
header("Pragma: no-cache");
$back=$_POST['back'];
$session_expire_time=20*60;
$current_timestamp=time(); 
$tmpuserid=trim($_POST['enr_no']);
$tmppassword=trim($_POST['dob']);
$sql = "select * from  tbl_student where enr_no='$tmpuserid' order by id desc  "; //and rolid='3'
$result=mysqli_query($DB_LINK,$sql);
$GetRows=mysqli_num_rows($result);
if($line=mysqli_fetch_array($result))
{
    if($line['dob']==$tmppassword)
	{	 
	echo $_SESSION['sess_std_id']=$line['id'];
	$_SESSION['sess_enr_no']=$line['enr_no'];
	$_SESSION['sess_course']=$line['course'];
	$_SESSION['sess_category']=$line['category'];
	$_SESSION['sess_session']=$line['session'];
	$_SESSION['sess_student_id']=$line['student_id'];
	$_SESSION['sess_name']=$line['name'];
	header("location: student/");
	}
	else
	{ 
	?><script>alert('Please Enter Valid Username/Password'); location.href='index';</script><?	 
	}	  
}
else
{ 
?><script>alert('Please Enter Valid Username/Password'); location.href='index';</script><?
}
exit();
?>