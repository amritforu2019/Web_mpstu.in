<?php ob_start();

      include('../con_base/functions.inc.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<meta charset="utf-8" />

<title>Login Page -<?php echo $SITE_NAME;?></title>

<meta name="description" content="User login page" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<?php include("include/header_file.php"); ?>

 

<style type="text/css">

  .light-login

  { 

<?php $randval=rand(1,6);

if($randval==1)  echo 'background: url(../assets/images/bg.jpg);';

if($randval==2)  echo 'background: url(../assets/images/bg1.jpg);';

if($randval==3)  echo 'background: url(../assets/images/bg2.jpg);';

if($randval==4)  echo 'background: url(../assets/images/bg3.jpg);';

if($randval==5)  echo 'background: url(../assets/images/bg4.jpg);';

if($randval==6)  echo 'background: url(../assets/images/bg5.jpg);';

 ?>

    

    height: 100%;

    background-position: center;

    background-repeat: no-repeat;

    background-size: cover;

  }

    #particles-js{
  width: 100%;
  height: 100%; 
  background-size: cover;
  background-position: 50% 50%;
  background-repeat: no-repeat;
}
canvas{
   
    position: absolute;
    top: 0px;
    opacity: 0.8;
    height: 100%;
    width: 100%;  
}

</style>



 

</head>

<body class="login-layout light-login" id="particles-js">

<div class="main-container">

  <div class="main-content">

    <div class="row">

      <div class="col-sm-10 col-sm-offset-1">

        <div class="login-container">

          <div class="space"></div>

           <div class="space"></div>

          <div class="position-relative">

            <div id="login-box" class="login-box visible widget-box no-border" style="z-index: 1000">

              <div class="widget-body">

                <div class="widget-main">

                   <div class="center text-center ">

            <h1> <i class="ace-icon fa"></i> <span class="red"><?php echo $SITE_NAME;?></span> <br><span class="red2" id="id-text2"><small>Administrator Login </small></span> </h1>

          </div>

         

                  <h4 class="header blue lighter bigger"> <i class="fa fa-lock"></i> Please

                    Enter Your Credentials </h4>

                  <div class="space-6"></div>

                  <form action="login" method="post">

                    <fieldset>

                      <label class="block clearfix"> <span class="block input-icon input-icon-right">

                        <input type="text" class="form-control" placeholder="Username" name="loginid" required />

                        <i class="ace-icon fa fa-user"></i> </span> </label>

                      <label class="block clearfix"> <span class="block input-icon input-icon-right">

                        <input type="password" class="form-control" placeholder="Password" name="password" required />

                        <i class="ace-icon fa fa-lock"></i> </span> </label>

                    <!--   <div class="space"></div> -->

                      <div class="clearfix">

                        <input name="previous_pg" type="hidden" id="previous_pg" value="<?php if(isset($_GET['previous_pg'])) echo $_GET['previous_pg']?>">

                        <button type="submit" class="  btn btn-sm btn-primary form-control" name="Login"> <i class="ace-icon fa fa-key"></i> <span class="bigger-110">Login</span> </button>

                      </div>

                      <div class="space-6"></div>

                        <a href="../" class=" pull-right btn btn-sm btn-success  " ><i class="ace-icon fa fa-home"></i> <span class="bigger-110"> Home Page </span></a>

                   

                       <div class="space"></div>

                      <div class="col-md-12 col-sm-12  header blue lighter bigger text-center" >

                        <div class="space"></div>



                         <span>Developed By <a href="http://www.devindia.in" target="_blank">Dev India</a> </span>

                      </div>

                      <div class="space-4"></div>

                      <div class="text-center green">Today : <?php echo date('D d M Y');?> IP : <?php echo get_client_ip();?></div>

                    </fieldset>

                  </form>

                </div>

                <!-- /.widget-main -->

              </div>

            </div>

            <!-- /.widget-body -->

          </div>

          <!-- /.login-box -->

        </div>

        <!-- /.position-relative -->

      </div>

    </div>

    <!-- /.col -->

  </div>

  <!-- /.row -->

  <!-- /.main-content -->

</div>

<?php include("include/footer_file.php"); ?>

<script src="../assets/plugins/partical/particles.js"></script>
<script src="../assets/plugins/partical/demo/js/app.js"></script>


</body>

</html>

<?php 

mysqli_close($DB_LINK);

ob_end_flush();

?>

