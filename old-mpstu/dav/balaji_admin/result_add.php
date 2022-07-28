<? ob_start();
require_once("../config/functions.inc.php") ;
require_once("fckeditor/fckeditor.php") ;
validate_admin();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function chk()
{
if(document.form1.name.value=="")
{
alert("- Please enter Result &amp; Exam Title- ");
return false;
} 

return true;
} 
</script>
<link href="css/calendar.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="js/calendar_us.js"></script>
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
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Result &amp; Exam :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><form name="form1" method="post" action="result_add.php">
                <p>
                  <?
			  if(isset($_GET['yahoo']))
			  {
			  	
			  	
			 }
			  if(isset($_POST['gone']))
			 { 
			 		  	
			 }
			  if(isset($_GET['edit']))
			  {
				  $_SESSION['naukri']=$_GET['edit'];
				  $ty=$_GET['edit'];
				  $qry=mysql_query("select * from result_n_exam where id='$ty' ")or die(mysql_error());
				  $row=mysql_fetch_array($qry);
				  $_SESSION['cap_use']=$row['html_name'];
				  
		      }
			  if(isset($_POST['go']))
			  {
			 	  
			   	  if(count($_POST['show_on'])!=0)
					{
						$Show_on=implode(",",$_POST['show_on']);
					}
					$html_name=$_POST['html_name'];
				if(!isset($_SESSION['naukri']))
				  	{ 
				  mysql_query("insert into result_n_exam set parent_id='".addslashes($_POST['category'])."',title='".addslashes($_POST['title'])."',link='".addslashes($_POST['link'])."',location='".addslashes($_POST['location'])."',date='".$_POST['date']."', status=1")or die(mysql_error());
				  $sess_msg="Result &amp; Exam Added Successfully";
				  $_SESSION['sess_msg']=$sess_msg;
				  header("Location: result_list.php?parent_id=".$_POST['category']); 
			  }
			  else
			  {  
			  $bn=stripslashes($_SESSION['naukri']);
			  mysql_query("update result_n_exam set parent_id='".addslashes($_POST['category'])."',title='".addslashes($_POST['title'])."',link='".addslashes($_POST['link'])."',location='".addslashes($_POST['location'])."',date='".$_POST['date']."' where id='$bn'")or die(mysql_error());
			 $sess_msg="Result &amp; Exam Details Updated Successfully";
	          $_SESSION['sess_msg']=$sess_msg;
			   header("Location: result_list.php?parent_id=".$_POST['category']);
			   } } 
			  ?>
                </p> 
                <table width="100%" border="0" cellspacing="4" cellpadding="2">
					<tr>
                        <td class="bodytext"><div align="right">Select Category : </div></td>
                        <td><select name="category" class="bodytext" id="category" style="width:282px;"> 
                            <?
								$country_qry=mysql_query("select * from result_cat order by name asc")or die(mysql_error());
								while($country_fetch=mysql_fetch_array($country_qry)) {
							?>
                            <option value="<? echo $country_fetch['id']?>" <? if($_REQUEST['name']==$country_fetch['id'] || $row['parent_id']==$country_fetch['id']) echo "selected";?>><? echo normalall_filter($country_fetch['name'])?></option> 
                            <? }  ?>
                        </select></td>
                      </tr>
                  <tr>
                    <td align="right">  Title : </td>
                    <td><input name="title" type="text" id="title" size="50" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['title']); else echo stripslashes($_POST['title']);?>"></td>
                  </tr> 
				   <tr>
                    <td align="right"> Link : </td>
                    <td><input name="link" type="text" id="link" size="50" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['link']); else echo stripslashes($_POST['link']);?>"></td>
                  </tr> 
				  <tr>
                    <td align="right"> Location : </td>
                    <td><input name="location" type="text" id="location" size="50" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['location']); else echo stripslashes($_POST['location']);?>"></td>
                  </tr> 
				  <tr>
                    <td align="right"> Date : </td>
                    <td><input name="date" type="text" id="date" size="20" value="<? if(isset($_GET['edit'] )) echo stripslashes($row['date']); else echo stripslashes($_POST['date']);?>">
					 <script language="JavaScript" type="text/javascript">
						var o_cal = new tcal ({
							// form name
							'formname': 'form1',
							// input name
							'controlname': 'date'
						}); 
					// individual template parameters can be modified via the calendar variable
					o_cal.a_tpl.yearscroll = false;
					o_cal.a_tpl.weekstart = 1;
				  </script>
			  </td>
                  </tr>
                  <tr>
                    <td width="28%" height="22">&nbsp;</td>
                    <td width="72%"><input name="go" type="submit" class="button" id="go2" value="<? if(isset($_SESSION['naukri'])) echo "Update"; else echo "Add"?> Result &amp; Exam" onClick="return chk();">                    </td>
                  </tr>
                </table> 
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