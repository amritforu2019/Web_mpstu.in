<? require_once("uploader1.php");

if(isset($_FILES['uploaded_file']))

		{

			upload("../banner/ori_le/");

			$a=$_SESSION['naukri'];

			if($finame!=""){

			$rw=mysql_query("select * from bannerleft where id='$a'");

			$rw1=mysql_fetch_array($rw)or die(mysql_error());

			$x=$rw1['blocation'];

			unlink("../banner/ori_le/".$x); 

			$srcFile = "../banner/ori_le/".$finame;   

			$q=mysql_query("update bannerleft set type='1', blocation='$finame', burl='$burl', alttag='".$_POST['alttag']."', designation='".$_POST['designation']."', qualification='".$_POST['qualification']."', classes='".$_POST['classes']."'  ,email='".$_POST['email']."',dob='".$_POST['dob']."',sos='".$_POST['sos']."',aoi='".$_POST['aoi']."' where id='$a'")or die(mysql_error());

			header("Location: banner_list_le.php?type=".$_REQUEST['type']);

			}

		else

		{

		$q=mysql_query("update bannerleft set type='1', burl='$burl', alttag='".$_POST['alttag']."', designation='".$_POST['designation']."', qualification='".$_POST['qualification']."', classes='".$_POST['classes']."'   ,email='".$_POST['email']."',dob='".$_POST['dob']."',sos='".$_POST['sos']."',aoi='".$_POST['aoi']."' where id='$a'")or die(mysql_error());

		$_SESSION['sess_msg']=" Updated Successfully";

			header("Location: banner_list_le.php?type=".$_REQUEST['type']);

		}

		}

			?>

           

