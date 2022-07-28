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





<style>


.boldlisting{ font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#990000; font-weight:bold}


.boldlisting a{ font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#990000; text-decoration:none}


.boldlisting a:hover{ text-decoration:underline}


</style>

















<table width="40%" border="0" align="center" cellpadding="5" cellspacing="0" style="border:hidden; width:60%; font-size:18px;" > 


  <tr> 


    


     


     


    <td align="right" > &nbsp; 


      <?


			


			for($i=$j;$i<$k;$i++)


			{


				if($i==$j)echo "Page:";


			   if(($pagesize*($i))!=$start)


				  {


	  ?> 


      <a href="<?=$PHP_SELF?><?=$qry_str?>&start=<?=$pagesize*($i)?>&pagecounter=<?=$pagesize?>" style="text-decoration:none; font-size:18px;" > 


      <?=$i+1?> 


      </a>  | 


			<?	  }


	  else{


	  ?> 


     


      <a href="#" style="text-decoration:none; font-size:20px; font-weight:bold" >  <?=$i+1?>  </a>


   |


      <?


	  }


 }?> </td> 


     


    


  </tr> 


</table> 



  <? }


?> 




