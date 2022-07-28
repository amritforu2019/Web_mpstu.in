<? ob_start();
require_once("../config/functions.inc.php");
include("fckeditor/fckeditor.php");
	   $dir="new collection";
validate_admin();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $ADMIN_HTML_TITLE;?></title>
<style type="text/css">
.li .toplinks strong {
	color: #FFF;
}
</style>

<link href="images/admin_style.css" rel="stylesheet" type="text/css">

<link href="css/admin_style.css" rel="stylesheet" type="text/css"> 

<link href="images/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/validator.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="images/admin_style.css" rel="stylesheet" type="text/css">
<style type="text/css">
/*
.style1 {
	color: #FF0000;
	font-size: 11px;
}
.bodyadmin table tr td table tr td table tr .li .toplinks strong {
	color: #FFF;
}
*/
</style>
</head>

<body >

<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td colspan="2"><? require_once("adheader.php");?></td> 

  </tr>

  <tr>

    <td width="253" valign="top" class="left"><? require_once("adleft.php");?></td>

    <td width="750" align="center">

	<div id="mid">  

	
		   <table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">

      <tr bgcolor="#0C5994">

        <td height="29"  class="li"><div align="left" class="toplinks"><strong>&nbsp;&nbsp;&nbsp;Add </strong></div></td>

      </tr>

	    

              <tr>

                <td height="252" bgcolor="#FFFFFF" valign="top"><form action="add_style4.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <p>
                      <?  
					 	 $flag=0;
						  if(isset($_GET['edit']))
						  { 
							  $ty=$_GET['edit'];
							  $qry=mysql_query("select * from new_collection1 where id='$ty' ")or die(mysql_error());
							  $row=mysql_fetch_array($qry); 
							  
						  } 
						  
						  if(isset($_POST['go']))
						  {
						  //echo "inside witH city name = ".$_POST['html_name'];
						  	$cname = $_REQUEST['html_state'];
							$res = mysql_query("select * from new collection where state_name='$cname'") ;
							$nor = mysql_num_rows($res);
							if($nor!=0)
							{
								echo "<div align='center'><strong><font color='#EC0000'>Duplicate Entry Not Allowed</font></strong></div>";
								$flag=1;
							}
							if($flag==0)
							{
							$dbvals = mysql_query("select state_name from new_collection1 where state_name = '".$_POST['html_state']."' ");
							$valuesloop = mysql_fetch_array($dbvals);	
							//echo  $valuesloop['name'];
							if(!$valuesloop['cntry_name'])
							{
							//echo  "inside if";
							  if($_POST['edit']!='') 
				{ 
				
				
				require_once("uploader2.php");
				if($_FILES['uploaded_file_small']['name']!="")
				{
				upload_small();
				$where=" , smallimg='$finame_small' ";
				$rw=mysql_query("select smallimg from new_collection1 where id='".$_POST['edit']."'")or die(mysql_error());
				$rw1=mysql_fetch_array($rw);
				$x=$rw1['smallimg'];
				@unlink("../upload/$dir/".$x);
				
				echo"update new_collection1 set country='".$_POST['html_name']."' and state_name='".$_POST['html_state']."' where id='".$_POST['edit']."'";
				mysql_query("update new_collection1 set smallimg='".$finame_small."', state_name='".$_POST['html_state']."', country='".$_POST['html_name']."',other='".$_POST['other']."' where id='".$_POST['edit']."'")or die(mysql_error());
				$sess_msg="Updated Successfully";
				$_SESSION['sess_msg']=$sess_msg;
				$root=$_REQUEST['root'];
				$child=$_REQUEST['child'];
				header("Location: new_collection1.php");
				}
				elseif($_FILES['uploaded_file_small']['name']=="")
				{
				
				mysql_query("update new_collection1 set state_name='".$_POST['html_state']."', country='".$_POST['html_name']."' , other='".$_POST['other']."',price='".$_POST['price']."',content='".$_POST['content']."' where id='".$_POST['edit']."'")or die(mysql_error());
				$sess_msg="Updated Successfully";
				$_SESSION['sess_msg']=$sess_msg;
				$root=$_REQUEST['root'];
				$child=$_REQUEST['child'];
				header("Location: new_collection1.php");
				}
				 
				} 
				else {   	 
				require_once("uploader2.php");
				
				if($_FILES['uploaded_file_small']['name']!="")
				
				{
				
				upload_small(); 
				$where=" , smallimg='$finame_small' " ;
				
				}  
				
				$root=$_REQUEST['root'];
				$child=$_REQUEST['child'];
				mysql_query("insert into new_collection1 set country='".$_POST['html_name']."',root='$root',child='$child',state_name='".addslashes($_POST['html_state'])."',  other='".$_POST['other']."' $where,status=1,price='".$_POST['price']."',content='".$_POST['content']."',title='".$_POST['title']."',keyb='".$_POST['keyb']."',descr='".$_POST['descr']."'")or die(mysql_error());
				$sess_msg="Added Successfully";
				$_SESSION['sess_msg']=$sess_msg;
				$root=$_REQUEST['root'];
				$child=$_REQUEST['child'];
				header("Location: new_collection1.php");
				} 
							 }
							 else{								
									$sess_msg="Kindly enter another Style Name as the name '".$_POST['html_name']."' already exists";
									echo "<div style = 'margin-left:auto;margin-right:auto;width:484px;text-align:left;color:red;'>$sess_msg</div>";
									//$_SESSION['sess_msg']=$sess_msg;
							 }
							} 
						  }
			 	 		?>
                    </p>
                  <table width="100%" border="0" cellspacing="4" cellpadding="2">
                      <tr>
                        <td height="22" colspan="2" align="right">  
                          <input type="hidden" id="txt" name="price" value="<? echo $row['price'];?>"/>
                        <input name="edit" type="hidden" value="<? echo $_REQUEST['edit'];?>" /></td>
                      </tr>
                      <input type="hidden" name="root" value="<?=$_REQUEST['root'];?>">
                      <input type="hidden" name="child" value="<?=$_REQUEST['child'];?>">
                      <input type="hidden" name="dir" value="<?=$dir;?>">	
                      <tr>
                        <td height="22" align="right"> <strong> Name :</strong></td>
                        <td><input type="text" id="txt" name="html_state" value="<? echo $row['state_name'];?>"/>
                            <input name="edit" type="hidden" value="<? echo $_REQUEST['edit'];?>" /></td>
                      </tr>
                      <tr>
                        <td height="22" align="right"><strong>Mobile No.</strong></td>
                        <td><input type="number" id="price" name="price" value="<? echo $row['price'];?>"/></td>
                      </tr>
                      <tr>
                        <td height="22" align="right"><strong>Email Id</strong></td>
                        <td><input type="text" id="title" name="title" value="<? echo $row['title'];?>"/></td>
                      </tr>
                      <tr>
                        <td height="22" align="right"> <strong>Address</strong></td>
                        <td><input type="text" id="keyb" name="keyb" value="<? echo $row['keyb'];?>"/>
                           </td>
                      </tr>
                         <?php /*?> 
					 <tr>
                        <td height="22" align="right"><strong>Style type :</strong></td>
                        <td>
<div><?php $cntry_qry=mysql_query("select * from style");
									while($cntry_val=mysql_fetch_array($cntry_qry)){
							?>
<input name="style1" type="radio"  value="<?php echo $cntry_val['id'];?>" <? if($row['style']==$cntry_val['id']) echo 'checked="checked"'; ?>/><?php echo $cntry_val['style'];?>

<? } ?>
Other 
<input type="text" name="other" style="width:60px" value="<? echo $row['other'];?>"></div>
						</td>
                      </tr><?php */?>
                      <tr>
                      <td>
                      Content</td></tr>
                      <tr>
                       <td colspan="2">
                        
							  <? $oFCKeditor = new FCKeditor('content');

								 $oFCKeditor->BasePath = 'fckeditor/'; 

								 if(isset($row['content'])) $oFCKeditor->Value=stripslashes($row['content']);

								 else $oFCKeditor->Value=stripslashes($row['content']); 

								$oFCKeditor->Width  = '100%' ;

								$oFCKeditor->Height = '520' ;

								$oFCKeditor->Create();

							 ?>
                             </td>
                             </tr>
					  <tr>
                        <td height="22" valign="top" class="hometext"><div align="right"> Image : </div>
                        <div align="right"> </div></td>
                       
					    <td><input name="uploaded_file_small" type="file" id="uploaded_file_small" size="21">
							<input name="edit" type="hidden" value="<? echo $_REQUEST['edit'];?>" />
						<br>
