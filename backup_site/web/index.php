<?php 
if(isset($_POST['consub']))
{
   	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
	{ 
		 $_SESSION['msg']=array('error', 'The captcha code does not match!');
    	header("location:index");
		exit;		
	}
	else
	{  
	
 
		mysqli_query($DB_LINK, "insert into tbl_contact_qry set s_name='".ucwords($_POST['name'])."', email='$_POST[email]', contact='$_POST[phone]', subject='$_POST[subject]',   msg='$_POST[msg]', status=0, ipaddress='".$_SERVER['REMOTE_ADDR']."',typ='Home Page Enquiry'");
    		
		if(mysqli_insert_id($DB_LINK))
		{
			  $subject = "Registration Enquiry - " . $SITE_NAME;
            $mail_body = '<div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">
                        <div style="padding:10px;"><img src="http://www.mjrppublicschool.com/assets/links/images/logo-1.png" alt="" /></div>
			<table cellpadding="5" cellspacing="0" width="400px" style="line-height:22px;">
		<tr>
       <td colspan="3" align="left"><h2>Hi, ' . $_POST['name'] . '<br>Your Enquiry details are</h2></td> 	    
      </tr>
	<tr>
       <td>Candidate Name</td> 
	   <td valign="top" >:</td>
       <td>' . $_POST['name'] . '</td>
      </tr>
     <tr>
       <td>Email Id</td> 
	   <td valign="top" >:</td>
       <td>' . $_POST['email'] . '</td>
      </tr>
      <tr>
       <td>Mobile</td>
	   <td valign="top" >:</td> 
       <td>' . $_POST['phone'] . '</td>
      </tr>
     <tr>
       <td>Subject</td> 
	   <td valign="top" >:</td>
       <td>' . $_POST['subject'] . '</td>
      </tr>
	<tr>
	 <tr>
       <td>Messege</td> 
	   <td valign="top" >:</td>
       <td>' . $_POST['msg'] . '</td>
      </tr>
	 
       <td colspan="3" align="left"><a href=' . $SITE_URL . '>View Website</a></td> 
	</tr>
     </table>
</div>';
            mail_sender($subject, $mail_body, $_POST['email'], $_POST['name']);
 
			 $_SESSION['msg']=array('success', 'Your Query Sent Successfully!! We will contact you soon!!');
			
			 
    		header("location:index");
			exit;
		}
		else
		{
			
			 $_SESSION['msg']=array('error', 'Your Query not Sent. Something went wrong'); header("location:index");
			exit;
		}
	}
}
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
		<!-- Title -->
		<title><?php echo $SITE_NAME;?></title>
    <?php require("include/head.php");?>
		
    </head>
    <body>
	<?php require("include/upper.php");?>
	<?php require("include/slider.php");?>
	<?php //require("include/our-guide.php");?>
	
	
	<?php require("include/intro.php");?>
	<?php require("include/calender.php");?>
	



		
		<!-- Enroll -->
		<?php /*?><section class="enroll overlay section" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 offset-lg-8">
						<div class="row">
							<div class="col-lg-4 col-12    " data-wow-delay="0.4s">
								<!-- Single Enroll -->
								<div class="enroll-form">
									<div class="form-title">
										<h2>Enroll Today</h2>
										 
									</div>
									<!-- Form -->


									<form  class="form" action="" method="post">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Your Name"  required>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6 col-12  " >
						<input type="email" name="email" class="form-control" placeholder="Your Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" required>
					</div>

							<div class="col-lg-6 col-12  " >
					 
				 
						<input type="text" name="phone" class="form-control" placeholder="Your Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  pattern=".{10}" maxlength="10" required>
					</div>
					</div>
				</div>
					<div class="form-group">
					<input type="text" name="subject" class="form-control" placeholder="Your Subject" required>
					</div>
					<div class="form-group">
						<input type="text" name="msg"   class="form-control" placeholder="Message" required />

					<div class="form-group">
						<div class="row">
							<div class="col-lg-6 col-12  " >
<div class="form-group">
						
						 <div class="input-group"> <img src="<?php echo $SITE_URL;?>/assets/links/captcha/captcha.php?rand=<?php echo rand(); ?>" id='captchaimg' alt="CAPTCHA Image" style="border-radius: 25px;"/>&nbsp;&nbsp; <a href='javascript: refreshCaptcha();' style="color:#28a745; text-decoration:none;"><i class="fa fa-refresh"></i> Refresh</a> </div>
						</div>
						</div>

					 <div class="col-lg-6 col-12  " >
					 	<div class="form-group">
					<input type="text" name="captcha_code" id="captcha_code" class="form-control" aria-describedby="basic-addon3" placeholder="Captcha" required>
				</div>
				</div>
				</div>
					<div class="form-group">
						<button type="submit" name="consub" class="btn btn-success">Submit</button>
					</div>
				</form> 
									<!--/ End Form -->
								</div>
								<!-- Single Enroll -->
							</div>
							<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.6s">
								<div class="enroll-right">
									<div class="section-title">
										<h2></h2>
										<p></p>
									</div>
								</div>
								<!-- Skill Main 
								<div class="skill-main">
									<div class="row">
										<div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="0.8s">
											<!-- Single Skill - 
											<div class="single-skill">
												<div class="circle" data-value="0.7" data-size="130">
													<strong>5K+</strong>
												</div>
												<h4>Students</h4>
											</div>
											<!--/ End Single Skill -- 
										</div>
										<div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="1s">
											<!-- Single Skill --
											<div class="single-skill">
												<div class="circle" data-value="0.9" data-size="130">
													<strong>30+</strong>
												</div>
												<h4>Courses</h4>
											</div>
											<!--/ End Single Skill --
										</div>
										<div class="col-lg-4 col-md-4 col-12 wow zoomIn" data-wow-delay="1.2s">
											<!-- Single Skill --
											<div class="single-skill">
												<div class="circle" data-value="0.8" data-size="130">
													<strong>200+</strong>
												</div>
												<h4>Teachers</h4>
											</div>
											<!--/ End Single Skill -- 
										</div>
									</div>
								</div>
								<!--/ End Skill Main -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Enroll --><!-- Courses -->
		<section class="courses section-bg section">
			<div class="container">
				<div class="row">
					<div class="col-12    ">
						<div class="section-title">
							<h2><?php echo strtoupper(show_content('319','title',$DB_LINK));?></h2>
							<p><?php echo  show_content('319','description',$DB_LINK) ;?></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="course-slider">

<?php
$qrytop=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='249' and status=1 order by ord asc") or die(mysqli_error());
$i=0;
			 foreach($qrytop as $rowtop)
			 {
			?>
							<div class="single-course">
								<div class="course-head overlay">
									<img class="image-shadow" src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowtop['image'];?>" alt="<?php echo $rowtop['title'];?>">
									<a href="<?php echo $rowtop['url'];?>" class="btn"><i class="fa fa-link"></i></a>
								</div>
								<div class="single-content">
									<h4><a href="<?php echo $rowtop['url'];?>"><?php echo $rowtop['title'];?></a></h4>
									<p class="text-truncate"><?php echo clean_tag($rowtop['description']);?></p>
								</div>
							</div>

 <?php $i++; } ?>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Courses -->
 <?php */?>


		
		<!-- Call To Action -->
		<section class="cta" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 offset-lg-8 col-12 col-sm-12">
						<div class="cta-inner overlay">
							<div class="text-content">
								<h2><?php echo strtoupper(show_content('320','title',$DB_LINK));?></h2> <p> <?php echo clean_tag(data_cutter(show_content('320','description',$DB_LINK),500));?></p>
								<div class="button">
									<a class="btn primary " href="<?php echo show_content('320','url',$DB_LINK);?>" >Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call To Action -->
		
		 
		
		<!-- Events -->
		<section class="events section">
			<div class="container">
				<div class="row">
					<div class="col-12 ">
						<div class="section-title">
							<h2>News &  <span>Updates</span></h2>
							<p>Latest news and notification from us</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="event-slider">
						<?php
