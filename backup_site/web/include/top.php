 <?php error_reporting(0);
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