<?php ob_start(); include('../con_base/functions.inc.php'); master_main();

  if(isset($_POST['go']))
 {         
           

   require_once("uploader-file-master.php");
     if (isset($_FILES['uploaded_file'])) 
    {
          uploadmaster("../upload/student/", 'uploaded_file');
          if ($finame != '') 
          {
              $f1= $finame;
              $i1=" , image='$f1'  ";
          }
      }
      
         if( mysqli_query($DB_LINK,"INSERT INTO `std_list` (`reg` ,`name` ,`fname` ,`course` ,`address`,dob,doj,center,img,contact)VALUES ('".$_POST['reg']."','".$_POST['name']."','".$_POST['fname']."','".$_POST['course']."','".$_POST['address']."','".$_POST['y']."-".$_POST['m']."-".$_POST['d']."','".$_POST['y2']."-".$_POST['m2']."-".$_POST['d2']."','".$_POST['center']."' ,'$f1','".$_POST['contact']."')")or die(mysqli_error()))
         {
             $_SESSION['suc_msg']="New Record Saved Succesfully";   
             header("location:student-list.php");
         }
         else
         {
          $_SESSION['err_msg']="Error !!!"; 
          header("location:student-add.php");
        }
                  
       } 
       
         if(isset($_POST['go2']))
        {

   require_once("uploader-file-master.php");
   $i1='';
   if (isset($_FILES['uploaded_file'])) 
   {
    uploadmaster("../upload/student/", 'uploaded_file');
    if ($finame != '') 
    {  
      $qry=mysqli_query($DB_LINK,"select img from std_list where reg=".$_POST['reg']." ") or die(mysqli_error());
        $row=mysqli_fetch_array($qry);
        unlink('../upload/student/'.$row['img']);
      
      $f1= $finame;
      $i1=" , img='$f1'  ";
    }
  }
       
        
          
         
         if( mysqli_query($DB_LINK,"update  std_list  set contact='".$_POST['contact']."', `name`='".$_POST['name']."' ,`fname`='".$_POST['fname']."' ,`course`='".$_POST['course']."' ,`address`='".$_POST['address']."',dob='".$_POST['y']."-".$_POST['m']."-".$_POST['d']."',doj='".$_POST['y2']."-".$_POST['m2']."-".$_POST['d2']."',`center`='".$_POST['center']."' $i1  where reg=".$_POST['reg']." ")or die(mysqli_error()))
          {
             $_SESSION['suc_msg']="Record Updated Succesfully";   
             header("location:student-list.php");
         }
         else
         {
          $_SESSION['err_msg']="Error Student Tc No Already Exist kindly Re-Check !!!"; 
          header("location:student-add.php");
        }
         
                  
                  
                      
       } 
       
       if(isset($_REQUEST['id']))
       {
         
          $result=mysqli_query($DB_LINK, "select * from std_list  where id ='".$_REQUEST['id']."'");
      
        $row=mysqli_fetch_array($result);
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $SITE_NAME;?>:: Student Add</title>
<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<?php include("include/header_file.php"); ?>
</head>
<body class="no-skin">
<?php  include('include/header.php');?>
<?php  include('include/sidemenu.php');?>
<div class="main-content">
  <div class="main-content-inner">
     <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>
          <li><a href="">Student T.C.</a></li>
          <li class="active">Add New Student</li>
        </ul>
        <!-- /.breadcrumb --> 
      </div>  
    <div class="page-content">
      <div class="page-header text-center">
        <h1> Add New Student TC </h1>
      </div>
      <!-- /.page-header -->
      <div class="row">
        <div class="col-xs-12  ">
          <div class="col-xs-2  ">
          </div>
        <div class="col-xs-8  ">
          <!-- PAGE CONTENT BEGINS -->
          

          <form name="form1" method="post" action=""  enctype="multipart/form-data" class="form-horizontal"   >
               
      
                
                <table  class="table  table-bordered"> 
                
                <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC" >Basic Details</td>
            <td  rowspan="6" align="center"><?php  if(isset($_REQUEST['id']))
       {
        ?><a href="../upload/student/<?php echo trim($row['img']);?>" title="View TC Scan Image" target="_blank" > <img src="../upload/student/<?php echo trim($row['img']);?>"   height="177"></a>
              
              
              
              <?php } ?></td>
            </tr>
          <tr>
            <td  >Roll Number</td>
            <td ><input name="center" class="form-control" type="text" id="center" value="<?php if(isset($_REQUEST['id']))
       { echo trim($row['center']); } ?> "></td>
            </tr>
          <tr>
            <td  >Student Name</td>
            <td> 
              <input name="name" type="text" class="form-control" id="name" value="<?php  if(isset($_REQUEST['id'])) { echo $row['name']; } ?>" > </td>
            </tr>
          <tr>
            <td  > Father Name</td>
            <td><input name="fname" class="form-control" type="text" id="fname" value="<?php if(isset($_REQUEST['id']))
       {  echo $row['fname']; } ?>"></td>
            </tr>
          <tr>
            <td  valign="top" >Address</td>
            <td><textarea name="address" rows="3" class="form-control" id="address"><?php  if(isset($_REQUEST['id']))
       { echo $row['address']; } ?></textarea></td>
            </tr>
          
          <tr>
            <td  >DOB</td>
            <td>
                    <?php
                    if(isset($_REQUEST['id']))
                    {

                      $arr12 = explode('-',$row['dob']);
   $arr12[2]."-".$arr12[1]."-".$arr12[0];  
 }
   ?>
            <select name="d">
             <option value>DD</option>
             <?php 
             for($i=1;$i<=31;$i++)
             {
             ?>
             <option value="<?php echo $i; ?>" <?php if(isset($_REQUEST['id']))
                    { if($i==$arr12[2]) echo 'selected'; } ?> ><?php echo $i; ?></option>
             <?php
             }
             ?>
  </select>
              <select name="m">
             <option value>MM</option>
             <?php 
             for($i=1;$i<=12;$i++)
             {
             ?>
  <option value="<?php echo $i; ?>" <?php if(isset($_REQUEST['id']))
                    { if($i==$arr12[1]) echo 'selected'; } ?> ><?php echo $i; ?></option>
             <?php
             }
             ?>
             </select>
                     
              <select name="y">
             <option value>YY</option>
                    
             <?php 
               $rr= date("Y") ;
             $dd1=$rr-25;
             $dd=$rr;
             ?>
                         <?php
             for($i=$dd1;$i<=$dd;$i++)
             {
             ?>
             <option value="<?php echo $i; ?>" <?php if(isset($_REQUEST['id']))
                    { if($i==$arr12[0]) echo 'selected'; } ?>><?php echo $i; ?></option>
             <?php
             }
             ?>
             </select>
              <input name="doj2" type="hidden" class="text_1" id="doj2" value="<?php if(isset($_REQUEST['id']))
                    { echo $row['doj']; } ?> " readonly   /></td>
            </tr>
          <tr>
            <td  id="sss3">Contact </td>
            <td colspan="2"><input name="contact" class="form-control" type="text" id="contact" value="<?php if(isset($_REQUEST['id']))
                    { echo $row['contact']; } ?>"></td>
            </tr>
          <tr >
            <td colspan="3" align="center" bgcolor="#CCCCCC" id="sss5">Certificate Details</td>
            </tr>
          <tr>
                    <td  > Class Name</td>
                    <td colspan="2">
                      <select class="form-control" name="course" id="course">
                       <option selected>Select Class Name</option>
                  <?php                
                $qr=mysqli_query($DB_LINK,"select * from course order by id asc  ");
        $i=0;
                while($content_qry1=mysqli_fetch_array($qr))
        {  
        $i++;
        
        extract($content_qry1);
        ?>      
                  <option value="<?php echo $content_qry1['name']?>" <?php if(isset($_REQUEST['id']))
                    { if($content_qry1['name']==$row['course']  ) echo 'selected';}?>  ><?=$content_qry1['name'];?></option>
                <?php
                
        }?>          
                </select>
        
              </td>
                  </tr>
                
                  <tr>
                    <td height="22"  id="ss3">TC certificate  No</td>
                    <td colspan="2"><input required name="reg" class="form-control" type="text" id="reg" value="<?php if(isset($_REQUEST['id']))
                    {  echo trim($row['reg']); } ?> "></td>
                  </tr>
                  <tr>
                    <td height="22"  id="ss">TC Certificate Issue Date</td>
                    <td colspan="2"><input name="doj" type="hidden" class="text_1" id="doj" value="<?php if(isset($_REQUEST['id']))
                    {   echo $row['doj']; } ?>" readonly   />
                    
                     <?php 
                     if(isset($_REQUEST['id']))
                    {

                      $arr12 = explode('-',$row['doj']);
   $arr12[2]."-".$arr12[1]."-".$arr12[0];  
 }


                      
   ?>
                      <select name="d2">
                        <option value>DD</option>
                       
                        <?php 
             for($i=1;$i<=31;$i++)
             {
             ?>
                        <option value="<?php echo $i; ?>" <?php  if(isset($_REQUEST['id']))
                    {
 if($i==$arr12[2]) echo 'selected'; } ?>><?php echo $i; ?></option>
                        <?php
             }
             ?>
                    </select>
                      <select name="m2">
                        <option value>MM</option>
                      
                        <?php 
             for($i=1;$i<=12;$i++)
             {
             ?>
                        <option value="<?php echo $i; ?>" <?php  if(isset($_REQUEST['id']))
                    {
  if($i==$arr12[1]) echo 'selected'; } ?>><?php echo $i; ?></option>
                        <?php
             }
             ?>
                    </select>
                      <select name="y2">
                        <option value>YY</option>
                        
                        <?php 
               $rr= date("Y") ;
             $dd1=$rr-2;
             $dd=$rr;
             ?>
                        <?php
             for($i=$dd1;$i<=$dd;$i++)
             {
             ?>
                        <option value="<?php echo $i; ?>" <?php  if(isset($_REQUEST['id']))
                    {
  if($i==$arr12[0]) echo 'selected'; } ?>><?php echo $i; ?></option>
                        <?php
             }
             ?>
                    </select></td>
                  </tr>  <tr>
                    <td height="22"  id="ss2">TC Certificate Scan Copy</td>
                    <td colspan="2"><input name="uploaded_file" type="file" id="uploaded_file" size="21"></td>
                  </tr>
                  <tr>
                    <td width="25%" height="22">&nbsp;</td>
                    <td colspan="2">
                 <?php   
                      if(isset($_REQUEST['id']))
                    {

       
         
         ?>
                    <input name="go2" type="submit" class="btn btn-success " id="go2" value="Update Details" onClick="return chk();">     
                 <?php
       }else
       {
              ?>        <input name="go" type="submit" class="btn btn-success" id="go2" value="Save Details" onClick="return chk();">     
              
              <?php }?>               
                    </td>
                  </tr> 
                  
                 
                   </table>
              </form>
        </div>
      </div>
      </div>
    </div>
    <!-- /.col -->
    <!-- /.row -->
  </div>
  <!-- /.page-content -->
</div>
<!-- /.main-content -->
<?php //include('include/footer.php');?>
<?php include("include/footer_file.php"); ?>
</body>
</html>
<?php 
mysqli_close($DB_LINK);
ob_end_flush();
?>