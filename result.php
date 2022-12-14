<?php ob_start();

  require_once("con_base/functions.inc.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<!-- bsc-programme.html 17:35:35  -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Student Result</title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta name="Abstract" content="" /><meta name="subject" content="Maharana Pratap Horticultural University, Karnal">
<meta name="Robots" content="index,follow" />
<meta name="Coverage" content="Worldwide">
<meta name="Distribution" content="Global" />
<meta name="Revisit-After" content="2 days" />
<meta name="Rating" content="General" />
<meta name="url" content="index.html">
<meta name="Identifier-URL" content="index.html">
<meta name="Reply-to" content="info@mpstu.in/" />
<meta name="Owner" content="Maharana Pratap Horticultural University, Karnal" />
<meta name="Author" content="iNet Business Hub, info@inetbusinesshub.com">
<meta name="Designer" content="iNet Business Hub" />
<meta name="Copyright" content="Maharana Pratap Horticultural University, Karnal" />
<meta name="Language" content="en">
<meta http-equiv="Expires" content="0">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache"><meta charset="utf-8">
<!-- Stylesheets -->
<link rel="Shortcut Icon" href="images/favicon.html" />
<link href="templates/mhu-karnal/css/bootstrap.css" rel="stylesheet">
<link href="templates/mhu-karnal/css/revolution-slider.css" rel="stylesheet">
<link href="templates/mhu-karnal/css/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="templates/mhu-karnal/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="templates/mhu-karnal/js/respond.js"></script><![endif]-->
<link rel="stylesheet" href="templates/mhu-karnal/scripts/menu.css" type="text/css" media="screen, projection"/>
<!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="scripts/ie.css" media="screen" />
<![endif]-->
<script type="text/javascript" language="javascript" src="templates/mhu-karnal/scripts/jquery.dropdownPlain.js"></script>

<script src="templates/mhu-karnal/js/jquery.js"></script> 
<link type="text/css" media="screen" rel="stylesheet" href="plugins/gallery1/gallery.css" />
<script type="text/javascript" src="plugins/validation/jquery.validate.js"></script>
<script type="text/javascript" src="plugins/gallery1/jquery.colorbox.js"></script>


<link href="templates/mhu-karnal/css/site-icons.css" rel="stylesheet" />
<link href="templates/mhu-karnal/css/mobMenustyle.css" rel="stylesheet" />
<link href="templates/mhu-karnal/css/jquery.mobile-menu.css" rel="stylesheet" />
<script type="text/javascript">
function slideSwitch() {
    var $active = $('#slideshow IMG.active');
    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');
    // uncomment the 3 lines below to pull the images in random order
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
$(function() {
    setInterval( "slideSwitch()", 5000 );
});
</script>

<style type="text/css">
#slideshow {
    position:relative;
	width:100%;
}
#slideshow IMG {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
}
#slideshow IMG.active {
    z-index:10;
    opacity:1.0;
}
#slideshow IMG.last-active {
    z-index:9;
}
</style>
</head>

<body>
<div class="page-wrapper">
<!--    <div class="preloader"></div>-->
    
    <header class="main-header" w3-include-html="header.html">
