<?php  include("../con_base/functions.inc.php");  ?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="modernizr.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<title><?php echo $ADMIN_HTML_TITLE;?></title>


<script src="Scripts/AC_ActiveX.js" type="text/javascript"></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body>
<?php include('header.php');?>
    <div class="conten">
    <h1>Welcome To <?php echo $SITE_NAME_SHORT;?> >>  Home Page</h1>
        <h3>Current Session : <?php echo get_curr_session();?></h3>
        
 
</div>
<?php include('footer.php');?>
</body>
</html>
<?php

 
 ob_end_flush();?>