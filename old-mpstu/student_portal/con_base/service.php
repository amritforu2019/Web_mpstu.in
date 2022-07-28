<?php error_reporting(0); ob_start();  include("con_base/functions.inc.php"); 

if(isset($_REQUEST['submit2']))

{

	//set the sender's name
	$name = $_POST['name'];

	$mail_body .= "Enquiry On : ".$_POST['enq']."<br>";	
	$mail_body .= "Mail from " . $name."<br>";
	$mail_body .= "Name : ".$_POST['name']."<br>";
	$mail_body .= "Phone : ".$_POST['mobile']."<br>";
     $mail_body .= "E-mail : ".$_POST['email']."<br>";
	 
$mail_subject = "Enquiry from SVS Website";
include('mailer/PHPMailerAutoload.php');
$mail = new PHPMailer; 
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $HOST;    //echo $HOST;                   // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $WEBMAIL;   ///echo $WEBMAIL;                // SMTP username
$mail->Password = $MPASS;   // echo $MPASS ;           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = $PORT;             //  echo $PORT;                      //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom($WEBMAIL,$SITE_NAME);     //Set who the message is to be sent from

$mail->addAddress($EMAIL_ID, $SITE_NAME);  //Set who the message is to be

$mail->addAddress($_POST['service_email'], ' '); 
$mail->addAddress($_POST['email'], ' '); 

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
       // Add attachments

$mail->isHTML(true);              //$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name                    // Set email format to HTML
 
$mail->Subject = $mail_subject;
$mail->Body    = $mail_body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 

if(!$mail->send()) 
{
     'Message could not be sent.';
     'Mailer Error: ' . $mail->ErrorInfo;
 }
 else 
 { $_SESSION['sess_msg']='Thanks for contacting. Your enquiry has been sent.';

?>
<script>alert('Enquiry sent successfully')</script>
<?
 }	
 
 
	
	$msg_body .= "Name : ".$_POST['name']." ";
	$msg_body .= "Phone : ".$_POST['mobile']." ";
     $msg_body .= "E-mail : ".$_POST['email']." ";
	 
	    $msg="Enquiry from SVS Website ".$msg_body." Thanks Doorstep Services www.serviceatdoorstep.com "; 
        sms_sender($msg_typ,$msg_contact,$msg_pass,$msg_sender_id,$msg,$_POST['service_mob']);
		sms_sender($msg_typ,$msg_contact,$msg_pass,$msg_sender_id,$msg,$_POST['service_mob2']);
        sms_sender($msg_typ,$msg_contact,$msg_pass,$msg_sender_id,$msg,$PHONE_NO);
 
	 header("location:service.php");		
		exit();		}
?>
<!doctype html>
<html lang=''>
<head>
<meta charset='utf-8'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="js/modernizr.custom.js"></script>
<script src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<title><?php echo $ADMIN_HTML_TITLE;?></title>
</head>
<body>
<div class="rowbx">
  <div class="container">
    <div class="headbx">
      <?php include("head-page.php"); ?>
    </div>
  </div>
</div>
<div class="container">
  <div>
    <div class="col-md-12">
      <div class="pagebx">
        <h1> <? if($_REQUEST['cat']!='') echo 'Service related to '.$_REQUEST['cat']; else echo 'All Services'; ?> </h1>
        <?php include("service_left.php"); ?>
        
        <div class="col-lg-9">
       <? echo  $_SESSION['sess_msg']; $_SESSION['sess_msg']=''; ?>
          <? 
				 if(isset($_POST['srch']))				 
				 {
				 if($_POST['srch_name']!='')
				 {
				 $where.=" and ( name like '%".$_POST['srch_name']."%' or contact like '%".$_POST['srch_name']."%' or contact2 like '%".$_POST['srch_name']."%' )";
				 }
				 if($_POST['state']!='')
				 {
				 $where.=" and state = '".$_POST['state']."'  ";
				 }
				 if($_POST['state']!='')
				 {
				 $where.=" and state = '".$_POST['state']."'  ";
				 }
				 if($_POST['city']!='')
				 {
				 $where.=" and city = '".$_POST['city']."'  ";
				 }
				  if($_POST['area']!='')
				 {
				 $where.=" and area = '".$_POST['area']."'  ";
				 }
				 }
				 
				 
				 if(isset($_POST['name']))
				 {
				 $where=" and pin ='".$_POST['location']."' and category='".$_POST['search_data']."'" ; 
				 }
