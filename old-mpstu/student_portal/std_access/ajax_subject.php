<? 
require_once("../con_base/functions.inc.php");
$course=$_REQUEST['course'];
$year=$_REQUEST['year'];
$sql="SELECT * FROM  tbl_course_subject  where course='$course' and year='$year'";
$result =mysqli_query($DB_LINK,$sql);
if(mysqli_num_rows($result)>0)
{

?>
<select name="subject" id="subject"   class="textbox validate[required] " >
    <option value=""  >Select Subject</option>
<?php 
  while ($data=mysqli_fetch_array($result)) {
?> <option   value="<?php echo $data['id'] ?>" ><?php echo $data['title'] ?></option>
<?php }   ?></select>
<?php } else { ?>
    <select name="subject" id="subject"   class="textbox validate[required] "  >
        <option value=""  >Select Subject</option>
    </select>
<?php } ?>
