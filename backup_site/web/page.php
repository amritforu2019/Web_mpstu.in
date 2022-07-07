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
		<title><?php echo $row_cat['title'];?> | <?php echo $SITE_NAME; ?></title>
    <?php require("include/head.php");?>	
    </head>
    <body>
    	<?php require("include/upper.php");?>
	 
		
		<!-- Start Breadcrumbs -->
		<section class="breadcrumbs overlay">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2><?php echo $row_cat['title'];?></h2>
						<ul class="bread-list">
							<li><a href="index">Home<i class="fa fa-angle-right"></i></a></li>
							<li class="active"><a href="#"><?php echo $row_cat['title'];?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
		<!-- About US -->
		<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-12">
						<div class="single-image  ">
							<?php if($row_cat['image']!=''){ ?>

							<img class="image-shadow" src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $row_cat['image'];?>" alt="<?php echo $row_cat['title'];?>">
						<?php  }  else { ?>
							<img  class="image-shadow" src="<?php echo $SITE_URL;?>/assets/links/images/about.jpg" alt="<?php echo $row_cat['title'];?>">
						<?php } ?>

						<?php if($row_cat['title']=="25 Years History")	{ ?>
							<a href="https://www.youtube.com/watch?v=d7aRkl27tlI" class="btn video-popup mfp-fade"><i class="fa fa-play"></i></a>
						<?php  } ?>
						 
						</div>
					</div>
					<div class="col-lg-8 col-12">
						<div class="about-text">
							<h2><?php echo $row_cat['title'];?></h2>
							<p><?php echo $row_cat['description'];?></p>
							 
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End About US -->
		
	 
		
 
		
			
	<?php require("include/footer.php");?>
	
    </body>
 <?php require("include/last.php");?>
</html>
</html>