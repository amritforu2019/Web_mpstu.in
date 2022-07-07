<?php
function upload_gallery()
{
	global $finame_gallery;
	global $bg_ext_gallery;
	global $co;
	if((!empty($_FILES["uploaded_file_gallery"])) && ($_FILES['uploaded_file_gallery']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['uploaded_file_gallery']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $bg_ext_gallery=$ext;
		  if (($ext == "jpg"||$ext == "jpeg"||$ext == "bmp"||$ext == "gif"||$ext == "png") &&($_FILES["uploaded_file_gallery"]["size"] < 500000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame_gallery=$name.$ext;
			if($_SESSION['slider']=='slider')
			{
			$newname = '../upload/slider/'.$name.$ext;
			$_SESSION['slider']='';
			}
			else
			{
				$newname = '../upload/banner/'.$name.$ext;
			}
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['uploaded_file_gallery']['tmp_name'],$newname)))
				{
					$co="Image Uploaded successfully...";
				}
			   else
			   {
				   $co=" A problem occurred during file upload!";
			   }
			}
			else
			{
				$co=" File ".$_FILES["uploaded_file_gallery"]["name"]." already exists";
				 
			}
		 }
		else
		{
			 $co="  Only .jpg/.gif/.bmp  images under 500Kb are accepted for upload";
		}
	}
	
 	else
 	{
		 $co= "Please select file for uploading";
	 
	}
}
?>

?>