<?



/***********************For uploading Image********************/



require_once("uploader.php");

require("thumbcreator.php");

	if(isset($_FILES['uploaded_file']))

		{

			upload("../product/big/");

			if($finame!="")

			{

				$srcFile = "../product/big/".$finame; 

				cropImage(236, 314, '../product/big/'.$finame, $bn_ext , '../product/medium/'.$finame);

				cropImage(118, 157, '../product/big/'.$finame, $bn_ext , '../product/thumb/'.$finame);  

				$q=mysql_query("insert into product set parent_id='".$_POST['category']."', name='".$_POST['name']."',  imname='$finame', item_code='".$_POST['item_code']."', color='".$_POST['color']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."', price='".$_POST['price']."',price_offer='".$_POST['price_offer']."', show_on='".$_POST['show_on']."',  descr='".$_POST['descr']."', status=1") or die(mysql_error());

				header("Location: product_list.php?category=".$_REQUEST['category']);

			}

			$_SESSION['sess_msg']=$co;

		}

	else

	{

		$_SESSION['sess_msg']="Please Select image for uploading";

	}

	

			





			?>

           



           

			