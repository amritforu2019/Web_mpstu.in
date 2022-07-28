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

</head>

<body>
<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2"><? require_once("adheader.php");?></td> 
  </tr>
  <tr>
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td height="252" bgcolor="#FFFFFF"><form name="form1" method="post" action="news_edit.php">
      <p>
        <?
			  if(isset($_GET['yahoo']))
			  {
			  	unset($_SESSION['naukri']);
				unset($_SESSION['cap_use']);
			  	
			 }
			  if(isset($_POST['gone']))
			 { 
			 	unset($_SESSION['naukri']);
				unset($_SESSION['cap_use']);			  	
			 }
			  if(isset($_GET['edit']))
			  {
				  $_SESSION['naukri']=$_GET['edit'];
				  $ty=$_GET['edit'];
				  
				  $qry=mysql_query("select * from newsletter  where id='$ty' ")or die(mysql_error());
				  $row=mysql_fetch_array($qry);
				  $_SESSION['cap_use']=$row['html_name'];
				  
		      }
			  if(isset($_POST['go']))
			  {
			 	  
			   	 
					$html_name=$_POST['html_name'];
				if(!isset($_SESSION['naukri']))
				  	{
						//////////////////////////////////////////////////////////////////////////////
						//////////////////Checking for duplicate caption name/////////////////////////
						/////////////////////////////////////////////////////////////////////////////
						
						
					
						/////////////////////////////////////////////////////////////////////////////////////////
						 if(!isset($_SESSION['dup_caption']))
						{
			  
				  mysql_query("insert into newsletter set email='".$_POST['email']."',status=1,subscription_date=now()")or die(mysql_error());
				  $sess_msg="Member Details Added Successfully";
	          $_SESSION['sess_msg']=$sess_msg;
			   header("Location: newsletter.php?subject=".$_REQUEST['subject']);
				  }
			  }
			  else
			  {
			  //////////////////////////////////////////////////////////////////////////////
					//////////////////Checking for duplicate caption name/////////////////////////
					/////////////////////////////////////////////////////////////////////////////
				
				/////////////////////////////////////////////////////////////////////////////////////////
				 if(!isset($_SESSION['dup_caption']))
				 {
			 
			  $bn=stripslashes($_SESSION['naukri']);
			  mysql_query("update newsletter set email='".$_POST['email']."' where id='$bn'")or die(mysql_error());
			 $sess_msg="Member Details Updated Successfully";
	          $_SESSION['sess_msg']=$sess_msg;
			   header("Location: newsletter.php?subject=".$_REQUEST['subject']);
			  }
			   }
			  } 
			  
			  ?>
      </p>
      <p></p>
      <table width="100%" border="0" cellspacing="4" cellpadding="2">
        
        
        <tr>
          <td height="22" class="hometext"><div align="right" class="smalltext style1">
            <div align="right">Email :</div>
          </div></td>
          <td><input name="email" type="text" class="bodytext" id="cname" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['email']); else echo  stripslashes($email);?>"></td>
        </tr>
        <tr>
          <td width="28%" height="22">&nbsp;</td>
          <td width="72%"><input name="go" type="submit" class="button" id="go2" value="<? if(isset($_SESSION['naukri'])) echo  "Update"; else echo  "Add"?> member" onClick="return chk();"></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form></td>
  </tr>
  <tr>
    <td colspan="2"><? require_once("adfooter.php");?></td>
  </tr>
</table> 
</body>
</html>
<? ob_end_flush(); ?>