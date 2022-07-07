<?php   include("../con_base/functions.inc.php"); 
if(isset($_GET['del']))
{
$arr=$_GET['del'];						
mysqli_query($DB_LINK,"delete from states_cities  where city_id='$arr'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="City  Deleted Successfully";
header("Location: city_list");
exit; 
}
if(isset($_GET['ban']))
{ 
mysqli_query($DB_LINK,"update states_cities set flag=0 where city_id=".$_GET['ban']);
$_SESSION['sess_msg']="Hide Successfully";
?><script>location.href="city_list?state_id=<?  echo $_GET['state_id']?>";</script><? exit;
}
if(isset($_GET['unban']))
{
mysqli_query($DB_LINK,"update states_cities set flag=1 where city_id=".$_GET['unban']);
$_SESSION['sess_msg']="Show Successfully";
?><script>location.href="city_list?state_id=<?  echo $_GET['state_id']?>";</script><? exit;
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>

<title><?php echo $ADMIN_HTML_TITLE;?></title>

<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
			$(".submit").click(function(){
				jQuery("#formID").validationEngine('validate');
			})
		});

		
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}

function load_page(val){ if(val!=0){	location.href='city_list.php?state_id='+val;	return false; } }
function load_page2(val){	if(val!='') { location.href='city_list.php?city='+val;	return false; } }

</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Add / Update City</h1>
  <form name="form1" method="post" action="city_add" id="formID" class="formular validationEngineContainer">
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="0" >

<tr>
<td width="36%" valign="top">
  <input name="cityser" type="text" class="textbox" id="cityser" placeholder="Search by City Name" value="<?=$_REQUEST['city']?>" ></td>
<td width="10%" valign="top"><input name="cityserch" type="button" class="subm" onClick="load_page2(cityser.value)" value="Search"></td>
<td width="33%" valign="top"><select name="state" id="state" class="textbox" onChange="load_page(this.value)">
  <option value="0">--Search By State--</option>
  <?php 
$sql="SELECT * FROM   states order by state";
$result =mysqli_query($DB_LINK,$sql);
 while($row=mysqli_fetch_array($result)) { 

?>
  <option value="<?=$row['state_id']?>" <?php if($row['state_id']==$_REQUEST['state_id']){?>selected<?php }?>><?php echo $row['state'];?></option>
  <? } ?>
</select></td>
<td width="9%" valign="top"><input name="cityserch2" type="button" class="subm" onClick="load_page2(this.value)" value="Search"></td>
<td width="12%" valign="top"><input name="gone" type="submit" class="subm" id="gone2" value="Add New City" ></td>
</tr>

<tr>
<td colspan="5" align="center" valign="top"><? echo $_SESSION['sess_msg']; $_SESSION['sess_msg']=''; ?>
<?
if(isset($_REQUEST['city']))
{
$df=trim($_REQUEST['city']);
$where="where city like '%$df%'";
}	 
else if(isset($_REQUEST['state_id']))
{
$df=trim($_REQUEST['state_id']);
$where="where state_id ='$df'";
}	  
else
{
$where="";
}
$start=0;
if(isset($_GET['start'])and $_GET['start']!='')$start=$_GET['start'];
$pagesize=50;
$state=$_REQUEST['state'];
$qry1=mysqli_query($DB_LINK,"select * from states_cities $where")or die(mysqli_error($DB_LINK));
$qry=mysqli_query($DB_LINK,"select * from states_cities $where order by city limit $start, $pagesize")or die(mysqli_error($DB_LINK));
$reccnt=mysqli_num_rows($qry1);
$i=$start+1;
$k=$i;
echo  stripslashes($_SESSION['sess_msg']); unset($_SESSION['sess_msg']); ?></td>
</tr>
<tr>
<td colspan="5" valign="top">

    <table width="85%" border="1" align="center" cellpadding="5" cellspacing="0" >
<tr class="bg1" >
<td  >SNo.</td>
<td  >Name</td>
<td    >State</td>

<!-- <td width="17%"  >Delivery_Charges</td>-->
<td align="center"   >Action</td><td  >SNo.</td>
<td  >Name</td>
<td    >State</td>

<!-- <td width="17%"  >Delivery_Charges</td>-->
<td align="center"   >Action</td>
</tr>
<tr >
<?
while($row=mysqli_fetch_array($qry)){ 
extract($row);
?>

<td align="left" bgcolor="#FFFFFF" >
<?  echo $i;?> .</td>
<td bgcolor="#FFFFFF" > <? echo  normal_filter($city);?></td>
<td  bgcolor="#FFFFFF" ><? $sql2="SELECT * FROM   states where state_id='$state_id'";
$result2 =mysqli_query($DB_LINK,$sql2);
$row2=mysqli_fetch_array($result2); 
echo $row2['state']; ?></td>

<td align="center"  bgcolor="#FFFFFF" >
    <?php if($_SESSION['master_mpstu_rolid']==3) { ?>
<a href="city_add.php?edit=<?  echo  $city_id?>" title="Edit ">
    <i class="fas fa-edit color-slateblue"></i>
</a>
<?  if($flag==0){?>
<a href="city_list?unban=<?  echo $city_id?>&state_id=<?  echo $state_id?>" title="Enable" >
    <i class="fas fa-exclamation-circle color-orange"></i>
</a>
<? }  else { ?>
<a href="city_list?ban=<?  echo $city_id?>&state_id=<?  echo $state_id?>" title="Disable" >
    <i class="fas fa-check-circle color-mediumseagreen"></i>
</a>
<? } ?>
    <a href="city_list.php?del=<?  echo  $city_id?>" onClick="return del();" title="Delete ">
        <i class="fas fa-trash-alt color-tomato"></i>
    </a>

    <?php } ?>

</td>

<? if($i%2==0) echo '</tr><tr>';  $i++;  }?>
</tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" ><?php include("../con_base/paging.inc.php"); ?></td>
</tr>
</table></td>
</tr>
</table>
</form>

</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>