<?php

function upload2($folder_name2)

{

global $finame2;

global $bn_ext2;

global $co2;

$abcd2=0;

if((!empty($_FILES["uploaded_file2"])) && ($_FILES['uploaded_file2']['error'] == 0))

 {

  //Check if the file is JPEG image and it's size is less than 500Kb

  $filename2 = strtolower(basename($_FILES['uploaded_file2']['name']));

  $ext2 = substr($filename2, strrpos($filename2, '.') + 1);

  $bn_ext2=$ext2;

  if (($_FILES["uploaded_file2"]["size"] < 5000000)) {

    //Determine the path to which we want to save this file

	$nam2=time().rand(0,1000);

	$name2=$nam2.".";

	$finame2=$name2.$ext2;

      $newname2 = $folder_name2.$name2.$ext2;

      //Check if the file with the same name is already exists on the server

      if (!file_exists($newname2)) {

        //Attempt to move the uploaded file to it's new place

        if ((move_uploaded_file($_FILES['uploaded_file2']['tmp_name'],$newname2))) {

          

        } else {

          $co2=" A problem occurred during file upload!";	

		 

        }

      } else {

        $co2=" File ".$_FILES["uploaded_file2"]["name"]." already exists";

		

      }

  } else {

     $co2="  Only .jpg/.gif/.png images under 5MB are accepted for upload";

	  

  }

} else {

 $co2= "Error: No file uploaded";

 

}

}

?>