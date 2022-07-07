

		<!-- Book Preloader -->

     <!--   <div class="book_preload">

            <div class="book">

                <div class="book__page"></div>

                <div class="book__page"></div>

                <div class="book__page"></div>

            </div>

        </div>  -->

		<!--/ End Book Preloader -->

	

		<!-- Mp Color  Side Menu Blink And Open Side menu code   -->

	<!--	<div class="mp-color">

			<div class="icon inOut"><i class="fa fa-envelope faa-horizontal animated " style="color: #fff"></i></div>

			<h4>Parent Corner </h4>

			<hr/>

			<p  ><a href="parent-feedback">Parent Feedback</a></p>

			<p  ><a href="parent-inquiry">Parent Inquiry</a></p>

			 

		</div>
-->
		<!--/ End Mp Color -->

	

		<!-- Header -->

		<header class="header">

			<!-- Topbar -->

			<div class="topbar">

				<div class="container">

					<div class="row">

						<div class="col-lg-8 col-12 wow bounceInLeft" data-wow-delay="0.25s" data-wow-duration="4s">

							<!-- Contact -->

							<ul class="content">

								<li ><a class="hiddensmall"><i class="fa fa-phone faa-shake animated"></i><?php echo $MOBILE;?>, <?php echo $MOBILE2;?></a></li>

								<li > <a class="hiddensmall" href="mailto:<?php echo $EMAIL_ID;?>"><i class="fa fa-envelope-o faa-shake animated"></i><?php echo $EMAIL_ID;?> </a></li>

								  <li><i class="fa fa-clock-o faa-pulse animated "></i>**</li>

							</ul>

							<!-- End Contact -->

						</div>

						<div class="col-lg-4 col-12 hiddensmall wow bounceInRight" data-wow-delay="0.25s" data-wow-duration="4s">

							<!-- Social -->

							<ul class="social ">

								<li><a href="<?php echo $F;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>

								<li><a href="<?php echo $T;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>						

								<li><a href="<?php echo $G;?>" target="_blank"><i class="fa fa-google-plus "></i></a>

								<li><a href="<?php echo $Y;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>

							</ul>

							<!-- End Social -->

						</div>

					</div>

				</div>

			</div>			<!-- End Topbar -->

			<!-- Header Inner -->

			<div class="header-inner">

				<div class="container">

					<div class="row">
						

						<div class="col-lg-8 col-md-8 col-12 ">

							<div class="logo">
								

								<a href="<?php echo $SITE_URL;?>"><img src="<?php echo $SITE_URL;?>/assets/links/images/mjr-logo-4.png" alt="<?php echo $SITE_URL;?>"></a>

							</div>

							<div class="mobile-menu"></div>

						</div>

						  	<div class="col-lg-4 col-md-4 col-12">

							 

							<div class="header-widget">

								<!--   <div class="single-widget">

									<i class="fa fa-phone faa-pulse animated"></i>

									<h4>Connect Us<span>0542-2230483, 9336198989 <br> info@mjrppublicschool.com </span></h4>

								</div>  -->  

							<!-- 	<div class="single-widget">

									<i class="fa fa-envelope-o faa-shake animated"></i>

									<h4>Send Message<a href="mailto:mailus@mail.com"><span>  </span></a></h4>

								</div> -->

							  <div class="single-widget">

								

									<h4>Our Location<span><?php echo $ADDRESS;?></span></h4>

								</div>  

							</div>

						 

						</div>  

					<!--	<div class="col-lg-2 col-md-2 col-12 ">

<div class="logo-2"  >
								<img src="<?php /*echo $SITE_URL;*/?>/assets/links/images/diya-4.gif" alt="#" class="img-responsive">
									

								</div>
							 </div>
-->
					

					</div>

				</div>

			</div>

			<!--/ End Header Inner -->

			<!-- Header Menu -->

			<div class="header-menu">

				<div class="container">

					<div class="row">

						<div class="col-12  ">

							<nav class="navbar navbar-default">

								<div class="navbar-collapse">

									<ul id="nav" class="nav menu navbar-nav">

									<li class="<?php if ($page_name=='') { echo 'active'; } ?>"><a href="<?php echo $SITE_URL;?>"><!--<i class="fa fa-home faa-tada animated"></i>-->Home</a></li>

                <?php 

                $qryl1=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='246' and status=1 order by ord asc") or die(mysqli_error());

                foreach($qryl1 as $rowl1) { 

                	$qryl2=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='".$rowl1['id']."' and status=1 order by ord asc") or die(mysqli_error());

                	$counterl2=mysqli_num_rows($qryl2);

                	if($counterl2>0)

                	{

                		?>

                		<li ><a href="#"><?php echo stripslashes($rowl1['title']);?> <i class="fa fa-angle-down faa-pulse animated fa-1x"></i></a>

											<ul class="dropdown">

											<?php foreach($qryl2 as $rowl2) { 

												$qryl3=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='".$rowl2['id']."' and status=1 order by ord asc") or die(mysqli_error());

                	$counterl3=mysqli_num_rows($qryl3);

                	if($counterl3>0)

                	{

                		?>

               <li> <a href="#"><?php echo stripslashes($rowl2['title']);?><i class="fa fa-angle-right"></i></a>

 

											<ul class="dropdown submenu">

												<?php foreach($qryl3 as $rowl3) {

													?>

													<li  >
														<a href="<?php if($rowl3['ext_link']!='') echo $rowl3['ext_link']; 
														else echo $rowl3['url'];?>"
														    <?php if($rowl2['ext_link']!='') echo "target='_blank'";?>>
															<?php echo stripslashes($rowl3['title']);?>
														</a>
												</li>

												<?php } ?>

												

												 

											</ul>

										</li>		

                		<?php

                	}

                	else

                	{

                		?>

                		<li  >
							<a href="<?php if($rowl2['ext_link']!='') echo $rowl2['ext_link'];  else echo $rowl2['url'];?>" 
							   <?php if($rowl2['ext_link']!='') echo "target='_blank'";?>>
							<?php echo stripslashes($rowl2['title']);?>
							</a>
						</li> 

                		<?php



                	}

 ?>



											<?php } ?>

 

											</ul>

										</li>



<?php

                	}

                	else

                	{

                		?>

<li class="<?php if ($page_name==$rowl1['url']) { echo 'active'; } ?>"><a href="<?php echo $rowl1['url'];?>" ><?php echo $rowl1['title'];?></a></li> 

                		<?php

                	}

                	?>



                <?php } ?>



									 

									</ul>

									<!-- End Main Menu -->

									<!-- button -->

									<!--<div class="button">

										<a href="admission-form" class="btn"><i class="fa fa-black-tie faa-tada animated"></i> Admissions 2019-20 </a>

									</div>
-->
									<!--/ End Button -->

								</div> 

							</nav>

						</div>

					</div>

				</div>

			</div>

			<!--/ End Header Menu -->

		</header>

		<!-- End Header -->