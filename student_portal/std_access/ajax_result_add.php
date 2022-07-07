<? 
require_once("../con_base/functions.inc.php");

$subject=$_REQUEST['subject'];
$m_mark=$_REQUEST['m_mark'];
$obt_mark_1=$_REQUEST['obt_mark_1'];
$obt_mark_2=$_REQUEST['obt_mark_2'];
$t_mark=$_REQUEST['t_mark'];
$roll_no=$_REQUEST['roll_no'];
$res_id=$_REQUEST['res_id'];
$session=get_curr_session();
$session=$_REQUEST['session'];
$year=get_student_data($roll_no,$session,"year");
$course=get_student_data($roll_no,$session,"course");

  $sql="INSERT INTO `tbl_result_marks` set 
`res_id`='$res_id',
 `subject`='$subject',
  `t_mark`='$t_mark', 
  `obt_mark_1`='$obt_mark_1',
   `obt_mark_2`='$obt_mark_2',
    `m_mark`='$m_mark', 
    `roll_no`='$roll_no',
     `year`='$year',
      `course`='$course', 
      `session`='$session' ";

if(mysqli_query($DB_LINK,$sql))
{
    ?>
<table width="100%"  border="1" align="center" cellpadding="5" cellspacing="0" style="text-transform: uppercase; ">
    <tr>
        <td class="bg2">NAME OF PAPER / SUBJECT	</td>
        <td class="bg2">TOTAL MARKS	</td>
        <td class="bg2" colspan="2" > OBTAINED MARKS </td>
        <td class="bg2"   > TOTAL OBTAINED MARKS</td>

    </tr>
    <?php
$sql_data="select * from tbl_result_marks where  `roll_no`='$roll_no' and `session`='$session' order by id asc ";
    $result=mysqli_query($DB_LINK,$sql_data);
    while ($row=mysqli_fetch_object($result))
    {
?>
    <tr>
        <td ><?php echo $row->subject;?></td>
        <td ><?php echo $row->m_mark;?></td>
        <td   ><?php echo $row->obt_mark_1;?></td>
        <td    ><?php echo $row->obt_mark_2;?></td>
        <td    ><?php echo $row->t_mark;?></td>
    </tr>
    <?php }?></table><?php }?>
