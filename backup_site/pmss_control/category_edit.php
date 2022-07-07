<?php ob_start(); include('../con_base/functions.inc.php');  master_main();



$qry=mysqli_query($DB_LINK,"select * from tbl_category where id=".$_GET['edit']) or die(mysqli_error());

$row=mysqli_fetch_array($qry);





require_once 'get_categories.php';

$categoryList = fetchCategoryTree2();





$req='';

$imgsize='';

$style='';

if($_REQUEST['parent']=='164')

{

	$categoryList = fetchCategoryTree_noleg('164');

	$req='required';

	$imgsize=' Note : For Best Resolution use 1050 X 350';

}

if($_REQUEST['parent']=='195')

{

	$categoryList = fetchCategoryTree_noleg('195');

	$req='required';

	$imgsize=' Note : For Best Resolution use 400 X 300';

}

if($_REQUEST['parent']=='186')

{

	$categoryList = fetchCategoryTree_noleg('186');

	$req='required';

	$imgsize=' Note : For Best Resolution use 170 X 70';

}

if($_REQUEST['parent']=='126')

{

	$categoryList = fetchCategoryTree_noleg('126');

	$req='required';

	$imgsize=' Note : For Best Resolution use 80 X 80';

}    





if(isset($_POST['update'])) 

{

 require_once("uploader-file-master.php");

   $i1='';

   if (isset($_FILES['uploaded_file'])) 

   {

    uploadmaster("../assets/upload/category/", 'uploaded_file');

    if ($finame != '') 

    {  

      $qry=mysqli_query($DB_LINK,"select image from tbl_category where id=".$_GET['edit']) or die(mysqli_error());

        $row=mysqli_fetch_array($qry);

        unlink('../assets/upload/category/'.$row['image']);

      

      $f1= $finame;

      $i1=" , image='$f1'  ";

    }

  }



    if(mysqli_query($DB_LINK, "update tbl_category set

					parent_id=".$_POST['parent_id'].", 

					 title='".trim(ucwords(addslashes($_POST['title'])))."', 

					 ext_link='".trim($_POST['ext_link'])."',

					 description='".trim($_POST['description'])."',

					 ord='".trim($_POST['ord'])."',  

					 lastupdate='".date('Y-m-d')."', 

					 userid=".$_SESSION['master_userid'].", 

					 ipaddress='".$_SERVER['REMOTE_ADDR']."' $i1

					 where id=".$_GET['edit']))

    {

		$_SESSION['suc_msg']="Updated Successfully";

    	header("location:category_list?parent=".$_POST['parent_id']."");

		exit;

	}

	else

	{

		$_SESSION['msg']=array('error', 'Oops.. Something went wrong');

    	header("location:category_list?parent=".$_POST['parent_id']."");

		exit;

	}

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<meta charset="utf-8" />

<title>Category Edit :: <?php echo $SITE_NAME;?></title>

<meta name="description" content="overview &amp; stats" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<?php include("include/header_file.php"); ?>

</head>

<body class="no-skin">

<div class="main-container">

  <div class="main-content">

    <div class="main-content-inner">

      <div class="page-content">

        <div class="page-header">

          <h1> Edit Category </h1>

        </div>

        <!-- /.page-header -->

        <div class="row">

          <div class="col-xs-12">

            <!-- PAGE CONTENT BEGINS -->

            <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data" target="_parent">

              <div class="form-group">

                <label class="col-sm-3 control-label no-padding-right"> Category </label>

                <div class="col-sm-9">

                  <select name="parent_id" class="form-control">

                  <?php  if($_SESSION['master_username']=='Developer'){?>

                  <option value="0" >None</option>

                  <?php  }?>

                  <?php foreach($categoryList as $cl) { ?>

                  <option value="<?php echo $cl["id"] ?>" <?php if($row['parent_id']==$cl["id"]) { echo 'selected'; } ?>><?php echo $cl["title"]; ?></option>

                  <?php } ?>                </select>

                </div>

              </div>

              <div class="form-group">

              <label class="col-sm-3 control-label no-padding-right"> Title </label>

              <div class="col-sm-9">

                <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo stripslashes($row['title']);?>" required >

              </div>

            </div>

             <?php if($_REQUEST['parent']=='307')

{?>

   <div class="form-group">

              <label class="col-sm-3 control-label no-padding-right"> Enter Date</label>

              <div class="col-sm-9">

                <input type="text" name="ext_link" class="form-control" placeholder="YYYY-MM-DD" value="<?php echo $row['ext_link'];?>"  required  >

              </div>

            </div>

<?php } else { ?>

            <div class="form-group">

              <label class="col-sm-3 control-label no-padding-right"> External Link </label>

              <div class="col-sm-9">

                <input type="text" name="ext_link" class="form-control" placeholder="External Page Link" value="<?php echo $row['ext_link'];?>"   >

              </div>

            </div>

          <?php } ?>

        

            

            <div class="form-group">

              <label class="col-sm-3 control-label no-padding-right"> Ordering </label>

              <div class="col-sm-9">

                <input type="text" name="ord" class="form-control" placeholder="Ordering" value="<?php echo $row['ord'];?>"   >

              </div>

            </div>

            

            

              <div class="form-group">

               

              <div class="col-sm-12">

              Description<br>

                <textarea name="description" class="form-control" id="editor" rows="4" placeholder="Enter Description"><?php echo $row['description'];?></textarea>

                

                

                <?php include("../assets/main/ckeditor.sc.php");?>

              </div>

            </div>

             <div class="form-group">

                <label class="col-sm-2 control-label no-padding-right">Attachment </label>

                <div class="col-sm-4">

                  <input name="uploaded_file" type="file" id="id-input-file" <?=$req;?> >

                  ( Image Files <?=$imgsize;?>)

                </div>

              </div>

              <div class="form-group">

                <div class="col-sm-3 control-label no-padding-right"></div>

                <div class="col-md-9 no-padding-right" style="padding-left: 125px;">

                  <button class="btn btn-info" type="submit" name="update"> <i class="ace-icon fa fa-edit bigger-110"></i> Update </button>

                  <button class="btn btn-default" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i> Reset</button>

                </div>

              </div>

            </form>

          </div>

        </div>

        <!-- /.col -->

        <!-- /.row -->

      </div>

      <!-- /.page-content -->

    </div>

  </div>

  <!-- /.main-content -->

</div>

<?php include("include/footer_file.php"); ?>

</body>

</html>

<?php 

mysqli_close($DB_LINK);

ob_end_flush();

?>