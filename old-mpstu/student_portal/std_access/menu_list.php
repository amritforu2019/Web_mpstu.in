<?php   include("../con_base/functions.inc.php"); 

if(isset($_GET['del']))
{
$arr=$_GET['del'];
if(mysqli_num_rows(mysqli_query($DB_LINK,"select id from tbl_menu where parent='$arr'"))!=0)
{
$_SESSION['sess_msg']="First Delete sub-menu linked with this menu";
header("Location: menu_list?parent=".$_REQUEST['parent']); exit;
}
else
{
 
mysqli_query($DB_LINK,"delete from tbl_menu where id='$arr'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Menu Deleted Successfully";
header("Location: menu_list?parent=".$_REQUEST['parent']);exit;
} }

if(isset($_GET['ban']))
{
mysqli_query($DB_LINK,"update tbl_menu set status=0 where id=".$_GET['ban']);
$sess_msg="Menu  banned Successfully";
$_SESSION['sess_msg']=$sess_msg;
header("Location: menu_list?parent=".$_REQUEST['parent']);exit;
}

if(isset($_GET['unban']))
{
mysqli_query($DB_LINK,"update tbl_menu set status=1 where id=".$_GET['unban']);
$sess_msg="Menu  Unbanned Successfully";
$_SESSION['sess_msg']=$sess_msg;
header("Location: menu_list?parent=".$_REQUEST['parent']); exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<title>Menu Manager</title>
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
function load_page(val){ location.href='menu_list?parent='+val;	return false; }
	</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Change / Update Menu  </h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer">
    <?php
if(isset($_REQUEST['parent']))
    $where=" where parent='".$_REQUEST['parent']."'  ";
 else if(!isset($_REQUEST['parent']))
     $where="where parent=0";
 //echo "select * from menu   $where order by name asc";
 $q=mysqli_query($DB_LINK,"select * from tbl_menu   $where order by name asc");
 $count=mysqli_num_rows($q);

				 ?>
    <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="32">
            <select name="country" class="textbox" onChange="javascript:load_page(this.value);">
            <option value="0">Select Menu</option>
            <?php $country_qry=mysqli_query($DB_LINK,"select * from tbl_menu where parent=0 order by name asc")or die(mysqli_error($DB_LINK));
                   while($country_fetch=mysqli_fetch_array($country_qry))
                   {
					?>
            <option value="<?php echo $country_fetch['id']?>" <?php if(isset($_REQUEST['parent'])) if($_REQUEST['parent']==$country_fetch['id']) echo "selected"; ?>><?php echo normalall_filter($country_fetch['name'])?></option>
            <?php  } ?>
          </select></td>
        <td width="20%" valign="top">
        <?php if(isset($_REQUEST['parent'])) {
            if( $_REQUEST['parent']!=0) { ?>
            <input name="gone" type="button" class="subm" id="gone" value="Add New "
                   onClick="javascript:window.location.href='menu_add?parent=<?php echo $_REQUEST['parent']?>&back=menu_list?parent=<?php echo $_REQUEST['parent']?>'" />
        <?php } else{ ?> <!--  <input name="gone" type="button" class="subm" id="gone" value="Add New" onClick="javascript:window.location.href='menu_add?parent=<?php /*echo $_REQUEST['parent']*/?>'" />
        --><?php } }?>     </td>
      </tr>
    </table>
    <?php if($count!=0) { ?>
    <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="table">
      <tr>
        <td colspan="8" align="center" class="correct"><div align="center">
                <?php if(isset( $_SESSION['sess_msg'])) { echo stripslashes($_SESSION['sess_msg']);
        unset($_SESSION['sess_msg']); } ?></div></td>
      </tr>
      <tr   >
        <td  bgcolor="#add8f8" >SNo.</td>
        <td bgcolor="#add8f8" >  Name </td>

        <td  align="center" bgcolor="#add8f8" >Action</td>
        <td  bgcolor="#add8f8" >SNo.</td>
        <td  bgcolor="#add8f8" >  Name </td>
        <td  align="center" bgcolor="#add8f8" >Action</td>
      </tr> <tr>
      <?php $i=1; while($row=mysqli_fetch_array($q)) { extract($row); ?>
     
        <td align="left" valign="top" bgcolor="#FFFFFF" ><?php  echo $i;?>
        </td>
        <td valign="top" bgcolor="#FFFFFF" >
                <a href="menu_list?parent=<?php  echo normal_filter($id);?>">
                    <?php  echo normal_filter($name);?> (<?php echo get_child_count(normal_filter($id));?>)
                </a>
        </td>

        <td align="center" valign="top" bgcolor="#FFFFFF" >
        
        
        <?php if($row['parent']!='0') { ?>
        <a href="menu_add?edit=<?php  echo $id?>&parent=<?php echo $parent;?>&back=menu_list?parent=<?php echo $parent;?> ">
            <i class="fas fa-edit color-slateblue"></i>
        </a>
        
       

          <?php  if($status==0){?>
          <a href="menu_list?unban=<?php  echo $id?>&parent=<?php echo $parent;?>" >
              <i class="fas fa-exclamation-circle color-orange"></i>
          </a>
          <?php }  else { ?>
          <a href="menu_list?ban=<?php  echo $id?>&parent=<?php echo $parent;?>" >
              <i class="fas fa-check-circle color-mediumseagreen"></i>
          </a>
          <?php }  }  ?>
            <a href="menu_list?del=<?php  echo $id?>&parent=<?php echo $parent;?>" onClick="return del();">
                <i class="fas fa-trash-alt color-tomato"></i>
            </a>
      </td>
      
      <?php if($i%2==0) echo '</tr><tr>'; $i++;} ?></tr>
    </table>
    <?php }  else {?>
    <div align="center">Currently No Menu Available in this parent menu ..</span>
      <?php }?>
    </div>
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<?php ob_end_flush(); ?>
