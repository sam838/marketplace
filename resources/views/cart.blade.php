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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/cart.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="cart-title" style="text-align: center;padding:1%">
        <h1 style="color: #17293b;font-weight: bold;font-family: 'Montserrat', sans-serif;">Cart</h1>
    </div>
    <div class="combine-cart" style="min-height: 564px">
        <div class="item-cart-container">
            @foreach ($cart as $c)
                <div class="item-cart-wrapper">
                    <div class="item-cart-image">
                        @foreach($dsneaker as $ds)
                            @if($ds->id_dsneaker == $c->id_dsneaker)
                                @foreach($sneaker as $s)
                                    @if($s->id_sneaker == $ds->id_sneaker)
                                        <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-right.jpg')}}" style="width: 150px;height: 150px;">
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                    <section class="item-cart-content">
                        <div class="item-cart-name">
                            @foreach($dsneaker as $ds)
                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                    @foreach($sneaker as $s)
                                        @if($s->id_sneaker == $ds->id_sneaker)
                                            <span class="cart-title font-secondary color-secondary">{{$s->nama_sneaker}}</span>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                        <div class="item-cart-category">
                            <span class="fst-custom-font">Basketball Shoes</span> <!-- ini buat kategori SAM ! -->
                        </div>
                        <div class="item-cart-color">
                            @foreach($dsneaker as $ds)
                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                    <span class="fst-custom-font" style="color:{{$ds->warna_sneaker}};">{{$ds->warna_sneaker}}</span> <!-- ini buat warna SAM ! -->
                                @endif
                            @endforeach
                        </div>
                        <div class="item-cart-size">
                            @foreach($dsneaker as $ds)
                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                    <span class="fst-custom-font">Size : {{$ds->ukuran_sneaker}}</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="item-cart-quantity">
                            <span class="fst-custom-font">Qty : {{$c->jumlah}}</span>
                        </div>
                        <div class="item-cart-action">
                            <a href="" class="font-secondary" style="color:#989586; border-bottom: 1px solid #989586; padding-bottom: 3px">Move to Wishlist</a> &emsp;
                            <a href="" class="font-secondary" style="color: #989586; border-bottom: 1px solid #989586; padding-bottom: 3px">Remove</a>
                        </div>
                    </section>
                    <div class="item-cart-price">
                        @foreach($dsneaker as $ds)
                            @if($ds->id_dsneaker == $c->id_dsneaker)
                                @foreach($sneaker as $s)
                                    @if($s->id_sneaker == $ds->id_sneaker)
                                        <span class="fst-custom-font">{{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }}</span>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <section class="subtotal-container">
            <h1 style="margin: 0" class="font-secondary">Item Total</h1>
            <div class="grandtotal-price">
                <span class="fst-custom-font"> <b> Grandtotal {{ 'IDR '.number_format($grandtotal, 2, ",",".") }}</b></span>
            </div>
            <div class="order-to">
                @foreach($user as $u)
                    @if($id_seller == $u->id_user)
                        <span class="fst-custom-font"> <b> Order To : {{$u->nama}}</b></span>
                    @endif
                @endforeach
            </div>
            <!-- Button submitnya -->
            <form action="/goCheckout" method="GET">
                <button type="submit" class="button-checkout custom-button"><i class="fas fa-shopping-cart"></i> Checkout</button>
            </form>
        </section>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
