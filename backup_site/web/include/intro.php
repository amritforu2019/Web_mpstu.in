<section class="about-us section ">
			<div class="container shadowme">
					<div class="row">
					<div class="col-12  ">
						<div class="section-title">
							<h2>INTRO<span>DUCTION</span></h2>				 
						</div>
					</div>
				</div>
				<div class="row ">
					<div class="col-lg-5 col-12">
						<div class="single-image ">
							<img class="image-shadow" src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo show_content('305','image',$DB_LINK);?>" alt="#">
							
						</div>
					</div>
					<div class="col-lg-7 col-12">
						<div class="about-text">
							 
							<h2><?php echo show_content('305','title',$DB_LINK);?>  </h2>
							<p><?php echo data_cutter(show_content('305','description',$DB_LINK),700);?></p>
							<div class="button">
								<a href="<?php echo show_content('305','url',$DB_LINK);?>" class="btn">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<br>
			</div>
		</section>
		 
		<!-- End Features -->