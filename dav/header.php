

<div class="textfeed"><span class="blink_me"><a href=""  data-toggle="modal" data-target="#myModal"><img src="images/feedback.jpg" alt="" /></a>
    <br><br><a href="http://davpgcvns.ac.in/student_portel/"  target="_blank" ><img src="images/feedback2.jpg" alt="" /></a></span></div>




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Feedback Forms </h4>
        </div>
        <div class="modal-body">
            <div class="feedbxpop">
              <a href="feed_student?typ=1">Student’s Feedback  Form</a>  
 <a href="feed_student?typ=2">Student’s Feedback Form for Curriculum</a>   
  <a href="feed_student?typ=3">Alumni Feedback Form</a>  
  <a href="feed_student?typ=4">Parents Feedback Form</a>   
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  
  

<nav class="navbar navbar-default" role="navigation">
  <div> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-slide-dropdown"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand mobilem" href="index">Menu</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-slide-dropdown">
      <ul class="nav navbar-nav menule">
        <li><a href="index">Home</a></li>
        <?
$country_qry=mysql_query("select * from category where parent_id=0 and status='1' and show_on='0' and id!=17 order by id asc")or die(mysql_error());
$i=0;
while($country_fetch=mysql_fetch_array($country_qry))
{
	$i++;
 
$country_qry1=mysql_query("select * from category where parent_id='".$country_fetch['id']."' and status='1'  order by name asc")or die(mysql_error());
if(mysql_num_rows($country_qry1)<1)
{
?>
        <li><a href="details?page=<? echo $country_fetch['id'];?>&bpage=<? echo $country_fetch['id'];?>"><? echo $country_fetch['name'];?></a></li>
        <? } else { ?>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><? echo $country_fetch['name'];?><span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <? $j=0;
while($country_fetch1=mysql_fetch_array($country_qry1))
{
$j++; ?>
            <li><a href="details?page=<? echo $country_fetch1['id'];?>&bpage=<? echo $country_fetch1['parent_id'];?>"><? echo $country_fetch1['name'];?></a></li>
            <? } ?>
          </ul>
        </li>
        <? } ?>
        <? } ?>
        <li><a href="iqac/index">IQAC</a></li>
        <li><a href="gallery">Gallery</a></li>
        <li><a href="contact">Contact Us</a></li>
		  <li><a href="http://davpgcvns.ac.in:2096/" target="_blank">Webmail</a></li>
<li><a href="http://www.ugdca.digit-sys.com/" target="_blank">U.G.D.C.A.</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="row">
  <div class="col-lg-12"> <a href="index" class="logomr"><img src="images/logo.png" class="img-responsive" alt="" /></a>
    <div class="leftbx-3">
      <?=$SITE_TITLE?>
      <p>
        <?=$site_short_name?>
      </p>
      <div class="leftbx-4">
        <?=$address?>
      </div>
    </div>
  </div>
  <div class="c"></div>
</div>
<!--<div class="mobilem"><a href="#menu-toggle" class="btn btn-primary " id="menu-toggle">Click Here</a></div>-->
<div class="mobilem"><a href="#menu-toggle" class="clickbtn" style="margin-left:0px; z-index:1; top:30%; margin-left:-18px; display:block; position:fixed; " id="menu-toggle"><img src="images/click-here.png" alt="" class="img-responsive"></a></div>
<div class="leftbx-5">
  <marquee direction="left" behavior="alternate" scrollamount="4">
  ॐ भूर्भूवः स्वः तत्सवितुर्वरेण्यं भर्गो देवस्य धिमहि धियो यो नः प्रचोदयात् ॐ
  </marquee>
</div>
