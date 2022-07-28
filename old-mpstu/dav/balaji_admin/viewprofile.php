<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
$qry=mysql_query("select * from members where id='".$_REQUEST['id']."'")or die(mysql_error("This Member is Detected")); 
$row=mysql_fetch_array($qry);
extract($row);
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
		 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#0c5994">
              <tr>
                <td height="30" colspan="2" bgcolor="#0c5994" class="heading"><strong>Members Full Profile : </strong> </td> 
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:25px"> 
                       <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="text2">
                           <!-- <tr>
                              <td class="boldlisting"><strong>Member Id </strong></td>
                              <td class="boldlisting"><div align="center">:</div></td>
                              <td class="bodytext"><? echo "$id";?></td>
                            </tr> -->
                            <tr>
                              <td width="24%" class="boldlisting"><strong>Name </strong></td>
                              <td width="7%" class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td width="69%" class="bodytext"><? echo $name;?></td>
                            </tr>
                            <tr>
                              <td class="boldlisting"><strong>Password</strong></td>
                              <td class="boldlisting"><div align="center">:</div></td>
                              <td class="bodytext"><? echo $password;?></td>
                            </tr>
                            <tr>
                              <td class="boldlisting"><strong>Gender </strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $gender;?></td>
                            </tr>
                            <tr>
                              <td class="boldlisting"><strong>Age</strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $age;?></td>
                            </tr>
                            <tr>
                              <td class="boldlisting"><strong>Email id </strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><a href="mailto:<? echo $email;?>" style="color:#000;"><? echo $email;?></a></td>
                            </tr> 
                            <tr>
                              <td class="boldlisting"><strong>Contact  No. </strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $mobile;?></td>
                            </tr>
							<tr>
                              <td class="boldlisting"><strong>Residence Location</strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $r_location;?></td>
                            </tr> 
							<tr>
                              <td class="boldlisting"><strong>Highest Qualification</strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $qualification;?></td>
                            </tr>  
                            <tr>
                              <td class="boldlisting"><strong> Field of Interest</strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $interest;?></td>
                            </tr>
                            <tr>
                              <td class="boldlisting"><strong>Desired Course</strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $course;?></td>
                            </tr>
                            <tr>
                              <td class="boldlisting"><strong> Preferred Study Location</strong></td>
                              <td class="boldlisting"><div align="center"><strong>: </strong></div></td>
                              <td class="bodytext"><? echo $location;?></td>
                            </tr> 
                        </table>
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