$qrytop=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='321' and status=1 order by ord asc") or die(mysqli_error());
$i=0;
			 foreach($qrytop as $rowtop) 
			 { 
			?> 
							<div class="single-event">
								<div class="head overlay">
									<img class="image-shadow" src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowtop['image'];?>" alt="#">
									<a href="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowtop['image'];?>" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
								</div>
									<div class="event-content">
									<div class="meta"> 
										<span><i class="fa fa-calendar"></i><?php echo $rowtop['regdate'];?></span>
										<!-- <span><i class="fa fa-clock-o"></i>12.00-5.00PM</span> -->
									</div>
									<h4><a href="<?php echo $rowtop['url'];?>"><?php echo $rowtop['title'];?></a> </h4>
									 
									<div class="button">
										<a href="<?php echo $rowtop['url'];?>" class="btn">Read More</a>
									</div>
								</div>
							</div>

							<?php $i++; } ?>

						 
							<!--/ End Single Event -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Events -->

			
		<?php /*?>		<!-- Fun Facts -->
		<div class="fun-facts overlay" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.4s">
						<!-- Single Fact -->
						<div class="single-fact">
							<i class="fa fa-institution"></i>
							<div class="number"><span class="counter">80</span>k+</div>
							<p>Active Cources</p>
						</div>
						<!--/ End Single Fact -->
					</div>
					<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.6s">
						<!-- Single Fact -->
						<div class="single-fact">
							<i class="fa fa-graduation-cap"></i>
							<div class="number"><span class="counter">33</span>k+</div>
							<p>Active Students</p>
						</div>
						<!--/ End Single Fact -->
					</div>
					<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="0.8s">
						<!-- Single Fact -->
						<div class="single-fact">
							<i class="fa fa-video-camera"></i>
							<div class="number"><span class="counter">278</span>+</div>
							<p>Video Cources</p>
						</div>
						<!--/ End Single Fact -->
					</div>
					<div class="col-lg-3 col-md-6 col-6 wow zoomIn" data-wow-delay="1s">
						<!-- Single Fact -->
						<div class="single-fact">
							<i class="fa fa-trophy"></i>
							<div class="number"><span class="counter">308</span>+</div>
							<p>Awards Won</p>
						</div>
						<!--/ End Single Fact -->
					</div>
				</div>
			</div>
		</div>
		<!--/ End Fun Facts -->
		<?php */?>
		
	<?php require("include/footer.php");?>
	
    </body>
 <?php require("include/last.php");?>
</html>