<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- swiper  -->
<link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
<!-- navbar -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/footer.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/swiper.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/global.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.css')}}">

<script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
<!--Chart-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">

<script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('a[href="#search"]').on('click', function(event) {
            $('#search').addClass('open');
            $('#search > form > input[type="search"]').focus();
        });
        $('#search, #search button.close').on('click keyup', function(event) {
            if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
                $(this).removeClass('open');
            }
        });
    });
</script>
