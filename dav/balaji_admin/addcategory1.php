<? require_once("uploader.php"); require("thumbcreator.php");



	if(isset($_FILES['uploaded_file']))



		{



			upload("../product/category/");



			if($finame!=""){cropImage(118, 157, '../product/category/'.$finame, $bn_ext , '../product/category/'.$finame);}



			$_SESSION['sess_msg']=$co;



		}



	mysql_query("insert into category1 set parent_id='".$_POST['country']."', name='".$_POST['name']."', weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' , imname='$finame', show_on='".$_POST['show_on']."',  status=1 , descr='".$_POST['descr']."'")or die(mysql_error());



	header("Location:category_list2.php?country=".$_POST['country']);



	exit;



?>



           



