<?php 
  
ob_start();
global $page_name;
require_once("con_base/functions.inc.php");
include "app/config.php";
include "app/detect.php";
if ($page_name == '') {
    include $browser_t . '/index.php';
    exit;
} else if ($page_name == 'index') {
    include $browser_t . '/index.php';
    exit;
} 
 else if ($page_name == 'index2') {
    include $browser_t . '/index2.php';
    exit;
} 
 else if ($page_name == 'index3') {
    include $browser_t . '/index3.php';
    exit;
} 
else if ($page_name == 'search-tc') {
    include $browser_t . '/search-tc.php';
    exit;
} 
else if ($page_name == 'images') {
    include $browser_t . '/images.php';
    exit;
}
else if ($page_name == 'contact') {
    include $browser_t . '/contact.php';
    exit;
}
else if ($page_name == 'parent-feedback') {
    include $browser_t . '/parent-feedback.php';
    exit;
}
else if ($page_name == 'parent-inquiry') {
    include $browser_t . '/parent-inquiry.php';
    exit;
}
else if ($page_name == 'parents-feedback') {
    include $browser_t . '/parent-feedback.php';
    exit;
}
else if ($page_name == 'parents-inquiry') {
    include $browser_t . '/parent-inquiry.php';
    exit;
}
else if ($page_name == 'alumni') {
    include $browser_t . '/alumni-registration.php';
    exit;
}
else if ($page_name == 'career') {
    include $browser_t . '/career.php';
    exit;
}





$qry_cat_g=mysqli_query($DB_LINK,"select * from tbl_category where status=1 and (parent_id='195') order by ord asc") or die(mysqli_error());
      foreach($qry_cat_g as $row_cat_g)  
      {
         
              
                  if ($page_name==$row_cat_g['url']) 
                  {
                  include $browser_t.'/images-list.php';
                  exit;
                  }
             
      }

 
  $qry_cat=mysqli_query($DB_LINK,"select * from tbl_category where status=1 and (parent_id='246' || parent_id='247' || parent_id='248' || parent_id='249' || parent_id='250' || parent_id='251' || parent_id='262' || parent_id='108' || parent_id='164' || parent_id='256') order by ord asc") or die(mysqli_error());
  foreach($qry_cat as $row_cat)  {
  if ($page_name==$row_cat['url'])  {
  include $browser_t.'/page.php';
  exit;
  }
  }


   


 


include $browser_t . '/index.php';

mysqli_close($DB_LINK);
ob_end_flush();
?>
	