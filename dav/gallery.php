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
<script type="text/javascript" src="source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 250,

				closeEffect : 'elastic',
				closeSpeed  : 250,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


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
                    <div class="row1">
						<?php include('header.php');?>
                        
                        <div class="leftbx-13">
                            	<h1>Image Gallery</h1>
                                <div>
                                	

<div id="gallery">
<? if($_REQUEST['pid']) {
		  
					$start=0;
					if(isset($_GET['start'])and $_GET['start']!='')$start=$_GET['start'];
					
					$qry1=mysql_query("select * from gallery where pid='".$_REQUEST['pid']."' and status=1");
					$qry=mysql_query("select * from gallery where pid='".$_REQUEST['pid']."' and status=1 "); 
					$reccnt=mysql_num_rows($qry1);   
			           if($reccnt!=0){?>
                      
							  <? $i=$start+1; $k=$i; while($row=mysql_fetch_array($qry)){extract($row); ?> 
  
   <figure class="col-md-4 col-sm-4 col-xs-12 gallbx">
      <a class="fancybox" href="upload/gallery/<? echo $row['images']; ?>" data-fancybox-group="gallery" title="">
      <img class="img" src="upload/gallery/thumb/<? echo $row['images']; ?>" alt="" />
        <figcaption>
            <h2><? echo $row['name'];?></h2>
           <!-- <p>Lorem ipsum dolor sit amet</p> -->
        </figcaption>
        </a>
    </figure>
	
	
 
    
    
    
  <? $i++; $k++;}}?>
                              
                             
							 
			 
	  <? } else { ?>
           <?
                  
					$start=0;
					if(isset($_GET['start'])and $_GET['start']!='')$start=$_GET['start'];
					
					$qry1=mysql_query("select *  from photogallery_cat where status=1 and status2=0");
					$qry=mysql_query("select * from photogallery_cat where status=1 and  status2=0 order by id "); 
					$reccnt=mysql_num_rows($qry1);   
				?> 	 
						<? if($reccnt!=0){?>
                        
							  <? $i=$start+1; $k=$i; while($row=mysql_fetch_array($qry)){extract($row); ?> 
                               <? $src=mysql_fetch_array(mysql_query("select * from gallery where pid='".$row['id']."' order by rand() limit 1"));?>
                   
                                
                               
		 <figure class="col-md-4 col-sm-4 col-xs-12 gallbx">
      <a class="fancybox" href="gallery?pid=<?=$id?>" data-fancybox-group="gallery" title="">
      <img class="img" src="upload/gallery/thumb/<? echo $src['images']; ?>" alt="" />
        <figcaption>
            <h2><? echo $row['name'];?></h2>
           <!-- <p>Lorem ipsum dolor sit amet</p> -->
        </figcaption>
        </a>
    </figure>
        
        <? $i++; $k++;}}?>
							 
							
      
      <? } ?>	
    
    
</div>




<style>

</style>
<script>
$(document).ready(function() {
    	
			$('ul a').click(function() {
			var $anchor = $(this);
			
			$('html, body').animate({
			scrollTop: $($anchor.attr('href')).offset().top
			}, 2000);
			return false;
			helpers : {
			}
			});
			});
</script>
                                </div>
                            </div>
                      
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <div class="c"></div>
   <!--pc-->
    <div class="container-fluid">
        <div class="row">
        	<div class="footbx footbx1">
                <div class="col-lg-4 col-md-4 col-sm-4"><p>Copyright © 2015 All Rights Reserved DAV PG College </p></div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3"><p>Developed & Managed by <a href="#">Balaji Software Solutions</a></p></div>
                <div class="c"></div>
            </div>
        </div>
    </div>
    
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
