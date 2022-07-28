<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logout</title>
</head>

<body>
<center><img src="images/progressbar.gif"  /> </center>
</body>
</html>
<?php

session_start();
session_destroy();

    $cookie_name = "user_data";
    $cookie_value = '';
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	
	$cookie_name = "user";
    $cookie_value = '';
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
	
header("Location:index");
exit;

ob_end_flush();?>