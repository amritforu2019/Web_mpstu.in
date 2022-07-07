<?php
 
$qry1 = mysqli_query($DB_LINK, "select * from tbl_category where url='".$page_name."' ");
$fetch_post = mysqli_fetch_array($qry1);

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
 <?php require("include/top.php");?>
<head>
		<!-- Meta -->

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="SITE KEYWORDS HERE" />
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php echo $page_name.$fetch_post['title']; ?> | <?php echo $SITE_NAME; ?></title>
    <?php require("include/head.php");?>	
    </head>
    <body>
    	<?php require("include/upper.php");?>
	 
		
		<!-- Start Breadcrumbs -->
		<section class="breadcrumbs overlay">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>Image Gallery</h2>
						<ul class="bread-list">
							<li><a href="index">Home<i class="fa fa-angle-right"></i></a></li>
							<li><a href="images">Images <i class="fa fa-angle-right"></i></a></li>
							<li class="active"><a href="#"><?php echo $fetch_post['title'];?></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
 		<!-- Events -->
		<section class="events archives section">
			<div class="container">
			 
				<div class="row">
					<?php
$qrytop=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='".$fetch_post['id']."' and status=1 order by ord asc") or die(mysqli_error());
$i=0;
			 foreach($qrytop as $rowtop) 
			 { 
			?>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Event -->
						<div class="single-event">
							<div class="head overlay">
							
								<img class="image-shadow" src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowtop['image'];?>" alt="#">
								<a href="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowtop['image'];?>"  data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
							</div>
							<div class="event-content">
							<!-- 	<div class="meta"> 
									<span><i class="fa fa-calendar"></i>05 June 2018</span>
									 
								</div> -->
								<h4><a href="<?php echo $rowtop['url'];?>"><?php echo $rowtop['title'];?></a></h4>
								 
								 
							</div>
						</div>
						<!--/ End Single Event -->
					</div>

				<?php } ?>
 
				 
				</div>
			 
		</section>
		<!--/ End Events -->
		
	 
		
 
		
			
	<?php require("include/footer.php");?>
	
    </body>
 <?php require("include/last.php");?>
</html>
</html>