<div class="mobNavigation">
  	<div id="page">
        <div class="mm-toggle-wrap">
            <div class="mm-toggle">
                <i class="icon-menu"></i>
                Menu 
            </div>        
        </div>
    </div>


		

		

        

    </header>	
	<section style="background-color: #eee;">
    	<div class="flashimg">
			<img border='0' title='B.Sc. Programme' alt='B.Sc. Programme' class='active' src='templates/mhu-karnal/img/flash-img.jpg'>		</div>
    </section>
    
     <section class="default-section padd-top-30 padd-bott-10">
    	<div class="auto-container">
        	<div class="row clearfix">

                <div class="column text-column col-md-12 col-sm-12 col-xs-12" id="pagedata">
                	<link type="text/css" media="screen" rel="stylesheet" href="plugins/gallery1/gallery.css" />
					<script type="text/javascript" src="plugins/validation/jquery.validate.js"></script>
					<script type="text/javascript" src="plugins/gallery1/jquery.colorbox.js"></script>
					<h1>Student Result</h1>

                    <div class="btm-border"></div>
                    <div class="row mb-3">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <form method="POST" action="" accept-charset="UTF-8">
                                <!-- <div class="form-group">
                                    <select name="session" id="session"  required  class="form-control br-0" >
                                        <option value=""  >Select Session</option>
                                        <?php /*$country_qry=mysqli_query($DB_LINK,"select * from tbl_session   order by id asc")or die(mysqli_error($DB_LINK));
                                        while($country_fetch=mysqli_fetch_array($country_qry)) { */?>
                                            <option value="<?php /*echo $country_fetch['title']*/?>"  ><?php /*echo $country_fetch['title']*/?></option>
                                        <?php /* } */?>
                                    </select> </div>--><div class="form-group">
                                    <input type="number" class="form-control br-0" placeholder="Enter your Roll No" name="rollno" required>
                                </div>



                                <div class="form-group">
                                    <button type="submit" name="finder" class="btn btn-info br-0">Get Result</button>
                                </div>
                            </form>
                        </div>
                        <?php
                        if(isset($_POST['finder']))
                        {
                            // and session='".$_POST['session']."'
                              $sql="SELECT * FROM  tbl_student where student_id='".$_POST['rollno']."' ";
                            $result =mysqli_query($DB_LINK,$sql);

                            $data =mysqli_fetch_object($result);
                            ?>
                            <table  class="table  table-borderless  text-center  text-uppercase  "
                            >
                                <tr>
                                    <td  class="text-center h4 text-uppercase"> Maharana Pratap Horticultural University, Karnal  </td>

                                </tr>
                                <tr  ><td> <?php echo $data->course;?>  YEAR / SEMESTER : <?php echo numberToRomanRepresentation($data->year);?>
                                    </td>
                                </tr>
                                <tr  class="text-right"><td>
                                        <form method="POST" action="result-print.php" accept-charset="UTF-8">
                                            <button type="submit" name="finder" class="btn btn-success br-0"><i class="fa fa-print" aria-hidden="true"></i>
                                                Print</button>
                                            <input type="hidden"  name="rollno" value="<?php echo $data->student_id;?>">
                                            <input type="hidden"  name="session" value="<?php echo $_POST['session']?>">

                                        </form>

                                    </td> </tr>
                            </table>




                            <table class="table  table-bordered  text-center  text-uppercase  ">
                                <tr>
                                    <td  class="bg-secondary text-white">Roll NO.</td>
                                    <td><?php echo $data->student_id;?> </td>
                                    <td class="bg-secondary text-white" >Enrollment No.</td>
                                    <td><?php echo $data->enr_no;?></td>
                                    <td rowspan="5"   >
                                        <img src="student_portal/upload/student/image/<?php echo $data->image; ?>"
                                             width="100px"></td>
                                </tr>
                                <tr>
                                    <td class="bg-secondary text-white">STUDENT NAME</td>
                                    <td><?php echo $data->name;?></td>
                                    <td class="bg-secondary text-white" >COURSE</td>
                                    <td><?php echo $data->course;?></td>
                                </tr>
                                <tr>

                                    <td class="bg-secondary text-white">FATHER’S NAME</td>
                                    <td><?php echo $data->f_name;?></td>
                                    <td class="bg-secondary text-white">MOTHER'S NAME</td>
                                    <td><?php echo $data->m_name;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-secondary text-white">DATE OF BIRTH</td>
                                    <td><?php echo date_dm($data->dob);?></td>
                                    <td class="bg-secondary text-white" >SESSION</td>
                                    <td><?php echo $data->session;?></td>
                                </tr>
                                <tr>
                                    <td class="bg-secondary text-white">STATUS</td>
                                    <td><?php echo $data->seat;?></td>
                                    <td class="bg-secondary text-white">BRANCH</td>
                                    <td ><?php echo get_course_branch($data->course);?></td>
                                </tr>
                                <!--  <tr>
                                <td class="bg-secondary text-white">Subject</td>
                                <td colspan="4"> <?php /*echo ($data->subject_title);*/?></td>
                            </tr>-->


                            </table>
                            <table class="table  table-bordered  text-center  text-uppercase  ">
                                <tr>
                                    <td class="bg-secondary text-white">NAME OF PAPER / SUBJECT	</td>
                                    <td class="bg-secondary text-white"  >TOTAL MARKS	</td>
                                    <td class="bg-secondary text-white"   > PRACTICAL </td>
                                    <td class="bg-secondary text-white"    > THEORY </td>
                                    <td class="bg-secondary text-white"    > TOTAL OBTAINED MARKS</td>

                                    <!--<td class="bg-secondary text-white"    >ACTION</td>-->

                                </tr>
                                <?php
                                $allm=0;
                                $totm=0;
                                //and `session`='".$_POST['session']."'
                                $sql_data="select * from tbl_result_marks where  `roll_no`='".$_POST['rollno']."'
           and is_lock='1' order by id asc ";
                                $result=mysqli_query($DB_LINK,$sql_data);
                                while ($row=mysqli_fetch_object($result))
                                {
                                    ?>
                                    <tr>
                                        <td ><?php echo $row->subject;?></td>
                                        <td   ><?php echo $row->m_mark;$allm+=$row->m_mark;?></td>
                                        <td     ><?php echo $row->obt_mark_1;?></td>
                                        <td      ><?php echo $row->obt_mark_2;?></td>
                                        <td      ><?php echo $row->t_mark;$totm+=$row->t_mark;?></td>
                                        <!--<td  ><a href="javascript:void(0)" onClick="return del_result(<?php /*echo $row->id;*/?>);" title="Delete ">
                        <i class="fas fa-trash-alt color-tomato"></i>
                    </a></td>-->

                                    </tr>
                                    <?php $result_status=$row->r_status; $rdd=$row->rdd; }?>

                                <tr class="bg-primary text-white">
                                    <td>Total</td>
                                    <td   ><?php echo $allm;?></td>
                                    <td colspan="2"></td>
                                    <td ><?php echo $totm;?></td>

                                </tr></table>


                            <table class="table  table-bordered  text-center  text-uppercase  ">


                                <tr class="bg-warning text-white">
                                    <td  >Result Status</td>
                                    <td  ><?php echo $result_status;?></td>
                                    <td>Result Declaration Date</td>
                                    <td>
                                        <?php echo date_dm($rdd);?>
                                    </td>
                                </tr>
                            </table>

                        <?php } ?>


                    </div>

            </div>
        </div>
    </section>	
