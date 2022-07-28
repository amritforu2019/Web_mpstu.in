<?php   include("../con_base/functions.inc.php"); 
if(isset($_GET['edit']))
 {
$ty=$_GET['edit'];
$qry=mysqli_query($DB_LINK,"select * from category where id='$ty' ")or die(mysqli_error($DB_LINK));
 $row=mysqli_fetch_array($qry);
 }
 
 
if(isset($_GET['del']))
{
$arr=$_GET['del'];
 
mysqli_query($DB_LINK,"delete from package_cat  where id='$arr'")or die(mysqli_error($DB_LINK));
$_SESSION['sess_msg']="Category Deleted Successfully";
header("Location: category_sub_add?edit=".$_REQUEST['edit']."&parent=".$_REQUEST['parent']."&back=".$_REQUEST['back']."");
exit;
} 

 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="style.css" type="text/css" media="screen"/>

<title><?php echo $ADMIN_HTML_TITLE;?></title>

</head>
<body>
<?php include('header.php');?>
<div class="conten">
  <h1>Add / Update Service Category</h1>
  <form name="form1" method="post" action="" id="formID" class="formular validationEngineContainer" enctype="multipart/form-data">
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td width="36%" bgcolor="#D7D5FF" >Select Top Category : </td>
        <td width="64" colspan="2" bgcolor="#D7D5FF" ><select name="country" class="textbox" id='main_cat'  >
             
<? $country_qry=mysqli_query($DB_LINK,"select * from category where parent_id=0 order by name asc")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
            <option value="<? echo $country_fetch['id']?>" <? if($_REQUEST['parent']==$country_fetch['id'] || $row['parent_id']==$country_fetch['id']) echo "selected";?>><? echo normalall_filter($country_fetch['name'])?></option>
 
            <?  } ?>
          </select></td>
      </tr>
      <tr>
        <td bgcolor="#D7D5FF" >
            Sub Category Name  :                       </td>
        <td colspan="2" bgcolor="#D7D5FF"><input name="cname" type="text" class="textbox validate[required] text-input"  id="cname" value="<? if(isset($_GET['edit'] )) echo $row['name'];  else echo stripslashes($_POST['name'])	;?>" size="50"></td>
      </tr>

 
    
      <tr>
       <td height="22" colspan="3" align="center" bgcolor="#D7D5FF" id="searchres1">
       <input name="pid" type="hidden" id="pid" value="<?php echo $_REQUEST['edit'];?>">
          
       </td>
      </tr>
     
      <tr>
        <td height="22" colspan="3" align="center" bgcolor="#D7D5FF"> 
          <input name="edit" type="hidden" id="edit" value="<?php echo $_REQUEST['edit'];?>">
          
          <input name="go" type="button" class="subm" id="go" onClick="sub_data(main_cat.value,cname.value,edit.value)" value="Add / Update Category"  > <input name="gone" type="button" class="subm" id="gone" value="Back" onClick="javascript:window.location.href='<? echo $_REQUEST['back']?>'">           </td>
      </tr>
       <tr>
       <td height="22" colspan="3" align="center" bgcolor="#C5FBFE"><h1>Package Master</h1></td>
      </tr>
       <tr>
        <td height="22" align="center" bgcolor="#C5FBFE"><select name="pcz" class="textbox" id='pcz'  >
          <? $country_qry=mysqli_query($DB_LINK,"select * from package ")or die(mysqli_error($DB_LINK));
 while($country_fetch=mysqli_fetch_array($country_qry)) { ?>
          <option value="<? echo $country_fetch['id']?>"  ><? echo ($country_fetch['title'])?></option>
          <?  } ?>
         </select></td>
        <td height="22" align="center" bgcolor="#C5FBFE"><input name="pamt" type="text" class="textbox validate[required] text-input"  id="pamt"  size="50" placeholder='Enter Amount'></td>
        <td align="center" bgcolor="#C5FBFE"><input name="go2" type="button" class="subm" id="go2" onClick="sub_pcz_data(pid.value,pcz.value,pamt.value)" value="Add New Package"  ></td>
       </tr>
       <tr>
        <td height="22" colspan="3" align="center" bgcolor="#C5FBFE" id="get_data"><table width="85%" border="0" align="center" cellpadding="5" cellspacing="0" class="table">
     
      
      <tr   class="li">
        <td  bgcolor="#add8f8" class="heading">SNo.</td>
        <td  bgcolor="#add8f8" class="heading">Category Name</td>
        <td  bgcolor="#add8f8" class="heading">Package </td>
        <td  bgcolor="#add8f8" class="heading">Amount</td>
        <td   bgcolor="#add8f8" class="heading">Validity Days</td>
        <td   bgcolor="#add8f8" class="heading">Posted on</td>
        <td   bgcolor="#add8f8" class="heading">Action</td>
      </tr>
      <?   
				   
				  $where=" where category='".$_REQUEST['edit']."'";
				 
				  $q=mysqli_query($DB_LINK,"select * from package_cat $where   order by id asc"); 
				  $count=mysqli_num_rows($q);
				  if($count!=0)
				  {
				  
				$i=1;
				while($row=mysqli_fetch_array($q))
				{
				extract($row);
				?>
      <tr bgcolor="#F2F2F2" class="textli">
        <td align="center" bgcolor="#FFFFFF" class="bodytext"><? echo  $i;?></td>
        <td bgcolor="#FFFFFF" class="bodytext"><? echo $row['cat_name'] ;
		if($row['cat_name']=='')
		{
		$country_qry1=mysqli_query($DB_LINK,"select * from category where  id='".$row['category']."' ")or die(mysqli_error($DB_LINK));
$country_fetch1=mysqli_fetch_array($country_qry1);
mysqli_query($DB_LINK,"update package_cat set cat_name='".($country_fetch1['name'])."'  where id='".$row['id']."'");
		}
		/*if($row['maincat_name']=='')
		{
	  $country_qry1=mysqli_query($DB_LINK,"select * from category where  id='".$row['category_main']."' ")or die(mysqli_error($DB_LINK));
$country_fetch1=mysqli_fetch_array($country_qry1);
 
mysqli_query($DB_LINK,"update package set maincat_name='".($country_fetch1['name'])."'  where id='".$row['id']."'");
		}*/
		?></td>
        <td bgcolor="#FFFFFF" class="bodytext"><? if(strlen(normal_filter($title))>30) { echo  substr(normal_filter($title),0,30)."...";} else { echo  normal_filter($title);}?></td>
        <td   bgcolor="#FFFFFF" class="bodytext">Rs. 
          <?   echo  normal_filter($descr); ?> 
        /-</td>
        <td   bgcolor="#FFFFFF" class="bodytext"><?  echo  normal_filter($days); ?></td>
        <td  bgcolor="#FFFFFF" class="bodytext"><?php echo date_dm($posted_on);?></td>
        <td  bgcolor="#FFFFFF" class="bodytext"> <!--<a href="package_add?edit=<?  echo  $id?>" title="Edit "><img src="images/edit.png" alt="Edit" width="20" height="20" border="0"></a>--> <a href="category_sub_add?del=<?  echo  $id?>&edit=<?=$_REQUEST['edit']?>&parent=<?=$_REQUEST['parent']?>&back=<?=$_REQUEST['back']?>" onClick="return del();" title="Delete "><img src="images/del.png" alt="Delete " width="22" height="22" border="0"></a> </td>
      </tr>
      <?
					$i++;
				} 
				?>
      <? }   else { ?>
      <tr bgcolor="#F2F2F2" class="textli">
        <td colspan="7" align="center" bgcolor="#FFFFFF" class="bodytext"> Currently No Package  Available</td>
      </tr>
      <? }   ?>
    </table></td>
       </tr>
    </table>
 
 
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
 
