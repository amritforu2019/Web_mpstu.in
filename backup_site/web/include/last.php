	<!--/ End Footer -->
		<!-- <i class='fa fa-wrench faa-wrench animated fa-4x'></i>

<i class='fa fa-bell faa-ring animated fa-4x'></i>

<i class='fa fa-envelope faa-horizontal animated fa-4x'></i>

<i class='fa fa-heart faa-pulse animated fa-4x'></i>

<i class='fa fa-envelope faa-shake animated fa-4x'></i>

<i class='fa fa-envelope faa-burst animated fa-4x'></i>

<i class='fa fa-linux faa-tada animated fa-4x'></i> -->

		
		<!-- Jquery JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/jquery.min.js"></script>
        <script src="<?php echo $SITE_URL;?>/assets/links/js/jquery-migrate.min.js"></script>
		<!-- Popper JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/popper.min.js"></script>
		<!-- Bootstrap JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/bootstrap.min.js"></script>
		<!-- Colors JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/colors.js"></script>
		<!-- Jquery Steller JS -->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/jquery.stellar.min.js"></script>
		<!-- Particle JS -->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/particles.min.js"></script>
		<!-- Fancy Box JS-->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/facnybox.min.js"></script>
		<!-- Magnific Popup JS-->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/jquery.magnific-popup.min.js"></script>
		<!-- Masonry JS-->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/masonry.pkgd.min.js"></script>
		<!-- Circle Progress JS -->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/circle-progress.min.js"></script>
		<!-- Owl Carousel JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/owl.carousel.min.js"></script>
		<!-- Waypoints JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/waypoints.min.js"></script>
		<!-- Slick Nav JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/slicknav.min.js"></script>
		<!-- Counter Up JS -->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/jquery.counterup.min.js"></script>
		<!-- Easing JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/easing.min.js"></script>
		<!-- Wow Min JS-->
		<script src="<?php echo $SITE_URL;?>/assets/links/js/wow.min.js"></script>
		<!-- Scroll Up JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/jquery.scrollUp.min.js"></script>
		<?php /*?><!-- Google Maps JS -->
	<!-- 	<script src="http://maps.google.com/maps/api/js?key=AIzaSyC0RqLa90WDfoJedoE3Z_Gy7a7o8PCL2jw"></script> 
        <script src="<?php echo $SITE_URL;?>/assets/links/js/gmaps.min.js"></script>-->
<?php */?>

<script src='<?php echo $SITE_URL;?>/assets/links/css/lib/moment.min.js'></script> 
<script src='<?php echo $SITE_URL;?>/assets/links/js/fullcalendar.min.js'></script>

<script src="<?php echo $SITE_URL;?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
		<!-- Main JS-->
        <script src="<?php echo $SITE_URL;?>/assets/links/js/main.js"></script>


        <script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next ',
        center: 'title',
        right: 'listDay,listWeek,month'
      },
      // customize the button names, prev,next today
      // otherwise they'd all just say "list"
      views: {
        listDay: { buttonText: 'Days' },
        listWeek: { buttonText: 'Week' }
      },

      defaultView: 'listDay',
      defaultDate: '<?php echo date("Y-m-d")?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'Christmas Day',
          start: '2018-12-25'
        },
         {
          title: 'Happy New Year ',
          start: '2019-01-01'
        },
        {
          title: '31 December Event',
          start: '2018-12-31'
        },
        {
          title: 'Republic Day',
          start: '2019-01-26'
        },
         
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2018-03-28'
        }
      ]
    });

  });


  <?php if(isset($_SESSION['msg'])){ if($_SESSION['msg']!='')
{
    $result = alert_msg($_SESSION['msg'][0], 'User');
?>
swal({
    title: "<?php echo $_SESSION['msg'][1];?>",
    //text: "You clicked the button!",
    type: "<?php echo $result[1];?>"
});
<?php $_SESSION['msg']=''; } }?>
 
function del(delId, table)
{
    swal({
          title: "Are you sure want to remove?",
          text: "You will not be able to recover this item",
          type: "warning",
          showCancelButton: true,
      /*confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',*/
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Confirm",
          cancelButtonText: "Cancel",
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm) {
          if (isConfirm) {
            //swal("Deleted!", "Your item deleted.", "success");
      window.location.href = table+"?del="+delId;
          } else {
            swal("Cancelled", "You Cancelled", "error");
          }
      });
}


</script>
 <script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
  var img = document.images['captchaimg'];
  img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>