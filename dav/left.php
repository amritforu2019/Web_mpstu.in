<div id="sidebar-wrapper">
        <div class="leftbx">
         
             
            
            
            


            <ul id="accordion" class="accordion">
            <?
$country_qry=mysql_query("select * from category where parent_id=0 and status='1' and show_on='1'order by id asc")or die(mysql_error());
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
            
                 
                  <li>
                    <div class="link">Faculty & Staff <i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                     <li><a   href="details-faculty"><span>Faculty & Staff Details</span></a>
                       
                    </li></ul>
                  </li>
				  
				  
				   <li>
                    <div class="link">RTI<i class="fa fa-chevron-down"></i></div>
                    <ul class="submenu">
                     <li><a   href="details_rti"><span>RTI Details</span></a>
                       
                    </li></ul>
                  </li>

                </ul>                <?
 

$country_qry=mysql_query("select * from category where status='1' and show_on2=1   order by name asc")or die(mysql_error());
 
while($country_fetch=mysql_fetch_array($country_qry))
{
	 
?>  
        
        	<div class="leftbx-14">
            	<h2><? echo strtoupper($country_fetch['name']);?></h2>
                <div class="leftbx-15">
                <a href="details?page=<? echo $country_fetch['id'];?>&bpage=<? echo $country_fetch['parent_id'];?>">
				<? echo  substr($country_fetch['descr'],0,50);
				  ?></a></div>
            </div>
            
            <? }   ?>  
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
        </div>
        <div class="c"></div>
            <!--<ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>-->
            
        </div>