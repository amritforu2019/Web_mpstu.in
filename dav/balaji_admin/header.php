<style type='text/css' media='print'>
#print {
	display : none
}
</style>
<div class="top" id="print">
 <div class="topleftm"><?php echo $ADMIN_HTML_TITLE; master();?></div>
 <div class="toprigtm">
  <ul>
   <li><a href="home"><strong><?php echo $_SESSION['master_username']; ?></strong></a></li>
   <li><a href="logout"><strong><img src="images/tray-logout.gif" alt="" /> Log out</strong></a></li>
  </ul>
 </div>
 <div class="c"></div>
</div>
<div class="menubg" id="print">
 <header>
  <nav id="topmenu">
   <ul>
    <li><a href="home">Home</a></li>
    <li><a href="#">Setting</a>
     <ul class="sublist">
      <li><a href="password">Change Password</a></li>
      <li><a href="site_setting">Global Settings</a></li>
     </ul>
    </li>
     
     <li><a href="#">Masters</a>
     <ul class="sublist">
      <li><a href="city_list">City Add</a></li>      
      <li><a href="session_list">Manage Session</a></li>   
      <li><a href="course_list">Manage Course</a></li>  
      <li><a href="fee_list">Manage Fees</a></li>  
      <li><a href="user_master">Manage Users</a></li>  
     </ul>
    </li>
    
    <li><a href="#">Students</a>
     <ul class="sublist">
      <li><a href="student_add">Student Add</a></li>
       <li><a href="student_import">Student Data Import by CSV </a></li>
      <li><a href="student_list">Student List</a></li>
      <!--<li><a href="#">Student Fees Summery</a></li> -->
     </ul>
    </li>

    <li><a href="#">Payment</a>
     <ul class="sublist">
      <li><a href="#">Receive payment</a></li>
      <li><a href="#">Payment Report</a></li>
      <li><a href="#">Unpaid Students</a></li>
      <li><a href="#">Paid Students</a></li>
     </ul>
    </li>

    <!-- <li><a href="counseling_entry">Student Counseling</a></li>  -->
    <?php /*?>  <li><a href="banner_list">Manage Slider</a></li>
      <!--            <li><a href="content_list">Manage Page Content</a></li>
            <li><a href="photoGallery_cat">Manage Image Gallery</a></li>
      <li><a href="news_list">News & Events</a></li> -->
      <li><a href="category_list">Menu / Category / Pages / Gallery</a></li><?php */?>
      
  <?php /*?>  <li><a href="#">Masters</a>
     <ul class="sublist">
      <li><a href="city_list">City Add</a></li>
      <li><a href="area_list">Area Add</a></li>
     
      <li><a href="photoGallery3">Index Page Product</a></li>
<!--      <li><a href="package_list">Manage Package</a></li>
      <li><a href="master_bank">Manage Bank</a></li>-->
      <li><a href="master_products">Manage Products</a></li>
     </ul>
    </li>
    <li><a href="#">Agents</a>
     <ul class="sublist">
      <li><a href="agent_add">Agent Add</a></li>
      <li><a href="agent_list">Agent List</a></li>
      <li><a href="agent_credit">Credit Agent Wallet</a></li>
      <li><a href="agent_summ">Agent Wallet Statement</a></li>
      <li><a href="agent_list">Agent Credited Account History</a></li>
     </ul>
    </li>
    <li><a href="#">Service Provider</a>
     <ul class="sublist">
      <li><a href="affliates_list">Provider List</a></li>
      <li><a href="provider_credit">Credit Provider Wallet</a></li>
      <li><a href="provider_summ"> Provider Wallet Statement</a></li>
      <!--  <li><a href="affliates_p_list_b2b">B2B Product By provider</a></li>
      -->
     </ul>
    </li>
    <li><a href="#">Visitor</a>
     <ul class="sublist">
      <li><a href="visitor_list">Visitor List</a></li>
     </ul>
    </li><?php */?>
    <li><a href="logout">Logout</a></li>
   </ul>
  </nav>
 </header>
</div>
<script language="javascript">
function del()
{
var nm=confirm("Are you sure to confirm this action");
if(nm)
return true;
else
return false;
}

</script>
