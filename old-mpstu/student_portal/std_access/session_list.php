<?php   include("../con_base/functions.inc.php"); if(isset($_GET['del']))
				{
						$arr=$_GET['del'];						
						mysqli_query($DB_LINK,"delete from tbl_session  where id='$arr'")or die(mysqli_error($DB_LINK));
						$sess_msg="Session   Deleted Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: session_list");
						exit; 
				}
					if(isset($_GET['ban']))
					{
						mysqli_query($DB_LINK,"update tbl_session  set status=0 where id=".$_GET['ban']);
						$sess_msg="Session  Suspended Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: session_list");
						exit;
					}
					if(isset($_GET['unban']))
					{
						mysqli_query($DB_LINK,"update tbl_session set status=1 where id=".$_GET['unban']);                       mysqli_query($DB_LINK,"update tbl_session set status=0 where id!=".$_GET['unban']);
						$sess_msg="Session  Activated Successfully";
						$_SESSION['sess_msg']=$sess_msg;
						header("Location: session_list");
						exit;
					}?>
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
  <h1>Session  Management</h1>
  <form name="form1" method="post" action="session_add" id="formID" class="formular validationEngineContainer">
    <table width="65%" border="0" align="center" cellpadding="5" cellspacing="0" class="table">
      <tr>
        <td colspan="5" align="right" ><input name="gone" type="submit" class="subm" id="gone2" value="Add More" onClick="location.href='session_add'" />
          &nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="center" ><div align="center"><? echo  stripslashes($_SESSION['sess_msg']); unset($_SESSION['sess_msg']); unset($_SESSION['errorclass']);?></div></td>
      </tr>
    </table>
      <table width="65%" border="1" align="center" cellpadding="5" cellspacing="0" class="table">
      <tr   class="bg1">
        <td   >SNo.</td>
        <td   >Session</td>
       <td    >Posted on</td>
        <td    >Action</td>
      </tr>
      <?php
				 
				  $q=mysqli_query($DB_LINK,"select * from tbl_session    order by id asc"); 
				  $count=mysqli_num_rows($q);
				  if($count!=0)
				  {
				  
				$i=1;
				while($row=mysqli_fetch_array($q))
				{
				extract($row);
				?>
      <tr bgcolor="#F2F2F2" class="textli">
        <td align="center" bgcolor="#FFFFFF" class="bodytext"><?php echo  $i;?></td>
        <td bgcolor="#FFFFFF" class="bodytext"><?php if(strlen(normal_filter($title))>30) { echo  substr(normal_filter($title),0,30)."...";} else { echo  normal_filter($title);}?></td>
       <td  bgcolor="#FFFFFF" class="bodytext"><?php echo date_dm($posted_on);?></td>
        <td  bgcolor="#FFFFFF" class="bodytext">
            <?php if($_SESSION['master_mpstu_rolid']==3) { ?>
            <a href="session_add?edit=<php  echo  $id?>" title="Edit ">
                <i class="fas fa-edit color-slateblue"></i>
            </a>

          <?php if($status==0){?>
          <a href="session_list?unban=<?  echo  $id?>" title="Activate Now" >
              <i class="fas fa-exclamation-circle color-orange"></i>
          </a>
          <?php }
						  else { ?>

        <a href="session_list?ban=<?php  echo  $id?>" title="Suspend " >
            <i class="fas fa-check-circle color-mediumseagreen"></i>
        </a>
          <?php } ?>
            <a href="session_list?del=<?  echo  $id?>" onClick="return del();" title="Delete ">
                <i class="fas fa-trash-alt color-tomato"></i>
            </a>
            <?php } ?>
            </td>
      </tr>
      <?php
					$i++;
				} 
				?>
      <?php }   else { ?>
      <tr bgcolor="#F2F2F2" class="textli">
        <td colspan="4" align="center" bgcolor="#FFFFFF" class="bodytext"> Currently No Data  Available, Please <a href="session_add" class="headlinks">Add First</a></td>
      </tr>
      <?php }   ?>
    </table>
 </form>
</div>
<?php include('footer.php'); ?>
</body>
</html>
<? ob_end_flush(); ?>
