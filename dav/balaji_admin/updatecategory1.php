<? require_once("uploader.php");



require("thumbcreator.php");







if(isset($_FILES['uploaded_file']))



		{



			upload("../product/category/");



			$a=$_SESSION['naukri'];



			if($finame!="")



			{



			



			$rw=mysql_query("select * from category1 where id='$a'");



			$rw1=mysql_fetch_array($rw)or die(mysql_error());



			$x=$rw1['imname'];



			unlink("../product/category/".$x);  



			cropImage(118, 157, '../product/category/'.$finame, $bn_ext , '../product/category/'.$finame);



			$q=mysql_query("update category1 set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' ,  imname='$finame', show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());



			header("Location: category_list2.php?country=".$_REQUEST['country']);



			}



		



		



		else



		{



		$q=mysql_query("update category1 set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."'  ,  show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());



		$_SESSION['sess_msg']="Category Updated Successfully";



			header("Location: category_list2.php?country=".$_REQUEST['country']);



		}



		}



			?>



           



