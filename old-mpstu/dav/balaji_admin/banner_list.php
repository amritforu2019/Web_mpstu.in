<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
if(isset($_GET['ban'])){
mysql_query("update flash_images set type=1 where id=".$_GET['ban']);
$sess_msg="Deactivated Successfully";
$_SESSION['sess_msg']=$sess_msg;
header("Location: banner_list.php");
exit;
}
if(isset($_GET['unban']))
{
mysql_query("update flash_images set type=2 where id=".$_GET['unban']);
$sess_msg="Activated Successfully";
$_SESSION['sess_msg']=$sess_msg;
header("Location: banner_list.php");
exit;
}
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
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#0c5994" class="heading"><strong>Manage Flash Images</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" align="center">
				     <form name="form1" method="post" action="banner_add.php"> 
                    <?
					  if(isset($_GET['dele']))
					  {
					  $u=mysql_query("select * from flash_images where id=".$_GET['dele']);
					  $u1=mysql_fetch_array($u);
					  $x=$u1['blocation'];
					  unlink("../upload/flash_images/$x"); 
					  mysql_query("delete from flash_images where id=".$_GET['dele']);
					 header("Location: banner_list.php?type=".$_REQUEST['type']); 
					  }
						$qry=mysql_query("select * from flash_images ");
						$reccnt=mysql_num_rows($qry);
				  ?>
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <td class="red" align="center"><div align="center"><? echo stripslashes($_SESSION['sess_msg']); if(!isset($_GET['del'])) ?></div></td>
                  </tr>
                  <tr>
                    <td align="center" class="smalltext">  
					  <input name="type" type="hidden" value="1">
                      &nbsp;&nbsp;&nbsp;
                    <input name="add" type="submit" class="button" id="add" value="Add New Image" ></td>
                  </tr>
                </table>
                <TABLE width=508 border=0 align=center cellpadding="0" cellSpacing=0 borderColor=#cccccc>
                  <TBODY>
                    <TR>
                      <?  if($reccnt!=0){ $k=1; 
					while($row=mysql_fetch_array($qry)){ ?>
                      <TD><TABLE cellSpacing=5 width=160 align=center border=0>
                          <TBODY>
                            <TR>
                              <TD align=center><SPAN class=style5><IMG src="../upload/flash_images/<? echo $row['blocation'];?>"  alt="<? echo $row['alttag']; ?>" width="495"  border="1"></SPAN> <a href="banner_list.php?unpopular=<? echo $row['id'];?>"> </a><!-- <br><div align="center"><? echo normal_filter($row['burl']);?></div>--></TD>
                            </TR>
                            <TR>
                              <TD align=middle>
                              
                              <div align="center">
                                  <div align="center"> <a href="banner_add.php?edit=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>"><img src="images/but_edit_small.gif" alt="Edit Produt Details" width="22" height="22" border="0"></a> <a href="banner_list.php?dele=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>" onClick="return ch1();"><img src="images/but_delete_small.gif" alt="Delete Infrastructure/Event" width="22" height="22" border="0" ></a>
                                  
                                   <br>
                                   
                                     <?  if($row['type']==1){?>
                          <a href="banner_list.php?unban=<?  echo $row['id']?>" >Act For Background</a>
                          <? }  else { ?>
                          <a href="banner_list.php?ban=<?  echo $row['id']?>" >Dact For Background</a>
                        <? } ?>
                                </div></TD>
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
                <table width="508" border="0" align="center" cellpadding="2" cellspacing="5">
                  <tr>
                    <td align="center" ><?   if($reccnt==0) { ?>
                        <span class="red">No Images Available .... Please <a href="banner_add.php?yahoo=sf" class="boldlisting">Add 
                          First </a> </span>
                        <?
		}?>                    </td>
                  </tr>
                </table>
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
<? ob_end_flush(); ?>