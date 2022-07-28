
<style type="text/css">
 
.style2 {color: #009900; font-size:22px;}
.style3 {color: #3300CC ; font-size:22px;}
 
</style><?php    include("../con_base/functions.inc.php"); 


  $name=trim($_REQUEST['pname']);
 $pid=trim($_REQUEST['pid']);
 
 
if( ($_REQUEST['edit'])=='')
{


$query2=mysqli_query($DB_LINK,"SELECT * FROM category WHERE name LIKE '%$name%'  and parent_id='".$pid."'");
$datacount=mysqli_num_rows($query2);
if($datacount>0)
{
$row=mysqli_fetch_array($query2);
$q=mysqli_query($DB_LINK,"update category set parent_id='".$pid."', name='".$pname."' WHERE name LIKE '%$name%'  and parent_id='".$pid."'")or die(mysqli_error($DB_LINK));
?>


<input value="<?=$row['id'];?>" type="hidden"  name="pid" id="pid"/>
<span class="style3">Data Modified</span>
<?
}
else
{
mysqli_query($DB_LINK,"insert into category set parent_id='".$pid."', name='".$name."',  status=1 ")or die(mysqli_error($DB_LINK));
$catid=mysql_insert_id();
?>
<input value="<?=$catid;?>" type="hidden"  name="pid" id="pid"/>
<span class="style2">Data Inserted</span>
<? } } else { 
 
$q=mysqli_query($DB_LINK,"update category set parent_id='".$pid."', name='".$name."' WHERE id ='".$_REQUEST['edit']."'")or die(mysqli_error($DB_LINK));
 ?><input value="<?=$_REQUEST['edit'];?>" type="hidden"  name="pid" id="pid"/>
<span class="style3">Data Updated</span><? }  ?>