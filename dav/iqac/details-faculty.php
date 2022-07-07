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
<script>
function cp(val)
{
	if(val!='')
	{ 
	location.href="details-faculty.php?ser="+val;
	}else
	{
		{ 
	location.href="details-faculty.php";
	}
	}
}

function cp1(val)
{
	if(val!='')
	{ 
	location.href="details-faculty.php?ser1="+val;
	}
	else
	{
		
	location.href="details-faculty.php";
	
	}
}
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

						<?php   include('header.php');?>

                        

                        <div class="leftbx-13">

                            	<h1>Faculty & Staff</h1>

                                <script>

								$(document).ready(function(e){

    $('.search-panel .dropdown-menu').find('a').click(function(e) {

		e.preventDefault();

		var param = $(this).attr("href").replace("#","");

		var concept = $(this).text();

		$('.search-panel span#search_concept').text(concept);

		$('.input-group #search_param').val(param);
	 
	location.href="details-faculty.php?ser="+param;
	 
	 
	 
	});

});

								</script>

                                <div>

                                	<div>

                                        <div class="searchbxr">    

                                            <div class="col-xs-8">

                                                <div class="input-group">

                                                    <div class="input-group-btn search-panel">

                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                                                            <span id="search_concept">Filter by</span> <span class="caret"></span>

                                                        </button>

                                                        <ul class="dropdown-menu" role="menu">

                                                         <li><a href="#all">All</a></li>
<?
$country_qry=mysql_query("select * from category3  order by name asc")or die(mysql_error());
while($country_fetch=mysql_fetch_array($country_qry))
{
?>
 <li><a href="#<? echo $country_fetch['name']?>"><? echo $country_fetch['name']?></a></li>
 
<? } ?>


                                                         

                                                          
                                                        </ul>

                                                    </div>

                                                    <input type="hidden" name="search_param" value="all" id="search_param" onChange="cp1(this.value)" />         

                                                    <input type="text" class="form-control" name="x" placeholder="Search by Name / Contact" onBlur="cp(this.value)" value="<?=$_REQUEST['ser']?>" />

                                                    <span class="input-group-btn">

                                                        <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search"></span></button>

                                                    </span>

                                                </div>

                                            </div>

                                            <div class="c"></div>

                                        </div>

                                    </div>

                                </div>

                               

                                <div class="tab-pane active in fade" id="faq-cat-1">

                                    <div class="panel-group" id="accordion-cat-1">
<?
if($_REQUEST['ser1']!='') 
{ $whr2= " where name like '%".$_REQUEST['ser1']."%' "; }

$i=0;
 $country_qry=mysql_query("select * from category3 $whr2 order by parent_id asc")or die(mysql_error());
while($country_fetch=mysql_fetch_array($country_qry))
{
?>
                                    	<h4><?php echo $country_fetch['name'];?></h4>
<?php
					 
	$whr= "  ( classes like '%".$_REQUEST['ser']."%' or burl like '%".$_REQUEST['ser']."%' )"; 
	 $qry=mysql_query("select * from bannerleft where qualification='".$country_fetch['name']."'  order by  burl");
	 
	 			
                     
					 while($row=mysql_fetch_array($qry)){ $i++;
					 ?>
                                        <div class="panel panel-default panel-faq">

                                            <div class="panel-heading">

                                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-<?=$i?>">

                                                    <h4 class="panel-title">

                                                        <?php echo $row['burl']; ?>

                                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>

                                                    </h4>

                                                </a>

                                            </div>

                                            <div id="faq-cat-1-sub-<?=$i?>" class="panel-collapse collapse">

                                                <div class="panel-body">

                                                    <div class="col-lg-2 col-md-2 col-sm-2"><img src="banner/ori_le/<?php echo $row['blocation']; ?>" alt="" class="img-responsive" /></div>

                                                   <div class="col-lg-9 col-md-9 col-sm-9">
 <? if($row['alttag']!='') { ?> <p><strong>Qualification :</strong><?=$row['alttag'];?></p><? } ?>

 <? if($row['designation']!='') { ?><p><strong>Designation :</strong><?=$row['designation']; ?></p> <? } ?> 
 
 <? if($row['sos']!='') { ?> <p><strong>Specialization of Subjects :</strong><?=$row['sos'];?></p><? } ?>
 
 <? if($row['email']!='') { ?><p><strong>Email :</strong><?=$row['email'];?></p><? } ?>

 <? if($row['dob']!='0000-00-00') { ?> <p><strong>Date Of Birth :</strong><?php echo date("d M Y", strtotime($row['dob'])); ?></p><? } ?>
 
                                                   </div>

                                                   <div class="c"></div>

                                                </div>

                                            </div>

                                        </div>
 
<? } ?>
<? } ?>
                                    

                                    </div>

                                </div>

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

