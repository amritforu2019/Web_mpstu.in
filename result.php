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
<meta name="Reply-to" content="info@mhu.ac.in/" />
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
    
    <header class="main-header">
<div class="mobNavigation">
  	<div id="page">
        <div class="mm-toggle-wrap">
            <div class="mm-toggle">
                <i class="icon-menu"></i>
                Menu 
            </div>        
        </div>
    </div>
    <div id="mobile-menu">
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="#">About Us</a>
                    <ul><li><a href='about-mhu.html' target='_self'>About MHU</a></li><li><a href='visionmission.html' target='_self'>Vision & Mission</a></li><li><a href='http://www.hsuhs.ac.in/downloads/files/n6226dc9501fd8.pdf' target='_blank'>Act & Statue</a></li><li><a href='vice-chancellor-message.html' target='_self'>Vice Chancellor Message</a></li><li><a href='foundation-ceremony.html' target='_self'>Foundation Ceremony</a></li></ul>                </li>
                <li><a href="#">Administration</a>	
                    <ul><li><a href='board-of-management-.html' target='_self'>BOARD OF MANAGEMENT </a></li><li><a href='vice-chancellor.html' target='_self'>Vice-Chancellor</a></li><li><a href='registrar.html' target='_self'>Registrar</a></li><li><a href='comptroller.html' target='_self'>Comptroller</a></li><li><a href='eo-cum-he.html' target='_self'>EO-Cum-HE</a></li></ul>                </li>
                <li><a href="#">Teaching</a>
                    <ul><li><a href='bsc-programme.html' target='_self'>B.Sc. Programme</a></li><li><a href='msc-programme.html' target='_self'>M.Sc. Programme</a></li><li><a href='phd-programme.html' target='_self'>Ph.D. Programme</a></li></ul>                </li>
                <li><a href="#">Research</a>
                    <ul><li><a href='director-of-research.html' target='_self'>DIRECTOR OF RESEARCH</a></li><li><a href='regional-research-center-jind-.html' target='_self'>REGIONAL RESEARCH CENTER, JIND </a></li><li><a href='regional-research-center-jhajjar.html' target='_self'>REGIONAL RESEARCH CENTER, JHAJJAR</a></li><li><a href='regional-research-center-ambala.html' target='_self'>REGIONAL RESEARCH CENTER, AMBALA</a></li><li><a href='regional-research-center-murthal-sonipat.html' target='_self'>REGIONAL RESEARCH CENTER, MURTHAL (SONIPAT)</a></li><li><a href='anjanthali-farm-karnal.html' target='_self'>Anjanthali Farm (Karnal)</a></li><li><a href='facultystaff.html' target='_self'>Faculty/Staff</a></li><li><a href='gallery345.html' target='_self'>Gallery</a></li></ul>                </li>
                <li><a href="#">Extension</a>
                    <ul><li><a href='directorate-of-extension-education.html' target='_self'>Directorate of Extension Education</a></li></ul>                </li>
                <li><a href="#">Colleges</a>
                    <ul><li><a href='dean-college-of-horticulture.html' target='_self'>Dean College of Horticulture</a></li><li><a href='studentsactivities-.html' target='_self'>STUDENTS  ACTIVITIES </a></li><li><a href='training.html' target='_self'>TRAINING</a></li><li><a href='conferences.html' target='_self'>CONFERENCES</a></li><li><a href='faculty.html' target='_self'>Faculty</a></li><li><a href='anti-ragging-cell.html' target='_self'>Anti Ragging Cell</a></li><li><a href='gallery.html' target='_self'>Gallery</a></li><li><a href='library.html' target='_self'>Library</a></li><li><a href='student-scholarship.html' target='_self'>STUDENT SCHOLARSHIP</a></li></ul>                </li>
                <li><a href="#">PGS</a>
                    <ul><li><a href='post-graduate-studies.html' target='_self'>Post Graduate Studies</a></li></ul>                </li>
                <li><a href="#">HRM</a>
                                    </li>
                <li><a href="#">DSW</a>
                    <ul><li><a href='directorate-of-students-welfare.html' target='_self'>Directorate of Students Welfare</a></li></ul>                </li>
                <li><a href="result.php" target="_blank">Result</a></li>
            </ul>
      </div>
  </div>
    	<div class="header-top">
        	<div class="auto-container clearfix">
            	<div class="row" style="padding: 5px 0px;">
                	<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                    	<!--<li style="color:#FFFFFF; font-size: 16px; font-weight:bold;">Maharana Pratap Horticultural University, Karnal</li>-->
                        <li><a href="admission-form/index.html" target="_blank"><img src="templates/mhu-karnal/images/admission-apply.gif" border="0"></a></li>
                    </div>
                
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pull-right" style="text-align: right;">
					<gcse:searchbox-only resultsUrl="search.html"></gcse:searchbox-only>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-6 col-xs-12 pull-right" style="text-align: right;">
					<a href="contact-us.html" class="link1">Contact Us</a>
					</div>
				</div>
            </div>
        </div>
		
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	<div class="pull-left logo-outer">
                    	<div class="logo"><a href="index.html"><img src="templates/mhu-karnal/images/logo.png" alt="MHU" title="MHU"></a></div>
                    </div>
                    
                    <div class="pull-right upper-right clearfix">
                        <div class="upper-column info-box">
                        	<div class="icon-box"><span class="flaticon-technology-1"></span></div>
                            <ul>
                            	<!--<li><strong>01662-256081-83</strong></li>-->
                                <li><strong>+91-70159-98914-15</strong></li>
                                <li><a href="mailto:infomhu.hry@gmail.com">infomhu.hry@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="upper-column info-box">
                        	<a href="student_portal/"><img src="templates/mhu-karnal/images/suggestion.jpg" alt="MHU" title="MHU"></a> &nbsp; &nbsp;
							<!--<a href="#"><img src="templates/mhu-karnal/images/admission2.gif" alt="MHU" title="MHU"></a>-->
                            <!--<a href="http://www.mhu.ac.in/online-registration-for-symposium.html"><img src="templates/mhu-karnal/images/symposium.gif" alt="MHU" title="MHU"></a>-->
                            <!--<a href="#" target="_blank"><img src="templates/mhu-karnal/images/admission2.gif" alt="MHU" title="MHU"></a>-->
                            <!--<a href="admission-form/"><img src="templates/mhu-karnal/images/admission21-22.gif" alt="MHU" title="MHU"></a>-->
                            <!--<a href="admission-form/"><img src="templates/mhu-karnal/images/admission21-22.gif" alt="MHU" title="MHU"></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="header-lower">
        	<div class="auto-container">
            	<div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="dropdowni" id="dropdowni">
								<li><a href="index.html" class="current">Home</a></li>	
								<li class="dropdown"><a href="#">About Us</a>
									<ul><li><a href='about-mhu.html' target='_self'>About MHU</a></li><li><a href='visionmission.html' target='_self'>Vision & Mission</a></li><li><a href='http://www.hsuhs.ac.in/downloads/files/n6226dc9501fd8.pdf' target='_blank'>Act & Statue</a></li><li><a href='vice-chancellor-message.html' target='_self'>Vice Chancellor Message</a></li><li><a href='foundation-ceremony.html' target='_self'>Foundation Ceremony</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Administration</a>
									<ul><li><a href='board-of-management-.html' target='_self'>BOARD OF MANAGEMENT </a></li><li><a href='vice-chancellor.html' target='_self'>Vice-Chancellor</a></li><li><a href='registrar.html' target='_self'>Registrar</a></li><li><a href='comptroller.html' target='_self'>Comptroller</a></li><li><a href='eo-cum-he.html' target='_self'>EO-Cum-HE</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Teaching</a>
									<ul><li><a href='bsc-programme.html' target='_self'>B.Sc. Programme</a></li><li><a href='msc-programme.html' target='_self'>M.Sc. Programme</a></li><li><a href='phd-programme.html' target='_self'>Ph.D. Programme</a></li></ul>								</li>	
								<li class="dropdown"><a href="#">Research</a>
									<ul><li><a href='director-of-research.html' target='_self'>DIRECTOR OF RESEARCH</a></li><li><a href='regional-research-center-jind-.html' target='_self'>REGIONAL RESEARCH CENTER, JIND </a></li><li><a href='regional-research-center-jhajjar.html' target='_self'>REGIONAL RESEARCH CENTER, JHAJJAR</a></li><li><a href='regional-research-center-ambala.html' target='_self'>REGIONAL RESEARCH CENTER, AMBALA</a></li><li><a href='regional-research-center-murthal-sonipat.html' target='_self'>REGIONAL RESEARCH CENTER, MURTHAL (SONIPAT)</a></li><li><a href='anjanthali-farm-karnal.html' target='_self'>Anjanthali Farm (Karnal)</a></li><li><a href='facultystaff.html' target='_self'>Faculty/Staff</a></li><li><a href='gallery345.html' target='_self'>Gallery</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Extension</a>
									<ul><li><a href='directorate-of-extension-education.html' target='_self'>Directorate of Extension Education</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Colleges</a>
									<ul><li><a href='dean-college-of-horticulture.html' target='_self'>Dean College of Horticulture</a></li><li><a href='studentsactivities-.html' target='_self'>STUDENTS  ACTIVITIES </a></li><li><a href='training.html' target='_self'>TRAINING</a></li><li><a href='conferences.html' target='_self'>CONFERENCES</a></li><li><a href='faculty.html' target='_self'>Faculty</a></li><li><a href='anti-ragging-cell.html' target='_self'>Anti Ragging Cell</a></li><li><a href='gallery.html' target='_self'>Gallery</a></li><li><a href='library.html' target='_self'>Library</a></li><li><a href='student-scholarship.html' target='_self'>STUDENT SCHOLARSHIP</a></li></ul>								</li>
								<li class="dropdown"><a href="#">PGS</a>
									<ul><li><a href='post-graduate-studies.html' target='_self'>Post Graduate Studies</a></li></ul>								</li>
								<li class="dropdown"><a href="#">HRM</a>
																	</li>
								<li class="dropdown"><a href="#">DSW</a>
									<ul><li><a href='directorate-of-students-welfare.html' target='_self'>Directorate of Students Welfare</a></li></ul>								</li>
								<li><a href="result.php" target="_blank">Result</a>
																	</li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div>
        
        <div class="bounce-in-header">
        	<div class="auto-container clearfix">
            	<div class="logo pull-left">
                	<a href="index.html" class="img-responsive"><img src="templates/mhu-karnal/images/logo-small.png" alt="MHU"></a>
                </div>
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu">                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="dropdowni" id="dropdowni">
								<li><a href="index.html" class="current">Home</a></li>	
								<li class="dropdown"><a href="#">About Us</a>
									<ul><li><a href='about-mhu.html' target='_self'>About MHU</a></li><li><a href='visionmission.html' target='_self'>Vision & Mission</a></li><li><a href='http://www.hsuhs.ac.in/downloads/files/n6226dc9501fd8.pdf' target='_blank'>Act & Statue</a></li><li><a href='vice-chancellor-message.html' target='_self'>Vice Chancellor Message</a></li><li><a href='foundation-ceremony.html' target='_self'>Foundation Ceremony</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Administration</a>
									<ul><li><a href='board-of-management-.html' target='_self'>BOARD OF MANAGEMENT </a></li><li><a href='vice-chancellor.html' target='_self'>Vice-Chancellor</a></li><li><a href='registrar.html' target='_self'>Registrar</a></li><li><a href='comptroller.html' target='_self'>Comptroller</a></li><li><a href='eo-cum-he.html' target='_self'>EO-Cum-HE</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Teaching</a>
									<ul><li><a href='bsc-programme.html' target='_self'>B.Sc. Programme</a></li><li><a href='msc-programme.html' target='_self'>M.Sc. Programme</a></li><li><a href='phd-programme.html' target='_self'>Ph.D. Programme</a></li></ul>								</li>	
								<li class="dropdown"><a href="#">Research</a>
									<ul><li><a href='director-of-research.html' target='_self'>DIRECTOR OF RESEARCH</a></li><li><a href='regional-research-center-jind-.html' target='_self'>REGIONAL RESEARCH CENTER, JIND </a></li><li><a href='regional-research-center-jhajjar.html' target='_self'>REGIONAL RESEARCH CENTER, JHAJJAR</a></li><li><a href='regional-research-center-ambala.html' target='_self'>REGIONAL RESEARCH CENTER, AMBALA</a></li><li><a href='regional-research-center-murthal-sonipat.html' target='_self'>REGIONAL RESEARCH CENTER, MURTHAL (SONIPAT)</a></li><li><a href='anjanthali-farm-karnal.html' target='_self'>Anjanthali Farm (Karnal)</a></li><li><a href='facultystaff.html' target='_self'>Faculty/Staff</a></li><li><a href='gallery345.html' target='_self'>Gallery</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Extension</a>
									<ul><li><a href='directorate-of-extension-education.html' target='_self'>Directorate of Extension Education</a></li></ul>								</li>
								<li class="dropdown"><a href="#">Colleges</a>
									<ul><li><a href='dean-college-of-horticulture.html' target='_self'>Dean College of Horticulture</a></li><li><a href='studentsactivities-.html' target='_self'>STUDENTS  ACTIVITIES </a></li><li><a href='training.html' target='_self'>TRAINING</a></li><li><a href='conferences.html' target='_self'>CONFERENCES</a></li><li><a href='faculty.html' target='_self'>Faculty</a></li><li><a href='anti-ragging-cell.html' target='_self'>Anti Ragging Cell</a></li><li><a href='gallery.html' target='_self'>Gallery</a></li><li><a href='library.html' target='_self'>Library</a></li><li><a href='student-scholarship.html' target='_self'>STUDENT SCHOLARSHIP</a></li></ul>								</li>
								<li class="dropdown"><a href="#">PGS</a>
									<ul><li><a href='post-graduate-studies.html' target='_self'>Post Graduate Studies</a></li></ul>								</li>
								<li class="dropdown"><a href="#">HRM</a>
																	</li>
								<li class="dropdown"><a href="#">DSW</a>
									<ul><li><a href='directorate-of-students-welfare.html' target='_self'>Directorate of Students Welfare</a></li></ul>								</li>
								<li class="dropdown"><a href="result.php" target="_blank">Result</a>
																	</li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
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
<footer class="main-footer">
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                            <div class="col-lg-5 col-sm-6 col-xs-12 column">
                                <div class="footer-widget about-widget">
                                    <h2>Quick Contact</h2>
                                    <div class="text">
                                        <p>Maharana Pratap Horticultural University, Karnal</p>
                                    </div>
                                    
                                    <ul class="contact-info">
                                    	<li><span class="icon fa fa-map-marker"></span> Horticulture Training Institute<br/>Campus, Uchani-Karnal</li>
                                        <li><span class="icon fa fa-mobile"></span> +91-70159-98914-15</li>
                                        <!--<li><span class="icon fa fa-envelope-o"></span> vcmhu.hry@gmail.com</li>-->
                                        <!--<li><span class="icon fa fa-mobile"></span> +91-70159-98919</li>-->
                                        <li><span class="icon fa fa-envelope-o"></span> infomhu.hry@gmail.com</li>
                                    </ul>
                                    
                                    <div class="social-links-one clearfix">
										<a href="https://www.facebook.com/mhukarnal/" target="_blank" class="fb"><span class="fa fa-facebook-f"></span></a>
										<a href="#" class="twitter"><span class="fa fa-twitter"></span></a>
										<a href="#" class="gplus"><span class="fa fa-google-plus"></span></a>
										<a href="https://www.youtube.com/channel/UCsUBa7IpFzeEujnow67LlrA" target="_blank" class="youtube"><span class="fa fa-youtube"></span></a>
										<a href="https://www.instagram.com/vcmhu/" target="_blank" class="instagram"><span class="fa fa-instagram"></span></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="col-lg-3 col-sm-6 col-xs-12 column">
                                <h2>Quick Links</h2>
                                <div class="footer-widget links-widget">
                                    <ul>
                                        <li><a href="admission-form/index.html" target="_blank">Admission 2022-23</a></li>
                                        <!--<li><a href="http://www.mhu.ac.in/downloads/files/n5afd570d4ef15.pdf" target="_blank">Download Prospectus</a></li>-->
                                        <!--<li><a href="prospectus.html">Download Prospectus</a></li>-->
                                        <li><a href="#">Fee Structure</a></li>
                                        <li><a href="404.html">Jobs@MHU</a></li>
                                        <li><a href="photo-gallery.html">Photo Gallery</a></li>
                                        <li><a href="#">Video Gallery</a></li>
                                        <!--<li><a href="press.html">Press</a></li>-->
										<li>
										<div id="google_translate_element"></div>
											<script type="text/javascript">
												function googleTranslateElementInit() 
												{new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi'}, 'google_translate_element');
												}</script>
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
					  
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="row clearfix"> 
							<iframe width="100%" height="300" src="https://www.youtube.com/embed/A-sfz4SggBw" frameborder="0" allowfullscreen></iframe>
						</div>
					  </div>
                </div>
                
            </div>
        </div>
        
    	<div class="footer-bottom">
            <div class="auto-container clearfix">
                <div class="copyright text-center">&copy; 2017 Maharana Pratap Horticultural University, Karnal | Website Designed & Developed by : iNET Business Hub</div>
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
</script>
</body>

<!-- bsc-programme.html 17:35:35  -->
</html>
    