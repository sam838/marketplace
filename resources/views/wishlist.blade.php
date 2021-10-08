<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('properties-import.data-logo-icon')
    <title>Our Daily Sneaky</title>
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/account.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="account-dashboard-container" style="min-height: 685px;">
        <div class="account-dashboard-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Account</h1>
        </div>
        <div class="account-dashboard-content">
            <div class="account-navigation">
                <hr style="margin:0;height: 1px;">
                <div class="account-navigation-wrapper">
                    <a href="/goAccdash"><i class="fas fa-th-large"></i> <span id="nav-acc" >My Account</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goMyorder"><i class="fas fa-shopping-bag"></i> <span id="nav-acc">My Orders</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goAdress"><i class="fas fa-address-book"></i> <span id="nav-acc">Address Book</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goEditacc"><i class="fas fa-user"></i><span id="nav-acc"> Account Information</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goWishlist"><i class="fas fa-heart" style="color: #7fccbf;"></i> <span id="nav-acc" style="color:#253f58">My Wishlist</span></a>
                </div>
            </div>
            <div class="wishlist-content">
                <div class="account-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Wishlist</h1>
                </div>
                <br>
                <div class="wishlist-item-list">
                    @foreach($sneaker as $s)
                        @foreach($wishlist as $w)
                            @if($s->id_sneaker == $w->id_dsneaker)
                                <div class="filter-content-item" id="box">
                                    <div>
                                        <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-right.jpg')}}" alt="" id="border-image">
                                    </div>
                                    <div id="description-item">
                                        <input type="hidden" name="id_sneaker" value="{{$s->id_sneaker}}">
                                        <input type="hidden" name="id_dsneaker" value="{{$s->w_id_dsneaker}}">
                                        <h5 style="font-family: 'Montserrat', sans-serif;font-size: 22px;margin-bottom: 2px">{{$s->nama_sneaker}}</h5>
                                        <span style="font-family: 'Montserrat', sans-serif;font-size: 18px;">{{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }}</span>
                                        <br>
                                        <a href="/addtocartfromwishlist/{{$w->id_dsneaker}}"><button type="submit" class="custom-button text-white" value="Detail Item" name="btnDetail" style="margin-top: 10px;width: 150px" class="font-secondary"><i class="fas fa-shopping-cart"></i> Add To Cart</button></a>
                                        <a href="/removewishlist/{{$w->id_dsneaker}}"><button class="custom-button text-white" value="Remove Item" name="btnRemove" style="width: 100px;" class="font-secondary">Remove</button></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
