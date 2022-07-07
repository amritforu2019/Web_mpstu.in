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
function load_page(val)
{
	location.href='banner_adv_list.php?type='+val;
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
				     <form name="form1" method="post" action="banner_adv_add.php"> 
                    <?
					  if(isset($_GET['dele']))
					  {
					  $u=mysql_query("select * from banner_adv where id=".$_GET['dele']);
					  $u1=mysql_fetch_array($u);
					  $x=$u1['blocation'];
					  unlink("../upload/banner_adv/$x"); 
					  mysql_query("delete from banner_adv where id=".$_GET['dele']);
					 header("Location: banner_adv_list.php?type=".$_REQUEST['type']); 
					  }
						$qry=mysql_query("select * from banner_adv order by id asc");
						$reccnt=mysql_num_rows($qry);
				  ?>
                <table width="100%" border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <td class="red" align="center"><div align="center"><? echo stripslashes($_SESSION['sess_msg']); if(!isset($_GET['del']))?></div></td>
                  </tr>
                  <tr>
                    <td align="center" class="smalltext">  
					  <input name="type" type="hidden" value="1">
                      &nbsp;&nbsp;&nbsp;
                    <!--<input name="add" type="submit" class="button" id="add" value="Add New Image" >--></td>
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
                              <TD align=center>
							  <? if($row['type']=='1') {?><a href="<? echo 'http://'.normal_filter($row['burl']);?>" title="<? echo $row['burl'];?>"><IMG src="../upload/banner_adv/<? echo $row['blocation'];?>"  alt="<? echo $row['alttag']; ?>" width="235" height="90" border="1"></a><? } elseif($row['type']=='2') {?>
							  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="235" height="90">
                                  <param name="movie" value="../upload/banner_adv/<? echo $row['blocation'];?>">
                                  <param name="quality" value="high">
                                  <embed src="../upload/banner_adv/<? echo $row['blocation'];?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="235" height="90"></embed>
						  	    </object>
							  <? }?></TD>
                            </TR>
                            <TR>
                              <TD align=middle><div align="center">
                                  <div align="center"> <a href="banner_adv_add.php?edit=<? echo $row['id'];?>&type=<? echo $row['type']?>"><img src="images/but_edit_small.gif" alt="Edit Produt Details" width="22" height="22" border="0"></a> 
								  <!--<a href="banner_adv_list.php?dele=<? echo $row['id'];?>&type=<? echo $_REQUEST['type']?>" onClick="return ch1();"><img src="images/but_delete_small.gif" alt="Delete Infrastructure/Event" width="22" height="22" border="0" ></a> <br>-->
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
                        <span class="red">No Images Available .... Please <a href="banner_adv_add.php?yahoo=sf" class="boldlisting">Add 
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