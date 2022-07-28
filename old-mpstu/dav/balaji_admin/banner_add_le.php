<? ob_start();
require_once("../config/functions.inc.php");
validate_admin(); 
include("fckeditor/fckeditor.php");
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
    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>
    <td width="750" align="center">
	<div id="mid">
	  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
	    <tr>
	      <td height="29" bgcolor="#FFFFFF"  class="li"><strong>
<div class="toplinks"> 
Manage Faculty</strong></td>
	      </tr>
	    <tr>
	      <td height="252" bgcolor="#FFFFFF">
          <form action="banner_add_le.php" method="post" enctype="multipart/form-data" name="form1">
	       
	        <strong>
<?

			 extract($_POST);	

			  if(isset($_GET['edit']))

			  {

			   $_SESSION['naukri']=stripslashes($_GET['edit']);

			   $ty=$_GET['edit'];

			    $qry=mysql_query("select * from bannerleft where  id='$ty'")or die(mysql_error());

			   $row=mysql_fetch_array($qry)or die(mysql_error());

			   }

			   

			     if(isset($_GET['yahoo'])|| isset($_POST['add']))

			  {

			  unset($_SESSION['naukri']);

			 

			  }

			  if(isset($_POST['go']))

			  {

	         

			  $burl=mysql_real_escape_string($_POST['burl']);

			  $alttag=mysql_real_escape_string($_POST['alttag']);

			  			   

			   if(isset($_SESSION['naukri']))

			   { 

			   require_once("bannerupdate_le.php");

			   }

			   else

			   { 


			   require_once("banneradd_le.php");

			   }

			   

			   }

			   

			   

			  

			  ?>
	        </strong>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
	         
  <tr>
    <td  colspan="3" class="articles"><strong>
<div class="red">
      <div align="center"><? echo $_SESSION['sess_msg'];  $_SESSION['sess_msg']='';?>
      </strong></td>
    </tr>
  <tr>
    <td align="left" valign="top" >
      <strong>
<input name="type" type="hidden" value="1">
	              
	              
      Upload Image :</strong></td>
    <td colspan="2"><strong>
<input name="uploaded_file" type="file" id="uploaded_file">
</strong></td>
</tr>
  <tr>
    <td align="left" valign="top" ><strong>Name :   </strong></td>
    <td width="72%" ><strong>
<input name="burl" type="text"  id="burl" value="<? if(isset($row['burl'])) echo $row['burl']; else echo $row['burl']; ?>" >
</strong></td>
    </tr>
     <tr>
     <td align="left" valign="top" ><strong>Designation : 
      </strong></td>
     <td colspan="2"><strong>
<input name="designation" type="text"  id="designation" value="<? if(isset($row['designation'])) echo $row['designation']; else echo $row['designation']; ?>">
</strong></td>
    </tr>
     <tr>
     <td align="left" valign="top" ><strong>Department. : 
      </strong></td>
     <td colspan="2">
<strong>
<select name="qualification"  >
<?
$country_qry=mysql_query("select * from category3  order by name asc")or die(mysql_error());
while($country_fetch=mysql_fetch_array($country_qry))
{
?>
<option style="font-size:16px" value="<? echo $country_fetch['name']?>" <? if($row['qualification']==$country_fetch['name'] ) echo "selected";?>><? echo normalall_filter($country_fetch['name'])?></option>

<? } ?>
</select>
</strong></td>
    </tr>
                 
     <tr>
       <td align="left" valign="top" ><strong>Qualification:
<?php /*?>  <? $oFCKeditor = new FCKeditor('alttag');
							   $oFCKeditor->BasePath = 'fckeditor/';
							   if(isset($row['alttag'])) $oFCKeditor->Value = stripslashes($row['alttag']); else $oFCKeditor->Value = stripslashes($alttag) ;
							   $oFCKeditor->Width  = '100%' ;
							   $oFCKeditor->Height = '350' ;
							   $oFCKeditor->Create();
							?><?php */?>
</strong></td>
<td colspan="2" ><strong>
<input name="alttag" type="text" id="alttag" value="<?  if(isset($row['alttag'])) echo $row['alttag']; else echo $row['alttag']; ?>
">
</strong></td>
</tr>
     <tr>
     <td align="left" valign="top" ><strong>Contact Details                 </strong></td>
     <td colspan="2"><strong>
<input name="classes" type="text" id="classes" value="<? if(isset($row['classes'])) echo $row['classes']; else echo $row['classes']; ?>">
</strong></td>
    </tr>
<tr>
<td align="left" valign="top" ><strong>Email Id :</strong></td>
<td colspan="2"><strong>
<input name="email" type="text" id="email" value="<? if(isset($row['email'])) echo $row['email']; else echo $row['email']; ?>">
</strong></td>
</tr>
<tr>
<td align="left" valign="top" ><strong>Date Of Birth :</strong></td>
<td colspan="2"><strong>
<input name="dob" type="text" id="dob" value="<? if(isset($row['dob'])) echo $row['dob']; else echo $row['dob']; ?>">
(yyyy-mm-dd)</strong></td>
</tr>
<tr>
  <td align="left" valign="top" >Area Of Interest</td>
  <td colspan="2"><strong>
  <input name="aoi" type="text" id="aoi" value="<? if(isset($row['aoi'])) echo $row['aoi']; else echo $row['aoi']; ?>">
  </strong></td>
</tr>
<tr>
<td align="left" valign="top" ><strong>Specialization of Subjects :</strong></td>
<td colspan="2"><strong>
  <input name="sos" type="text" id="sos" value="<? if(isset($row['sos'])) echo $row['sos']; else echo $row['sos']; ?>">
</strong></td>
</tr>
  <tr>
    <td width="28%" height="22">&nbsp;</td>
    <td colspan="2"><strong>
<input name="go" type="submit" class="button" id="go" value="Add Update Image" onClick="return val();" >
</strong></td>
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