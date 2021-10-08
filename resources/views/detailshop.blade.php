<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Daily Sneak</title>
    @include('properties-import.data-logo-icon')
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/detail.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="detail-title" style="text-align: center;padding:1%">
        <h1 style="color: #17293b;font-weight: bold;font-family: 'Montserrat', sans-serif;">Detail</h1>
    </div>
    <div class="combine-detail">
        <div class="detail-container">
            <div class="swiper-container swiper-container-detail gallery-top gallery-top-detail">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide-detail swiper-slide-detail-top" style="background-image:url({{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-right.jpg')}})">
                    </div>
                    <div class="swiper-slide swiper-slide-detail swiper-slide-detail-top" style="background-image:url({{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-left.jpg')}})">
                    </div>
                    <div class="swiper-slide swiper-slide-detail swiper-slide-detail-top" style="background-image:url({{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-top.jpg')}})">
                    </div>
                </div>
            </div>
            <div class="swiper-container swiper-container-detail gallery-thumbs gallery-thumbs-detail">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide-detail" style="background-image:url({{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-right.jpg')}});background-position: bottom;">
                    </div>
                    <div class="swiper-slide swiper-slide-detail" style="background-image:url({{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-left.jpg')}});background-position: center;">
                    </div>
                    <div class="swiper-slide swiper-slide-detail" style="background-image:url({{asset('assets/images/sneakers/'.$sneaker->id_sneaker.'-top.jpg')}});background-position: center;">
                    </div>
                </div>
            </div>
        </div>
        <section class="detail-content">
            <h2 class="font-primary" style="margin: 0;color:#a3a6a6;">{{$sneaker->brand_sneaker}}</h2>
            <h1 class="font-primary color-secondary" style="margin: 0;font-size:50px;padding-top: 8px;">{{$sneaker->nama_sneaker}}</h1>
            <h2 class="font-primary color-secondary" style="margin: 0;font-size:30px;padding-top: 8px;">{{ 'IDR '.number_format($sneaker->harga_sneaker, 2, ",",".") }}</h2>
            <h3 class="font-primary color-secondary" style="margin: 0;font-size:21px;padding-top: 8px;">
                @foreach($allUser as $all)
                    @if($all->id_user == $sneaker->id_user)
                        <span class="seller-name">By : {{$all->nama}}</span>
                    @endif
                @endforeach
            </h3>
            <div class="button-chat-now">
                <form action="/goChat" method="POST">
                    @csrf
                    <input type="hidden" name="id_tujuan" value="{{$sneaker->id_user}}">
                    <input type="submit" class="chat-now" value="Chat Now">
                </form>
            </div>
            <form action="/handleCart" method="POST">
                @csrf
                <input type="hidden" name="id_sneaker" value="{{$sneaker->id_sneaker}}">
                <div class="size-show">
                    <span class="size font-secondary color-secondary" style="font-size: 18px; font-weight: bold">
                        Size(US): <span class="size-pilih font-secondary color-secondary" id="size-pilih"> </span> <!-- ini ukuran dari kotak dibawah -->
                    </span>
                    <div style="color:red;">{{ $errors->first('size') }}</div>
                    <input type="hidden" name="size" id="size">
                </div>
                <div class="button-list-size">
                    @foreach($size as $s)
                        <button type="button" onclick="selectSize('{{$s->ukuran_sneaker}}')" class="font-secondary color-secondary" id="button-size-sneaker" style="font-weight: bold;">{{$s->ukuran_sneaker}}</button>
                    @endforeach
                </div>
                <div class="button-add-wish-container">
                    <button type="submit" class="button-add-to-cart button-detail-effect custom-button text-white">
                        <i class="fas fa-shopping-cart"></i>ADD TO CART
                    </button>
                    <button class="button-wishlist custom-button text-white">
                        <a href="/addToWishlist/{{$sneaker->id_sneaker}}"><i class="far fa-heart"></i>Add To Wishlist</a>
                    </button>
                </div>
            </form>
            <div class="comment-container">
                @foreach($rsneaker as $rs)
                    <div class="comment-content">
                        @foreach($allUser as $u)
                            @if($u->id_user == $rs->id_user)
                                <div class="comment-user font-secondary color-secondary">
                                    {{$u->nama}}
                                </div>
                            @endif
                        @endforeach
                        <div class="comment-rate">
                            @if($rs->rate > -1)
                                @for ($i = 0; $i < $rs->rate; $i++)
                                    <i class="fas fa-star" style="color: #F9CB40"></i>
                                @endfor
                            @else
                                <i class="fas fa-star" style="color: #F9CB40"></i>No Rate
                            @endif
                        </div>
                        @if(strlen($rs->komentar_sneaker) > 0)
                            <div class="comment-text font-secondary">{{$rs->komentar_sneaker}}</div>
                        @else
                            <div class="comment-text font-secondary">Tidak ada komentar...</div>
                        @endif
                        <span class="comment-created">{{$rs->created_at}}</span>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
    <script>
        function selectSize(size){
            $('#size-pilih').text(size);
            $('#size').attr("value",size);
        }
    </script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs-detail', {
      spaceBetween: 10,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top-detail', {
      spaceBetween: 10,
      thumbs: {
        swiper: galleryThumbs,
      },
    });
    </script>
</body>
</html>
