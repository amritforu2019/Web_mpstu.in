<div id="sidebar-wrapper">
    <div class="leftbx">
      <ul id="accordion" class="accordion">
        <br>
         <li>
          <div class="link"><a style="color:#FFFFFF;"   href="/">MAIN WEBSITE</a> </div>
        </li>
        <li>
          <div class="link"><a style="color:#FFFFFF;"   href="index">HOME</a> </div>
        </li>
        <?
$country_qry=mysql_query("select * from category where parent_id=76 and status='1'  order by id asc")or die(mysql_error());
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
      </ul>
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
<div>
            	<h3>Latest Updates</h3>
                <div class="box02">
					<div class="box2">
                    
                     <? $q=mysql_query("select * from news  order by posted_on desc"); 
				$i=1;
				while($row=mysql_fetch_array($q))
				{
				extract($row);
				?>
                
                <div class="content">
                        	<h4><?=date("D d M Y",strtotime($row['posted_on']));?></h4>
                            <p><a href="details_news?page=<? echo $row['id'];?>" title="View More"><?=stripslashes($row['title'])?></a></p>
                        </div>

 
 <? } ?>
                         
                    </div>
				</div>
            </div>
    </div>
    <div class="c"></div>
  </div>