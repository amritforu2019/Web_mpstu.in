<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
unset($_SESSION['rest']);
unset($_SESSION['size']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">

function del()

{

var nm=confirm("Are you sure want to delete ");

if(nm)

return true;

else

return false;

}

function load_page(val)

{

	location.href='product_list.php?category='+val;

	return false;

}

</script>
</head>
<body> 
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td width="750" align="center">
	<div id="mid">  
		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
            <tr>
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Services :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><form name="form1" method="post" action="product_list.php">

                    <br>

                    <?

					if($_SESSION['userid'])

						$EXTRA="";

						else

						$EXTRA="and  show_on=0";

						$where='';

				if(isset($_GET['del']))

				{

						$arr=$_GET['del'];

						

							$cn=mysql_query("select imname from product where id='$arr'")or die(mysql_error());

							$cn1=mysql_fetch_array($cn);

							@unlink("product/big/".$cn1['imname']);

							@unlink("product/medium/".$cn1['imname']);

							@unlink("product/thumb/".$cn1['imname']);

							mysql_query("delete from product where id='$arr'")or die(mysql_error());

							$sess_msg="Product Deleted Successfully";

							$_SESSION['sess_msg']=$sess_msg;

							header("Location: product_list.php?category=".$_REQUEST['category']."&start=".$_REQUEST['start']);

							exit;

						

				

				}

					if(isset($_GET['ban']))

					{

						mysql_query("update product set status=0 where id=".$_GET['ban']);

						$sess_msg="Product  banned Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: product_list.php?category=".$_REQUEST['category']."&start=".$_REQUEST['start']);

						exit;

					}

					if(isset($_GET['unban']))

					{

						mysql_query("update product set status=1 where id=".$_GET['unban']);

						$sess_msg="Product  Unbanned Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: product_list.php?category=".$_REQUEST['category']."&start=".$_REQUEST['start']);

						exit;

					}

					

					if(isset($_GET['fea']))

					{

						mysql_query("update product set featured=1 where id=".$_GET['fea']);

						$sess_msg="Product featured Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: product_list.php?category=".$_REQUEST['category']."&start=".$_REQUEST['start']);

						exit;

					}

					

					if(isset($_GET['unfea']))

					{

						mysql_query("update product set featured=0 where id=".$_GET['unfea']);

						$sess_msg="Product unfeatured Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: product_list.php?category=".$_REQUEST['category']."&start=".$_REQUEST['start']);

						exit;

					}

					

					if(isset($_REQUEST['search_karo']))

					{

						

						

						$where="where item_code='".$_REQUEST['search_karo']."'";

	

					}

					

					else if($_REQUEST['category']=="all")

					{

						$where="";

					}

					else if(isset($_REQUEST['category']))

					{

						$where=" where parent_id='".$_REQUEST['category']."' ";

					}	

					$start=0;

					if(isset($_GET['start'])and $_GET['start']!='')

					$start=$_GET['start'];

					$pagesize=15;

					//echo "select * from product  $where order by  id desc limit $start, $pagesize";

				  $q=mysql_query("select * from product  $where order by  id desc limit $start, $pagesize");

				  $q1=mysql_query("select * from product  $where order by  id desc ");

				  $reccnt=mysql_num_rows($q1);

				 ?>

                <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>

                        <td height="50" colspan="3" valign="top"><table width="95%" border="0">

                          <tr>

                            <td width="25%" class="headlinks">Search by Item code: </td>

                            <td width="27%"><input name="search_karo" type="text" class="bodytext" id="search_karo"></td>

                            <td width="48%"><input name="searchid" type="submit" class="button" id="searchid" value="Search Product"></td>

                          </tr>

                        </table></td>

                      </tr>

                      <tr>

                        <td width="28%" height="32">&nbsp;<span class="boldlisting">&nbsp;Select  Category : </span></td>

                        <td width="52%" valign="middle"><select name="category" class="bodytext" onChange="javascript:load_page(this.value);">

                            <option value="all">All</option>

                          <?

					$country_qry=mysql_query("select * from category where parent_id=0 order by name asc")or die(mysql_error());

					while($country_fetch=mysql_fetch_array($country_qry))

					{

					?>

                            <option value="<? echo $country_fetch['id']?>" <? if($_REQUEST['category']==$country_fetch['id'] || $row['parent_id']==$country_fetch['id']) echo "selected";?> style="font-weight:bold"><? echo normalall_filter($country_fetch['name'])?></option>

							<?  $country_qry1=mysql_query("select * from category where parent_id='".$country_fetch['id']."' order by name asc")or die(mysql_error());

					while($country_fetch1=mysql_fetch_array($country_qry1))

					{

					?>

                            <option value="<? echo $country_fetch1['id']?>" <? if($_REQUEST['category']==$country_fetch1['id'] || $row['parent_id']==$country_fetch1['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;-<? echo normalall_filter($country_fetch1['name'])?></option>

							<?  $country_qry2=mysql_query("select * from category where parent_id='".$country_fetch1['id']."' order by name asc")or die(mysql_error());

					while($country_fetch2=mysql_fetch_array($country_qry2))

					{

					?>

                            <option value="<? echo $country_fetch2['id']?>" <? if($_REQUEST['category']==$country_fetch2['id'] || $row['parent_id']==$country_fetch2['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<? echo normalall_filter($country_fetch2['name'])?></option>

							

							

                            <? } ?>


							

                            <? } ?>

							

                            <? } ?>

                          </select>                        </td>

                        <td width="20%" valign="top"><input name="gone" type="button" class="button" id="gone" value="Add New Product" onClick="javascript:window.location.href='product_add.php?yahoo=fsf&category=<? echo $_REQUEST['category']?>'"></td>

                      </tr>

                    </table>

                  <? if($reccnt!=0)

				  {

				  ?>

                    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">

                      <tr>

                        <td colspan="6" align="center" class="correct"><div align="center">
						
						
						
						
						</div></td>

                      </tr>

                      <tr   class="li" style="color:#FFF;">

                        <td width="6%" align="center" bgcolor="#0C5994" class="toplinks"><strong>&nbsp;&nbsp;SNo.</strong></td>

                        <td width="51%" height="27" bgcolor="#0C5994" class="toplinks"><strong>&nbsp;Product  Name </strong></td>

                        <td width="27%" bgcolor="#0C5994" class="toplinks">&nbsp;&nbsp;Image</td>
                      <td width="16%" bgcolor="#0C5994" class="toplinks"><strong>&nbsp;Action</strong></td>

                      </tr>

                      <?

				$i=1;

				while($row=mysql_fetch_array($q))

				{

				extract($row);

				?>

                      <tr bgcolor="#F2F2F2" class="textli">

                        <td align="center" valign="top" class="bodytext" style="line-height:25px;">

                            <div align="center">

                              <?  echo $i;?>

                              <br>

                              <? if($featured==1){?>

                                <a href="product_list.php?unfea=<?  echo $id?>&category=<? echo $parent_id;?>&start=<? echo $_REQUEST['start'];?>" ><img src="../images/featured.gif" alt="Featured Product" width="15" height="15" vspace="3" border="0"></a>

                            </div>

                            <? } ?></td>

                        <td valign="top" class="bodytext" style="padding-left:20px; line-height:25px;">

                            <?  echo normal_filter($name)?> <br>

							<strong>Mobile No. - </strong><span class="bodytext" style="padding-left:20px; line-height:25px;">
							<?  echo normal_filter($item_code)?>
							</span><br> 

							<!--<strong>Size  - </strong><?  echo normal_filter($color)?><br> 
-->
							<strong>Email Id  - </strong><span class="bodytext" style="padding-left:20px; line-height:25px;">
							<?  echo normal_filter($weight)?>
							</span><br> 

							<strong>Address  - </strong><span class="bodytext" style="padding-left:20px; line-height:25px;">
							<?  echo normal_filter($price_offer)?>
							</span></td>

                        <td class="bodytext"><div align="center"><img src="../product/thumb/<? echo $imname;?>" width="145" height="122"></div>                          <p class="headlinks">&nbsp;</p></td>
                      <td class="bodytext">&nbsp;&nbsp;<a href="product_add.php?edit=<?  echo $id?>&category=<? echo $parent_id;?>&start=<? echo $_REQUEST['start'];?>"><img src="images/but_edit_small.gif" alt="Edit Product" width="22" height="22" border="0"></a>

						<a href="product_list.php?del=<?  echo $id?>&category=<? echo $parent_id;?>&start=<? echo $_REQUEST['start'];?>" onClick="return del();"><img src="images/but_delete_small.gif" alt="Delete Product" width="22" height="22" border="0"></a>

                          <? if($status==0){?>

                          <a href="product_list.php?unban=<?  echo $id?>&category=<? echo $parent_id;?>&start=<? echo $_REQUEST['start'];?>" ><img src="images/but_unban_small.gif" alt="Unban Product" width="22" height="22" border="0"></a>

                          <? }

						  else { ?>

                          <a href="product_list.php?ban=<?  echo $id?>&category=<? echo $parent_id;?>&start=<? echo $_REQUEST['start'];?>" ><img src="images/but_ban_small.gif" alt="Ban Product" width="22" height="22" border="0"></a>

                          <? } ?>

						  <? if($featured==0){?>

						  <a href="product_list.php?fea=<?  echo $id?>&category=<? echo $parent_id;?>&start=<? echo $_REQUEST['start'];?>" ><img src="images/featured.gif" alt="Featured Product" width="15" height="15" vspace="3" border="0"></a>

						  <? } ?>

					    </td>

                      </tr>

                      <?

					$i++;

				}

				

				

				

				?>

                    </table>

                  <? }  else

				{?>

                    <div align="center"><span class="red"><strong>Currently 

                      No Product  Available .., Please</strong></span> <span class="leftlinks"><a href="product_add.php?yahoo=sfsfs&category=<? echo $_REQUEST['category'];?>" class="boldlisting">Add 

                        First</a></span>

                            <?

				}?>

                </div>

					<div align="center"><? require_once("../config/paging.inc1.php");?></div>

                    <p></p>

                </form></td>
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