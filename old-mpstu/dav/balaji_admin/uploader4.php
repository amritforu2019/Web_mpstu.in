<?php
function upload_small()
{
	global $finame_small;
	global $bn_ext_small;
	global $co;
	if((!empty($_FILES["uploaded_file_small"])) && ($_FILES['uploaded_file_small']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['uploaded_file_small']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $bn_ext_small=$ext;
		  if (($ext == "jpg"||$ext == "jpeg"||$ext == "bmp"||$ext == "gif") &&($_FILES["uploaded_file_small"]["size"] < 5000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame_small=$name.$ext;
			$newname = '../upload/video/thumb/'.$name.$ext;
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['uploaded_file_small']['tmp_name'],$newname)))
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
				$co=" File ".$_FILES["uploaded_file_small"]["name"]." already exists";
				 
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

function upload()
{
	global $finame;
	global $bn_ext;
	global $co;
	if((!empty($_FILES["uploaded_file_big"])) && ($_FILES['uploaded_file_big']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['uploaded_file_big']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $bn_ext=$ext;
		  if (($ext == "swf") &&($_FILES["uploaded_file_big"]["size"] < 5000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame=$name.$ext;
			$newname = '../upload/header/'.$name.$ext;
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['uploaded_file_big']['tmp_name'],$newname)))
				{
					$co="file Uploaded successfully...";
				}
			   else
			   {
				   $co=" A problem occurred during file upload!";
			   }
			}
			else
			{
				$co=" File ".$_FILES["uploaded_file_big"]["name"]." already exists";
				 
			}
		 }
		else
		{
			 $co="  Only .pdf/.xls/.bmp/.docx  file under 500mb are accepted for upload";
		}
	}
	
 	else
 	{
		 $co= "Please select file for uploading";
	 
	}
}

function upload_form()
{
	global $forms;
	global $forms_ext;
	global $co;
	if((!empty($_FILES["forms"])) && ($_FILES['forms']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['forms']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $forms_ext=$ext;
		  if (($ext == "jpg") &&($_FILES["forms"]["size"] < 50000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$forms=$name.$ext;
			$newname = '../upload/video/'.$name.$ext;
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['forms']['tmp_name'],$newname)))
				{
					$co="file Uploaded successfully...";
				}
			   else
			   {
				   $co=" A problem occurred during file upload!";
			   }
			}
			else
			{
				$co=" File ".$_FILES["uploaded_file_big"]["name"]." already exists";
				 
			}
		 }
		else
		{
			 $co="  Only .flv file under 500mb are accepted for upload";
		}

	}
	
 	else
 	{
		 $co= "Please select file for uploading";
	 
	}
}

function upload_bg()
{
	global $finame_bg;
	global $bg_ext_small;
	global $co;
	if((!empty($_FILES["uploaded_file_bg"])) && ($_FILES['uploaded_file_bg']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['uploaded_file_bg']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $bg_ext_small=$ext;
		  if (($ext == "jpg"||$ext == "jpeg"||$ext == "bmp"||$ext == "gif") &&($_FILES["uploaded_file_bg"]["size"] < 50000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame_bg=$name.$ext;
			$newname = '../upload/bg/'.$name.$ext;
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['uploaded_file_bg']['tmp_name'],$newname)))
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
				$co=" File ".$_FILES["uploaded_file_bg"]["name"]." already exists";
				 
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

function upload_pagesbg()
{
	global $finame_pagesbg;
	global $bg_ext_small;
	global $co;
	if((!empty($_FILES["uploaded_file_pagesbg"])) && ($_FILES['uploaded_file_pagesbg']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['uploaded_file_pagesbg']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $bg_ext_small=$ext;
		  if (($ext == "jpg"||$ext == "jpeg"||$ext == "bmp"||$ext == "gif") &&($_FILES["uploaded_file_pagesbg"]["size"] < 50000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame_pagesbg=$name.$ext;
			$newname = '../upload/bg/pages/'.$name.$ext;
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['uploaded_file_pagesbg']['tmp_name'],$newname)))
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
				$co=" File ".$_FILES["uploaded_file_pagesbg"]["name"]." already exists";
				 
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

function upload_product_bg()
{
	global $finame_product_bg;
	global $bg_ext_product_bg;
	global $co;
	if((!empty($_FILES["uploaded_file_product_bg"])) && ($_FILES['uploaded_file_product_bg']['error'] == 0))
	 {
		  //Check if the file is JPEG image and it's size is less than 500Kb
		  $filename = strtolower(basename($_FILES['uploaded_file_product_bg']['name']));
		  $ext = substr($filename, strrpos($filename, '.') + 1);
		  $bg_ext_product_bg=$ext;
		  if (($ext == "jpg"||$ext == "jpeg"||$ext == "bmp"||$ext == "gif") &&($_FILES["uploaded_file_product_bg"]["size"] < 50000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame_product_bg=$name.$ext;
			$newname = '../upload/media/'.$name.$ext;
			//Check if the file with the same name is already exists on the server
			if (!file_exists($newname)) 
			{
				//Attempt to move the uploaded file to it's new place
				if ((move_uploaded_file($_FILES['uploaded_file_product_bg']['tmp_name'],$newname)))
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
				$co=" File ".$_FILES["uploaded_file_product_bg"]["name"]." already exists";
				 
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
		  if (($ext == "jpg"||$ext == "jpeg"||$ext == "bmp"||$ext == "gif") &&($_FILES["uploaded_file_gallery"]["size"] < 50000000000))
		  {
			//Determine the path to which we want to save this file
			$nam=time().rand();
			$name=$nam.".";
			$finame_gallery=$name.$ext;
			$newname = '../upload/gallery/'.$name.$ext;
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