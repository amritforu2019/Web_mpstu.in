<?php
error_reporting(0);
//ob_start();
require_once("config/functions.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?=$SITE_TITLE?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/simple-sidebar.css" rel="stylesheet" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.loopmovement.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>

<body>
<!-- Sidebar -->
<div id="wrapper">
<?php include('left.php');?>
           <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
            
           <!-- <div class="mobilem"><a href="#menu-toggle" class="clickbtn " id="menu-toggle"><img src="images/click-here.png" alt="" class="img-responsive"></a></div>-->
                <div class="row">
                    <div class="col-lg-12">
						<?php   include('header.php');
						 ?>
                        
                        <div class="leftbx-13">
                        <h1>Downloads</h1>
  <? $q=mysql_query("select * from news3 where city=1  order by posted_on desc"); 
				$i=1;
				while($row=mysql_fetch_array($q))
				{
				extract($row);
				?>
                            	<h3><?=$row['title'];?></h3>
                                <p> <?=stripslashes($row['descr']);?></p>
                                <?php if($row['city']!='2') { if($row['docs']!='') {  ?><a href="../product/category/<?php echo $row['docs'] ; ?>" target="_blank">Download Link</a> <? } } ?>  
<? } ?>
                            </div>
                      
                          <?php include("foot_top.php"); ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <div class="c"></div>
   <!--pc-->
      <?php include("foot.php"); ?>
    
    <!--end-->
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<script type="text/javascript">
	$('.box1').loopmovement({
		'direction':'top', 	
		'speed':20
	});
	$('.box2').loopmovement({
		'direction':'top', 	
		'speed':30
	});
	$('.box3').loopmovement({
		'direction':'top', 	
		'speed':80
	});
</script> 
                       
  
</body>

</html>
