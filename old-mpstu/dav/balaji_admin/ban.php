<? session_start();
include("../config/config.inc.php");
if(!isset($_GET['d']))
{
if(isset($_GET['p']))
{
$a=$_GET['p'];
$x=1;
$sess_msg="Member has been Activated Sucessfully";
}
else
{$a=$_GET['q'];
$x=0;
$sess_msg="Member has been Deactivated Sucessfully";
}
$qry="update members set status='$x' where id='$a'";
mysql_query($qry);
$_SESSION['sess_msg']=$sess_msg;
}
else
{
$qry="delete from  members  where id=".$_GET['d'];
mysql_query($qry);

$sess_msg="Selected Record has been Deleted Sucessfully";
$_SESSION['sess_msg']=$sess_msg;
}

		header("Location: members_list.php?start=". $_REQUEST['start']);
?>