<script>
function sub_data(id,pname,edit)
{
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
}
var url="ajax_addupdsubcat.php"
url=url+"?pid="+id 
url=url+"&pname="+pname
url=url+"&edit="+edit
url=url+"&sid="+Math.random()
document.getElementById("searchres1").innerHTML='Please wait..<img border="0" src="images/ajax-loader.gif" height="50px">'
if(xmlHttp.onreadystatechange=stateChanged)
{
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
return true;
}
else
{
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
return false;
}
}

function stateChanged()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
document.getElementById("searchres1").innerHTML=xmlHttp.responseText
return true;
}
}           
</script>

<script>
function sub_pcz_data(pid,pcz,pamt)
{

xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("Browser does not support HTTP Request")
return
}

var url="ajax_addpackage.php"
url=url+"?pid="+pid 
url=url+"&pcz="+pcz
url=url+"&pamt="+pamt
 
document.getElementById("get_data").innerHTML='Please wait.. ';

if(xmlHttp.onreadystatechange=stateChanged1)
{
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
return true;
}
else
{
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
return false;
}
}

function stateChanged1()
{
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
document.getElementById("get_data").innerHTML=xmlHttp.responseText
return true;
}
}           
</script>
<script>

 function GetXmlHttpObject()

 {

 var objXMLHttp=null

 if (window.XMLHttpRequest)

 {

 objXMLHttp=new XMLHttpRequest()

 }

 else if (window.ActiveXObject)

 {

 objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")

 }

 return objXMLHttp;

 }

</script>
<? ob_end_flush(); ?>
