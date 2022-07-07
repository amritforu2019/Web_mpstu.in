<?php   include("../con_base/functions.inc.php"); 
 


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
	
function change_page1(val)

{

location.href='provider_summ?id='+val;

return false;

}

</script>
</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Agent Wallet Summary</h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer">
    <table width="100%"   border="1" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="8" align="left"   valign="top" bgcolor="#FFFFFF" >Select Customer Name
          <select name="party" id="party"  onchange="javascript:change_page1(this.value)"  >
            <option value="">..Select..</option>
            <?php
    $qry=mysqli_query($DB_LINK,"select * from reg where r_typ='service' order by id desc");
	while($r=mysqli_fetch_array($qry))
	{?>
            <option value="<?php echo $r["id"];?>"
	<?php if($_REQUEST['id']==$r['id']) echo 'selected'; ?> ><?php echo $r["name"]?> [ <?php echo $r["email"]?> ] [<?php echo $r["contact"]?> ]</option>
            <?php } ?>
          </select>
          <input name="Search" type="button" class="subm" id="Search" value="Search" /></td>
      </tr>
      <tr>
        <td  align="left"   valign="top" bgcolor="#045294" style="color:#fff;">S.N.</td>
        <td   align="left"   valign="top" bgcolor="#045294"  style="color:#fff; ">Date</td>
        <td  align="left"   valign="top" bgcolor="#045294"  style="color:#fff;">Member Name</td>
        <td   align="left"   valign="top" bgcolor="#045294"  style="color:#fff;">Member Id</td>
        <td  align="left"   valign="top" bgcolor="#045294"  style="color:#fff;">Narration</td>
        <td  align="right"   valign="top" bgcolor="#045294"  style="color:#fff;">Debit</td>
        <td   align="right"   valign="top" bgcolor="#045294"  style="color:#fff;">Credit</td>
        <td   align="right"   valign="top" bgcolor="#045294"  style="color:#fff;">balance</td>
      </tr>
      <?  global $inco,$expe;

$q=mysqli_query($DB_LINK,"SELECT * FROM `leg_add_p` where member='".$_REQUEST['id']."' order by id asc ");

while($row=mysqli_fetch_array($q))

{

extract($row);

$i++;



 ?>
      <tr>
        <td align="left"   valign="top" bgcolor="#FFFFFF" style="color:#000;"><? echo $i;?></td>
        <td align="left"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><strong><? echo date("d M Y", strtotime($row['dt']));?></strong></td>
        <td align="left"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><? echo $row['name'];?></td>
        <td align="left"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><? echo $row['member'];?></td>
        <td align="left"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><? 



if($row['name']=='') {				  



$di=mysqli_query($DB_LINK,"SELECT * FROM  reg where id='".$row['member']."' ");	



$rowm=mysqli_fetch_array($di);





mysqli_query($DB_LINK,"update `leg_add_p` set `name`='".$rowm['name']."' where id='".$row['id']."' ");



 } 
if($row['typ']=='cr') {
 if($row['ttyp']=='Bank') {	 echo 'By Bank '.$row['bank'];} else { echo 'By cash';}
}
 echo $row['part'];  
 echo $row['parti'];



				  



				  ?></td>
        <td align="right"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><? if($row['typ']=='dr') { $expe+=$row['amt']; echo 'Rs. '.$row['amt'].'';  }else echo '--'; ?></td>
        <td align="right"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><? if($row['typ']=='cr') { $inco+=$row['amt']; echo 'Rs. '.$row['amt'].''; }else echo '--';  ?></td>
        <td align="right"   valign="top" bgcolor="#FFFFFF"  style="color:#000;"><? echo 'Rs. '.($inco-$expe).'';?></td>
      </tr>
      <?



 }



?>
      <tr>
        <td align="left"   valign="top" bgcolor="#CAD5FF" style="color:#000;">&nbsp;</td>
        <td align="left"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">&nbsp;</td>
        <td align="left"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">&nbsp;</td>
        <td align="left"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">&nbsp;</td>
        <td align="left"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">Total</td>
        <td align="right"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">Rs. <? echo $expe; ?></td>
        <td align="right"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">Rs. <? echo $inco;  ?></td>
        <td align="right"   valign="top" bgcolor="#CAD5FF"  style="color:#000;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="7" align="right"   valign="top" bgcolor="#FFFF99" style="color:#000;">Total Balance In Account </td>
        <td align="right"   valign="top" bgcolor="#FFFF99"  style="color:#000;"><? echo 'Rs. '.($inco-$expe).'';?></td>
      </tr>
    </table>
  </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>
