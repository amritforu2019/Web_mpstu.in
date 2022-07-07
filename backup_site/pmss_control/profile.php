<?php ob_start(); include('../con_base/functions.inc.php');   master_main();



$qry=mysqli_query($DB_LINK,"select * from tbl_staff where id=".$_REQUEST['id']) or die(mysqli_error());

$row=mysqli_fetch_array($qry);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Member List :: <?php echo $SITE_NAME;?></title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>

 
</head>
<body class="no-skin">
<?php include('include/header.php');?>
  <?php include('include/sidemenu.php');?>
  <div  class="main-content">
    <div class="main-content-inner">

      <div class="breadcrumbs ace-save-state" id="breadcrumbs">

        <ul class="breadcrumb">

          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>

          <li><a href="">Member Management</a></li>

          <li class="active">Member Details</li>

        </ul>

        <!-- /.breadcrumb -->

      </div>

      <div class="page-content">

        <div class="page-header">

          <h1> Member Details </h1>

        </div>

        <!-- /.page-header -->

        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <!-- PAGE CONTENT BEGINS -->

            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">

            <div  class="alert alert-success" role="alert">

				<strong>Basic Details</strong>

            </div>

            

            <div class="row">

                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">

                  <div class="row">

                    <label class="col-sm-4"><strong>Member Name</strong></label>

                    <div class="col-sm-8"> <?php echo $row['name'];?> </div>

                  </div>

                  <div class="row">

                    <label class="col-sm-4"><strong>Father's Name</strong></label>

                    <div class="col-sm-8"> <?php echo $row['father'];?> </div>

                  </div>

                  <div class="row">

                    <label class="col-sm-4"><strong>DOB</strong></label>

                    <div class="col-sm-8"> <?php if($row['dob']!='0000-00-00'){echo date_dm($row['dob']);}else{ echo 'N/A';}?> </div>

                  </div>

               <!--    <div class="row">

                    <label class="col-sm-4"><strong>Designation</strong></label>

                    <div class="col-sm-8"> <?php echo $row['desig'];?> </div>

                  </div> -->

                  <div class="row">

                    <label class="col-sm-4"><strong>Joining Date</strong></label>

                    <div class="col-sm-8"> <?php if($row['doj']!='0000-00-00'){echo date_dm($row['doj']);}else{ echo 'N/A';}?> </div>

                  </div>

                  <div class="row">

                    <label class="col-sm-4"><strong>Mobile</strong></label>

                    <div class="col-sm-8"> <?php echo $row['mobile'];?> </div>

                  </div>

                  <div class="row">

                    <label class="col-sm-4"><strong>Email</strong></label>

                    <div class="col-sm-8"> <?php if($row['email']!=''){echo $row['email'];}else{ echo 'N/A';}?> </div>

                  </div>

                  <?php /*?><div class="row">

                    <label class="col-sm-4"><strong>Password</strong></label>

                    <div class="col-sm-8"> <?php echo  ($row['pass']);?> </div>

                  </div>

                  <!-- <div class="row">

                    <label class="col-sm-4"><strong>Salary (per month) <i class="fa fa-inr"></i></strong></label>

                    <div class="col-sm-8"> <?php echo $row['salary'].' /-';?> </div>

                  </div> -->
<?php */?>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

              <?php if($row['image']){?>

              <img src="../uploads/staff/<?php echo $row['image'];?>" class="img-responsive img-thumbnail">

              <?php }else{?>

                  <img src="https://vignette2.wikia.nocookie.net/mafiagame/images/2/23/Unknown_Person.png/revision/latest?cb=20151119092211" class="img-responsive img-thumbnail">

                  <?php }?>

              </div>

            </div>

            <div>&nbsp;</div>

             <div  class="alert alert-success" role="alert">

							<strong>Nominee Details</strong>

                            </div>
							  <div class="row">

                <label class="col-sm-3"><strong>Nominee Name</strong></label>

                <div class="col-sm-9"> <?php echo $row['nom_name'];?> </div>

              </div>
			  
			    <div class="row">

                <label class="col-sm-3"><strong>Relationship</strong></label>

                <div class="col-sm-9"> <?php echo $row['nom_rel'];?> </div>

              </div>

              

              <div  class="alert alert-success" role="alert">

							<strong>Address Details</strong>

                            </div>

                           

            <div class="row">

                <label class="col-sm-3"><strong>Full Address</strong></label>

                <div class="col-sm-9"> <?php echo $row['address'];?> </div>

              </div>

            <div class="row">

                <label class="col-sm-3"><strong>State</strong></label>

                <div class="col-sm-9"> 

                <?php

