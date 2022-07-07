<?php ob_start();    

 require_once("con_base/functions.inc.php");
$browser_t="";
include "app/config.php";
include "app/detect.php";

try{if ($page_name=='') { include $browser_t.'/index.php'; exit; }
else if ($page_name=='index') { include $browser_t.'/index.php'; exit; }
else if ($page_name=='result') { include $browser_t.'/result.php'; exit; }
    else if ($page_name=='results2022.html') { include $browser_t.'/result.php'; exit; }
else if ($page_name=='result-print') { include $browser_t.'/result_print.php'; exit; }/*
else if ($page_name=='gallery'){ include $browser_t.'/gallery.php'; exit; }
else if ($page_name=='contact-us'){ include $browser_t.'/contact-us.php'; exit; }
else if ($page_name=='business-plan'){ include $browser_t.'/business-plan.php'; 	exit; } 
else if ($page_name=='register-admin-userlogin'){ include $browser_t.'/register.php'; exit; }
else if ($page_name == 'register-admin-userlogin?ref=' .$_GET['ref'] . '&place=' . $_GET['place']) { include $browser_t . '/register.php';  exit; }
else if ($page_name=='register-admin-userlogin'){ include $browser_t.'/register.php'; exit; }
else if ($page_name=='welcome'){ include $browser_t.'/welcome.php'; exit; }
else if ($page_name=='login'){ include $browser_t.'/login.php'; exit; }
else if ($page_name=='login.html'){ include $browser_t.'/login.php'; exit; }
else if ($page_name=='login-app.html'){ include $browser_t.'/login_app.php'; exit; }
else if ($page_name=='get_ref.php'){ include $browser_t.'/get_ref.php'; exit; }
else if ($page_name=='welcome'){ include $browser_t.'/welcome.php'; exit; }
else if ($page_name=='logout'){ include $browser_t.'/logout.php'; exit; }
else if ($page_name=='forgot'){ include $browser_t.'/forgot.php'; exit; }
else if ($page_name=='add-testimonial'){ include $browser_t.'/add-testimonial.php'; exit; }
else if ($page_name=='registration'){ include $browser_t.'/register_admin.php'; exit; }
else if ($page_name=='validate_mobile.php'){ include $browser_t.'/validate_mobile.php'; exit; }
else if ($page_name=='validate_otp.php'){ include $browser_t.'/validate_otp.php'; exit; }
else if ($page_name=='our-partner.html'){ include $browser_t.'/mypartners.php'; exit; }*/


///////API Paths////////
//else if ($page_name=='api-appVersion'){ include $browser_t.'/api/appVersion.php'; exit; }
 //and status=1
$get_qry_post=mysqli_query($DB_LINK,"select * from  content   ");
while($get_data_post=mysqli_fetch_array($get_qry_post)){extract($get_data_post);
 if ($page_name==$get_data_post['page']){include $browser_t.'/page.php';exit; } }
 /*
 $get_qry_post=mysqli_query($DB_LINK,"select * from tbl_category where parent_id= '310' and status=1 and ext_link=''  ")  ;while($get_data_post=mysqli_fetch_array($get_qry_post)) { extract($get_data_post);
  if ($page_name==$get_data_post['url']) { include $browser_t.'/page2.php';exit; } }*/
}catch(Exception $e) { echo 'Error : ',  $e->getMessage(), "\n"; }

include $browser_t.'/404.html';
mysqli_close($DB_LINK);
ob_end_flush();
?>
	

