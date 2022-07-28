<?php validate_stddav();?><div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">
							 
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">1</span></a>
									<ul class="dropdown-menu">
										<li>
											<div class="notification_header">
												<h3>You have 1 new notification</h3>
											</div>
										</li>
										 <? if($get_data_std['is_paid']=='0') { ?>
										 <li><a href="fee_pay">
											<div class="user_img"><img src="images/1.png" alt="" /></div>
										   <div class="notification_desc">
											<p>Fees Not Paid</p>
											<p><span>Online Fees Payment process not completed</span></p>
											</div>
										   <div class="clearfix"></div>	
										 </a></li>
										 <? } else { ?>
										  <li><a href="fee_pay">
											<div class="user_img"><img src="images/1.png" alt="" /></div>
										   <div class="notification_desc">
											<p>Fees Paid Successfully</p>
											<p><span>Fees Paid</span></p>
											</div>
										   <div class="clearfix"></div>	
										 </a></li>
										 <? } ?>
										 <!--<li>
											<div class="notification_bottom">
												<a href="#">See all notification</a>
											</div> 
										</li>-->
									</ul>
							</li>	
									   							   		
							<div class="clearfix"></div>	
						</ul>
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(images/1.jpg) no-repeat center"> </span> 
										 <div class="user-name">
											<p>Student<span>Dashboard</span></p>
										 </div>
										 <i class="lnr lnr-chevron-down"></i>
										 <i class="lnr lnr-chevron-up"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
								 
									<li> <a href="#"><i class="fa fa-user"></i>Profile</a> </li> 
									<li> <a href="logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
					            	
					
				</div>
			  </div>
			<!--notification menu end -->
			</div>