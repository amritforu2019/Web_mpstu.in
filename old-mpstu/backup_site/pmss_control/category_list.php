<?php ob_start(); include('../con_base/functions.inc.php');   master_main();





require_once 'get_categories.php';

 

if(isset($_GET['del']))

{

	 $qry=mysqli_query($DB_LINK,"select image from tbl_category where id=".$_GET['del']) or die(mysqli_error());

        $row=mysqli_fetch_array($qry);

        if($row['image']!='')

        {

        unlink('../assets/upload/category/'.$row['imasge']);

        }

	

	$qry=mysqli_query($DB_LINK,"select parent_id from tbl_category where id=".$_GET['del']) or die(mysqli_error());

    $row=mysqli_fetch_array($qry);

    mysqli_query($DB_LINK,"delete from tbl_category where id=".$_GET['del']) or die(mysqli_error());

	$_SESSION['msg']=array('success', 'Deleted Successfully');

	header("location:category_list?parent=".$row['parent_id']."");

	exit;

}

if(isset($_REQUEST['ban']))

{

    mysqli_query($DB_LINK,"update tbl_category set status=0 where id=".$_GET['ban']) or die(mysqli_error());

	$_SESSION['msg']=array('success', 'Banned Successfully');

    header("location:category_list?parent=".$_GET['parent']."");

	exit;

}

if(isset($_REQUEST['unban']))

{

    mysqli_query($DB_LINK,"update tbl_category set status=1 where id=".$_GET['unban']) or die(mysqli_error());

	$_SESSION['msg']=array('success', 'Unbanned Successfully');

    header("location:category_list?parent=".$_GET['parent']."");

	exit;

}



if(isset($_REQUEST['in_cat']))

{

    mysqli_query($DB_LINK,"update tbl_category set is_cat=1 where id=".$_GET['in_cat']) or die(mysqli_error());

	$_SESSION['msg']=array('success', 'Updated Successfully');

    header("location:category_list?parent=".$_GET['parent']."");

	exit;

}

if(isset($_REQUEST['out_cat']))

