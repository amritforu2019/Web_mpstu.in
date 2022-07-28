<?php
 
//ob_start();
require_once("../config/functions.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>
<?=$SITE_TITLE?>
</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.min.css" rel="stylesheet" />
<link href="../css/simple-sidebar.css" rel="stylesheet" />
<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.loopmovement.js"></script>
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
  <div id="sidebar-wrapper">
    <div class="leftbx">
      <ul id="accordion" class="accordion">
        <br>
         <li>
          <div class="link"><a style="color:#FFFFFF;"   href="/">MAIN WEBSITE</a> </div>
        </li>
        <li>
          <div class="link"><a style="color:#FFFFFF;"   href="index">HOME</a> </div>
        </li>
        <?
$country_qry=mysql_query("select * from category where parent_id=76 and status='1'  order by id asc")or die(mysql_error());
$i=0;
while($country_fetch=mysql_fetch_array($country_qry))
{
$i++;
?>
        <li>
          <div class="link"><? echo $country_fetch['name'];?><i class="fa fa-chevron-down"></i></div>
          <ul class="submenu">
            <?  
$country_qry1=mysql_query("select * from category where parent_id='".$country_fetch['id']."' and status='1'  order by name asc")or die(mysql_error());
if(mysql_num_rows($country_qry1)>0)
{
 
$j=0;
while($country_fetch1=mysql_fetch_array($country_qry1))
{
$j++;
?>
            <li><a href="details?page=<? echo $country_fetch1['id'];?>&bpage=<? echo $country_fetch1['parent_id'];?>"><? echo $country_fetch1['name'];?></a></li>
            <? } } ?>
          </ul>
        </li>
        <? } ?>
      </ul>
      <script>
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
</script>
<div>
            	<h3>Latest Updates</h3>
                <div class="box02">
					<div class="box2">
                    
                     <? $q=mysql_query("select * from news  order by posted_on desc"); 
				$i=1;
				while($row=mysql_fetch_array($q))
				{
				extract($row);
				?>
                
                <div class="content">
                        	<h4><?=date("D d M Y",strtotime($row['posted_on']));?></h4>
                            <p><a href="details_news?page=<? echo $row['id'];?>" title="View More"><?=stripslashes($row['title'])?></a></p>
                        </div>

 
 <? } ?>
                         
                    </div>
				</div>
            </div>
    </div>
    <div class="c"></div>
  </div>
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="container-fluid">
      <!-- <div class="mobilem"><a href="#menu-toggle" class="clickbtn " id="menu-toggle"><img src="images/click-here.png" alt="" class="img-responsive"></a></div>-->
      <div class="row">
        <div class="col-lg-12">
          <div class="row1">
            <?php include('header.php');?>
            <div class="leftbx-6">
              <div class="leftbx-8" style="margin-left: 10px;">
                <?
$country_qry=mysql_query("select * from category where id=76  order by id asc")or die(mysql_error());
$i=0;
 $country_fetch=mysql_fetch_array($country_qry);
 
 
?>
                <h2>Internal Quality Assurance Cell (IQAC) Introduction</h2>
                <p><? echo $country_fetch['descr'];?></p>
              </div>
              <div class="c"></div>
            </div>
            <?php include("foot_top.php"); ?>
          </div>
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
<script type="text/javascript" src="../js/jssor.slider.mini.js"></script>
<script>

        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $Idle: 2000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $Cols: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 12,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 4,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                    $Scale: false                                   //Scales bullets navigator or not while slider scale
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth) {
                    jssor_slider1.$ScaleWidth(parentWidth - 30);
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
</body>
</html>
