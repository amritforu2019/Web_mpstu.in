<div id="sidebar" class="sidebar                  responsive  ace-save-state  ">
<!-- menu-min -->
  <script type="text/javascript">

        try{ace.settings.loadState('sidebar')}catch(e){}

    </script>

  <?php $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;

$url = end($url_array);?>

  <ul class="nav nav-list">

    <li <?php if($url=='index' || $url==''){echo "class='active'";}?>> <a href="index"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li> 

    <?php if($_SESSION['master_role_id']==1){?>

    <li <?php if($url=='category_list'){echo "class='active'";}?>> <a href="category_list"  > <i class="menu-icon fa fa-edit"></i> <span class="menu-text"> Master Settings</span> </a> </li>

    <?php  } ?>

    

    

     

    

 

    

     <li <?php if($url=='student-list' || $url=='student-add' ){ echo "class='active open'";}?> > <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-briefcase"></i> <span class="menu-text">Students (T.C.)</span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>

      <ul class="submenu">

      <li <?php if($url=='student-add'){echo "class='active'";}?>> <a href="student-add"> <i class="menu-icon fa fa-caret-right"></i> Add Student </a> <b class="arrow"></b> </li>

        <li <?php if($url=='student-list'){echo "class='active'";}?>> <a href="student-list"> <i class="menu-icon fa fa-caret-right"></i> Student List </a> <b class="arrow"></b> </li>

               

      </ul>

    </li> 

    

    

  <?php /*?>  <?php if($_SESSION['master_role_id']==1){?>

    <li <?php if($url=='menu_list' || $url=='post_reg' || $url=='category_list'){echo "class='active open'";}?> > <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-wrench"></i> <span class="menu-text">Appearance </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>

      <ul class="submenu">

        <li <?php if($url=='menu_list'){echo "class='active'";}?>> <a href="menu_list"> <i class="menu-icon fa fa-caret-right"></i> Menu </a> <b class="arrow"></b> </li>

      </ul>

    </li>

   <?php }?>



 

   <li <?php if($url=='member-list'){echo "class='active'";}?>> <a href="member-list"  > <i class="menu-icon fa fa-users"></i> <span class="menu-text">Member List</span> </a> </li>

   

   

    <li <?php if($url=='tree-list'){echo "class='active'";}?>> <a href="tree-list"  > <i class="menu-icon fa fa-arrows-alt"></i> <span class="menu-text">Tree List</span> </a> </li>

    

     <li <?php if($url=='payout-list' || $url=='payout-list-all' || $url=='payout-list-apr'){echo "class='active open'";}?> > <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-inr"></i> <span class="menu-text">Payouts </span> <b class="arrow fa fa-angle-down"></b> </a> <b class="arrow"></b>

      <ul class="submenu">

        <li <?php if($url=='payout-list'){echo "class='active'";}?>> <a href="payout-list"> <i class="menu-icon fa fa-caret-right"></i> Latest Payout </a> <b class="arrow"></b> </li>

         <li <?php if($url=='payout-list-all'){echo "class='active'";}?>> <a href="payout-list-all"> <i class="menu-icon fa fa-caret-right"></i> Pending / All Payout </a> <b class="arrow"></b> </li>

          <li <?php if($url=='payout-list-apr'){echo "class='active'";}?>> <a href="payout-list-apr"> <i class="menu-icon fa fa-caret-right"></i> Approved Payout </a> <b class="arrow"></b> </li>

      </ul>

    </li><?php */?> 

  

   

    <li <?php if($url=='contact'){echo "class='active'";}?>> <a href="contact"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text"> Enquiry Contact</span> </a> </li>

    <li <?php if($url=='contact-home'){echo "class='active'";}?>> <a href="contact-home"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Enquiry Homepage </span> </a> </li>

    <li <?php if($url=='contact-feedback'){echo "class='active'";}?>> <a href="contact-feedback"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Parent's Feedback</span> </a> </li>

    <li <?php if($url=='contact-inquiry'){echo "class='active'";}?>> <a href="contact-inquiry"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Parent Inquiry</span> </a> </li>

      <?php if($_SESSION['master_role_id']==1){?>

    <li <?php if($url=='contact-alumni'){echo "class='active'";}?>> <a href="contact-alumni"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Alumni Registration</span> </a> </li>
<?php } ?>
    <li <?php if($url=='contact-career'){echo "class='active'";}?>> <a href="contact-career"  > <i class="menu-icon fa fa-table"></i> <span class="menu-text">Career Inquiry</span> </a> </li>

    
    

  

  

  <?php /*?> <li <?php if($url=='reg-candidate'){echo "class='active'";}?>> <a href="reg-candidate"  > <i class="menu-icon fa fa-user"></i> <span class="menu-text">Candidates</span> </a> </li>

   

    <li <?php if($url=='reg-recruiter'){echo "class='active'";}?>> <a href="reg-recruiter"  > <i class="menu-icon fa fa-user"></i> <span class="menu-text">Job Providers</span> </a> </li><?php */?>

  

    <li <?php if($url=='password'){echo "class='active'";}?>> <a href="password"  > <i class="menu-icon fa fa-key"></i> <span class="menu-text">Change Password</span> </a> </li>
      <?php if($_SESSION['master_role_id']==1){?>
    <li <?php if($url=='setting'){echo "class='active'";}?>> <a href="setting"  > <i class="menu-icon fa fa-cog"></i> <span class="menu-text"> Setting</span> </a> </li>
<?php } ?>
    <li <?php if($url=='logout'){echo "class='active'";}?>> <a href="logout"  > <i class="menu-icon fa fa-sign-out"></i> <span class="menu-text">Logout</span> </a> </li>

  </ul>

  <!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>

</div>

