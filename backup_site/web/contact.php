<?php 
if(isset($_POST['consub']))
{
   	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
	{ 
		 $_SESSION['msg']=array('error', 'The captcha code does not match!');
    	header("location:contact");
		exit;		
	}
	else
	{  
	
 
		mysqli_query($DB_LINK, "insert into tbl_contact_qry set s_name='".ucwords($_POST['name'])."', email='$_POST[email]', contact='$_POST[phone]', subject='$_POST[subject]',   msg='$_POST[msg]', status=0, ipaddress='".$_SERVER['REMOTE_ADDR']."',typ='Contact Page Enquiry'");
    		
		if(mysqli_insert_id($DB_LINK))
		{
			  $subject = "Contact Enquiry - " . $SITE_NAME;
            $mail_body = '<div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">
                        <div style="padding:10px;"><img src="https://www.pmss.in/assets/links/images/mjr-logo-4.png" alt="" /></div>
			<table cellpadding="5" cellspacing="0" width="400px" style="line-height:22px;">
		<tr>
       <td colspan="3" align="left"><h2>Hi, ' . $SITE_NAME . '<br>Your Enquiry details are</h2></td> 	    
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
			
			 
    		header("location:contact");
			exit;
		}
		else
		{
			
			 $_SESSION['msg']=array('error', 'Your Query not Sent. Something went wrong'); header("location:contact");
			exit;
		}
	}
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx" xmlns:https="http://www.w3.org/1999/xhtml">
 <?php require("include/top.php");?>
<head>
		<!-- Meta -->

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="SITE KEYWORDS HERE" />
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Contact Information | <?php echo $SITE_NAME; ?></title>
    <?php require("include/head.php");?>	
    </head>
    <body>
    	<?php require("include/upper.php");?>
	 
		
		<!-- Start Breadcrumbs -->
		<section class="breadcrumbs overlay">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>Contact Information</h2>
						<ul class="bread-list">
							<li><a href="index">Home<i class="fa fa-angle-right"></i></a></li>
							<li class="active"><a href="#">Contact Information</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
		 	<section id="contact" class="contact section">
			<div class="container">
				<div class="contact-bottom">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Contact-Info -->
							<div class="contact-info">
								<div class="icon"><i class="fa fa-map"></i></div>
								<h3>Location</h3>
								<p><?php echo $ADDRESS;?></p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Contact-Info -->
							<div class="contact-info">
								<div class="icon"><i class="fa fa-envelope"></i></div>
								<h3>Email Address</h3>
								<a href="mailto:<?php echo $EMAIL_ID;?>"><b><?php echo $EMAIL_ID;?></b></a>
								<a href="mailto:<?php echo $EMAIL_ID2;?>"><b><?php echo $EMAIL_ID2;?></b></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<!-- Contact-Info -->
							<div class="contact-info">
								<div class="icon"><i class="fa fa-phone"></i></div>
								<h3>Get in Touch</h3>
								<p><?php echo $MOBILE;?> </p>
								<p><?php echo $MOBILE2;?> </p>
							</div>
						</div>
					</div>
				</div>
				 
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12">
							<div class="contact-map">
								<!-- Map -->
								 <iframe src='<?php echo $MAP?>' width='100%' height='600' frameborder='0'  allowfullscreen></iframe>
								<!--/ End Map -->
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12">
							<div class="form-head">
								<!-- Form -->
								<form  class="form" action="" method="post">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Your Name"  required>
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Your Email" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" required>
					</div>
					<div class="form-group">
						<input type="text" name="phone" class="form-control" placeholder="Your Phone" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  pattern=".{10}" maxlength="10" required>
					</div>
					<div class="form-group">
					<input type="text" name="subject" class="form-control" placeholder="Your Subject" required>
					</div>
					<div class="form-group">
						<textarea name="msg" rows="2" class="form-control" placeholder="Message" required></textarea>
					</div>

					<div class="form-group">
						 <div class="input-group"> <img src="<?php echo $SITE_URL;?>/assets/links/captcha/captcha.php?rand=<?php echo rand(); ?>" id='captchaimg' alt="CAPTCHA Image" style="border-radius: 25px;"/>&nbsp;&nbsp; <a href='javascript: refreshCaptcha();' style="color:#28a745; text-decoration:none;"><i class="fa fa-refresh"></i> Refresh</a> </div>

					</div>
<div class="form-group">
					<input type="text" name="captcha_code" id="captcha_code" class="form-control" aria-describedby="basic-addon3" placeholder="Captcha" required>
				</div>
					<div class="form-group">
						<button type="submit" name="consub" class="btn btn-success">Submit</button>
					</div>
				</form> 
								<!--/ End Form -->
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		
	 
		
 
		
			
	<?php require("include/footer.php");?>
	
    </body>
 <?php require("include/last.php");?>
</html>
</html>