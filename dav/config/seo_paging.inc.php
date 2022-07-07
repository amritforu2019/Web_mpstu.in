<?
if($reccnt > $pagesize){
	
$num_pages=$reccnt/$pagesize;
// for htaccess work creating url
 
$url_paging=$SITE_URL.change_string($main_cat)."portfolio"; 


//echo $qry_str ;

//$j=abs($num_pages/10)-1;
$j=$start/$pagesize-5;
//echo("<br>$j");
if($j<0) {
	$j=0;
}
$k=$j+10;
if($k>$num_pages)	{
	$k=$num_pages;
}
$j=intval($j);
?>
<? //="reccnt=$reccnt, start=$start, pagesize=$pagesize, num_pages=$num_pages : j=$j : k=$k"?> 
 
  <a href="<?=$url_paging;?>0.html"> First</a>  
  <? if($start!=0) { ?> <a href="<?=$url_paging.((($start-$pagesize)/$pagesize))?>.html"> &laquo; Previous </a> 
  <?  } ?>
   
  <? for($i=$j;$i<$k;$i++) {if($i==$j) ; if(($pagesize*($i))!=$start) { ?> 
  <a href="<?=$url_paging.($i+2)?>.html"><? $pagesize*($i);?><?=$i+1?></a>  
  <? } else{ ?> 
   <span class="currentPage"><strong><? $mn=$i+1; echo $mn ;?></strong></span>
  <? } }?>  
  
  <?  if($start+$pagesize < $reccnt){ ?>
 <a href="<?=$url_paging.($i+1)?>.html">Next &raquo;</a> 
  <? } ?> 
  
   <? $mod=$reccnt%$pagesize; if($mod==0){$mod=$pagesize;}?> 
   <a href="<?=$url_paging.((($reccnt-$mod)/$pagesize)+2)?>.html">Last</a> 

<? }  ?>  