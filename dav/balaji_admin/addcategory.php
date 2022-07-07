<? require_once("uploader.php"); require("thumbcreator.php");

require_once("uploader2.php");

	if(isset($_FILES['uploaded_file']))
{
upload("../product/category/");
if($finame!=""){cropImage(118, 157, '../product/category/'.$finame, $bn_ext , '../product/category/'.$finame);}
$_SESSION['sess_msg']=$co;
}

if(isset($_FILES['uploaded_file2']))
{
upload2("../product/category/");
$finame2;

}



echo "insert into category set parent_id='".$_POST['country']."', name='".$_POST['name']."', weight='".$_POST['weight']."', pile_height='".$finame2."' , imname='$finame', show_on='".$_POST['show_on']."',  status=1 , descr='".addslashes($_POST['descr'])."'";
	mysql_query("insert into category set parent_id='".$_POST['country']."', name='".$_POST['name']."', weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' , imname='$finame', show_on='".$_POST['show_on']."',  status=1 , descr='".addslashes($_POST['descr'])."'")or die(mysql_error());



	header("Location:category_list.php?country=".$_POST['country']);



	exit;



?>



           



