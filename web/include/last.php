<script src="assets/links/js/jquery.js" type="text/javascript"></script>
<!--<script src="js/jquery.slim.js" type="text/javascript"></script>-->
<script src="assets/links/js/bootstrap.js" type="text/javascript"></script>
<script src="assets/links/js/classie.js" type="text/javascript"></script>
<script src="assets/links/js/jquery_002.js" type="text/javascript"></script>
<script src="assets/links/js/material-scrolltop.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        updateClock()
    });

    function updateClock (){
        var weekday=new Array(7);
        weekday[0]="Sunday";
        weekday[1]="Monday";
        weekday[2]="Tuesday";
        weekday[3]="Wednesday";
        weekday[4]="Thursday";
        weekday[5]="Friday";
        weekday[6]="Saturday";
        var currentTime = new Date ( );
        var currentHours = currentTime.getHours ( );
        var currentMinutes = currentTime.getMinutes ( );
        var currentSeconds = currentTime.getSeconds ( );
        var dayss=(currentTime.getDate()) < 10 ? ("0" + (currentTime.getDate())) : (currentTime.getDate())
        var month=(currentTime.getMonth()+1) < 10 ? ("0" + (currentTime.getMonth()+1)) : (currentTime.getMonth()+1)
        var currentDate = weekday[currentTime.getDay()]+', '+dayss + "-" + month + "-" + currentTime.getFullYear();

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
        currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;



        // Compose the string for display
        var currentTimeString = currentDate


        $("#clock").html(currentTimeString);
    }
    $(function(){
        $('.image-link').viewbox();
    });
</script>
<script>
    $(document).ready(function() {
        $('body').materialScrollTop({

        });
    });

    $(document).ready(function(){
        $('#show').click(function() {
            $('.sub-menu').toggle("slide");
        });
    });

</script>
<script src="assets/links/js/owl.js" type="text/javascript"></script>
<script>
    $("#owl-demo2").owlCarousel({
        autoPlay:3000,
//   interval: 2000,
        items : 1,
        pagination : false,
        navigation :false,
    });
</script>