{

    mysqli_query($DB_LINK,"update tbl_category set is_cat=0 where id=".$_GET['out_cat']) or die(mysqli_error());

	$_SESSION['msg']=array('success', 'Updated Successfully');

    header("location:category_list?parent=".$_GET['parent']."");

	exit;

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<meta charset="utf-8" />

<title>Category / Menu List  :: <?php echo $SITE_NAME;?></title>

<meta name="description" content="overview &amp; stats" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<?php include("include/header_file.php"); ?>

<script type="text/javascript">

function cp(a,b,c)

{

	window.location.href="cust_list?txtsearch="+a+"&fdt="+b+"&tdt="+c;

}

</script>

</head>

<body class="no-skin">

<?php include('include/header.php');?>

  <?php include('include/sidemenu.php');?>

  <div class="main-content">

    <div class="main-content-inner">

      <div class="breadcrumbs ace-save-state" id="breadcrumbs">

        <ul class="breadcrumb">

          <li> <i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a> </li>

          <li><a href="">Posts </a></li>

          <li class="active">Category / Menu List</li>

        </ul>

        <!-- /.breadcrumb -->

      </div>

      <div class="page-content">

        <!-- /.page-header -->

        <div class="page-content">

        <div class="page-header">

          <h1> Category / Menu List <?php

if(isset($_GET['parent']))

{

	if(($_GET['parent'])!=0)

{

   $qry=mysqli_query($DB_LINK,"select * from tbl_category where id=".$_GET['parent']) or die(mysqli_error());

$row=mysqli_fetch_array($qry);

echo  'Related To '.strtoupper($row['title']);  

}

}





$parent_id="parent_id=0";

if(isset($_GET['parent']))

				{

					$parent_id="parent_id= '".trim($_GET['parent'])."' ";

					$p="NO";

					if($_GET['parent']!=0)

					{

						$p="YES";

					}

				}

				else

				{

					$parent_id="parent_id=0";

					$p="NO";

				}







		  ?></h1>

        </div><?php if($p=="YES") { ?>

        <div class="row">

          <div class="col-xs-12 text-right"> <a href="category_reg?parent=<?php echo isset($_GET['parent'])?$_GET['parent']:'0';?>"  class="btn btn-primary various fancybox.iframe" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a>  </div>

        </div>

        <?php } 

		if($_SESSION['master_username']=='Developer') { ?>

        <div class="row">

          <div class="col-xs-12 text-right"> <a href="category_reg?parent=<?php echo isset($_GET['parent'])?$_GET['parent']:'0';?>"  class="btn btn-primary various fancybox.iframe" type="submit" name="submit"> <i class="fa fa-plus"></i> Add New </a>  </div>

        </div>

        <?php } ?>

        <!-- /.page-header -->

        <div class="row">

          <div class="col-xs-12">

            <div class="clearfix">

              <div class="pull-right tableTools-container"></div>

            </div>

            <!-- div.table-responsive -->

            <!-- div.dataTables_borderWrap -->

            <div>

            <?php

            

					if($p=="YES")

					{

					?>

					<table id="example" class="table table-striped table-hover nowrap" cellspacing="0" width="100%">

                <thead>

                  <tr>

                      <th>Sr. No.</th>

                      <th>Title</th>

                      <th>Ordering</th>

                      <th>Last Updated </th>

                      <th>Action</th>

                      <th></th>

                    </tr>

                </thead>

                <tbody>

                <?php

                $count=1; 

				

				$qry=mysqli_query($DB_LINK,"select * from tbl_category where $parent_id order by ord asc") or die(mysqli_error());

                foreach($qry as $row)

                {

                  ?>

                    <tr class="table-activity">

                      <td><?php echo $count;?></td>

                      <td>

                      <?php if($_GET['parent']=='246' || $row['id']=='262'  || $_GET['parent']=='195') {

                      	echo '<a href="category_list?parent='.$row['id'].'">'.strtoupper(stripslashes($row['title'])).'</a>';

                      }

                      else

                      {



                      	echo strtoupper(stripslashes($row['title']));

                      }

                       if($row['ext_link']!='') echo  '<br>'.($row['ext_link']); 



                      ?>

                      

                      <?php /*?><a href="category_list?parent=<?php echo $row['id'];?>">  </a><div class="tools action-buttons">

                      <?php 

					  if($row['parent_id']!=0)

					   {

						   ?>

                       <a class="various fancybox.iframe blue" href="category_edit.php?edit=<?php echo $row['id'];?>" title="Edit"><i class="ace-icon fa fa-pencil bigger-125"></i></a>

                       

                       <?php if($row['status']==1){ ?>

                        <a href="category_list.php?ban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>

                        <?php } else  { ?>

                        <a href="category_list.php?unban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>

                        <?php }   if($_SESSION['master_username']=='Developer')

						   {?>

                       <a class="red"onClick="return del(<?php echo $row['id'];?>, 'category_list')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a>  <?php } }     ?>

                       

                       

                        

                     

                       </div><?php */?>

                      </td>

                      <td><?php echo $row['ord'];?></td>

                      <td><?php echo date_dm($row['regdate']);?></td>

                       <td>

					   <?php 

					  if($_SESSION['master_username']=='Developer')

					  {

						  ?>

						  <a class="various fancybox.iframe blue" href="category_edit.php?edit=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>" title="Edit"><i class="ace-icon fa fa-pencil bigger-125"></i></a>

                          

                           &nbsp;<a class="red"onClick="return del(<?php echo $row['id'];?>, 'category_list')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a> 

                           

                            <?php if($row['status']==1){ ?>

                        &nbsp;<a href="category_list.php?ban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>

                        <?php } else  { ?>

                        &nbsp;<a href="category_list.php?unban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>

                        <?php }  ?>

                           

						  <?php

						  ///////////////////////////////////////////////

					   if($row['parent_id']!=0)

					   {

					   /* if($row['is_cat']==0) 

					   { 

					   echo '&nbsp;<a href="category_list.php?in_cat='.$row['id'].'&parent='.$row['parent_id'].'" class="red"><strong>Not Index</strong></a>'; 

					   } else if($row['is_cat']==1) 

					   { 

					   echo '&nbsp;<a href="category_list.php?out_cat='.$row['id'].'&parent='.$row['parent_id'].'" class="green"><strong>Index</strong></a>'; 

					   } */

					   }

					   

					   

					  }

					  else

					  {

					  

					  ?>

					   <?php

					   if($row['parent_id']!=0)

					   {

						?><a class="various fancybox.iframe blue" href="category_edit.php?edit=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>" title="Edit"><i class="ace-icon fa fa-pencil bigger-125"></i></a> <?php

					   

					   if($row['parent_id']!=108  && $row['parent_id']!=246 && $row['parent_id']!=247 && $row['parent_id']!=248 && $row['parent_id']!=249 && $row['parent_id']!=250 && $row['parent_id']!=251 && $row['parent_id']!=252 && $row['parent_id']!=253 && $row['parent_id']!=263 && $row['parent_id']!=262 && $row['parent_id']!=246 && $row['parent_id']!=246 && $row['parent_id']!=246)

					   {

						   ?>

						   &nbsp;<a class="red"onClick="return del(<?php echo $row['id'];?>, 'category_list')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a>

						  

						   <?php

					   }

					       if($row['status']==1){ ?>

                        &nbsp;<a href="category_list.php?ban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>

                        <?php } else  { ?>

                        &nbsp;<a href="category_list.php?unban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>

                        <?php }   

					    

					  /* if($row['is_cat']==0 ) 

					   { 

					   echo '<a href="category_list.php?in_cat='.$row['id'].'&parent='.$row['parent_id'].'" class="red"><strong>Not Index</strong></a>'; 

					   } else if($row['is_cat']==1  ) 

					   { 

					   echo '<a href="category_list.php?out_cat='.$row['id'].'&parent='.$row['parent_id'].'" class="green"><strong>Index</strong></a>'; 

					   } */

					    

					   ?>

					   

					    <?php

					   }

					   

					   

					  }?></td>

                       <td><?php if($row['image']!='') 

             { 

             echo '<a class="various fancybox.iframe blue" href="../assets/upload/category/'.$row['image'].'" title="Edit"><img src="../assets/upload/category/'.$row['image'].'"  class="" / ></a>'; 

             } 

              ?></td>

                     </tr>

                    <?php $count++; 

					$url = strtolower(clean($row['title']).'');

					if($row['url']!=$url)

					{

				    mysqli_query($DB_LINK, "update tbl_category set  

					url='$url' 

					where id=".$row['id']);

					}

					

					

					} ?>

                </tbody>

                

              </table>

					<?php

					 

				}

				else

				{

					?>

                  

					<div class="row">

									 



									<div class="col-xs-12 col-sm-12 pricing-span-body text-center">

									 

                                       <?php

                $count=1; 

				

				$qry=mysqli_query($DB_LINK,"select * from tbl_category where $parent_id order by ord asc") or die(mysqli_error());

                foreach($qry as $row)

                {

                  ?>

										<div class="pricing-span">

											<div class="widget-box pricing-box-small widget-color-blue">

												<div class="widget-header">

													<h5 class="  lighter"> <?php echo strtoupper($row['title']);?></h5>

												</div>



												<div class="widget-body">

													<div class="widget-main no-padding">

														<ul class="list-unstyled list-striped pricing-table">

															 



															<?php /*?><li>

																<i class="ace-icon fa fa-check green"></i>

																<?php echo $count;?>

															</li><?php */?>

														</ul>



														<div class="price">

															<span class="label label-lg label-inverse arrowed-in arrowed-in-right">

																 (<?php echo sizeof(fetchCategoryTree2($row['id'])) ;?>)

																<small></small>

															</span>

														</div>

                                                        

                                                        <div class="text-center">

					   <?php 

					  if($_SESSION['master_username']=='Developer')

					  {

						  ?>

						  <a class="various fancybox.iframe blue" href="category_edit.php?edit=<?php echo $row['id'];?>" title="Edit"><i class="ace-icon fa fa-pencil bigger-125"></i></a>

                          

                           &nbsp;<a class="red"onClick="return del(<?php echo $row['id'];?>, 'category_list')"> <i class="ace-icon fa fa-times bigger-125" title="Delete"></i> </a> 

                           

                            <?php if($row['status']==1){ ?>

                        &nbsp;<a href="category_list.php?ban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:green" title="Ban"></i></a>

                        <?php } else  { ?>

                        &nbsp;<a href="category_list.php?unban=<?php echo $row['id'];?>&parent=<?php echo $row['parent_id'];?>"  id="bandiv"><i class="fa fa-ban fa-lg" style="color:red" title="Unban"></i></a>

                        <?php }  ?>

                           

						  <?php

						  ///////////////////////////////////////////////

					   if($row['parent_id']!=0)

					   {

					    if($row['is_cat']==0) 

					   { 

					   echo '&nbsp;<a href="category_list.php?in_cat='.$row['id'].'&parent='.$row['parent_id'].'" class="red"><strong>Not Index</strong></a>'; 

					   } else if($row['is_cat']==1) 

					   { 

					   echo '&nbsp;<a href="category_list.php?out_cat='.$row['id'].'&parent='.$row['parent_id'].'" class="green"><strong>Index</strong></a>'; 

					   } 

					   }

					   

					   

					  }

					   ?></div>

													</div>



													<div>

														<a href="category_list?parent=<?php echo $row['id'];?>" class="btn btn-block btn-sm btn-primary">   <span>View</span>

														</a>

													</div>

												</div>

											</div>

										</div>

                  <?php  $count++;  $url = strtolower(clean($row['title']).'');

					if($row['url']!=$url)

					{

				    mysqli_query($DB_LINK, "update tbl_category set  

					url='$url' 

					where id=".$row['id']);

					}

					} ?>

                                        

 

									</div>

								</div>

					<?php

				}

			?>

              

              

              

                                <div><br></div>

            </div>

          </div>

        </div>

      </div>

      <!-- /.col -->

      <!-- /.row -->

    </div>

    <!-- /.page-content -->

  </div>

  </div>

  <!-- /.main-content -->

  <?php include('include/footer.php');?>

<?php include("include/footer_file.php"); ?>

</body>

</html>

<?php 

mysqli_close($DB_LINK);

ob_end_flush();

?>