<span class="style1">Image size width 984px height 270px </span></td>
				      </tr>
					  
                     <!-- <tr>
                        <td height="22" align="right">Title:</td>
                        <td><label for="title"></label>
                        <textarea name="title" id="title" cols="45" rows="5"></textarea></td>
                      </tr>
                      <tr>
                        <td height="22" align="right">Keyword:</td>
                        <td><textarea name="keyb" id="keyb" cols="45" rows="5"></textarea></td>
                      </tr>
                      <tr>
                        <td height="22" align="right">Description:</td>
                        <td><textarea name="descr" id="descr" cols="45" rows="5"></textarea></td>
                      </tr>-->
                      <tr>
                        <td width="25%" height="22">&nbsp;</td>
                        <td width="75%"><input name="go" type="submit" class="button" id="go2" value="<? if(isset($_GET['edit'])) echo  "Update"; else echo  "Add"?>  " onClick="return chk2()" />                        </td>
                      </tr>
                    </table>
                  <p>&nbsp;</p>
                </form></td>

              </tr>

            </table>

            <br></td></tr>

    </table></td>

  </tr>

</table>

<table width="995" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 

    <td width="1%" height="29" bgcolor="#333333">&nbsp;</td>

  </tr>

 <? require_once("adfooter.php");?>

</table>

</body>

</html>

<? ob_end_flush(); ?>