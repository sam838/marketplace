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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/checkout.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="checkout-container">
        <div class="checkout-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Checkout</h1>
        </div>
        <div class="checkout-content">
            <form action="/saveTransaksi" method="POST">
                @csrf
                <input type="hidden" name="addr_selected" id="inputAddr">
                <input type="hidden" name="id_seller" value="{{$id_seller}}">
                <input type="hidden" name="total" value="{{$grandtotal}}">
                <input type="hidden" name="jumlah" value="{{$jumlah}}">
                <input type="hidden" name="id_selected" id="id_selected" value="">
                <div class="checkout-top">
                    <span class="checkout-top-text font-secondary color-secondary">
                        @foreach($user as $u)
                        @if($u->id_user == $id_seller)
                            @foreach($kota as $k)
                                @if($u->id_kota == $k->id_kota)
                                    <input type="hidden" name="id_kota" value="{{$k->id_kota}}" id="ori">
                                    @if ($user_logon->id_kota == $k->id_kota)
                                        <input type="hidden" name="kirim" id="inputKirim" value = "30000">
                                    @else
                                        <input type="hidden" name="kirim" id="inputKirim" value = "0">
                                    @endif
                                    Dikirim dari &emsp; : <span class="detail-trans-top-text-data">{{$k->nama_kota}}</span>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    </span> <br>
                    <span class="checkout-top-text font-secondary color-secondary">
                        Alamat Kirim &nbsp; : <br>
                        <div class="select">
                            <select name="address" id="address">
                                <option value="" disabled selected hidden>Choose your option</option>
                                @foreach($address as $a)
                                    @foreach($kota as $k)
                                        @if($k->id_kota == $a->id_kota)
                                            @foreach($provinsi as $p)
                                                @if($k->id_provinsi == $p->id_provinsi)
                                                    <option value="{{$a->id_kota}}|{{$a->id_addr}}">{{$a->nama_alamat}}, {{$k->nama_kota}}, {{$p->nama_provinsi}} {{$a->kode_pos}}, Indonesia</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </span>
                </div>
                <div class="checkout-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="font-primary color-secondary">Product</th>
                                <th class="font-primary color-secondary">Price</th>
                                <th class="font-primary color-secondary">QTY</th>
                                <th class="font-primary color-secondary">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $c)
                                <tr>
                                    <td>
                                        <div class="item-checkout-wrapper">
                                            <div class="item-checkout-image">
                                                @foreach($dsneaker as $ds)
                                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($s->id_sneaker == $ds->id_sneaker)
                                                            <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" width="150px" height="150px" alt="data Foto">
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            </div>
                                            <section class="item-checkout-content">
                                                <div class="item-cart-name">
                                                    @foreach($dsneaker as $ds)
                                                        @if($ds->id_dsneaker == $c->id_dsneaker)
                                                            @foreach($sneaker as $s)
                                                                @if($s->id_sneaker == $ds->id_sneaker)
                                                                <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;">{{$s->nama_sneaker}}</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="item-cart-size">
                                                    @foreach($dsneaker as $ds)
                                                        @if($ds->id_dsneaker == $c->id_dsneaker)
                                                        <span class="font-secondary color-secondary"> Size : {{$ds->ukuran_sneaker}}</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </section>
                                        </div>
                                    </td>
                                    @foreach($dsneaker as $ds)
                                        @if($ds->id_dsneaker == $c->id_dsneaker)
                                            @foreach($sneaker as $s)
                                                @if($s->id_sneaker == $ds->id_sneaker)
                                                    <td class="font-secondary">{{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                    <td class="font-secondary">{{$c->jumlah}}</td>
                                    <td class="font-secondary">{{ 'IDR '.number_format($c->subtotal, 2, ",",".") }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td>{{ 'IDR '.number_format($grandtotal, 2, ",",".") }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="checkout-order">
                    <div class="checkout-sent font-primary">
                        Your order will be sent to our seller Michael Tenoyo <br> <!-- ini back end -->
                        <button class="custom-button text-white" style="margin-top: 10px">Lanjutkan Transaksi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
<script>
    function selectSize(size){
        $('#size-pilih').text(size);
        $('#size').attr("value",size);
    }
    $("#address").on('change', function() {
        var addr = $("#address").val();
        if(addr == "new"){
            $("#newAlamat").show();
            $("#addrInfo").hide();
            $("#noAddress").hide();
            $("#id_selected").attr("value",-1);
        }else{
            $("#noAddress").hide();
            $("#newAlamat").hide();
            $("#addrInfo").show();
            $("#id_selected").attr("value",addr[1]);
            $("#inputAddr").attr("value",addr[1]);
        }
    });
</script>
</html>
