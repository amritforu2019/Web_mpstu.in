<? 
require_once("../con_base/functions.inc.php");
$val=$_REQUEST['pid2'];
$sql="SELECT * FROM  states  where state_id='$val'";
$result =mysqli_query($DB_LINK,$sql);
$data=mysql_fetch_assoc($result);
?>
<select name="city" class="textbox"  id="city" >                   
<?php 
if($data['state_id']!='') { $sql="SELECT * FROM  states_cities where state_id='".$data['state_id']."'";
$result =mysqli_query($DB_LINK,$sql); while ($data=mysqli_fetch_array($result)) {
?> <option style="font-size:14px; " value="<?php echo $data['city'] ?>" ><?php echo $data['city'] ?></option>
<?php } } ?></select>