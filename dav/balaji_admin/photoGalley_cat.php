<? ob_start();

require_once("../config/functions.inc.php");

validate_admin();
mysql_query('ALTER TABLE  `photogallery_cat` ADD  `status2` INT NOT NULL ;');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css"> 
<style type="text/css">
<!--
.style1 {
	color: #000;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<p>&nbsp;</p>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td width="750" align="center">
	<div id="mid">   
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#274663">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#000" class="heading"><strong>Manage Photo Gallery</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form name="form1" method="post" action="photoGalley_cat_add.php">

                <br>   

				<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">

                  <tr>

                    <td width="70%" height="32"> 

					</td>

                    <td width="15%" valign="middle"></td>

                    <td width="15%" align="right" valign="middle"><input name="gone" type="button" value="Add Category" onClick="location.href='photoGalley_cat_add.php'">                    </td>

                  </tr>

                </table>

				<? 

				if(isset($_GET['del']))

				{

						$arr=$_GET['del']; 			

						mysql_query("delete from photogallery_cat where id='$arr'")or die(mysql_error());  

						$sess_msg="Photo Gallery Category Deleted Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: photoGalley_cat.php");

						exit; 

				}

					if(isset($_GET['ban']))

					{

						mysql_query("update photogallery_cat  set status=0 where id=".$_GET['ban']);

						$sess_msg="Photo Gallery Category Suspended Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: photoGalley_cat.php");

						exit;

					}

					if(isset($_GET['unban']))

					{

						mysql_query("update photogallery_cat set status=1 where id=".$_GET['unban']);

						$sess_msg="Photo Gallery Category Activated Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: photoGalley_cat.php");

						exit;

					} 
					
					
					if(isset($_GET['ban2']))

					{

						mysql_query("update photogallery_cat  set status2=0 where id=".$_GET['ban2']);

						$sess_msg="Record Updated";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: photoGalley_cat.php");

						exit;

					}

					if(isset($_GET['unban2']))

					{

						mysql_query("update photogallery_cat set status2=1 where id=".$_GET['unban2']);

						$sess_msg="Record Updated";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: photoGalley_cat.php");

						exit;

					} 

				  $q=mysql_query("select * from photogallery_cat order by id desc");

				  $count=mysql_num_rows($q);

				  if($count!=0)

				  {

				  ?> 

                <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">

                  <tr>

                    

                    <td colspan="5" align="center" class="correct"><div align="center"><? echo stripslashes($_SESSION['sess_msg']); ?></div></td>
                  </tr>

                  <tr   class="li">

                    <td width="7%" align="center" bgcolor="#000000" class="heading"><span style="color:#fff;">&nbsp;&nbsp;SNo.</span></td>

                    <td width="48%" height="27" bgcolor="#000000" class="heading"><span class="style1">Photo &nbsp;Gallery Category</span></td>

                    <td width="18%" align="center" bgcolor="#000000" class="heading"><span class="style1">No. of Photos </span></td>

                    <td bgcolor="#000000" class="heading"><span class="style1">&nbsp;Action</span></td>
                  </tr>

                  <?

				$i=1;

				while($row=mysql_fetch_array($q))

				{

				extract($row);

				?>

                  <tr bgcolor="#F2F2F2" class="textli">

                    <td align="center" class="bodytext"><strong><? echo $i;?>.</strong></td>

                    <td nowrap class="bodytext" style="padding:10px;"><a href="photoGallery.php?pid=<?=$id;?>" style="color:#000;"><? if(strlen(normal_filter($name ))>200) { echo substr(normal_filter(strip_tags($name )),0,200)."...";} else { echo normal_filter(strip_tags($name ));}?></a> </td>

                    <td align="center" class="bodytext" style="padding:10px;"><? $reccnt=mysql_num_rows(mysql_query("select id from gallery where pid='".$id."'")); if($reccnt>0) {?><a href="photoGallery.php?pid=<?=$id;?>" style="color:#000;"><? echo $reccnt;?></a><? } ?></td>

                    <td width="27%" class="bodytext">&nbsp;&nbsp;<a href="photoGalley_cat_add.php?edit=<?  echo $id?>" title="Edit Page"><img src="images/but_edit_small.gif" alt="Edit Photo Gallery Category" width="22" height="22" border="0"></a> <a href="photoGalley_cat.php?del=<?  echo $id?>" onClick="return del();" title="Delete Photo Gallery Category"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a>

                        <? if($status==0){?>

                      <a href="photoGalley_cat.php?unban=<?  echo $id?>" title="Activate Photo Gallery Category" ><img src="images/but_unban_small.gif" alt="Unban Page" width="22" height="22" border="0"></a>

                      <? }

						  else { ?>

                        <a href="photoGalley_cat.php?ban=<?  echo $id?>" title="Suspend Photo Gallery Category" ><img src="images/but_ban_small.gif" alt="Ban Page" width="22" height="22" border="0"></a>

                      <? } ?>
                      
                       <? if($status2==0){?>

                      <a href="photoGalley_cat.php?unban2=<?  echo $id?>" title="Activate For RTI" >In Gallery</a>

                      <? }

						  else { ?>

                        <a href="photoGalley_cat.php?ban2=<?  echo $id?>" title="Activate For  Gallery " >In RTI</a>

                      <? } ?>                      </td>
				  </tr>

                  <?

					$i++;

				} 

				?>
                 </table>

                <? }  else {?>

                <div align="center"><span class="red"><strong>Currently 

                  No Photo Gallery Category Available, Please</strong></span> <span class="leftlinks"><a href="photoGalley_cat_add.php?yahoo=sfsfs" class="headlinks">Add 

                    First</a></span>

                        <? }?>

                </div>

               </form>
			     </td>
	        </tr> 
        </table>  
	</div>
	</td>
  </tr>
  <tr>
    <td colspan="2"><? require_once("adfooter.php");?></td>
  </tr>
</table>  
</body>
</html>
<? ob_end_flush();
?>
<script> show(1);</script>