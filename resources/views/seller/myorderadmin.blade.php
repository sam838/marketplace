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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="master-container">
        <div class="master-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Master</h1>
        </div>
        <div class="master-control">
            <div class="master-content">
                <div class="master-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Seller Orders</h1>
                </div>
                <!-- disini masternya beda beda -->
                <div class="master-user-content">
                    <div class="master-user-table">
                        <table>
                            <thead style="width:100%">
                                <tr>
                                    <th class="font-primary color-secondary">Id Transaksi</th>
                                    <th class="font-primary color-secondary">Status Pemesanan</th>
                                    <th class="font-primary color-secondary">Alamat</th>
                                    <th class="font-primary color-secondary">Biaya Pengiriman</th>
                                    <th class="font-primary color-secondary">Total</th>
                                    <th class="font-primary color-secondary">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($htrans as $h)
                                <tr>
                                    <td>TR{{$h->tgl_beli}}#{{$h->id_transaksi}}</td>
                                    @if($h->status_pengiriman == "DIKEMBALIKAN")
                                        <td>{{$h->status_pengiriman}}</td>
                                    @elseif($h->status_pengiriman != "DONE")
                                        <td>{{$h->status_pengiriman}}</td>
                                    @else
                                        <td>{{$h->status_pengiriman}}</td>
                                    @endif
                                    @foreach($address as $a)
                                                    @if($a->id_addr == $h->id_addr)
                                                        @foreach($kota as $k)
                                                            @if($k->id_kota == $a->id_kota)
                                                                @foreach($provinsi as $p)
                                                                    @if($k->id_provinsi == $p->id_provinsi)
                                                                        <td>{{$a->nama_alamat}}, {{$k->nama_kota}}, {{$p->nama_provinsi}} {{$a->kode_pos}}, Indonesia</td>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                    <td>{{ 'IDR '.number_format($h->biaya_pengiriman, 2, ",",".") }}</td>
                                    <td>{{ 'IDR '.number_format($h->total, 2, ",",".") }}</td>
                                    <td>
                                        <form action="/detailOrderSeller" method="GET">
                                        <input type="hidden" name="id_trans" value="{{$h->id_transaksi}}">
                                            <button class="custom-button text-white">Detail</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
