<? require_once("uploader.php");
require("thumbcreator.php");
if(isset($_FILES['uploaded_file']))
{
upload("../product/category/");
$a=$_POST['edit'];
if($finame!="")
{
$rw=mysql_query("select * from category where id='$a'");
$rw1=mysql_fetch_array($rw)or die(mysql_error());
$x=$rw1['imname'];
unlink("../product/category/".$x);  
cropImage(118, 157, '../product/category/'.$finame, $bn_ext , '../product/category/'.$finame);
$q=mysql_query("update category set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' ,  imname='$finame', show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());


$_SESSION['sess_msg']="Menu Updated Successfully";
?>
<script>
window.location.href="category_list.php?country=<?=$_POST['country']?>";
</script>
<?
exit;
}
else
{
$q=mysql_query("update category set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."'  ,  show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());
$_SESSION['sess_msg']="Menu Updated Successfully";
?>
<script>
window.location.href="category_list.php?country=<?=$_POST['country']?>";
</script>
<?
exit;
}
}
?>