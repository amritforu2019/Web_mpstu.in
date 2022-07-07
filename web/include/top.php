 <?php //error_reporting(0);
 if(isset($_POST['news_subm2']))
	  {
		$qry_news="INSERT INTO `tbl_newsletter` set 
		`email`='".trim($_POST['email'])."' " ;
		if(mysqli_query($DB_LINK,$qry_news))
		{
		 $_SESSION['msg']=array('success', 'Newsletter Subscribed Successfully');
		 header("location:".$_POST['back']);
		 exit;
		}
		else
		{
		 $_SESSION['msg']=array('error', 'Sorry !! Alredy Subscribed'); 
		 header("location:".$_POST['back']);
		 exit;
		}
		
	  }
	  ?>
 <link href="assets/links/css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
 <link href="assets/links/css/viewbox.css" rel="stylesheet">
 <link href="assets/links/css/style.css" rel="stylesheet">
 <link href="assets/links/css/material-scrolltop.css" rel="stylesheet">
 <link href="assets/links/css/owl.css" rel="stylesheet">
