Login Processing .. .. .. .. .. .. .. .. 

<?php require_once "../config/functions.inc.php";

error_reporting(0);



$back=$_POST['back'];

$session_expire_time=20*60;//20 minutes since last request

$current_timestamp=time(); //current time number of seconds since (Jan 1 1970 00:00:00 GMT).

$tmpuserid=$_POST['loginid'];

$tmppassword=enc($_POST['password']);

$sql = "select * from admin_login where user='$tmpuserid' and pass='$tmppassword'";

$result=mysql_query($sql);

$GetRows=mysql_num_rows($result);

if($line=mysql_fetch_array($result))

{

	$userid=strtolower($tmpuserid);

	$sess_admin_id=strtolower($tmpuserid);
	

	$_SESSION['sess_preference']=$line['preference'];

	$_SESSION['sess_admin_id']=$sess_admin_id;

	$_SESSION['sess_section']=-1;  // allow all pages to access

	if(trim($back)!='')

	{



		header("location: ".$back);



		exit();



	}


?>
<script>
location.href='admin_home.php';
</script>
<?
	



	exit();



}



else



{

	$sess_msg="Please Enter Valid Username/Password";

	$_SESSION['sess_msg']=$sess_msg;

?>
<script>
alert("Please Enter Valid Username/Password");
location.href='index.php';
</script>
<?

	exit();

}

?>

