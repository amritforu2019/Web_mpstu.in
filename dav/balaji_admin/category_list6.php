<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
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

	location.href='category_list6.php?country='+val;

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

              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Why Choose Us</strong></td>

            </tr>

            <tr>

              <td bgcolor="#FFFFFF">






<form name="form1" method="post" action="category_list6.php">

                    <br>

                    <?

				if(isset($_GET['del']))

				{

						$arr=$_GET['del'];

						if(mysql_num_rows(mysql_query("select id from category6 where parent_id='$arr'"))!=0)

						{

							$sess_msg="<div class=red>Category cannot be deleted without deleting its associated subcategory..</div>";

							$_SESSION['sess_msg']=$sess_msg;

							header("Location: category_list6.php?country=".$_REQUEST['country']);

							exit;

						}

						else

						{

							$cn=mysql_query("select imname from category6 where id='$arr'")or die(mysql_error());

							$cn1=mysql_fetch_array($cn);

							@unlink("../product/category/".$cn1['imname']);

							mysql_query("delete from category6 where id='$arr'")or die(mysql_error());

							$sess_msg="Category Deleted Successfully";

							$_SESSION['sess_msg']=$sess_msg;

							header("Location: category_list6.php?country=".$_REQUEST['country']);

							exit;

						}

				

				}

					if(isset($_GET['ban']))

					{

						mysql_query("update category6 set status=0 where id=".$_GET['ban']);

						$sess_msg="Category  banned Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: category_list6.php?country=".$_REQUEST['country']);

						exit;

					}

					if(isset($_GET['unban']))

					{

						mysql_query("update category6 set status=1 where id=".$_GET['unban']);

						$sess_msg="Category  Unbanned Successfully";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: category_list6.php?country=".$_REQUEST['country']);

						exit;

					}

					

					if($_REQUEST['country']=="0")

					{

						$where="where parent_id=0";

					}

					else

					{

						$where=" where parent_id='".$_REQUEST['country']."' and parent_id!=0";

					}	

				  $q=mysql_query("select * from category6   $where order by name asc");

				  $count=mysql_num_rows($q);

				 ?>

                <table width="85%" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>

                        <td width="28%" ><!--&nbsp;<span class="boldlisting">&nbsp;Select : </span>--></td>

                        <td width="52%" valign="middle"><?php /*?><select name="country" class="bodytext" onChange="javascript:load_page(this.value);">

                            <option value="0">Top</option>

                            <?

					$country_qry=mysql_query("select * from category6 where parent_id=0 order by name asc")or die(mysql_error());

					while($country_fetch=mysql_fetch_array($country_qry))

					{

					?>

                            <option value="<? echo $country_fetch['id']?>" <? if($_REQUEST['country']==$country_fetch['id']) echo "selected"; ?>><? echo normalall_filter($country_fetch['name'])?></option>
	<?  $country_qry1=mysql_query("select * from category6 where parent_id='".$country_fetch['id']."' and status=0 order by name asc")or die(mysql_error());

					while($country_fetch1=mysql_fetch_array($country_qry1))

					{

					?>

                            <option value="<? echo $country_fetch1['id']?>" <? if($_REQUEST['country']==$country_fetch1['id'] || $row['parent_id']==$country_fetch1['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;-<? echo normalall_filter($country_fetch1['name'])?></option>


                            <? } } ?>

                          </select><?php */?>

                        </td>

                        <td width="20%" valign="top"><input name="gone" type="button" class="button" id="gone" value="Add " onClick="javascript:window.location.href='category_add6.php?yahoo=fsf&country=<? echo $_REQUEST['country']?>'"></td>

                      </tr>

                    </table>

                  <? if($count!=0)

				  {

				  ?>

                    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="table">

                      <tr>

                        <td colspan="7" align="center" class="correct"><div align="center"><? echo stripslashes($_SESSION['sess_msg']); unset($_SESSION['sess_msg']);?></div></td>

                      </tr>

                      <tr   class="li">

                        <td  bgcolor="#0C5994" class="toplinks" style="color:#fff"><strong>&nbsp;&nbsp;SNo.</strong></td>

                        <td  bgcolor="#0C5994" class="toplinks" style="color:#fff"><strong> Title</strong></td>
                        <td bgcolor="#0C5994" class="toplinks" style="color:#fff"><strong>Details</strong></td>
<td  bgcolor="#0C5994" class="toplinks" style="color:#fff"><strong>Image</strong></td>

                        <td  bgcolor="#0C5994" class="toplinks" style="color:#fff">&nbsp;</td>

                      </tr>

                      <?

				$i=1;

				while($row=mysql_fetch_array($q))
				{
				extract($row);

				?>

                      <tr bgcolor="#F2F2F2" class="textli">

                        <td align="left" class="bodytext">&nbsp;&nbsp;

                            <?  echo $i;?>                        </td>

                        <td class="bodytext">&nbsp;&nbsp;

                            <?  echo normal_filter($name)?>                        </td>
                        <td class="bodytext"><?  echo normal_filter($weight)?></td>
<td class="bodytext"><img src="../product/category/<?  echo $imname?>" height="100"></td>

                        <td class="bodytext">
                          
                          
                        <a href="category_add6.php?edit=<?  echo $id?>&country=<? echo $parent_id;?>"><img src="images/but_edit_small.gif" alt="Edit Details" width="22" height="22" border="0"></a>
                         <a href="category_list6.php?del=<?  echo $id?>&country=<? echo $parent_id;?>" onClick="return del();"><img src="images/but_delete_small.gif" alt="Delete country_city" width="22" height="22" border="0"></a>
                         <?php /*?> <?  if($status==0){?>
                          <a href="category_list6.php?unban=<?  echo $id?>&country=<? echo $parent_id;?>" ><img src="images/but_ban_small.gif" alt="Unban country" width="22" height="22" border="0"></a>
                          <? }



						  else { ?>
                          <a href="category_list6.php?ban=<?  echo $id?>&country=<? echo $parent_id;?>" ><img src="images/but_unban_small.gif" alt="Ban country" width="22" height="22" border="0"></a>
                        <? } ?><?php */?></td>

                      </tr>

                      <?

					$i++;

				}

				

				

				

				?>

                    </table>

                  <? }  else

				{?>

                    <div align="center"><span class="red"><strong>Currently 

                      No Data  Available .., 

                       </a></span>

                            <?

				}?>

                </div>

                    <p></p>

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