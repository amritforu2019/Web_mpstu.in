		
		<!-- Footer -->
		<footer class="footer overlay section wow fadeIn">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12  wow bounceInUp" data-wow-delay="0.4s" data-wow-duration="4s">
							<!-- About -->
							<div class="single-widget about">
								<div class="logo"><a href="<?php echo show_content('305','url',$DB_LINK);?>"><img src="<?php echo $SITE_URL;?>/assets/links/images/logo-2.png" alt="<?php echo $SITE_NAME;?>"></a></div>
								<p><?php echo clean_tag(data_cutter(show_content('305','description',$DB_LINK),300));?> <a href="<?php echo show_content('305','url',$DB_LINK);?>">Read More</a></p>

								<ul class="list">
									<li><i class="fa fa-phone"></i>Phone:  <?php echo $MOBILE;?>, <?php echo $MOBILE2;?> </li>
									<li><i class="fa fa-envelope"></i>Email: <a href="mailto:<?php echo $EMAIL_ID;?>"><?php echo $EMAIL_ID;?> , <?php echo $EMAIL_ID2;?>  </a></li>
									<li><i class="fa fa-map-o"></i>Address : <?php echo $ADDRESS;?></li>
								</ul>
							</div>
							<!--/ End About -->
						</div>
						<div class="col-lg-3 col-md-6 col-12  wow bounceInUp" data-wow-delay="0.6s" data-wow-duration="4s">
							<!-- Useful Links -->
							<div class="single-widget useful-links">
								<h2>Useful Links</h2>
								<ul>
									<li><a href="<?php echo $SITE_URL;?>"><i class="fa fa-angle-right"></i>Home</a></li>
									<li><a href="career"><i class="fa fa-angle-right"></i>Career</a></li>
									<li><a href="search-tc"><i class="fa fa-angle-right"></i>Search TC</a></li>	
									<li><a href="admission-form"><i class="fa fa-angle-right"></i>Admission Form</a></li>							 
									<li><a href="contact"><i class="fa fa-angle-right"></i>Contact</a></li>
									<li><a href="http://mjrppublicschool.com/webmail" target="_blank"><i class="fa fa-angle-right"></i>Web Mail</a></li>

									
									 
								</ul>
							</div>
							<!--/ End Useful Links -->
						</div>
							 
					 
						<div class="col-lg-3 col-md-6 col-12  wow bounceInUp" data-wow-delay="0.8s" data-wow-duration="4s">
							<!-- Newsletter -->
							<div class="single-widget newsletter">
								<h2>Subscribe Newsletter</h2>
								<div class="mail">
									<p>Don't miss to  subscribe to our news feed, Get the latest updates from us!</p>

									<form name="news" action="" method="post">
			 
                 	<div class="form">
				  <input type="email" class="form-control" placeholder="Enter Your Email" required name="email">
                  
                  <input type="hidden" name="back" value="<?=$_SERVER['REQUEST_URI']; ?>">
				  
					<button class="button" type="submit" name="news_subm2"><i class="fa fa-envelope"></i></button>
				   
			 
                </div>
                
				   
				 </form>
								
										 
									
								</div>
							</div>
							<!--/ End Newsletter -->
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Footer Bottom -->
			<div class="footer-bottom  wow bounceInUp" data-wow-delay="1s" data-wow-duration="4s"  >
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="bottom-head">
								<div class="row">
									<div class="col-12">
										<!-- Social -->
										<ul class="social">
											 
										 
								<li><a href="<?php echo $F;?>" target="_blank"><i class="fa fa-facebook faa-wrench animated"></i></a></li>
								<li><a href="<?php echo $T;?>" target="_blank"><i class="fa fa-twitter faa-wrench animated"></i></a></li>						
								<li><a href="<?php echo $G;?>" target="_blank"><i class="fa fa-google-plus faa-wrench animated"></i></a>
								<li><a href="<?php echo $Y;?>" target="_blank"><i class="fa fa-youtube faa-wrench animated"></i></a></li>
							</ul>
										<!-- End Social -->
										<!-- Copyright -->
										<div class="copyright">
											<p>© Copyright <?=date('Y')?>-<?=date('y')+1?> <a href="#"><?php echo $SITE_NAME;?></a>. All Rights Reserved  | Developed by <a href="http://www.devindia.in" target="_blank"  >Dev India</a></p>
										</div>
										<!--/ End Copyright -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Bottom -->
		</footer>