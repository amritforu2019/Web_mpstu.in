<!DOCTYPE html>
<html lang="en"><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/links/css/css.css" rel="stylesheet">
    <title><?php echo $get_data_post['title'];?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <?php include("include/top.php");?>
</head>
<body>
<?php include("include/head.php");?>
<?php include("include/notification.php");?>


<div class="container-fluid container-padding" style="padding-bottom: 15px;">
    <div class="row pb-2 pt-2">
        <?php include("include/left_links.php");?>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12" style="overflow : hidden">
                        <div class="row mt-4">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3><?php echo $get_data_post['title'];?></h3>
                    <div class="btm-border"></div>
                    <p style="text-align:justify;">  <?php echo $get_data_post['content'];?>
                    </p>
                   <!-- <a href="https://www.mpstu.co.in/about-us" class="text-danger"><strong>read more</strong></a>-->
                </div>
            </div>
        </div>


    </div>
</div>


<?php include("include/footer.php");?>
<?php include("include/last.php");?>







</body></html>
