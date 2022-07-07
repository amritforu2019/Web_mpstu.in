<?

/***********************For uploading Image********************/

require_once("uploader1.php"); 

	if(isset($_FILES['uploaded_file']))

		{

			upload("../banner/ori_le/");

			if($finame!="")

			{
echo ' yoyo';
				$srcFile = "../banner/ori_le/".$finame;  

				$q=mysql_query("insert into bannerleft set type='1', blocation='$finame', burl='$burl',  designation='".$_POST['designation']."', qualification='".$_POST['qualification']."', classes='".$_POST['classes']."',status=1,alttag='".$_POST['alttag']."' ,email='".$_POST['email']."',dob='".$_POST['dob']."',sos='".$_POST['sos']."',aoi='".$_POST['aoi']."'") or die(mysql_error());
header("Location: banner_list_le.php?type=".$_REQUEST['type']);

			}

			$_SESSION['sess_msg']=$co;

		}

	else

	{

		$_SESSION['sess_msg']="Please Select image for uploading";

	}

?>

           

