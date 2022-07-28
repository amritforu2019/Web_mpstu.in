<? ob_start();
$ch=$_REQUEST['root'];
	    $dir="new collection";
	 require_once("../config/functions.inc.php");
validate_admin();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<script language="javascript" src="js/validator.js"></script>
<script language="javascript"> 
function load_page(val)
{
	location.href='style_list.php?country='+val;
	return false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="images/admin_style.css" rel="stylesheet" type="text/css">
<link href="css/admin_style.css" rel="stylesheet" type="text/css"> 
<link href="images/admin_style.css" rel="stylesheet" type="text/css">
<style type="text/css">
.li .toplinks strong {
	color: #FFF;
}
#form1 .table .li .heading strong {
	color: #000;
}
</style>
</head>





<body >

<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td colspan="2"><? require_once("adheader.php");?></td> 

  </tr>

  <tr>

    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>

    <td width="750" align="center" valign="top">

	<div id="mid">  

	
		   <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">

      <tr>

        <td height="29" bgcolor="#0C5994"  class="li"><div align="left" class="toplinks"><strong>&nbsp;&nbsp;&nbsp;Featured   :</strong></div></td>

      </tr>

	    

              <tr>

                <td height="252" bgcolor="#FFFFFF" valign="top">
                
                <form action="add_style4.php" method="post" name="form1" id="form1">

                    <br />

                    <?

				

				if(isset($_GET['del']))

				{

						$arr=$_GET['del']; 

						$rw=mysql_query("select smallimg from new_collection1 where id='$arr'")or die(mysql_error());

						$rw1=mysql_fetch_array($rw);

						$x=$rw1['smallimg'];

						@unlink("../upload/$dir/".$x);		

						mysql_query("delete from new_collection1 where id='$arr'")or die(mysql_error());  

						$sess_msg="Style Deleted Successfully";

						$_SESSION['sess_msg']=$sess_msg;
						$root=$_REQUEST['root'];
				       $child=$_REQUEST['child'];
				         header("Location: new_collection1.php");

					

						exit; 

					

				}

				if(isset($_GET['ban']))



					{



						mysql_query("update new_collection1 set status=0 where id=".$_GET['ban']);



						$sess_msg="Style Suspended Successfully";



						$_SESSION['sess_msg']=$sess_msg;



						$root=$_REQUEST['root'];
				      $child=$_REQUEST['child'];
				        header("Location:new_collection1.php");



						exit;



					}



					if(isset($_GET['unban']))



					{



						mysql_query("update new_collection1 set status=1 where id=".$_GET['unban']);



						$sess_msg="Style Activated Successfully";



						$_SESSION['sess_msg']=$sess_msg;



					$root=$_REQUEST['root'];
				$child=$_REQUEST['child'];
				header("Location: new_collection1.php");



						exit;



					}
					
					
					?>
					
					
				<?

						   $q=mysql_query("select * from new_collection1 order by state_name asc");  

				
					
					  
					

				  $count=mysql_num_rows($q);

				  if($count!=0)

				  {

				  ?>

                    <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>

                        <td width="76%" height="32">

				

						</td>

                        <td width="24%" valign="top">
                        
                        <input name="gone" type="submit" class="button" id="gone2" value="Add New  "  /> 

                        </td>

                      </tr>

                    </table>

                  <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">

                    

                      <tr   class="li">

                        <td width="8%" bgcolor="#e1f0ff" class="heading"><strong>&nbsp;&nbsp;SNo.</strong></td>

                        <!--<td width="25%" height="27" bgcolor="#e1f0ff" class="heading"><strong>Price </strong></td>-->

                       <td width="52%" height="27" bgcolor="#e1f0ff" class="heading"><strong>&nbsp; Name</strong></td>

                        <td width="24%" height="27" align="center" nowrap bgcolor="#e1f0ff" class="heading"><strong>Image </strong></td>

                        <td width="16%" bgcolor="#e1f0ff" class="heading"><strong>&nbsp;Action</strong></td>

                      </tr>

                      <?

				$i=1;

				while($row=mysql_fetch_array($q))

				{

				extract($row);

				?>

                      <tr bgcolor="#F2F2F2" class="textli">

                        <td align="left" valign="top" class="bodytext">&nbsp;&nbsp; <? echo  $i;?></td>

                       <?php /*?> <td class="bodytext" style="padding:10px;"><?  echo  normal_filter($price);?></td><?php */?>

                        <td align="left" valign="top" class="bodytext" ><?  echo  normal_filter($state_name);?></td>

                        <td align="left" valign="top" class="bodytext" ><img name="" src="../upload/<?=$dir;?>/<? echo $smallimg;?>" alt="" height="116" width="170"></td>

                        <td width="16%" align="left" valign="top" class="bodytext">&nbsp;&nbsp;<a href="add_style4.php?edit=<?  echo  $id?>&root=<?=$_REQUEST['root'];?>&child=<?=$_REQUEST['child'];?>" title="Edit Style"><img src="images/but_edit_small.gif" alt="Edit Style" width="22" height="22" border="0" /></a> <a href="new_collection1.php?del=<?  echo  $id?>&root=<?=$_REQUEST['root'];?>&child=<?=$_REQUEST['child'];?>" onClick="return del();" title="Delete Style"><img src="images/but_delete_small.gif" alt="Delete Style" width="22" height="22" border="0" /></a>

												  <? if($status==0){?>



                      <a href="new_collection1.php?unban=<?  echo $id?>"&root=<?=$_REQUEST['root'];?>&child=<?=$_REQUEST['child'];?> title="Activate Style " ><img src="images/but_unban_small.gif" alt="Unban Page" width="22" height="22" border="0"></a>



                      <? }



						  else { ?>



                        <a href="new_collection1.php?ban=<?  echo $id?>"&root=<?=$_REQUEST['root'];?>&child=<?=$_REQUEST['child'];?> title="Suspend Style " ><img src="images/but_ban_small.gif" alt="Ban Page" width="22" height="22" border="0"></a>



                      <? } ?>                        </td>

                      </tr>

                      <?

					$i++;

				} 

				?>

                    </table>

                  <? }  else {?>

                    <div align="center"><span class="red"><strong>Currently 

                      No  Available,  Please</strong></span> <span class="leftlinks">
                      
                    
                      <a href="add_style4.php" class="headlinks">Add  

                        First</a></span>

                  <? }?>

                    </div>

                </form></td>

              </tr>

            </table>
  <br></td></tr>
    </table></td>
  </tr>
</table>
<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1%" height="29"><? require_once("adfooter.php");?></td>
  </tr>
 </table>
</body>
</html>
<? ob_end_flush(); ?>