if($row['state']!='')
{
					  $aqry=mysqli_query($DB_LINK,"select * from state  where state_id=".$row['state']) ;

					  $ag=mysqli_fetch_array($aqry);

					  echo $ag['state'];
}

					  ?>

                </div>

              </div>

            <div class="row">

                <label class="col-sm-3"><strong>City</strong></label>

                <div class="col-sm-9"> 

                <?php
if($row['city']!='')
{
					  $aqry=mysqli_query($DB_LINK,"select * from city  where city_id=".$row['city']);

					  $ag=mysqli_fetch_array($aqry);

					  echo $ag['city'];
} 
					  ?>

                </div>

              </div>

            <div class="row">

                <label class="col-sm-3"><strong>Pincode</strong></label>

                <div class="col-sm-9"> <?php echo $row['pin'];?> </div>

              </div>

            

            <div  class="alert alert-success" role="alert">

							<strong>Account Details</strong>

                            </div> 

              

              <div class="row">

                <label class="col-sm-3"><strong>Bank Name</strong></label>

                <div class="col-sm-9"> <?php echo $row['bank'];?> </div>

              </div>

              <div class="row">

                <label class="col-sm-3"><strong>A/C No.</strong></label>

                <div class="col-sm-9"> <?php echo $row['acc'];?> </div>

              </div>

              <div class="row">

                <label class="col-sm-3"><strong>Account Type</strong></label>

                <div class="col-sm-9"> <?php echo $row['actype'];?> </div>

              </div>

              <div class="row">

                <label class="col-sm-3"><strong>IFSC</strong></label>

                <div class="col-sm-9"> <?php echo $row['ifsc'];?> </div>

              </div>

              <div class="row">

                <label class="col-sm-3"><strong>Branch</strong></label>

                <div class="col-sm-9"> <?php echo $row['branch'];?> </div>

              </div>

            

            

            <div class="alert alert-success" role="alert">

				<strong>Id Address Proof Documents</strong>

            </div>

            

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="thumbnail">

                    <?php if($row['uid_img']){?>

              <img src="../uploads/staff/<?php echo $row['uid_img'];?>" class="img-responsive">

              <?php }else{?>

                  <img src="http://sreechithraayurhome.com/wp-content/themes/thunder/skins/images/preview.png" class="img-responsive">

                  <?php }?>

                      <div class="caption">

                        <div style="font-size:20px;"><strong>Aadhar Card :</strong> <?php if($row['uid']!=''){echo $row['uid'];}else{ echo 'N/A';}?></div>

                      </div>

                    </div>

                </div>

                 

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    <div class="thumbnail">

                      <?php if($row['pan_img']){?>

              <img src="../uploads/staff/<?php echo $row['pan_img'];?>" class="img-responsive">

              <?php }else{?>

                  <img src="http://sreechithraayurhome.com/wp-content/themes/thunder/skins/images/preview.png" class="img-responsive">

                  <?php }?>

                      <div class="caption">

                        <div style="font-size:20px;"><strong>PAN Card :</strong> <?php if($row['pan']!=''){echo $row['pan'];}else{ echo 'N/A';}?></div>

                      </div>

                    </div>

                </div>

            </div>

            

            

            </form>

          </div>

        </div>

      </div>
 

 </div>
  </div>
  <?php include('include/footer.php');?>

  <!-- /.main-content -->
 <?php include("include/footer_file.php"); ?>
</body>
</html>
 

<script type="text/javascript">

$('#sandbox-container input').datepicker({

format: "yyyy-mm-dd",

todayHighlight: true,

endDate: '+0d',

autoclose: true

});



$('#sandbox-container1 input').datepicker({

format: "yyyy-mm-dd",

todayHighlight: true,

startDate: '-0d',

autoclose: true

});

</script>
<script type="text/javascript">

$(document).ready(function() {

$(".various").fancybox({

maxWidth	: 500,

maxHeight	: 700,

fitToView	: false,

width		: '50%',

height		: '65%',

autoSize	: false,

closeClick	: false,

openEffect	: 'fade',

closeEffect	: 'fade'

});

});

</script>

</html>

<?php 

mysqli_close($DB_LINK);

ob_end_flush();

?>