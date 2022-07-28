<? 
require_once("../con_base/functions.inc.php");
$cid=$_REQUEST['cid'];
/*$country_qry1=mysqli_query($DB_LINK,"select * from category where parent_id='".$cid."' ")or die(mysqli_error($DB_LINK));
$country_fetch1=mysqli_fetch_array($country_qry1);*/

?>


<select name="category" class="textbox  text-input"  id="category">
<option value=" ">Select Sub Category</option>
<?
if($cid!='')
{
$country_qry=mysqli_query($DB_LINK,"select * from category where parent_id='".$cid."' order by name asc")or die(mysqli_error($DB_LINK));
while($country_fetch=mysqli_fetch_array($country_qry))
{
?>
<option value="<? echo $country_fetch['id']?>" <? if($_REQUEST['name']==$country_fetch['name']) echo "selected"; ?>><? echo normalall_filter($country_fetch['name'])?></option>
<? } } ?>
</select>

