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
function banner_validate()
	{
		if(document.form1.parent_id.value=="all")
		{
			alert("Please Select Category");
			return false;
		}
		return true;
	}
function del()
{
var nm=confirm("Are you sure want to delete ");
if(nm)
return true;
else
return false;
}
function change_page(val)
{
	location.href='newsletter.php?cat='+val;
	return false;
}
function show_submit(obj, obj1)
{
location.href='newsletter.php?order_by='+obj+'&parent_id='+obj1;
}
function show_submit1(obj,obj1)
{
location.href='newsletter.php?down_order_by='+obj+'&parent_id='+obj1;
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
          <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#274663">
			   <tr>
                   <td height="30" colspan="2" bgcolor="#000" class="heading"><strong>Manage Newsletter</strong> </td>
            </tr>
			   <tr>
			     <td colspan="2" bgcolor="#FFFFFF">
				    <form name="form1" method="post" action="send_newsletter.php">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333"> 
                <tr>
                  <td height="252" valign="top" bgcolor="#FFFFFF">
				  
				<? 
			    if(isset($_GET['dele']))
			  {   
					mysql_query("delete from newsletter where cat='".$_GET['cat']."' and email='".$_GET['dele']."'")or die(mysql_error());
					$_SESSION['sess_msg']='<div align=center class=correct>Deleted successfully....</div>';
					header("Location: newsletter.php?start=".$_REQUEST['start']."&cat=".$_REQUEST['cat']);		
					exit;
				   } 

			  if(isset($_GET['ban']))

				{ 

					mysql_query("update newsletter set status=0 where cat='".$_GET['ban']."' and email='".$_GET['email']."'")or die(mysql_error());

					$_SESSION['sess_msg']='<div align=center class=correct>Category Deactivated successfully....</div>';

					header("Location:newsletter.php?start=".$_REQUEST['start']."&cat=".$_REQUEST['ban']);	

					exit; 

				}

				if(isset($_GET['unban']))

				{

					mysql_query("update newsletter set status=1 where cat='".$_GET['unban']."' and email='".$_GET['email']."'")or die(mysql_error()); 

					$_SESSION['sess_msg']='<div align=center class=correct>Category Activated successfully....</div>';

					header("Location:newsletter.php?start=".$_REQUEST['start']."&cat=".$_REQUEST['unban']);		

					exit;

				} 
				
				 if(isset($_GET['bana']))

				{ 

					mysql_query("update newsletter set status=0 where cat='".$_GET['ban']."'")or die(mysql_error());

					$_SESSION['sess_msg']='<div align=center class=correct>Category Deactivated successfully....</div>';

					header("Location:newsletter.php?start=".$_REQUEST['start']."&cat=".$_REQUEST['ban']);	

					exit; 

				}

				if(isset($_GET['unbana']))

				{

					mysql_query("update newsletter set status=1 where cat='".$_GET['unban']."'")or die(mysql_error()); 

					$_SESSION['sess_msg']='<div align=center class=correct>Category Activated successfully....</div>';

					header("Location:newsletter.php?start=".$_REQUEST['start']."&cat=".$_REQUEST['unban']);		

					exit;

				} 
				

				if($_GET['cat']!='all'){

				$where="where cat='".$_REQUEST['cat']."'"; 

				} else {

				$where=""; 

				}

				$start=0;

				if(isset($_GET['start'])and $_GET['start']!='')$start=$_GET['start'];

				$pagesize=100;

				//echo "select * from category where $where 1=1 order by name asc";

				$qry1=mysql_query("select * from newsletter $where order by id asc")or die(mysql_error());

				$qry=mysql_query("select * from newsletter $where order by id asc limit $start, $pagesize")or die(mysql_error());

				$reccnt=mysql_num_rows($qry1);

				/**********************************************************************/

			  echo "<br>".$_SESSION['sess_msg']; 

               

           ?>

                      <div class="correct" align="center"><?php echo $_SESSION['mails'];?></div>
                    <table width="95%" border="0" align="center" cellpadding="2" cellspacing="1">
                        <tr bgcolor="#0066CC" class="li" >
                          <td bgcolor="#FFFFFF" class="whitetext" >&nbsp;</td>
                          <td width="386" height="35" bgcolor="#FFFFFF"  class="whitetext">                          </td>
                          <td colspan="2" valign="top" bgcolor="#FFFFFF" class="whitetext" ><label>
                            <input name="gone" onClick="return banner_validate();" type="submit" class="button" id="gone" value="Send Newsletter">
                          </label></td>
                        </tr>
                        <? if($reccnt!=0){?>
                        <tr bgcolor="#0066CC" class="li" >
                          <td width="50" bgcolor="#333333" class="heading" ><strong>&nbsp;&nbsp;<span class="toplinks">SNo.</span></strong></td>
                          <td height="27" bgcolor="#333333"  class="heading"><strong> &nbsp;&nbsp;&nbsp;<span class="toplinks">E-mail</span></strong><strong>&nbsp;</strong></td> 
                          <td width="187" align="center" bgcolor="#333333" class="heading" ><strong><span class="toplinks">Selelct email </span></strong></td>
                          <td width="55" align="center" bgcolor="#333333" class="heading" ><strong>&nbsp;<span class="toplinks">Action</span></strong><strong class="toplinks"></strong></td>
                        </tr>
                        <?

							$i=$start+1;

							$k=$i;

							while($row=mysql_fetch_array($qry)){ 

							extract($row);

						?>
                        <tr bgcolor="#F2F2F2" class="textli">
                          <td align="center" bgcolor="#F2F2F2" class="hometext"><?  echo $i;?></td>
                          <td bgcolor="#F2F2F2" class="hometext">&nbsp;&nbsp;&nbsp;
                              <?=$email; ?></td> 
                          <td align="center" class="hometext">
                              <? if($status==0){?>
                              <a href="newsletter.php?unban=<?=$cat; ?>&email=<?=$email; ?>" title="Unban Email" ><img src="images/uncheck.jpg" alt="Unban Category"  border="0"></a>
                              <? } else { ?>
                              <a href="newsletter.php?ban=<?=$cat; ?>&email=<?=$email; ?>" title="Ban Email"><img src="images/images.jpg" alt="Ban Category"  border="0"></a>
                              <? } ?>                          </td>
                          <td align="center" class="hometext"><a href="newsletter.php?dele=<?=$email; ?>&cat=<?=$cat; ?>" onClick="return del();" title="Delete Email"><img src="images/but_delete_small.gif" alt="Delete Category" width="22" height="22" border="0"></a></td>
                        </tr>
                        <?
					$i++; $k++;
				}
				
				}
				
				?><tr style="margin-top:40px;">
				
				<td align="right" style="margin-right:40px;"  colspan="3" >
                              <? if($status==0){?>
                              <a href="newsletter.php?unbana=<?=$cat; ?>&email=<?=$email; ?>" title="Unban Email" ><input type="submit" value="Check All"></a>
                              <? } else { ?>
                              <a href="newsletter.php?bana=<?=$cat; ?>&email=<?=$email; ?>" title="Ban Email"><input type="submit" value="Uncheck Selection "></a>
                              <? } ?>                          </td>
				</tr>
                      </table>
                    <table width="90%" border="0" align="center" cellpadding="2" cellspacing="5">
                        <tr>
                          <td align="center" ><? if($reccnt==0) echo '  <div align="center" class="red" >No Email Available for this category..</div>'; ?>                          </td>
                        </tr>
                      </table>
                    <table width="90%" border="0" align="center" cellpadding="2" cellspacing="5">
                        <tr>
                          <td align="center" ><?php include("../config/paging.inc1.php"); ?>                          </td>
                        </tr>
                    </table></td>
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
<? ob_end_flush();
?>
<script> show(1);</script>