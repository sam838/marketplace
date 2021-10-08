<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('properties-import.data-logo-icon')
    <title>Our Daily Sneaky</title>
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/card.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    @include('properties-import.data-swiper')
    <div class="carditem">
        <div class="carditem-content-wrapper">
            <div class="carditem-content">
                <div class="carditem-content-image-wrapper">
                    <img class="carditem-content-image" src="https://brand.assets.adidas.com/image/upload/f_auto,q_auto,fl_lossy/enUS/Images/orig-fw20-zx2k-octoberdrop-tc-large-FY2013-d_tcm221-587676.jpg" alt="">
                </div>
                <div class="carditem-content-blur"></div>
                <div class="carditem-content-title">
                    <span class="text-white" style="font-family: 'Montserrat', sans-serif;font-size: 2.0em;">ZX 2K BOOST</span>
                    <a href="">
                        <div class="carditem-content-title-button">
                            <i class="fas fa-shopping-cart"></i></i> &nbsp; SHOW NOW
                        </div>
                    </a>
                </div>
            </div>
            <div class="carditem-content">
                <div class="carditem-content-image-wrapper">
                    <video loop autoplay playsinline class="carditem-content-image" src="https://brand.assets.adidas.com/video/upload/q_auto,vc_auto/video/upload/global%20brand%20publishing/Originals/Star%20Wars%20Mandalorian/originals-fw20-starwars-DTC-launch-sustain-week-1-female-glp-tc-d.mp4"></video>
                </div>
                <div class="carditem-content-blur"></div>
                <div class="carditem-content-title">
                    <span class="text-white" style="font-family: 'Montserrat', sans-serif;font-size: 2.0em;">THE MANDALORIAN&trade; COLLECTION</span>
                    <a href="">
                        <div class="carditem-content-title-button">
                            <i class="fas fa-shopping-cart"></i></i> &nbsp; SHOW NOW
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <h2 style="text-align: center;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">WHAT'S TRENDING</h2>
    <div class="swiper-container sec-swiper">
		<div class="swiper-wrapper">
            @foreach($sneaker as $s)
                <a href = "detailSneaker/{{$s->id_sneaker}}" class="swiper-slide" style="background-image: url({{asset('assets/images/sneakers/'.$s->id_sneaker.'-right.jpg')}});background-position: bottom;"></a>
            @endforeach
		</div>
		<div class="swiper-scrollbar"></div>
    </div>
    <div class="promo-container">
        <img class="promo-content" src="{{asset('assets/images/offers.png')}}" alt="">
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
