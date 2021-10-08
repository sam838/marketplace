<script>
    $('.toggle').on('click', function() {
        $('.menu').toggleClass('active');
    });
</script>
<script>
    $(document).ready(function(){
        $('.custom-button').click(function(e){
            let x= e.pageX - $(this).offset().left;
            let y= e.pageY - $(this).offset().top;
            console.log(x);
            console.log(y);
            var style = {
                css:{
                    "left": x + 'px',
                    "top": y + 'px'
                }
            }
            var span = $("<span></span>", style);
            $(this).append(span);
            setTimeout(function (){
                span.remove();
            },500);
        })
    });
</script>
<script type="text/javascript" src="{{asset('assets/js/swiper.min.js')}}"></script>
<script>
    var swiper = new Swiper('.fst-swiper', {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    });
</script>
<script>
   var swiper = new Swiper('.sec-swiper', {
        slidesPerView: 5,
        spaceBetween: 30,
        freeMode: true,
        scrollbar: {
            el: '.swiper-scrollbar',
            hide: true,
    },
    });
</script>

