<? ob_start();
require_once("../config/functions.inc.php");
validate_admin();
include("../verification_image.class.php");
if(isset($_POST['go']))
{
	$image = new verification_image();
				if (($image->validate_code($_POST['verification']))==false) 
				{
				$_SESSION['sess_msg']="* Enter Capta Properly";
				
				}
				else
				{	
		require_once("../uploader1.php"); 
		if(isset($_FILES['uploaded_file1']))
		{
			upload1("../upload/pro/");
			$img1=$finame; 
        }	
		
		if(isset($_FILES['uploaded_file2']))
		{
			upload2("../upload/pro/");
			$img2=$finame; 
        }	
		
		if(isset($_FILES['uploaded_file3']))
		{
			upload3("../upload/pro/");
			$img3=$finame; 
        }	
		
		if(isset($_FILES['uploaded_file4']))
		{
			upload4("../upload/pro/");
			$img4=$finame; 
        }	
		
						 
							
					if(mysql_query("INSERT INTO `prop` set `pfor` ='".$_POST['pfor']."',`pcat`='".$_POST['pcat']."' ,`area` ='".$_POST['area']."',`price` ='".$_POST['price']."',
`pface`='".$_POST['pface']."' ,`pimg1`='".$img1."' ,`pimg2`='".$img2."' ,`pimg3`='".$img3."' ,`pimg4` ='".$img4."',`pdes`='".$_POST['pdes']."' ,`punit`='".$_POST['punit']."' ,
`pmes`='".$_POST['pmes']."' ,`paddr`='".$_POST['paddr']."' ,`pstat`='".$_POST['state']."' ,`pcity` ='".$_POST['pcity']."',`cname` ='".$_POST['cname']."',`cemail`='".$_POST['cemail']."' ,
`caddr` ='".$_POST['caddr']."',`cstat` ='".$_POST['cstat']."',`cmob`='".$_POST['cmob']."' ,`flag`='0' ,`dt`=now()"))
{	
	
?><script>alert('Property Posted Successful');</script><?
	 					header("Location:list.php");	
}
				}
}
	

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
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
		<form name="Post_Property" method="post" action=""    ENCTYPE="multipart/form-data">
        	<table width="100%" align="center" cellpadding="5" cellspacing="0" class="bdrAll w100">

								<tr><td width="48%" >Property For &nbsp;</td><td width="62%" >
						          <select name='pfor'   id='dynFrm_property_category'   class='textbox'   >
							         
							          <option value='Sell' >Sell</option>
							          <option value='Rent / Lease' >Rent / Lease</option>
							        
						          </select></td></tr>
								<tr><td >Property Category </td><td ><select name='pcat'   id='r_please-select-property-category.'   class='textbox'   >
		
		<option value='Commercial Property' >Commercial Property</option>
		<option value='Industrial Property' >Industrial Property</option>
		<option value='Agriculture Land' >Agriculture Land</option>
		<option value='Residential Property' >Residential Property</option></select>
							</td></tr>
								<tr>
								  <td >Area  &nbsp;*</td><td ><input name='area' type='text'    class='textbox' id="area"  value=''   size='35' maxlength="90"     /> 
							</td></tr>
								<tr><td >Price <b class="star">*</b> &nbsp;</td><td ><input type='text' name='price'  value=''   size='35' maxlength="90"    class='textbox'      id='price'    /> 
							</td></tr>
								<tr><td >Property Facing &nbsp;</td><td ><input name='pface' type='text'    class='textbox' id="pface"  value=''   size='35' maxlength="90"        /> 
							</td></tr>
								<tr>
								  <td >Property Image &nbsp;1 *</td><td ><input name='uploaded_file1' type='file' class="textbox" id="uploaded_file1"    /> 
							</td></tr>
								<tr>
								  <td >Property Image &nbsp;2</td>
								  <td ><input name='uploaded_file2' type='file' class="textbox" id="uploaded_file2"    /></td>
			  </tr>
								<tr>
								  <td >Property Image &nbsp;3</td>
								  <td ><input name='uploaded_file3' type='file' class="textbox" id="uploaded_file3"    /></td>
			  </tr>
								<tr>
								  <td >Property Image &nbsp;4</td>
								  <td ><input name='uploaded_file4' type='file' class="textbox" id="uploaded_file4"    /></td>
			  </tr>
								<tr>
								  <td >Property Description</td><td ><input name="pdes" type="text" class="textbox" id="r_please-fill-your-property-description." value="" size="50">
						    </td></tr>
								<tr><td >Unit Measure &nbsp;</td><td ><select name='punit'    class='textbox' id="punit"   >
		<option value='Sq. Feet'  selected="selected" >Sq. Feet</option>
		<option value='Cent' >Cent</option>
		<option value='Sq. Yards' >Sq. Yards</option>
		<option value='Acre' >Acre</option>
		<option value='Sq. Meter' >Sq. Meter</option>
		<option value='Bigha' >Bigha</option>
		<option value='Hectares' >Hectares</option></select>
							</td></tr>
								<tr><td >Price Measure &nbsp;</td><td ><select name='pmes'    class='textbox' id="pmes"   >
		<option value='INR'  selected="selected" >INR</option></select>
							</td></tr>
					<tr><td colspan="2" bgcolor="#CFD2FE" >Property Location
       	</td></tr>
								<tr>
								  <td >Address &nbsp;*</td><td ><input name="paddr" type="text" class="textbox" id="paddr" value="" size="50">
						    </td></tr>
								<tr><td height="55" >State &nbsp;</td><td ><select name="state" class="textbox"  onChange="return onchangeajax1(this.value);">
								  <?php 
					  
$sql="SELECT * FROM  states ";
$result =mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
?>
								  <option value="<?php echo $data['state_id'] ?>" <?php if ($data['state']==$row['state']) echo 'selected';?>> <?php echo $data['state'] ?></option>
								  <?php } ?>
						    </select></td></tr>
								<tr>
								  <td >City </td>
								  <td ><span id="statediv1"><select name="pcity" class="textbox" id="pcity" >
								    <option value="">City</option>
								    <?php 
					  
$sql="SELECT city FROM  states_cities where state_id=34 order by city";
$result =mysql_query($sql);
while ($data=mysql_fetch_assoc($result))
{
?>
								    <option value="<?php echo $data['city'] ?>" <?php if ($data['city']==$row['city']) echo 'selected';?>> <?php echo $data['city'] ?></option>
								    <?php } ?>
							      </select></span></td>
			  </tr>
								<tr><td >Country &nbsp;</td><td >
							
								<select name="pcon" class="textbox" id="pcon" >
								<option value="">Select Country</option>
                                <option value="">India</option>
								</select>
							</td></tr>
					<tr><td colspan="2" bgcolor="#CFD2FE" >Contact Details
       	</td></tr>
								<tr><td >Your Name <b class="star">*</b> &nbsp;</td><td ><input type='text' name='cname'  value=''   size='35' maxlength="90"    class='textbox'      id='r_please-fill-your-name.'    /> 
							</td></tr>
								<tr><td >Email ID <b class="star">*</b> &nbsp;</td><td ><input type='text' name='cemail'  value=''   size='35' maxlength="90"    class='textbox'      id='rp-4_please-enter-a-valid-email-id'    /> 
							</td></tr>
								<tr><td >Address <b class="star">*</b> &nbsp;</td><td ><input name="caddr" type="text" class="textbox" id="r_please-enter-your-address" value="" size="50">
						    </td></tr>
								<tr><td >City / State <b class="star">*</b> &nbsp;</td><td ><input type='text' name='cstat'  value=''   size='35' maxlength="90"    class='textbox'      id='r_please-enter-your-city-name'    /> 
							</td></tr>
								<tr>
								  <td >Country</td><td >
							
								<select name="ccon" class="textbox"  id="r_please-select-your-country">
								<option value="India">India</option>
								</select>
							</td></tr>
								<tr><td >Phone / Mobile <b class="star">*</b> &nbsp;</td><td ><input type='text' name='cmob'  value=''   size='35' maxlength="90"    class='textbox'      id='r_please-fill-your-phone-no.'    /> 
							</td></tr>
								<tr>
								  <td >Verification Code <b class="star">*</b></td>
								  <td class="data p5px"><img src="../picture.php" /></td>
			  </tr>
								<tr><td >&nbsp;</td><td class="data p5px"> <input  name="verification"  id="verification" type="text" value="" class="textbox" /></td></tr>
		<tr>
		  <td colspan="2" style="text-align: center;" >
		   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="go" type="submit" class="submi" id="go" value="Submit" />
		</td>
		</tr>
		</table></form>
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
<script>
function onchangeajax1(pid2)
 {
 xmlHttp1=GetXmlHttpObject1()
 if (xmlHttp1==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }

 var url1="../changecity.php"
 url1=url1+"?pid2="+pid2
 url1=url1+"&sid1="+Math.random()
 document.getElementById("statediv1").innerHTML='Loading Cities Please wait.......'
 if(xmlHttp1.onreadystatechange=stateChanged1)
 {
 xmlHttp1.open("GET",url1,true)
 xmlHttp1.send(null)
 return true;
 }
 else
 {
 xmlHttp1.open("GET",url1,true)
 xmlHttp1.send(null)
 return false;
 }
 }

 function stateChanged1()
 {
 if (xmlHttp1.readyState==4 || xmlHttp1.readyState=="complete")
 {
 document.getElementById("statediv1").innerHTML=xmlHttp1.responseText
 return true;
 }
 }

function GetXmlHttpObject1()
 {
 var objXMLHttp1=null
 if (window.XMLHttpRequest)
 {
 objXMLHttp1=new XMLHttpRequest()
 }
 else if (window.ActiveXObject)
 {
 objXMLHttp1=new ActiveXObject("Microsoft.XMLHTTP")
 }
 return objXMLHttp1;
 }
 
 var frmvalidator  = new Validator("Post_Property"); 
			frmvalidator.EnableMsgsTogether(); 		

			frmvalidator.addValidation("area","req","Please enter Property Area");
			frmvalidator.addValidation("price","req","Please enter Property Price");
			frmvalidator.addValidation("paddr","req","Please enter Property Address");
			
			frmvalidator.addValidation("cname","req","Please enter Name"); 
			
			frmvalidator.addValidation("cemail","req","Please enter Email"); 	
			frmvalidator.addValidation("cemail","email","Please enter Vald Email"); 	
			
			frmvalidator.addValidation("caddr","req","Please enter Address"); 
		
			frmvalidator.addValidation("cstat","req","Please enter City/State");  
			
			
			frmvalidator.addValidation("cmob","req","Please enter your Mobile Number");			
			frmvalidator.addValidation("cmob","maxlength","Please enter 10 digit number");
			
							
				frmvalidator.addValidation("verification","req","Please enter verification code"); 
</script>