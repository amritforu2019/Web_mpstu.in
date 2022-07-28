<? 
require_once("../con_base/functions.inc.php");

$id=$_REQUEST['id'];

$sql_data="delete  from tbl_result_marks where  `id`='$id' ";
$result=mysqli_query($DB_LINK,$sql_data);

