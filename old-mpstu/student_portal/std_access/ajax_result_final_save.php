<? 
require_once("../con_base/functions.inc.php");

$rdd=$_REQUEST['rdd'];
$r_status=$_REQUEST['r_status'];
$roll_no=$_REQUEST['roll_no'];
$res_id=$_REQUEST['res_id'];
$session=$_REQUEST['session'];
$year=get_student_data($roll_no,$session,"year");
$course=get_student_data($roll_no,$session,"course");

$sql="update `tbl_result_marks` set 
`res_id`='$res_id',
 `r_status`='$r_status',
  `rdd`='$rdd' ,
  is_lock='1'                       
                            
  where  
    `roll_no`='$roll_no' and      
      `course`='$course' and 
      `session`='$session' ";

if(mysqli_query($DB_LINK,$sql))
{ ?>
    Record Saved Successfully ...
    <?php }?>
