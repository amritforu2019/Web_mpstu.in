<?



if($reccnt > $pagesize){

	

$num_pages=$reccnt/$pagesize;



$PHP_SELF=$_SERVER['PHP_SELF'];

$qry_str=$_SERVER['argv'][0];



$m=$_GET;

unset($m['start']);



$qry_str=qry_str($m);



//echo "$qry_str : $p<br>";



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

<?php /*="reccnt=$reccnt, start=$start, pagesize=$pagesize, num_pages=$num_pages : j=$j : k=$k" */?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pager">
  <tr>
    <td>
		<table border="0" align="center" cellpadding="0" cellspacing="0"> 

  <tr> 
 <td  align="center" height="20" > <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$start-$pagesize?>"  > 

      <?

		if($start!=0)

		{



?>

      &laquo; Previous 

      

      </a> 

      <?

		}

?>

    </td> 

     

    <td align="right"> &nbsp; 

      <?

			

			for($i=$j;$i<$k;$i++)

			{

				if($i==$j);

			   if(($pagesize*($i))!=$start)

				  {

	  ?> 

      <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$pagesize*($i)?>" style="text-decoration:none;"> 

      <?=$i+1?> 

      </a> &nbsp; <?php if (($i+1)<$k);?>  

			<?	  }

	  else{

	  ?> 

      <b class="currentPage"> 

      <?=$i+1?> 

      </b>&nbsp; <?php if (($i+1)<$k);?> 

      <?

	  }

 }?> </td> 

    <td align="center" height="20"> <span >&nbsp; 

      <?

	if($start+$pagesize < $reccnt){

		?>

       <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$start+$pagesize?>">Next 

      

      &raquo;</a>&nbsp; 

      <?

		}

  ?>

      </span>&nbsp;</td> 
</tr>  
</table> 
	</td>
  </tr>
</table>


<? }

?> 

