<?php 
if(isset($_POST['consub']))
{
   	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
	{ 
		 $_SESSION['msg']=array('error', 'The captcha code does not match!');
    	header("location:career");
		exit;		
	}
	else
	{  
	
 
		mysqli_query($DB_LINK, "insert into tbl_contact_qry set s_name='".ucwords($_POST['name'])."', email='$_POST[email]', contact='$_POST[phone]', subject='$_POST[subject]',   msg='$_POST[msg]', status=0, ipaddress='".$_SERVER['REMOTE_ADDR']."',typ='Career Query'");
    		
		if(mysqli_insert_id($DB_LINK))
		{
			  $subject = "Parent's Feedback - " . $SITE_NAME;
            $mail_body = '<div style="font:Arial, Helvetica, sans-serif;color:#000;text-decoration:none;font-weight:normal;">
                        <div style="padding:10px;"><img src="http://www.mjrppublicschool.com/assets/links/images/logo-1.png" alt="" /></div>
			<table cellpadding="5" cellspacing="0" width="400px" style="line-height:22px;">
		<tr>
       <td colspan="3" align="left"><h2>Hi, ' . $_POST['name'] . '<br>Your Registration details are</h2></td> 	    
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
       <td>Expertise In Subject</td> 
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
 
			 $_SESSION['msg']=array('success', 'Your Inquiry Saved  Successfully!! We will contact you soon!!');
			
			 
    		header("location:career");
			exit;
		}
		else
		{
			
			 $_SESSION['msg']=array('error', 'Sorry !!! Something went wrong'); header("location:career");
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
		<title>Careers | <?php echo $SITE_NAME; ?></title>
    <?php require("include/head.php");?>	
    </head>
    <body>
    	<?php require("include/upper.php");?>
	 
		
		<!-- Start Breadcrumbs -->
		<section class="breadcrumbs overlay">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>Careers</h2>
						<ul class="bread-list">
							<li><a href="index">Home<i class="fa fa-angle-right"></i></a></li>
							<li class="active"><a href="#">Careers</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
		<!-- About US -->
		<section id="contact" class="contact section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-sm-4 col-12">
						<div class="single-image  ">
							 <img src="<?php echo $SITE_URL;?>/assets/links/images/career.png" alt="Inquiry">
				 
						 
						</div>
					</div>
					<div class="col-lg-4 col-sm-4 col-12">
						<div class="about-text">
							<h2><?php echo strtoupper(show_content('298','title',$DB_LINK));?></h2>
							<p><?php echo  show_content('298','description',$DB_LINK) ;?></p>
							 
						</div>
					</div>
					<div class="col-lg-4  col-sm-4 col-12">
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
					<input type="text" name="subject" class="form-control" placeholder="Expertise In Subject" required>
					</div>
					<div class="form-group">
						<textarea name="msg" rows="2" class="form-control" placeholder="Message" required></textarea>
					</div>

					<div class="form-group">
						 <div class="input-group"> <img src="<?php echo $SITE_URL;?>/assets/links/captcha/captcha.php?rand=<?php echo rand(); ?>" id='captchaimg' alt="CAPTCHA Image" style="border-radius: 25px;"/>&nbsp;&nbsp; <a href='javascript: refreshCaptcha();' style="color:#28a745; text-decoration:none;"><i class="fa fa-refresh spin"></i> Refresh</a> </div>

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
		</section>
		<!--/ End About US -->
		
	 
		
 
		
			
	<?php require("include/footer.php");?>
	
    </body>
 <?php require("include/last.php");?>
</html>
</html>