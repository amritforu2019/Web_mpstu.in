<?php   include("../con_base/functions.inc.php"); 
 
 
if(isset($_POST['pay']))

{

if($_POST['mode']=='cr')
{
	$prt=" Received Rs : ".$_POST['payamt']." on date ".date("Y-m-d")." ";
	$ttp=$_POST['ttyp'];
	$bnk=$_POST['bank'];
}
else 
{
	
	$prt=" Cash Returned Rs : ".$_POST['payamt']." on date ".date("Y-m-d")." ";
	$ttp='Cash';
	$bnk='';
}

$ins="INSERT INTO `leg_add_p`  set `member`='".$_POST['party']."' ,`typ` ='".$_POST['mode']."' ,`amt`='".$_POST['payamt']."' ,`dt`='".date("Y-m-d")."' ,`part`	='$prt' , ttyp='".$ttp."', bank='".$bnk."'	,parti= '".$_POST['parti']."'";




if(mysqli_query($DB_LINK,$ins))

{ ?>
<script> alert('Amount Paid successfully')
 location.href='provider_summ?id=<?=$_POST['party']?>';
 </script>
<?

	

	exit;

}

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
	
function change_page1(val){ location.href='provider_credit?id='+val; return false; } 



</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Service Provider  Wallet Credit</h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer">
    <table width="60%"   border="1" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="8" align="center"   valign="top" bgcolor="#FFFFFF" > Select Provider Name
          <select name="party" id="party"  onchange="javascript:change_page1(this.value)"  >
            <option value="">..Select..</option>
            <?php
    $qry=mysqli_query($DB_LINK,"select * from  reg where r_typ='service' order by id desc");
	while($r=mysqli_fetch_array($qry))
	{?>
            <option value="<?php echo $r["id"];?>"
	<?php if($_REQUEST['id']==$r['id']) echo 'selected'; ?> ><?php echo $r["name"]?> [ <?php echo $r["email"]?> ] [<?php echo $r["contact"]?> ]</option>
            <?php } ?>
          </select></td>
      </tr>
      <?  global $inco,$expe;

$q=mysqli_query($DB_LINK,"SELECT * FROM `leg_add_p` where member='".$_REQUEST['id']."' order by id asc ");

while($row=mysqli_fetch_array($q))

{

extract($row);

$i++;



 ?>
      <? if($row['typ']=='dr') { $expe+=$row['amt'];  } ?>
      <? if($row['typ']=='cr') { $inco+=$row['amt'];  }  ?>
      <? $final=($inco-$expe)?>
      <?



 }



?>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">Total Balance In Account </td>
        <td width="52%" align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><? echo 'Rs. '.($final).'/-';?></td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">Transaction Mode</td>
        <td align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><select name="mode" id="mode"    >
            <option value="cr">Credit</option>
            <option value="dr">Debit</option>
          </select></td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">Transaction Type</td>
        <td align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><select name="ttyp" id="ttyp"    >
            <option value="Cash">In Cash</option>
            <option value="Bank">In Bank</option>
          </select></td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">( if Bank Select Bank Name )</td>
        <td align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><select name="bank" id="bank"  >
            <option value="">..Select..</option>
            <?php
    $qry=mysqli_query($DB_LINK,"select * from bank");
	while($r=mysqli_fetch_array($qry))
	{?>
            <option value="<?php echo $r["name"]?> [<?php echo $r["contact"]?>]"><?php echo $r["name"]?> [<?php echo $r["contact"]?>] </option>
            <?php } ?>
          </select></td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">Particulars</td>
        <td align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><input name="parti" type="text" id="parti" style="width:250px;"    /></td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">Pay Amount</td>
        <td align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><input name="payamt" type="text" id="payamt" style="width:250px;"    /></td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;"></td>
        <td align="left"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><input name="pay" type="submit" class="subm" id="pay" value="Pay" onClick="retuen del()" /></td>
      </tr>
    </table>
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>
