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
                    <a href="/goMyorder"><i class="fas fa-shopping-bag" style="color: #7fccbf;"></i> <span id="nav-acc"  style="color:#253f58">My Orders</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goAdress"><i class="fas fa-address-book"></i> <span id="nav-acc">Address Book</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goEditacc"><i class="fas fa-user"></i><span id="nav-acc"> Account Information</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goWishlist"><i class="fas fa-heart"></i> <span id="nav-acc">My Wishlist</span></a>
                </div>
            </div>
            <div class="my-order-content">
                <div class="account-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">My Order</h1>
                    <table>
                        <thead style="background-color: #cfcfcf;opacity: 0.7;">
                          <tr>
                            <th class="font-primary color-secondary">ID Transaksi</th>
                            <th class="font-primary color-secondary">Status Pesanan</th>
                            <th class="font-primary color-secondary">Detail Alamat</th>
                            <th class="font-primary color-secondary">Update Terakhir</th>
                            <th class="font-primary color-secondary">Total Harga Sneaker</th>
                            <th class="font-primary color-secondary">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($htrans as $h)
                                <tr>
                                    <td class="tengah">TR{{$h->tgl_beli}}#{{$h->id_transaksi}}</td>
                                    @if($h->status_pengiriman == "DIKEMBALIKAN")
                                        <td style="color:orange;">{{$h->status_pengiriman}}</td>
                                    @elseif($h->status_pengiriman != "DONE")
                                        <td style="color:red;">{{$h->status_pengiriman}}</td>
                                    @else
                                        <td style="color:green;">{{$h->status_pengiriman}}</td>
                                    @endif
                                    <td>
                                        @foreach($address as $a)
                                            @if($a->id_addr == $h->id_addr)
                                                @foreach($kota as $k)
                                                    @if($k->id_kota == $a->id_kota)
                                                        @foreach($provinsi as $p)
                                                            @if($k->id_provinsi == $p->id_provinsi)
                                                                <p>{{$a->nama_alamat}}, {{$k->nama_kota}}, {{$p->nama_provinsi}} {{$a->kode_pos}}, Indonesia</p>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="tengah">{{$h->updated_at}}</td>
                                    <td class="tengah">{{ 'IDR '.number_format($h->total, 2, ",",".") }}</td>
                                    <td>
                                        <form action="/detailOrderCustomer" method="GET">
                                        <input type="hidden" name="id_trans" value="{{$h->id_transaksi}}">
                                            <button class="custom-button text-white">Detail</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                <br>

            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
