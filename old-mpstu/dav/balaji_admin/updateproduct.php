<? require_once("uploader.php");
require("thumbcreator.php");
if(isset($_FILES['uploaded_file']))
		{
			upload("../product/big/");
			$a=$_SESSION['naukri'];
			if($finame!="")
			{
			$rw=mysql_query("select * from product where id='$a'");
			$rw1=mysql_fetch_array($rw)or die(mysql_error());
			$x=$rw1['imname']; 
			@unlink("../product/big/$x");
			@unlink("../product/medium/$x");

			@unlink("../product/thumb/$x");

			cropImage(235, 250, '../product/big/'.$finame, $bn_ext , '../product/medium/'.$finame);

			cropImage(235, 250, '../product/big/'.$finame, $bn_ext , '../product/thumb/'.$finame);  

				

			$q=mysql_query("update product set parent_id='".$_POST['category']."', name='".$_POST['name']."',  imname='$finame', item_code='".$_POST['item_code']."', color='".$_POST['color']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."', price='".$_POST['price']."',price_offer='".$_POST['price_offer']."', show_on='".$_POST['show_on']."', descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());

			header("Location: product_list.php?category=".$_REQUEST['category']);

			}

		

		

		else

		{

		$q=mysql_query("update product set parent_id='".$_POST['category']."', name='".$_POST['name']."' , item_code='".$_POST['item_code']."', color='".$_POST['color']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."', price='".$_POST['price']."',price_offer='".$_POST['price_offer']."', show_on='".$_POST['show_on']."', descr='".$_POST['descr']."'  where id='$a'")or die(mysql_error());

		$_SESSION['sess_msg']="product Updated Successfully";

			header("Location: product_list.php?category=".$_REQUEST['category']);

		}

		}

			?>



