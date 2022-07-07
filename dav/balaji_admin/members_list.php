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

</script></head>



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

                <td height="30" colspan="2" bgcolor="#0c5994" class="heading"><strong>Manage Members</strong> </td> 

              </tr>

              <tr>

                <td height="49" bgcolor="#FFFFFF"><?  			

				$start=0;

if((isset($_GET['start']))&&($_GET['start']!="")) $start=$_GET['start'];

$pagesize=15;

if(isset($_GET['pagesize'])) $pagesize=$_GET['pagesize'];

if(isset($_GET['list']))

{

	

}

if(isset($_POST['searchid']))

{

	

	$_SESSION['searchitem']=$_POST['search'];

	

}

if(isset($_SESSION['searchitem']))

{

	$where="where id='".$_SESSION['searchitem']."'";

}

else 

$where="";

				

				$result1=mysql_query("select * from members $where order by name asc ");

				$result=mysql_query("select * from members $where order by name asc limit $start, $pagesize");

				$reccnt=mysql_num_rows($result1); 

				if($reccnt!=0){ ?>

                    <br>

                    <form name="form1" method="post" action="members_list.php">

                      <table width="98%" border="0" align="center" cellpadding="1" cellspacing="1" class="table">

                        <tr>

                          <td colspan="8" align="center" class="correct"></td>

                        </tr>

                        <tr>

                          <td colspan="8" align="center" class="correct"><!--<table width="95%" border="0">

                              <tr>

                                <td width="25%" class="headlinks">Search by id : </td>

                                <td width="27%"><input name="search" type="text" class="bodytext" id="search"></td>

                                <td width="48%"><input name="searchid" type="submit" class="button" id="searchid" value="Search Member"></td>

                              </tr>

                          </table>--></td>

                        </tr>

                        <tr>

                          <td colspan="8" align="center" class="correct"><? echo stripslashes($_SESSION['sess_msg']); ?></td>

                        </tr>

                        <tr bgcolor="#EBEBEB" class="tiltetbl">

                          <td width="10%" height="25" align="center" bgcolor="#ADD8F8" class="toplinks"><strong>&nbsp;&nbsp;SNo. </strong></td>

                          <td width="30%" height="25" bgcolor="#ADD8F8" class="toplinks"><strong>&nbsp;&nbsp;Name</strong></td>

                          <td height="25" bgcolor="#ADD8F8" class="toplinks"><strong>&nbsp;&nbsp;Contact Number </strong></td>

                          <td width="25%" bgcolor="#ADD8F8" class="toplinks"><strong>&nbsp;&nbsp;Email</strong></td>

                          <td height="25" align="center" bgcolor="#ADD8F8" class="toplinks"><strong>&nbsp;Action</strong></td>

                        </tr>

                        <?
                if($_REQUEST['start']=='')
				{
				$i=0;
				}
				if($_REQUEST['start']!='')
				{
				$i=$_REQUEST['start'];
				}

				while($row=mysql_fetch_array($result))

				{
                  $i++;
				extract($row);

				?>

                        <tr bgcolor="#F2F2F2" class="smalltext">

                          <td height="25" align="center" class="bodytext">&nbsp;&nbsp;<?  echo $i;?></td>

                          <td height="25" class="bodytext">&nbsp;&nbsp;<? echo "$name"?> </td>

                          <td class="bodytext">&nbsp;&nbsp;<? echo "$mobile";?> </td>

                          <td class="bodytext">&nbsp;&nbsp;<? echo "$email";?></td>

                          <td align="center" class="bodytext"><a href="viewprofile.php?id=<?  echo $id?>" target="_blank"><img src="images/but_view_small.gif" alt="View Profile" width="22" height="22" border="0"></a>  

                              <? if($status==0) { ?>

                              <a href="ban.php?p=<?  echo $id?>&start=<? echo $_REQUEST['start']?>"><img src="images/but_unban_small.gif" alt="Activate Member" width="22" height="22" border="0"></a>

                              <? } else { ?>

                              <a href="ban.php?q=<?  echo $id?>&start=<? echo $_REQUEST['start']?>"><img src="images/but_ban_small.gif" alt="Deactivate Member" width="22" height="22" border="0"></a>

                              <? } ?>

                              <a href="ban.php?d=<?  echo $id?>&start=<? echo $_REQUEST['start']?>" onClick="return del();"><img src="images/but_delete_small.gif" alt="Delete Member" width="22" height="22" border="0"></a>   </td>

                        </tr>

                        <?

					

				}

				

				

				

				?>

                      </table>

                    </form>

                  <? }  else

				{?>

                    <div align="center"><span class="red">No Members LIst 

                      Available.....</span>

                        <?

				}?>

                    </div>

                  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">

                      <tr>

                        <td align="center"><?php include("../config/paging.inc.php"); ?>

                        </td>

                      </tr>

                  </table></td>

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