<? ob_start();
require_once("../config/functions.inc.php");
$qry=mysql_query("select * from admin_login where id=1");
$row=mysql_fetch_array($qry);

				$a=$row['user'];



				$b=dec($row['pass']);



				$message="YOUR USERNAME AND PASSWORD ARE MENTION BELOW:- \n"."-------------------------------------------------------------------------------------------------\n\n\n"."username : ".$a."\n"."password : ".$b."\n\n\n".$SITE_NAME."\n";



                $headers  = "From:".$SITE_NAME." \r\n";



                mail($EMAIL_ID, 'Password Recovery', $message, $headers);

				$_SESSION['forgot_msg']="Your Username and Password will be mailed to your Email id";

				header("Location:index.php");

ob_end_flush();



?>