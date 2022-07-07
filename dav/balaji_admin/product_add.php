<? ob_start();
require_once("../config/functions.inc.php");
include("fckeditor/fckeditor.php");
validate_admin();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<link href="css/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">



function chk()

{

if(document.form1.name.value=="")

{

alert("Please enter product name");

return false;

}

if(document.form1.price_true.value=="")

{

alert("Please enter actual price");

return false;

}

if(document.form1.price_offer.value=="")

{

alert("Please enter offer price");

return false;

}

}

</script>
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
		<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
            <tr>
              <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Services :</strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" valign="top"><form action="product_add.php" method="post" enctype="multipart/form-data" name="form1">

                    <p>

                      <?

			  if(isset($_GET['yahoo']))

			  { 

			  	//session_unregister("naukri");

			  $_SESSION['naukri']='';

			  }

			  if(isset($_POST['gone']))

			 { 
			 
			  	$_SESSION['naukri']='';

			 	//session_unregister("naukri");

			  	

			  }

			  if(isset($_GET['edit']))

			  {

				  $_SESSION['naukri']=$_GET['edit'];

				  $ty=$_GET['edit'];

				  $qry=mysql_query("select * from product where id='$ty' ")or die(mysql_error());

				  $row=mysql_fetch_array($qry);

				  

			   }

			  if(isset($_POST['go']))

			  {

			  	

			

				 if($_SESSION['naukri']=='')

			  	{

			  		

					  require_once("addproduct.php");

					  

			  	}

			  else

			  {

			 		 require_once("updateproduct.php");

			 	

		   }
	  }

			  ?>

                    </p>

                  <p></p>

                  <table width="100%" border="0" cellspacing="4" cellpadding="2">

                      <tr>

                        <td class="bodytext"><div align="right"><strong>Select Category : </strong></div></td>

                        <td><select name="category" class="bodytext" id="category" >

                            

                            <?

					$country_qry=mysql_query("select * from category where parent_id=0 order by name asc")or die(mysql_error());

					while($country_fetch=mysql_fetch_array($country_qry))

					{

					?>

                            <option value="<? echo $country_fetch['id']?>" <? if($_REQUEST['category']==$country_fetch['id'] || $row['parent_id']==$country_fetch['id']) echo "selected";?> style="font-weight:bold"><? echo normalall_filter($country_fetch['name'])?></option>

							<?  $country_qry1=mysql_query("select * from category where parent_id='".$country_fetch['id']."' order by name asc")or die(mysql_error());

					while($country_fetch1=mysql_fetch_array($country_qry1))

					{

					?>

                            <option value="<? echo $country_fetch1['id']?>" <? if($_REQUEST['category']==$country_fetch1['id'] || $row['parent_id']==$country_fetch1['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;-<? echo normalall_filter($country_fetch1['name'])?></option>

							

							<?  $country_qry2=mysql_query("select * from category where parent_id='".$country_fetch1['id']."' order by name asc")or die(mysql_error());

					while($country_fetch2=mysql_fetch_array($country_qry2))

					{

					?>

                            <option value="<? echo $country_fetch2['id']?>" <? if($_REQUEST['category']==$country_fetch2['id'] || $row['parent_id']==$country_fetch2['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<? echo normalall_filter($country_fetch2['name'])?></option>

							

							

                            <? } ?>


                            <? } ?>

							

                            <? } ?>

                        </select></td>

                      </tr>

                      <tr>

                        <td class="bodytext"><div align="right" class="smalltext">

                            <div align="right"><strong>Product Name  :</strong></div>

                        </div></td>

                        <td><input name="name" type="text" class="bodytext" id="cname3" size="50" value="<? if(isset($_GET['edit'] )) echo $row['name'];  else echo stripslashes($_POST['name'])	;?>">                        </td>

                      </tr>

					   <tr>

                        <td class="bodytext"><div align="right" class="smalltext">

                            <div align="right"><strong>Mobile No.  :</strong></div>

                        </div></td>

                        <td><input name="item_code" type="text" class="bodytext" id="cname3" size="50" value="<? if(isset($_GET['edit'] )) echo $row['item_code'];  else echo stripslashes($_POST['item_code'])	;?>">                        </td>

                      </tr>

					  <tr>

                        <td class="bodytext"></td>

                        <td><input name="color" type="hidden" class="bodytext" id="item_code" size="50" value="<? if(isset($_GET['edit'] )) echo $row['color'];  else echo stripslashes($_POST['color']);?>"></td>

                      </tr>

					  <tr>

                        <td class="bodytext"><div align="right" class="smalltext">

                            <div align="right"><strong>Email Id  :</strong></div>

                        </div></td>

                        <td><input name="weight" type="text" class="bodytext" id="weight" size="50" value="<? if(isset($_GET['edit'] )) echo $row['weight'];  else echo stripslashes($_POST['weight']);?>"></td>

                      </tr>

					<?php /*?>   <tr>

                        <td class="bodytext"><div align="right" class="smalltext">

                            <div align="right">Pile Height   :</div>

                        </div></td>

                        <td><select name="pile_height" class="bodytext" id="color">

						<?

							$color_qry=mysql_query("select * from price_range where type='size' order by price_value asc")or die(mysql_error());

							while($color_fetch=mysql_fetch_array($color_qry))

							{

							

						?>

						<option value="<? echo $color_fetch['id']?>" <? if($row['pile_height']==$color_fetch['id'] || $_POST['pile_height']==$color_fetch['id']) echo "selected";?>><? echo normal_filter($color_fetch['price_value']); ?></option><? } ?>

                        </select>

                         <span class="blogs">&nbsp;&nbsp;<? echo normal_filter($global_fetch['unit']);?>                        </span></td>

                      </tr> <?php */?>

 				<tr>

                        <td height="22" class="bodytext"><div align="right" class="smalltext"><strong>Without Login Show  : </strong></div></td>

                        <td class="bodytext"><input name="show_on" type="radio" value="0" <? if($row['show_on']==0) echo "checked";?> id="yes">

						<label for="yes">Yes</label> <input name="show_on" type="radio" value="1" <? if($row['show_on']==1) echo "checked";?> id="no">

						<label for="no">No</label> </td>

						  </tr>

						   <tr>

                        <td class="bodytext"><div align="right" class="smalltext">

                            <div align="right"><strong> Address   :</strong></div>

                        </div></td>

                        <td><input name="price_offer" id="price_offer" type="text" class="bodytext" size="50" value="<? if(isset($_GET['edit'] )) echo $row['price_offer'];  else echo stripslashes($_POST['price_offer']);?>"></td>

                      </tr>

					  <tr>

                        <td class="bodytext"><div align="right" class="smalltext">

                            <div align="right"><strong>a   :</strong></div>

                        </div></td>

                        <td><input name="price" type="text" class="bodytext" id="cname" size="50" value="<? if(isset($_GET['edit'] )) echo $row['price'];  else echo stripslashes($_POST['price']);?>"></td>

                      </tr>

                      <tr>

                        <td height="22" class="bodytext"><div align="right"><strong>Upload Image : </strong></div></td>

                        <td><input name="uploaded_file" type="file" class="bodytext" id="uploaded_file"></td>

                      </tr>

                      <tr>

                        <td height="22" class="bodytext"><div align="right"><strong>Product Description : </strong></div></td>

                        <td>&nbsp;</td>

                      </tr>

                      <tr>

                        <td height="22" colspan="2"><? $oFCKeditor = new FCKeditor('descr');



$oFCKeditor->BasePath = 'fckeditor/';



 if(isset($row['descr'])) $oFCKeditor->Value = $row['descr']; else $oFCKeditor->Value = $descr; ;



$oFCKeditor->Width  = '100%' ;



$oFCKeditor->Height = '450' ;







$oFCKeditor->Create();



?>&nbsp;</td>

                      </tr>

                      <tr>

                        <td width="28%" height="22">&nbsp;</td>

                        <td width="72%"><input name="go" type="submit" class="button" id="go2" value="<? if(isset($_SESSION['naukri'])) echo "Update"; else echo "Add";?> Product" onClick="return chk();">                        </td>

                      </tr>

                    </table>

                  <p>&nbsp;</p>

                </form></td>
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
<? ob_end_flush();
?>
<script> show(1);</script>