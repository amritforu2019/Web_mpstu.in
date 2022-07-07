<?php   include("../con_base/functions.inc.php"); 
if(isset($_GET['edit']))
 {
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from tbl_menu where id='$ty' ")or die(mysqli_error($DB_LINK));
 $row=mysqli_fetch_array($qry);
 }
if(isset($_POST['go']))
{
if($_POST['parent']!='0') {
    mysqli_query($DB_LINK, "insert into tbl_menu set 
parent='" . $_POST['parent'] . "', 
name='" . $_POST['name'] . "', 
url='" . $_POST['url'] . "'
") or die(mysqli_error($DB_LINK));
    $_SESSION['sess_msg'] = "Menu Added Successfully";
    header("Location:menu_list?parent=" . $_POST['parent']);
    exit;
}
else
{
    $_SESSION['sess_msg'] = "Sorry Menu not added";
    header("Location:menu_add?parent=" . $_POST['parent']."&back=menu_list?parent=". $_POST['parent']);
    exit;
}
}
  if(isset($_POST['go2']))
{


$i=0;
 
while($i < count($_POST['dur']))
{
if($_POST['dur'][$i]!="")
{
 
  $q=mysqli_query($DB_LINK,"select * from package  where tbl_menu='".$_POST['edit']."' and id='".$_POST['piid'][$i]."'  "); 
$count=mysqli_num_rows($q);
if($count>0)
{
 $rowgg=mysqli_fetch_array($q);
   
 mysqli_query($DB_LINK,"update package set  title='".$_POST['dur'][$i]." Days',  descr='".$_POST['amt'][$i]."',   days='".$_POST['dur'][$i]."' where  tbl_menu='".$_POST['edit']."' and id='".$_POST['piid'][$i]."'  ")or die(mysqli_error($DB_LINK));
}
else
{
  
  
 mysqli_query($DB_LINK,"insert into package set  title='".$_POST['dur'][$i]." Days', posted_on=now(),  descr='".$_POST['amt'][$i]."',  status=1 ,days='".$_POST['dur'][$i]."',tbl_menu='".$_POST['edit']."',tbl_menu_main='".$_POST['country']."'")or die(mysqli_error($DB_LINK));
 }
}
$i=$i+1;
}




require_once("uploader.php");
if(isset($_FILES['uploaded_file']))
 { upload("../upload/tbl_menu/");  if($finame!="") { 
 $rw=mysqli_query($DB_LINK,"select * from tbl_menu where id='".$_POST['edit']."'");
 $rw1=mysqli_fetch_array($rw)or die(mysqli_error($DB_LINK));
 $x=$rw1['imname'];
 unlink("../upload/tbl_menu/".$x);
 
  // "update tbl_menu set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' ,  imname='$finame', show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' , amt12='".$_POST['amt12']."' , amt3='".$_POST['amt3']."' , amt6='".$_POST['amt6']."' where id='".$_POST['edit']."'";
 
   
 $q=mysqli_query($DB_LINK,"update tbl_menu set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' ,  imname='$finame', show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."',on_dt='".date("Y-m-d")."'   where id='".$_POST['edit']."'")or die(mysqli_error($DB_LINK));
 header("Location: tbl_menu_list?parent=".$_POST['country']); exit;
 } else {
 $q=mysqli_query($DB_LINK,"update tbl_menu set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."'  ,  show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."',on_dt='".date("Y-m-d")."'  where id='".$_POST['edit']."'")or die(mysqli_error($DB_LINK));
 $_SESSION['sess_msg']="Category Updated Successfully";
 header("Location: tbl_menu_list?parent=".$_POST['country']); exit ;
		} } }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<style type="text/css">
.tetbx {
    margin-bottom: 5px;
    background: #FFF;
    color: #000000;
    font-size: 14px;
    border: 1px solid #CCC;
    padding: 5px;
    border-radius: 2px;
    width: 45%;
	}
</style>
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
  <h1>Add / Update Menu Category</h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer" enctype="multipart/form-data">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
            <td colspan="8" align="center" class="correct"><div align="center">
                    <?php if(isset( $_SESSION['sess_msg'])) { echo stripslashes($_SESSION['sess_msg']);
                        unset($_SESSION['sess_msg']); } ?></div></td>
        </tr>
      <tr>
        <td width="36%" bgcolor="#D7D5FF" >Select Parent  : </td>
   <td width="64%" bgcolor="#D7D5FF" >  <select name="parent" class="textbox" id="parent">
           <option value="0">Select Menu</option>
           <?php $l1_qry=mysqli_query($DB_LINK,"select * from tbl_menu where parent=0 order by name asc")or die(mysqli_error($DB_LINK));
           while($l1_data=mysqli_fetch_array($l1_qry))
           {
               ?>
               <option value="<?php echo $l1_data['id']?>" <?php if(isset($_REQUEST['parent'])) if($_REQUEST['parent']==$l1_data['id']) echo "selected"; ?>><?php echo normalall_filter($l1_data['name'])?></option>
           <?php $l2_qry=mysqli_query($DB_LINK,"select * from tbl_menu where parent='".$l1_data['id']."' order by name asc")or die(mysqli_error($DB_LINK));
           while($l2_data=mysqli_fetch_array($l2_qry))
           { ?>
               <option value="<?php echo $l2_data['id']?>" <?php if(isset($_REQUEST['parent'])) if($_REQUEST['parent']==$l2_data['id']) echo "selected"; ?>>--<?php echo normalall_filter($l2_data['name'])?></option>

           <?php   }} ?>
       </select></td>
      </tr>
      <tr>
        <td bgcolor="#D7D5FF" >
            Name  :          
           </td>
       <td bgcolor="#D7D5FF">
           <input name="name" type="text" class="textbox validate[required] text-input"  id="name" value="<?php if(isset($_GET['edit'] )) echo $row['name'];  else if(isset($_POST['name'])) echo stripslashes($_POST['name'])	;?>" size="50" /></td>
      </tr>
        <tr>
            <td bgcolor="#D7D5FF" >
                URL  :
            </td>
            <td bgcolor="#D7D5FF">
                <input name="url" type="text" class="textbox validate[required] text-input"  id="url" value="<?php if(isset($_GET['edit'] )) echo $row['url'];  else if(isset($_POST['url'])) echo stripslashes($_POST['url'])	;?>" size="50" /></td>
        </tr>

      <tr>
        <td height="22" colspan="2" align="center"><?php if(isset($_REQUEST['edit'])) { ?>
          <input name="edit" type="hidden" id="edit" value="<?php echo $_REQUEST['edit'];?>" />
          <input name="go2" type="submit" class="subm" id="go2" value="Update Menu : <?php echo   $row['name'];?> " />
          <?php }  else  { ?>
          <input name="go" type="submit" class="subm" id="go" value="Add New Menu" />
          <?php } ?>        </td>
      </tr>
    </table>
   <p>&nbsp;</p>
   
 
   
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<?php ob_end_flush(); ?>
