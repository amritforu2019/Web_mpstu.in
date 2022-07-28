<?php   include("../con_base/functions.inc.php"); ?>
<?
if(isset($_GET['edit']))
{
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from states_cities  where city_id='$ty' ")or die(mysqli_error($DB_LINK));
$row=mysqli_fetch_array($qry);
 }

if(isset($_POST['go']))
{
mysqli_query($DB_LINK,"insert into states_cities set city='".addslashes($_POST['name'])."',del_charges='".addslashes($_POST['del_charges'])."', state_id= '".($_POST['state'])."'")or die(mysqli_error($DB_LINK));
$sess_msg="City Details Updated Successfully";
$_SESSION['sess_msg']=$sess_msg;
header("Location: city_list?state_id=".$_POST['state']);
exit;
}
if(isset($_POST['go2']))
{
$bn=stripslashes($_POST['edit']);
mysqli_query($DB_LINK,"update states_cities set city='".addslashes($_POST['name'])."' where city_id='$bn'")or die(mysqli_error($DB_LINK));
$sess_msg="City Details Updated Successfully";
$_SESSION['sess_msg']=$sess_msg;
header("Location: city_list?state_id=".$_POST['state']);
exit;
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

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Add /  Update City List</h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer">
    <table width="45%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td width="31%" height="22" >State Name :</td>
        <td width="69%"><select name="state" id="state" class="textbox validate[required] text-input" onChange="load_page(this.value)">
            <option value="">--Select State--</option>
            <?php 
$sql="SELECT * FROM   states order by state ";
$result =mysqli_query($DB_LINK,$sql);
 while($row2=mysqli_fetch_array($result)) { 

?>
            <option value="<?=$row2['state_id']?>" <?php if($row2['state_id']==$row['state_id']){?>selected<?php }?>><?php echo $row2['state'];?></option>
            <? } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td  >City name :</td>
        <td><input name="name" type="text" class="textbox validate[required] text-input"  id="cname" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['city']); else echo  stripslashes($city);?>" size="50"></td>
      </tr>
      <!-- <tr>

          <td height="22" ><div  >

            <div >Delivery Charges :</strong></div>

          </div></td>

          <td><input name="del_charges" type="text"  id="del_charges" size="50" value="<? if(isset($_GET['edit'] )) echo  stripslashes($row['del_charges']); else echo  stripslashes($del_charges);?>">
            Rs.</td>

        </tr>-->
      <tr>
        <td height="22" colspan="2" align="center"><?php if($_REQUEST['edit']!='') { ?>
          <input name="edit" type="hidden" id="edit" value="<?php echo $_REQUEST['edit'];?>">
          <input name="go2" type="submit" class="subm" id="go2" value="Update City" >
          <? }  else  { ?>
          <input name="go" type="submit" class="subm" id="go" value="Add City" >
          <? } ?></td>
      </tr>
    </table>
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>
