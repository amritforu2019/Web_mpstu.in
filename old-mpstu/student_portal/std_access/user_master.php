<?php 
require_once("../con_base/functions.inc.php");
validate_rolid_admin();
if(isset($_POST["upd"]))
{
$partyqry="update `admin_login` set  `user`='".$_POST["user"]."' ,`pass`='".enc($_POST["pass"])."' ,username='".$_POST["comp_name"]."' ,mob='".$_POST["cont"]."'  where `id`='".$_POST["edit"]."'";

if(mysqli_query($DB_LINK,$partyqry))
{
	?>
<script>
location.href="user_master";
</script>
<?php
}
}


if(isset($_POST["save"]))
{
 $partyqry="INSERT INTO `admin_login` set `username`='".$_POST["comp_name"]."' ,`user`='".$_POST["user"]."' ,`pass`='".enc($_POST["pass"])."' ,mob='".$_POST["cont"]."'";

if(mysqli_query($DB_LINK,$partyqry))
{
?>
<script>
location.href="user_master";
</script>
<?php  } } 


if(isset($_REQUEST['del']))
{
$arr=$_REQUEST['del'];
$qry="delete from admin_login where id=".$arr." and rolid!='3' ";
if(mysqli_query($DB_LINK,$qry))
{
?>
<script>
location.href='user_master';
</script>
<?php 
}
}

if($_REQUEST['edit']!='')
{
	$serchqry="select * from admin_login where id='".$_REQUEST['edit']."' ";
	$qs=mysqli_query($DB_LINK,$serchqry);
	$editrow=mysqli_fetch_array($qs);
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="modernizr.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
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
 
<title><?php echo $ADMIN_HTML_TITLE;?></title>
</head>
<body>
<?php include('header.php');?>
<div class="conten print">
  <h1>User Create / List</h1>
   <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer">
       <table class="print" width="60%" height="82" border="1"  cellpadding="5" cellspacing="0" align="center">
      <tr >
        <td    >User Name</td>
        <td   > 
          <input name="comp_name" type="text" class="validate[required] text-input textbox" id="comp_name"    value="<?php echo $editrow['username']; ?>"/>
          <input name="edit" type="hidden" class="textbox" id="edit"   value="<?php echo $editrow['id']; ?>"/></td>
        <td    >User ID</td>
        <td   colspan="2"  ><input name="user" type="text"   class="validate[required] text-input textbox" id="user" <?php if($editrow['user']!='')echo 'readonly="readonly" '; ?> value="<?php echo $editrow['user']; ?>" /></td>
      </tr>
      <tr >
        <td  >Password </td>
        <td  ><input name="pass"    type="text"  value="<?php echo dec($editrow['pass']); ?>" class="validate[required] text-input textbox" id="pass" /></td>
        <td  >Contact</td>
        <td colspan="2"  ><input name="cont" type="text" class="validate[required] text-input textbox" id="cont" value="<?php echo $editrow['mob']; ?>" /></td>
      </tr>
      <tr >
        <td height="36" colspan="6" ><center>
            <?php if($_REQUEST['edit']!='') { ?>
            <input name="upd" type="submit" class="subm" id="upd"  value="Update User : <?php echo $editrow['comp_name']; ?>"/>
            <?php } else { ?>
            <input name="save" type="submit" class="subm" id="save"  value="Save New User"/>
            <?php } ?>
          </center></td>
      </tr>
    </table>
  </form>
  <br />
     <table class="print" width="60%"  border="1"  cellpadding="5" cellspacing="0" align="center">
     
      <tr class="bg1">
        <td   ><span >SN</span></td>
        <td  ><span > Name</span></td>
        <td   >User Id</td>
        <td   >Password </td>
        <td   >Action</td>
      </tr>
      <?php 
			 
			 
			 $where= " where user not like  'amrit' and rolid!='3' ";
			 
						$serchqry="select * from admin_login $where ";
						$q=0;
						
							$qs=mysqli_query($DB_LINK,$serchqry);
							while($row=mysqli_fetch_array($qs))
							{
								$q=$q+1;
								/*if($row["pcode"]=='')
								{
									mysqli_query($DB_LINK,"update product set pcode='P-".$row["id"]."' where id='".$row["id"]."' ");
								}*/
								?>
      <tr>
        <td  ><?php echo $q ?></td>
        <td  ><?php echo $row["username"]?> [<?php echo $row["mob"]?>]</td>
        <td  ><?php echo $row["user"]?></td>
        <td  ><?php echo dec($row["pass"])?></td>
        <td  >
            <a title="Edit record" href="user_master?edit=<?php echo $row["id"];?>" >
                <i class="fas fa-edit color-slateblue"></i>
            </a>&nbsp;<a title="Delete Record" href="user_master.php?del=<?php echo $row["id"];?>" onClick="return del();">
                <i class="fas fa-trash-alt color-tomato"></i>
            </a></td>
      </tr>
      <?php
				}
			
				
						?>
    </table>
  
</div>
<?php include('footer.php');?>
</body>
</html>
