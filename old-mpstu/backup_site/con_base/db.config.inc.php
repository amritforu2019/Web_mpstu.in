<?php

  global $getCurrentHost,$getCurrentURL;
  $getCurrentHost=$_SERVER['HTTP_HOST'];
  $getCurrentURL="Testing/Web_pmss.in";
//echo 'website is under construction... ';
//exit; 
$host = "localhost";
if($getCurrentHost=='localhost')
{
    $username = "root";
    $password = "";
}
else
{
$username = "pmssvaranasi_mpstu";
$password = "ODp9TVbM9";
}

 


/////////////////////////////////
$db = "pmssvaranasi_mpstu";
global $DB_LINK;
// Create connection
$DB_LINK = new mysqli($host, $username, $password, $db);
if (!$DB_LINK) 
{
    die("Server Busy kindly wait.." . mysqli_connect_error());
	exit;
}
?>