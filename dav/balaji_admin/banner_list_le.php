<? ob_start();
require_once("../config/functions.inc.php");
unset($_SESSION['naukri']);
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
</script>
<style type="text/css">
<!--
.style1 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>
<body> 
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <?php /*?><td width="253" valign="top" class="left"><? require_once("adleft.php");?></td><?php */?>
    <td  align="center">
	<div id="mid">  
		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
            <tr>
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Faculty :</strong></td>
            </tr>
            <tr>
              <td align="center" valign="top" bgcolor="#FFFFFF"><form name="form1" method="post" action="banner_add_le.php">
                <p><br>
                  <?

					  if(isset($_GET['dele']))

					  {

					  $u=mysql_query("select * from bannerleft where id=".$_GET['dele']);

					  $u1=mysql_fetch_array($u);

					  $x=$u1['blocation'];

					  unlink("../banner/ori_le/".$x);

					 

					  mysql_query("delete from bannerleft where id=".$_GET['dele']);

					 header("Location: banner_list_le.php?type=".$_REQUEST['type']);

					   

					  }
					  if(isset($_GET['ban']))

					{

						mysql_query("update bannerleft set status=0 where id=".$_GET['ban']);

						$sess_msg="Staff became Non-teaching Staff";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: banner_list_le.php?type=1");

						exit;

					}

					if(isset($_GET['unban']))

					{

						mysql_query("update bannerleft set status=1 where id=".$_GET['unban']);

						$sess_msg="Non-teaching Staff became Teaching Staff";

						$_SESSION['sess_msg']=$sess_msg;

						header("Location: banner_list_le.php?type=1");

						exit;

					}

						$qry=mysql_query("select * from bannerleft where type='1' order by id desc");

						$reccnt=mysql_num_rows($qry);

				  ?>
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <td class="red" align="center"><div align="center"><? echo stripslashes($_SESSION['sess_msg']); if(!isset($_GET['del']))unset($_SESSION['sess_msg']); ?></div></td>
                  </tr>
                  <tr>
                    <td class="smalltext"><input name="type" type="hidden" value="1">
                      &nbsp;&nbsp;&nbsp;
                     <a href="banner_add_le.php?yahoo=sf"> <input name="add" type="submit" class="button" id="add" value="Add New Image" ></a></td>
                  </tr>
                </table>
                <TABLE  width="100%"   border=1>
                  <TBODY>
                    <TR>
                      <?  if($reccnt!=0){ $k=1; 

					while($row=mysql_fetch_array($qry)){ ?>
                      <TD><TABLE cellSpacing=5 width=100% align=center border=0>
                        <TBODY>
                          <TR>
                            <TD align=center><SPAN class=style5><IMG src="../banner/ori_le/<? echo $row['blocation'];?>" border="0"  alt="<? echo $row['alttag']; ?>" height="150"></SPAN> <a href="banner_list_le.php?unpopular=<? echo $row['id'];?>"> </a></TD>
                          </TR>
                          <TR>
                            <TD align=middle><div align="center">
                              <div align="center"> <a  title="Edit Profile" href="banner_add_le.php?edit=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>"><img src="images/but_edit_small.gif" border="0" alt="Edit Produt Details"></a> <a  title="Delete Profile" href="banner_list_le.php?dele=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>" onClick="return del();"><img src="images/but_delete_small.gif" border="0" alt="Delete Infrastructure/Event" ></a> 
                              
                               <? if($row['status']==0){?>

                            <a href="banner_list_le.php?unban=<?  echo $row['id'] ?>" title="Non - Teaching Staff" ><img src="images/but_unban_small.gif" alt="Unban Product" width="22" height="22" border="0"></a>

                            <? }

						  else { ?>

                            <a href="banner_list_le.php?ban=<?  echo $row['id'] ?>" title="Teaching Staff" ></a>

                            <? } ?><br>
                              </div></TD>
                          </TR>
                          <TR>
                            <TD align=left><div align="center" class="blogs"><b>Name : </b> <? echo normal_filter($row['burl']);?></div></TD>
                          </TR>
                           <TR>
                            <TD align=left><div align="center" class="blogs"><b>Designation :</b> <? echo normal_filter($row['designation']);?></div></TD>
                          </TR>
                           <TR>
                            <TD align=left><div align="center" class="blogs"><b>Department :</b><? echo normal_filter($row['qualification']);?></div></TD>
                          </TR>
                           <TR>
                            <TD align=left><div align="center" class="blogs"><b>Email :</b> <? echo normal_filter($row['email']);?></div></TD>
                          </TR>
                        </TBODY>
                      </TABLE></TD>
                      <?  if($k%4==0){?>
                    </tr>
                    <tr>
                      <?php }?>
                      <?php $k++;

								 }  } 

		?>
                    </TR>
                  </TBODY>
                </TABLE>
                
                <?
                $qry=mysql_query("select * from bannerleft where type='4' order by id desc");

						$reccnt=mysql_num_rows($qry);
				?>
                <strong>GUEST FACULTY LIST</strong>
                <TABLE borderColor=#cccccc cellSpacing=0 width=80% align=center border=1>
                  <TBODY>
                    <TR>
                      <?  if($reccnt!=0){ $k=1; 

					while($row=mysql_fetch_array($qry)){ ?>
                      <TD><TABLE cellSpacing=5 width=100% align=center border=0>
                        <TBODY>
                          <TR>
                            <TD align=center><SPAN class=style5><IMG src="../banner/ori_le/<? echo $row['blocation'];?>" border="0"  alt="<? echo $row['alttag']; ?>" height="150"></SPAN> <a href="banner_list_le.php?unpopular=<? echo $row['id'];?>"> </a></TD>
                          </TR>
                          <TR>
                            <TD align=middle><div align="center">
                              <div align="center"> <a  title="Edit Profile" href="banner_add_le.php?edit=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>"><img src="images/but_edit_small.gif" border="0" alt="Edit Produt Details"></a> <a  title="Delete Profile" href="banner_list_le.php?dele=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>" onClick="return del();"><img src="images/but_delete_small.gif" border="0" alt="Delete Infrastructure/Event" ></a> 
                              
                               <? if($row['status']==0){?>

                            <a href="banner_list_le.php?unban=<?  echo $row['id'] ?>" title="Non - Teaching Staff" ><img src="images/but_unban_small.gif" alt="Unban Product" width="22" height="22" border="0"></a>

                            <? }

						  else { ?>

                            <a href="banner_list_le.php?ban=<?  echo $row['id'] ?>" title="Teaching Staff" ></a>

                            <? } ?><br>
                              </div></TD>
                          </TR>
                          <TR>
                            <TD align=left><div align="center" class="blogs"><b>Name : </b> <? echo normal_filter($row['burl']);?></div></TD>
                          </TR>
                           <TR>
                            <TD align=left><div align="center" class="blogs"><b>Designation :</b> <? echo normal_filter($row['designation']);?></div></TD>
                          </TR>
                           <TR>
                            <TD align=left><div align="center" class="blogs"><b>Department :</b><? echo normal_filter($row['qualification']);?></div></TD>
                          </TR>
                           <TR>
                            <TD align=left><div align="center" class="blogs"><b>Contact Detail :</b> <? echo normal_filter($row['classes']);?></div></TD>
                          </TR>
                        </TBODY>
                      </TABLE></TD>
                      <?  if($k%1==0){?>
                    </tr>
                    <tr>
                      <?php }?>
                      <?php $k++;

								 }  } 

		?>
                    </TR>
                  </TBODY>
                </TABLE>
                <!--<table width="508" border="0" align="center" cellpadding="2" cellspacing="5">
                  <tr>
                    <td align="center" ><?   if($reccnt==0) { ?>
                      <span class="red">No Images Available .... Please <a href="banner_add_le.php?yahoo=sf" class="boldlisting">Add 
                        
                        First </a></span>
                      <?

		}?></td>
                  </tr>
                </table>-->
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