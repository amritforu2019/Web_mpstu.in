<?php
global $getCurrentHost,$getCurrentURL;
$getCurrentHost=$_SERVER['HTTP_HOST'];
$getCurrentURL="Testing/Web_Mjrppublicschool";
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
    $username = "pmssvaranasi_stdptr";
    $password = "j44cPlDCg";
}

/////////////////////////////////
$db = "pmssvaranasi_stdptr";
global $DB_LINK;
// Create connection
$DB_LINK = new mysqli($host, $username, $password, $db);
if (!$DB_LINK)
{
    die("Server Busy kindly wait.." . mysqli_connect_error());
    exit;
}
?>