<footer class="main-footer"  w3-include-html="footer.html">
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                            
                            
                            <!--Footer Column-->
                            <div class="col-lg-3 col-sm-6 col-xs-12 column">
                                <h2>Quick Links</h2>
                                <div class="footer-widget links-widget">
                                    <ul>
                                        <li><a href="admission-form/index.html" target="_blank">Admission 2022-23</a></li>
                                        <!--<li><a href="http://www.mpstu.in/downloads/files/n5afd570d4ef15.pdf" target="_blank">Download Prospectus</a></li>-->
                                        <!--<li><a href="prospectus.html">Download Prospectus</a></li>-->
                                        <li><a href="#">Fee Structure</a></li>
                                        <li><a href="404.html">Jobs@MHU</a></li>
                                        <li><a href="photo-gallery.html">Photo Gallery</a></li>
                                        <li><a href="#">Video Gallery</a></li>
                                        <!--<li><a href="press.html">Press</a></li>-->
										<li>
										<div id="google_translate_element"></div>
											
											<script type="text/javascript" src="../translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>
										</li>
                                    </ul>
                                </div>
                            </div>
							<div class="col-lg-4 col-sm-6 col-xs-12 column">
                                <h2>Usefull Links</h2>
                                <div class="footer-widget links-widget">
                                    <ul>
										<li><a href="http://www.digitalindia.gov.in/" target="_blank"><img src="templates/mhu-karnal/images/digital-india.png" alt="HSUHS"></a></li>
                                        <li><a href="downloads.html"><img src="templates/mhu-karnal/images/downloads.png" alt="HSUHS"></a></li>
										<!--<li><a href="e-tender.html"><img src="templates/mhu-karnal/images/etendering.png" alt="HSUHS"></a></li>-->
                                        <li><a href="https://mhukarnal.haryanaeprocurement.gov.in/banks/detail/mhukarnal/NDA5ODI=/" target="_blank"><img src="templates/mhu-karnal/images/etendering.png" alt="HSUHS"></a></li>
                                        <li><a href="http://www.pmindia.gov.in/en/" target="_blank"><img src="templates/mhu-karnal/images/pmo.png" alt="HSUHS"></a></li>
                                        <li>Visitors : 151848</li>
                                    </ul>
        
                                </div>
                            </div>
                    	</div>
                    </div><!--Two 4th column End-->
                    
                    <!--Two 4th column-->
					  
					
                </div>
                
            </div>
        </div>
        

    </footer>
    
    
</div>
	
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon flaticon-arrows-31"></span></div>


<script src="templates/mhu-karnal/js/bootstrap.min.js"></script>
<script src="templates/mhu-karnal/js/revolution.min.js"></script>
<script src="templates/mhu-karnal/js/jquery.fancybox.pack.js"></script>
<script src="templates/mhu-karnal/js/isotope.js"></script>
<script src="templates/mhu-karnal/js/owl.js"></script>
<script src="templates/mhu-karnal/js/wow.js"></script>
<script src="templates/mhu-karnal/js/script.js"></script>

<script src="templates/mhu-karnal/js/jquery.mobile-menu.min.js"></script>    
<script>
	jQuery(document).ready(function($){		
		$("#mobile-menu").mobileMenu({
			MenuWidth: 250,
			SlideSpeed : 300,
			WindowsMaxWidth : 980,
			PagePush : true,
			FromLeft : true,
			Overlay : true,
			CollapseMenu : true,
					ClassName : "mobile-menu"
		});
	});

    function includeHTML() {
        var z, i, elmnt, file, xhttp;
        /*loop through a collection of all HTML elements:*/
        z = document.getElementsByTagName("*");
        for (i = 0; i < z.length; i++) {
            elmnt = z[i];
            /*search for elements with a certain atrribute:*/
            file = elmnt.getAttribute("w3-include-html");
            if (file) {
                /*make an HTTP request using the attribute value as the file name:*/
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4) {
                        if (this.status == 200) {elmnt.innerHTML = this.responseText;}
                        if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
                        /*remove the attribute, and call this function once more:*/
                        elmnt.removeAttribute("w3-include-html");
                        includeHTML();
                    }
                }
                xhttp.open("GET", file, true);
                xhttp.send();
                /*exit the function:*/
                return;
            }
        }
    };

        includeHTML();
</script>
</body>

<!-- bsc-programme.html 17:35:35  -->
</html>
    
