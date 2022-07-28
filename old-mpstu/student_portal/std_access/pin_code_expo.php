<?php   include("../con_base/functions.inc.php"); ?>
<?
if(isset($_POST["Import"]))
{
	
	$i=0;
	$j=0;
    $filename=$_FILES["file2"]["tmp_name"];
    if($_FILES["file2"]["size"] > 0)
    {
      $file = fopen($filename, "r");
        //$sql_data = "SELECT * FROM prod_list_1 ";
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        { 
	 
	 $sql2="INSERT INTO  `pin_data` set   `pin`='$emapData[0]' , `taluka` = '$emapData[3]' , `divi`='$emapData[1]' ,  `city`='$emapData[2]' , `state`='$emapData[4]' ,`sub_off`='$emapData[5]' ,  head_off ='$emapData[6]'  ";
			
	   
           if(mysqli_query($DB_LINK,$sql2))
		   {
			   $j++;
		   }
		   
		 
		$i++;
        
        
    }
	fclose($file);
    }
	}	  ?>
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
  <h1>Add /  Update Area List</h1>
 <form enctype="multipart/form-data" method="post" role="form">
  <table width="45%" border="0" align="center" cellpadding="5" cellspacing="0">
   <tr>
    <td width="31%" height="22" >Select File To export Data</td>
    <td width="69%"><input type="file" name="file2" id="file2" /></td>
   </tr>
   <tr>
    <td height="22" colspan="2" align="center"><input name="Import" type="submit" class="subm" id="Import" value="Add New" /></td>
   </tr>
  </table>
 </form>
</div>
<?php include('footer.php');?>
</body>
</html>
<? ob_end_flush(); ?>
