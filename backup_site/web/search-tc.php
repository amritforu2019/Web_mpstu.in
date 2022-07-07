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
		<title>Search TC | <?php echo $SITE_NAME; ?></title>
    <?php require("include/head.php");?>	
    </head>
    <body>
    	<?php require("include/upper.php");?>
	 
		
		<!-- Start Breadcrumbs -->
		<section class="breadcrumbs overlay">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h2>Search TC</h2>
						<ul class="bread-list">
							<li><a href="index">Home<i class="fa fa-angle-right"></i></a></li>
							<li class="active"><a href="#">Search TC</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Breadcrumbs -->
		
		<!-- About US -->
		<section class="about-us section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-12">
						<div class="single-image  ">
							<?php if($row_cat['image']!=''){ ?>
							<img src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $row_cat['image'];?>" alt="<?php echo $row_cat['title'];?>">
						<?php  }  else { ?>
							<img src="<?php echo $SITE_URL;?>/assets/links/images/about.jpg" alt="<?php echo $row_cat['title'];?>">
						<?php } ?>
						<?php if($row_cat['title']=="25 Years History")	{ ?>
							<a href="https://www.youtube.com/watch?v=UalTfOIDQ7M" class="btn video-popup mfp-fade"><i class="fa fa-play"></i></a>
						<?php  } ?>
						 
						</div>
					</div>
					<div class="col-lg-8 col-12">
						<div class="about-text">
							<h2>Search TC</h2>

							<form  class="form" action="" method="post">
			 
				 
					<div class="form-group">
						<input type="text" name="search_data" placeholder="Enter T.C. No. to find record"   class="form-control"      required>
					</div>
				 
				 
				 
					<div class="form-group text-center">
						<button type="submit" name="consub" class="btn btn-success">Search T.C.</button>
					</div>
				</form> 


							 

 
<?php 			
if(isset($_POST['consub']))
{
$whee="where  reg ='".trim($_POST['search_data'])."'  or name like '%".trim($_POST['search_data'])."%'  ";
			/*course='".trim($_POST['cou'])."' oror name ='".trim($_POST['cou'])."' or fname ='".trim($_POST['cou'])."' or center ='".trim($_POST['cou'])."'*/
 
$result=mysqli_query($DB_LINK,"select * from std_list $whee order by reg ");

  ?>
                  
                <table   class="table  table-dark">
                   <tr  >
                       
                          <td >TC_NO.</td>
                          <td  >Name</td>
                          <td  >Father's_Name</td>
                          <td  >Course</td>                        
                          <td   >View_TC</td>
                   
                        </tr>
     <?php if(mysqli_num_rows($result)>0)  
     { 
         while ($row=mysqli_fetch_array($result))
            { 
     ?>
                     <tr  >
                       
                          <td   ><?php echo $row['reg']; ?></td>
                          <td ><?php echo $row['name'];	   ?> </td>
                          <td  ><?php echo $row['fname'];  ?></td>
                          <td   ><?php echo $row['course'];  ?> </td>
                        
                          <td  > 


                          <a href="<?php echo $SITE_URL;?>/upload/student/<? echo trim($row['img']);?>" data-fancybox="photo" class="btn"><i class="fa fa-search"></i> View </a> </td>
                         </tr>
                           <?php  } } else {  ?>
                           	<tr >
 <td  colspan="9"  ><div align="center"><span class="red">No Record found.....</span></td> 
 </tr> <?php	}  ?>  
</table>
<?php	}  ?>
                   
							 
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