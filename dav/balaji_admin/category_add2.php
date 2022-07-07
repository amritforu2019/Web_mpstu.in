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
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script> 
<script language="javascript">
function chk()
{if(document.form1.name.value=="")
{
alert("Please enter category name");
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
    <td width="750" align="center"><div id="mid">
        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#274663">
          <tr>
            <td height="29" bgcolor="#0c5994" class="heading"><strong>Manage Footer</strong></td>
          </tr>
          <tr>
            <td valign="top" bgcolor="#FFFFFF"><form action="category_add2.php" method="post" enctype="multipart/form-data" name="form1">
                <p>

<?
if(isset($_GET['edit']))
{
$_SESSION['naukri']=$_GET['edit'];
$ty=$_GET['edit'];
$qry=mysql_query("select * from category2 where id='$ty' ")or die(mysql_error());
$row=mysql_fetch_array($qry);
}


if(isset($_POST['go']))
{
require_once("uploader.php"); 
if(isset($_FILES['uploaded_file']))
{
upload("../product/category/");
$_SESSION['sess_msg']=$co;
}
mysql_query("insert into category2 set parent_id='".$_POST['country']."', name='".$_POST['name']."', weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' , imname='$finame', show_on='".$_POST['show_on']."',  status=1 , descr='".$_POST['descr']."'")or die(mysql_error());
header("Location:category_list2.php?country=".$_POST['country']);
exit;
}

////////////////////////////////////////////////////
 if(isset($_POST['go2']))
{
require_once("uploader.php");


if(isset($_FILES['uploaded_file']))
{
upload("../product/category/");
$a=$_POST['edit'];
if($finame!="")
{
$rw=mysql_query("select * from category2 where id='$a'");
$rw1=mysql_fetch_array($rw)or die(mysql_error());
$x=$rw1['imname'];
unlink("../product/category/".$x);  

$q=mysql_query("update category2 set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."' ,  imname='$finame', show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());


$_SESSION['sess_msg']="Menu Updated Successfully";
?>
<script>
window.location.href="category_list2.php?country=<?=$_POST['country']?>";
</script>
<?
exit;
}
else
{

$q=mysql_query("update category2 set parent_id='".$_POST['country']."', name='".$_POST['name']."' , weight='".$_POST['weight']."', pile_height='".$_POST['pile_height']."'  ,  show_on='".$_POST['show_on']."' , descr='".$_POST['descr']."' where id='$a'")or die(mysql_error());
$_SESSION['sess_msg']="Menu Updated Successfully";
?>
<script>
window.location.href="category_list2.php?country=<?=$_POST['country']?>";
</script>
<?
exit;
}
}
 }
?>
                </p>
                <table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td width="28%" class="bodytext"><div align="right">Select Parent Menu: </div></td>
                    <td width="72%"><select name="country" class="bodytext" >
                        <option value="0" <? if($_REQUEST['country']==0 || $row['parent_id']==0) echo "selected";?>>Top</option>
                        <?



					$country_qry=mysql_query("select * from category2 where parent_id=0 order by name asc")or die(mysql_error());



					while($country_fetch=mysql_fetch_array($country_qry))



					{



					?>
                        <option style="font-size:16px" value="<? echo $country_fetch['id']?>" <? if($_REQUEST['country']==$country_fetch['id'] || $row['parent_id']==$country_fetch['id']) echo "selected";?>><? echo normalall_filter($country_fetch['name'])?></option>
                        <?  $country_qry1=mysql_query("select * from category2 where parent_id='".$country_fetch['id']."' order by name asc")or die(mysql_error());

					while($country_fetch1=mysql_fetch_array($country_qry1))

					{

					?>
                        <option  style="font-size:16px" value="<? echo $country_fetch1['id']?>" <? if($_REQUEST['country']==$country_fetch1['id'] || $row['parent_id']==$country_fetch1['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;<? echo normalall_filter($country_fetch1['name'])?></option>
                        <?  $country_qry2=mysql_query("select * from category2 where parent_id='".$country_fetch1['id']."' order by name asc")or die(mysql_error());

					while($country_fetch2=mysql_fetch_array($country_qry2))


					{

					?>
                        <option  style="font-size:16px" value="<? echo $country_fetch2['id']?>" <? if($_REQUEST['country']==$country_fetch2['id'] || $row['parent_id']==$country_fetch2['id']) echo "selected";?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo normalall_filter($country_fetch2['name'])?></option>
                        <? } } } ?>
                      </select></td>
                  </tr>
                  <tr>
                    <td class="bodytext"><div align="right" class="smalltext">
                        <div align="right">Footer Menu Name  :</div>
                      </div></td>
                    <td><input name="name" type="text" class="bodytext" id="name" size="50" value="<? if(isset($_GET['edit'] )) echo $row['name'];  else echo stripslashes($_POST['name'])	;?>" onKeyUp="document.getElementById('weight').value=this.value"></td>
                  </tr>
                  <tr>
                    <td class="bodytext"><div align="right" class="smalltext">
                        <div align="right"> Footer Menu Title:</div>
                      </div></td>
                    <td><input name="weight" type="text" class="bodytext" id="weight" size="50" value="<? if(isset($_GET['edit'] )) echo $row['weight'];  else echo stripslashes($_POST['weight'])	;?>"></td>
                  </tr>
                  <tr>



                        <td height="22" class="bodytext"><div align="right">Upload Footer Image: </div></td>



                        <td><input name="uploaded_file" type="file" class="bodytext" id="uploaded_file"></td>



                      </tr>
                  <tr>
                    <td height="22" colspan="2" align="center" class="bodytext"> Content 
                    <input name="pile_height" type="hidden" class="bodytext" id="cname" size="50" value="<? if(isset($_GET['edit'] )) echo $row['pile_height'];  else echo stripslashes($_POST['pile_height'])	;?>">
                    <input name="edit" type="hidden" class="bodytext" id="edit" size="50" value="<?  echo $_REQUEST['edit'];  ?>"></td>
                  </tr>
                  <tr>
                    <td height="22" colspan="2"><textarea name="descr"  id="descr"><? if(isset($row['descr'])) echo $row['descr'];?>
</textarea>
                      <script type="text/javascript"> 

			CKEDITOR.replace( 'descr',{

				toolbar :

						[

							

							

						

							{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },

							{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock', ] },

							{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },

							{ name: 'colors', items : [ 'TextColor','BGColor' ]}, 

							

							'/',

							{ name: 'document', items : [ 'Source','-','Preview','Print','-'] },

							{ name: 'tools', items : [ 'Maximize'] },

							{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },

							{ name: 'editing', items : [ 'Find','Replace','-','SpellChecker'] }, 

							{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','SpecialChar' ] },

							{ name: 'links', items : [ 'Link','Unlink','Anchor' ] }  

							

						],

	filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

	filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

	filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

	filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

	filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

});



            </script></td>
                  </tr>
                  <tr>
                    <td height="22" colspan="2" align="center">
                    <?
                    if($_REQUEST['edit']=='')
					{
						
					?>
                    <input name="go" type="submit" class="button" id="go" value="Add " onClick="return chk();">
                    <? } 
					else { 
					?> <input name="go2" type="submit" class="button" id="go2" value="Update" onClick="return chk();"> <?
					}?>
                    </td>
                  </tr>
                </table>
                <p>&nbsp;</p>
              </form></td>
          </tr>
        </table>
      </div></td>
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