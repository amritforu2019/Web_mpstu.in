<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                <a href="<?php echo $SITE_URL;?>" class="logo"><img src="assets/links/images/logo.png" class="img-fluid"></a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center">
                <!-- <div class=" h1 logo-name-hindi display-4">Maharana Pratap Science & Technology University</div>
                 <div class="stroke"></div>-->
                <div class="h2 logo-name text-uppercase"><?php echo $SITE_NAME;?></div>
                <div class="stroke"></div>
                <div class="h5 logo-name text-uppercase"><?php echo $ADDRESS;?></div>
                <div class="h6 logo-name text-uppercase">( A CORE BRANCHES OF HGU- IEC  )</div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 text-right text-white ">
                <table  class="ghadi-pahle-istimal-kare"  >
                    <tr><td style="text-align: right;"><canvas id="canvas_tt5bb4b35c21470" width="115" height="115"></canvas></td></tr>
                    <tr><td style="text-align: center; font-weight: bold"><a href="//24timezones.com/current_local/india_time.php" style="text-decoration: none" class="clock24" id="tz24-1538569052-cc13072-eyJzaXplIjoiMTc1IiwiYmdjb2xvciI6IjAwMDAwMCIsImxhbmciOiJlbiIsInR5cGUiOiJhIiwiY2FudmFzX2lkIjoiY2FudmFzX3R0NWJiNGIzNWMyMTQ3MCJ9" title="current time in India" target="_blank" rel="nofollow"></a></td></tr>
                    <tr><td><div    style="  text-align:center;  font-size: 10px;" id="clock">&nbsp;</div></td></tr>
                </table>
                <script type="text/javascript" src="//w.24timezones.com/l.js" async></script>
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar-dark bg-navyblue-light">
    <div class="container">
        <a class="navbar-brand" href="#"><?php echo $SITE_SHORT_NAME;?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>

                <?php $l1_qry=mysqli_query($DB_LINK,"select * from tbl_menu where parent='1' order by id asc")or die(mysqli_error($DB_LINK));
                foreach($l1_qry as $l1_data)
                {
                $childcount =get_child_count($l1_data['id']);
                    if ($childcount == 0) {?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $l1_data['url'];?>"><?php echo $l1_data['name'];?></a></li>
                    <?php } else { ?>
                        <li class="nav-item dropdown"  >
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo normalall_filter($l1_data['name'])?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php $l2_qry=mysqli_query($DB_LINK,"select * from tbl_menu where parent='".$l1_data['id']."' order by name asc")or die(mysqli_error($DB_LINK));
                                while($l2_data=mysqli_fetch_array($l2_qry))
                                { ?>
                                    <a class="dropdown-item" href="<?php echo $l2_data['url'];?>"><blink><?php echo normalall_filter($l2_data['name'])?></blink></a>
                                <?php } ?>
                            </div>
                        </li>
                <?php  } } ?>


                <li class="nav-item" style="background-color: #ff8600;"><a class="nav-link" href="result">Result</a></li>
                <li class="nav-item" style="background-color: #c82929;"><a class="nav-link" href="student_portal/">Student Portal</a></li>
                <!--<li class="nav-item"><a class="nav-link" href="contact-us">Contact Us</a></li>-->
            </ul>
        </div>
    </div>
</nav>