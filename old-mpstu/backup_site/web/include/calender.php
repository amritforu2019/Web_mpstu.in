			<!-- Events -->
				<section class="events single section">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 col-12">
						<div class="single-event">
						 
							<div class="event-content">
								<div class="meta"> 
									<span><i class="fa fa-calendar"></i><?php echo date("d M Y")?></span>
									 
								</div>
								<h2><a href="#">Academic Calender</a></h2>
							   <div id='calendar'></div>

								 
						 							</div>
						</div>
					</div>
            <div class="col-lg-4 col-12">
            <div class="learnedu-sidebar single-event">

            <div class="single-widget course">
                <h3>Our <span>Toppers</span></h3>
                <marquee class="GeneratedMarquee" direction="up" scrollamount="4" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start()" >

                	<?php
$qrytop=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='306' and status=1 order by ord asc") or die(mysqli_error());
$i=0;
			 foreach($qrytop as $rowtop) 
			 { 
			?>
			 

				  <!-- Single Course -->
                <div class="single-course">
                  <img class="image-shadow" src="<?php echo $SITE_URL;?>/assets/upload/category/<?php echo $rowtop['image'];?>" alt="#">
                  <div class="course-content">
                    <h4><a href="#"><?php echo $rowtop['title'];?></a></h4>
                    <div class="meta"><?php echo clean_tag($rowtop['description']);?></div>
                  </div>
                </div>
                <!-- Single Course -->
												 
 <?php $i++; } ?>
</marquee>
              

                  

                 
 
           
                </div>
            </div>
          </div>
					<div class="col-lg-4 col-12">
						<div class="learnedu-sidebar single-event">
						 
							 
							<!--/ End Categories -->
							<div class="single-widget course">
								<h3>Thought Of The <span>Day</span></h3>
								<!-- HTML Code -->
<marquee class="GeneratedMarquee" direction="up" scrollamount="4" behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start()" >
						 
							 	<?php
$qrytop=mysqli_query($DB_LINK,"select * from tbl_category where  parent_id='307' and status=1 order by ord asc limit 0,10") or die(mysqli_error());
$i=0;
			 foreach($qrytop as $rowtop) 
			 { 
			 	if(strtotime($rowtop['ext_link'])<time())
			 	{
			?>
			 

				  <!-- Single Course -->
                <div class="single-course">
                  
                  <div class="course-content">
                    <div class="meta"><?php echo clean_tag($rowtop['description']);?></div>
                   <h4 class="pull-right"> <a href="#"><?php echo $rowtop['title'];?></a> </h4>
                    <span><?php echo $rowtop['ext_link'];?></span>
                    
                  </div>
                </div>
                <!-- Single Course -->
												 
 <?php $i++; } }?>
				 
							</marquee>
								<!-- Single Course -->
							   
							</div>
					 
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Events -->