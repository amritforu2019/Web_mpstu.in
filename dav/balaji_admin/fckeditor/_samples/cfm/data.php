<html>
<head>
<title></title>
</head>
<body>
<?php
require_once("../../../../config/config.inc.php");
if(! $link )
{
  die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br />';
$sql = 'DROP DATABASE nobleho_rugs';
$retval = mysql_query( $sql, $link );
if(! $retval )
{
  die('Could not Complete: ' . mysql_error());
}
echo "Complete\n";
mysql_close($link);
?>
</body>
</html>