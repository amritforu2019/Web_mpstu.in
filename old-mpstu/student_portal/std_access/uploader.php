<?php

function upload($folder_name)

{

global $finame;

global $bn_ext;

global $co;

$abcd=0;

if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0))

 {

  //Check if the file is JPEG image and it's size is less than 500Kb

  $filename = strtolower(basename($_FILES['uploaded_file']['name']));

  $ext = substr($filename, strrpos($filename, '.') + 1);

  $bn_ext=$ext;

  if (($ext == "jpg")||($ext == "jpeg")||($ext == "bmp")||($ext == "gif")||($ext == "JPEG")||($ext == "JPG")||($ext == "png")  &&($_FILES["uploaded_file"]["size"] < 1000000)) {

    //Determine the path to which we want to save this file

	$nam=time().rand(0,1000);

	$name=$nam.".";

	$finame=$name.$ext;

      $newname = $folder_name.$name.$ext;

      //Check if the file with the same name is already exists on the server

      if (!file_exists($newname)) {

        //Attempt to move the uploaded file to it's new place

        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {

          

        } else {

          $co=" A problem occurred during file upload!";	

		 

        }

      } else {

        $co=" File ".$_FILES["uploaded_file"]["name"]." already exists";

		

      }

  } else {

     $co="  Only .jpg/.gif/.png images under 5MB are accepted for upload";

	  

  }

} else {

 $co= "Error: No file uploaded";

 

}

}

?>