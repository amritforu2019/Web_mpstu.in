
<?php  //session_start();
//error_reporting(0); 
?>
 

<!--Success Message--> 

 <?php if(isset($_SESSION['suc_msg'])) { if($_SESSION['suc_msg']!='') { ?>
  <script>
        $(document).ready(function() {
			setTimeout(function() {
                toastr.options = {
					closeButton: true,
					debug : true,
					progressBar: true,
					showDuration: "400",
					hideDuration: "1000",
					timeOut: "2000",
					extendedTimeOut: "1000",
					showEasing: "swing",
					hideEasing: "linear",
					showMethod: "fadeIn",
					hideMethod: "fadeOut"
                };
                toastr.success('<?php echo $_SESSION['suc_msg'];?>', 'Successfully !! ');

        }, 1300);
 
});
</script><?php    $_SESSION['suc_msg']=''; }  } ?> 


<!--Error Message--> 

<?php if(isset($_SESSION['err_msg'])) { if($_SESSION['err_msg']!='') {  ?>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
					debug : true,
					progressBar: true,
 
					showDuration: "400",
					hideDuration: "1000",
					timeOut: "2000",
					extendedTimeOut: "1000",
					showEasing: "swing",
					hideEasing: "linear",
					showMethod: "fadeIn",
					hideMethod: "fadeOut"
                };
                toastr.error('<?php echo $_SESSION['err_msg'];?>', 'Error !! ');

        }, 1300);
 
});
</script>
<?php   $_SESSION['err_msg'] =''; } }  ?> 



<!--Info/Welcome Message--> 

<?php if(isset($_SESSION['info_msg'])) {  if($_SESSION['info_msg']!='') {?>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.info('<?php echo $_SESSION['info_msg'];?>', 'Welcome');

            }, 1300);

});
</script>
<?php    $_SESSION['info_msg']='' ; }  } ?>



<!--Warning Message--> 
	

<?php if(isset($_SESSION['warn_msg'])) {  if($_SESSION['warn_msg']!='') {?>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.warning('<?php echo $_SESSION['warn_msg'];?>', 'Warning!!!');

            }, 1300);

});
</script>
<?php    $_SESSION['warn_msg']='' ; } } ?>
             
             