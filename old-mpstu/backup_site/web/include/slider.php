		<!-- Slider Area -->

		<section class="home-slider">
<div class="container shadowme" style="padding-left: 0px; padding-right: 0px">
			 <div class="slider-active">  
				 
			<?php

$qryslider=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='164' and status=1 order by ord asc") or die(mysqli_error());

$i=0;

			 foreach($qryslider as $rowslider) 

			 { 

			?>

				<div class="single-slider" style="background-image:url('<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowslider['image'];?>')"></div>

												 

 <?php $i++; } ?>

			 

				<!--/ End Single Slider -->

			</div>
		</div>

		</section>

		<!--/ End Slider Area -->