if($_REQUEST['cat']!='')
{
 $where=" and ( main_category like '%".$_REQUEST['cat']."%' or category like '%".$_REQUEST['cat']."%' )" ; 
}
				 
 // echo "select * from reg where r_typ='service' and package!=0 and status=1 $where order by name desc";
				 
				 $q=mysqli_query($DB_LINK,"select * from reg where r_typ='service' and package!=0 and status=1 $where order by name desc"); 
				  $count=mysqli_num_rows($q);
				  if($count!=0)
				  {
				  
				$i=1;
				while($row=mysqli_fetch_array($q))
				{ extract($row); $i++;?>
          <div class="marss-2">
            <div class="col-lg-3">
              <div class="marss-3"><img src="<? if($row['img']!='') { ?>upload/provider/<?php echo $row['img']; } else { echo 'images/1.jpg'; }?>" class="img-responsive" alt=""></div>
            </div>
            <div class="col-lg-9">
              <div class="col-lg-9">
                <div class="marss-4">
                  <h2><a href="details.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h2>
                  <p><i class="fa fa-phone"></i> +(91)-<?php echo $row['contact']; ?></p>
                  <p><i class="fa fa-map-marker"></i> &nbsp;<?php echo $row['area_name']; ?> <?php echo $row['city']; ?></p>
                  <p><?php echo $row['category']; ?></p>
                  <div class="morexm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myid<?=$i?>">Send Enquiry</a> <a href="#"   data-toggle="modal" data-target="#myiddet<?=$i?>" <?php /*?>href="details.php?id=<?php echo $row['id']; ?>"<?php */?> class="btn btn-warning">Details</a></div>
                </div>
              </div>
              <div class="col-lg-3 align-center">
                <div align="center" style="color:#fff;">
               <!--   <p style="font-size:16px; padding-bottom:15px;">Estd.in 2007</p>
                -->  <?php if($row['status']=='1') {  ?>
                  <a href="" data-toggle="tooltip" title="Approved by the Company"><img src="images/Verified-Account.png" alt=""></a>
                  <? } ?>
                </div>
              </div>
              <div class="c"></div>
            </div>
            <div class="c"></div>
            <!--light box-->
            <div class="modal fade" id="myid<?=$i?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Fill this form and get best deals from</h4>
                  </div>
                  <div class="modal-body">
                    <form id="contact-form"  name="Feedback" method="post" action="">
                      <input name="service_email" type="hidden" value="<?php echo $row['email']; ?>">
                      <input name="service_mob" type="hidden" value="<?php echo $row['contact']; ?>">
                      <input name="service_mob2" type="hidden" value="<?php echo $row['contact2']; ?>">
                      <div class="left-inner-addon paddtop"> <i class="fa fa-user"></i>
                        <input type="text" class="form-control" value="<?php echo $row['name']; ?>,<?php echo $row['area_name']; ?> <?php echo $row['city']; ?>" required placeholder="Your Name" name="enq" />
                      </div>
                      <div class="left-inner-addon paddtop"> <i class="fa fa-user"></i>
                        <input type="text" name="name" class="form-control" required placeholder="Your Name">
                      </div>
                      <div class="left-inner-addon paddtop"> <i class="fa fa-phone"></i>
                        <input type="number" class="form-control" name="mobile" required placeholder="Your Mobile Number" />
                      </div>
                      <div class="left-inner-addon paddtop"> <i class="fa fa-envelope"></i>
                        <input type="email" required name="email" class="form-control" placeholder="Your Email ID" />
                      </div>
                      <div class="left-inner-addon paddtop"> <i class="fa fa-paper-plane" style="color:#fff;"></i>
                        <input type="submit" name="submit2" class="btn btn-warning"  value="Submit" />
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="myiddet<?=$i?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Details</h4>
                  </div>
                  <div class="modal-body">
                    
                    <h1 style="color:#006699"><? echo $row['name']; ?></h1>
                       <p><i class="fa fa-phone"></i> +(91)-<? echo $row['contact']; ?></p>
                        <p><i class="fa fa-map-marker"></i> <? echo $row['addr']; ?> <? echo $row['area_name']; ?> , <? echo $row['city']; ?> <? echo $row['state_name']; ?> [<? echo $row['pin']; ?>]</p>
                        <p>Contact Person : <? echo $row['contact_name']; ?> </p>
                        
                        <a href="#" target="_blank"> <i class="fa fa-globe"></i> <? echo $row['email']; ?></a>
                       
                       
                         
                        
					</div><div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                  </div>
                  
                </div>
               
              </div>
             
          <? } } else { echo 'No Record found';  } ?>
        </div>
        <div class="c"></div>
      </div>
    </div>
    <div class="c"></div>
  </div>
</div>
<?php include("footer.php"); ?>
<script src="js/jquery.dlmenu.js"></script>
<script src="js/jquery.dlmenu.js"></script>
<script>
			$(function() {
				$( '#dl-menu' ).dlmenu();
			});
		</script>
</body>
</html>
