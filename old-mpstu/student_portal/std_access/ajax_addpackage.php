
<style type="text/css">
 
.style2 {color: #009900; font-size:22px;}
.style3 {color: #3300CC ; font-size:22px;}
 
</style><?php    include("../con_base/functions.inc.php"); 





  $pcz=trim($_REQUEST['pcz']);
 $pid=trim($_REQUEST['pid']);
  $pamt=trim($_REQUEST['pamt']);
 

$query2=mysqli_query($DB_LINK,"SELECT * FROM package  WHERE  id='".$pcz."'"); 
$row=mysqli_fetch_array($query2);




mysqli_query($DB_LINK,"insert into package_cat set  title='".$row['title']." ', posted_on=now(),  descr='".$pamt."',  status=1 ,days='".$row['days']."',category='".$pid."' ")or die(mysqli_error($DB_LINK));
 ?>
 
 <table width="85%" border="0" align="center" cellpadding="5" cellspacing="0" class="table">
     
      
      <tr   class="li">
        <td  bgcolor="#add8f8" class="heading">SNo.</td>
        <td  bgcolor="#add8f8" class="heading">Category Name</td>
        <td  bgcolor="#add8f8" class="heading">Package </td>
        <td  bgcolor="#add8f8" class="heading">Amount</td>
        <td   bgcolor="#add8f8" class="heading">Validity Days</td>
        <td   bgcolor="#add8f8" class="heading">Posted on</td>
        <td   bgcolor="#add8f8" class="heading">Action</td>
      </tr>
      <?   
				   
				  $where=" where category='".$pid."'";
				 
				  $q=mysqli_query($DB_LINK,"select * from package_cat $where   order by id asc"); 
				  $count=mysqli_num_rows($q);
				  if($count!=0)
				  {
				  
				$i=1;
				while($row=mysqli_fetch_array($q))
				{
				extract($row);
				?>
      <tr bgcolor="#F2F2F2" class="textli">
        <td align="center" bgcolor="#FFFFFF" class="bodytext"><? echo  $i;?></td>
        <td bgcolor="#FFFFFF" class="bodytext"><? echo $row['cat_name'] ;
		if($row['cat_name']=='')
		{
		$country_qry1=mysqli_query($DB_LINK,"select * from category where  id='".$row['category']."' ")or die(mysqli_error($DB_LINK));
$country_fetch1=mysqli_fetch_array($country_qry1);
mysqli_query($DB_LINK,"update package_cat set cat_name='".($country_fetch1['name'])."'  where id='".$row['id']."'");
		}
		/*if($row['maincat_name']=='')
		{
	  $country_qry1=mysqli_query($DB_LINK,"select * from category where  id='".$row['category_main']."' ")or die(mysqli_error($DB_LINK));
$country_fetch1=mysqli_fetch_array($country_qry1);
 
mysqli_query($DB_LINK,"update package set maincat_name='".($country_fetch1['name'])."'  where id='".$row['id']."'");
		}*/
		?></td>
        <td bgcolor="#FFFFFF" class="bodytext"><? if(strlen(normal_filter($title))>30) { echo  substr(normal_filter($title),0,30)."...";} else { echo  normal_filter($title);}?></td>
        <td   bgcolor="#FFFFFF" class="bodytext">Rs. 
          <?   echo  normal_filter($descr); ?> 
        /-</td>
        <td   bgcolor="#FFFFFF" class="bodytext"><?  echo  normal_filter($days); ?></td>
        <td  bgcolor="#FFFFFF" class="bodytext"><?php echo date_dm($posted_on);?></td>
        <td  bgcolor="#FFFFFF" class="bodytext"><!--<a href="package_add?edit=<?  echo  $id?>" title="Edit "><img src="images/edit.png" alt="Edit" width="20" height="20" border="0"></a> <a href="package_list?del=<?  echo  $id?>" onClick="return del();" title="Delete "><img src="images/del.png" alt="Delete " width="22" height="22" border="0"></a>--></td>
      </tr>
      <?
					$i++;
				} 
				?>
      <? }   else { ?>
      <tr bgcolor="#F2F2F2" class="textli">
        <td colspan="7" align="center" bgcolor="#FFFFFF" class="bodytext"> Currently No Package  Available</td>
      </tr>
      <? }   ?>
    </table>