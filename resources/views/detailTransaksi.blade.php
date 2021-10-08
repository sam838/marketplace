<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('properties-import.data-logo-icon')
    <title>Our Daily Sneaky</title>
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/detailtranscust.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}"  media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/modal.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
    <style>
        .tulisan{
        color: grey;
        font-family: 'Roboto Condensed', sans-serif;
    }
    </style>
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
        </script>
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="detail-trans-container" style="z-index:-100">
        <div class="detail-trans-title" style="text-align: center;padding-top:2%;">
            <h4 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">My Order</h4>
        </div>
        <div class="detail-trans-content">
            <div class="detail-trans-top">
                <span class="detail-trans-top-text font-secondary color-secondary">
                    No Transaksi &emsp; : <span class="detail-trans-top-text-data">TR2020-11-05#1</span>
                </span> <br>
                <span class="detail-trans-top-text font-secondary color-secondary">
                    Nama Pembeli &nbsp; : <span class="detail-trans-top-text-data">TR2020-11-05#1</span>
                </span> <br>
                <span class="detail-trans-top-text font-secondary color-secondary">
                    Alamat Kirim &emsp; : <br>
                    <span class="detail-trans-top-text-data">TR2020-11-05#1</span>
                </span>
            </div>
            <div class="detail-trans-table">
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
                        @foreach($dtrans as $c)
                        <tr>
                            <td>
                                <div class="item-detail-trans-wrapper">
                                    <div class="item-detail-image">
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
                                    <section class="item-detail-content">
                                        <div class="item-cart-name">
                                            @foreach($dsneaker as $ds)
                                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($s->id_sneaker == $ds->id_sneaker)
                                                           <br> <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold; padding-top:-100px">{{$s->nama_sneaker}}</span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="item-cart-size">
                                            @foreach($dsneaker as $ds)
                                                @if($ds->id_dsneaker == $c->id_dsneaker)
                                                    <span class="font-secondary color-secondary">Size: {{$ds->ukuran_sneaker}}</span>
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
                            <td class="font-secondary"> {{$c->jumlah}}</td>
                            <td class="font-secondary">{{ 'IDR '.number_format($c->subtotal, 2, ",",".") }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Total</b></td>
                            <td>{{ 'IDR '.number_format($htrans->total, 2, ",",".") }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Biaya Pengiriman</b></td>
                            <td>{{ 'IDR '.number_format($htrans->biaya_pengiriman, 2, ",",".") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="detail-trans-shipping">
                <div class="detail-shipping">

                </div>
                <div class="detail-shipping-proceed font-primary">
                    @if($htrans->status_pengiriman == "BAYAR")
                    <div class="row">
                        <div class="col s12 tengah">
                            <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#konfirmasi-kirim">Lakukan Pembayaran</a>
                            <div id="konfirmasi-kirim" class="modal" style="">
                                <div class="modal-content">
                                    <h4>Form Pembayaran</h4>
                                </div>
                                <div class="modal-footer">
                                    <div class="row" style="padding:10px;">
                                        <!--Form Paypal-->
                                        <form method="POST" id="payment-form"  action="/paypal">
                                        @csrf
                                            <div class="col s6 offset-s3" style="text-align: center;color:dodgerblue;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                                <h4>Paypal</h4>
                                                <p style="color:black;">pastikan anda sudah memiliki akun paypal, tekan tombol dibawah untuk melanjutkan pembayaran melalui PayPal</p>
                                                <h5>Total Pembayaran</h5>
                                                <?php Session::put('id_trans',$htrans->id_transaksi); ?>
                                                <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                                                <input type="hidden" name="amount" value="{{($htrans->total+$htrans->biaya_pengiriman)/15000}}">
                                                <input type="text" name="boxamount" value="$ {{($htrans->total+$htrans->biaya_pengiriman)/15000}}" style="border:1px solid dodgerblue;padding-left:5px;font-size:150%;" disabled>
                                                <button type="submit" class="waves-effect waves-red btn red lighten-1" style="background-color:dodgerblue">Pay with PayPal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                            Menunggu konfirmasi pembayaran
                        </div>
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                            Jumlah yang harus dibayarkan : {{ 'IDR '.number_format(($htrans->total+$htrans->biaya_pengiriman), 2, ",",".") }}
                        </div>
                        <br><br>
                        <div class="col s12" style="height: 100px;"></div>
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:dodgerblue;">
                            Pembayaran dilakukan dengan
                        </div>
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:orange;">
                            <img src="{{asset('assets/images/paypal.png')}}" alt="" width="100px;" height="100px;">
                        </div>
                    </div>
                @elseif($htrans->status_pengiriman == "DIKEMAS")
                    <div class="row">
                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                            Menunggu konfirmasi pengiriman barang oleh penjual
                        </div>
                    </div>
                @elseif($htrans->status_pengiriman == "KEMBALI")
                <div class="row">
                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                        Mengajukan pengembalian barang, mohon menunggu respon dari penjual.
                    </div>
                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                        Maaf atas ketidaknyamanan anda...
                    </div>
                </div>
                @elseif($htrans->status_pengiriman == "SENDING PENGEMBALIAN")
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12" id="lacakKembali"><!--DISINI BUAT TRACKING JNT-->

                                </div>
                            </div>
                        </div>
                    </div>
                    @if($htrans->status_pengiriman == "DIKEMBALIKAN")
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:green;">
                                Pengembalian sudah dikonfirmasi oleh penjual
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                Menunggu konfirmasi penerimaan barang oleh penjual
                            </div>
                        </div>
                    @endif
                @elseif($htrans->status_pengiriman == "PENGEMBALIAN DIRESPON")
                    <form action="/responPengembalian" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_seller" value="{{$htrans->id_seller}}">
                        <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                        <div class="row">
                            <div class="col s12 tengah">
                                <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#respon">Lihat Respon</a>
                                <div id="respon" class="modal" style="height: 500px;">
                                    <div class="modal-content">
                                        <h4>Respon Ajuan Pengembalian</h4>
                                    </div>
                                    <div class="modal-footer">
                                        @foreach($dretur as $dr)
                                            @foreach($dsneaker as $d)
                                                @if($d->id_dsneaker == $dr->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($s->id_sneaker == $d->id_sneaker)
                                                            <div class="row">
                                                                <div class="col s1">
                                                                    <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" alt="" width="50px" height="50px">
                                                                </div>
                                                                <div class="col s2">
                                                                    <div class="tulisan left">
                                                                        {{$s->nama_sneaker}} [{{$ds->ukuran_sneaker}}]
                                                                    </div>
                                                                    <br>

                                                                    <br>
                                                                </div>
                                                                <div class="col s2">
                                                                    <div class="tulisan left">
                                                                        Jumlah
                                                                    </div>
                                                                    <br>
                                                                    <div class="left">
                                                                        {{$dr->jumlah}}
                                                                    </div>
                                                                </div>
                                                                <div class="col s4" style="border:1px solid #cfcfcf; width: 30%; height: 100px;">
                                                                    <div class="left tulisan">
                                                                        ALASAN PENOLAKAN/NOTES
                                                                    </div>
                                                                    <br>
                                                                    <div class="left">
                                                                        {{$dr->resi_pengembalian}}
                                                                    </div>
                                                                </div>
                                                                @if($dr->status_pengembalian == "DITERIMA")
                                                                    <div class="col s3">
                                                                        <div class="tulisan left" style="color:green">
                                                                            Respon : DITERIMA
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="col s3">
                                                                        <div class="tulisan left" style="color:red">
                                                                            Respon : DITOLAK
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        $adaTerima = false;
                        foreach ($dretur as $dr) {
                            if($dr->status_pengembalian == "DITERIMA"){
                                $adaTerima = true;
                            }
                        }
                    ?>
                    @if($adaTerima)
                    <div class="row">
                        <div class="col s12 center">
                            Beberapa Item diterima untuk dikembalikan, mohon untuk segera melakukan pengiriman barang yang ingin dikembalikan
                            <div style="color:red"> SESUAI DENGAN RESPON YANG DITERIMA</div>
                        </div>
                    </div>
                        <form action="/kirimPengembalian" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_seller" value="{{$htrans->id_seller}}">
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#kembali">Lanjutkan Pengembalian</a>
                                    <div id="kembali" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Pengiriman Retur Barang</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input name="resi" placeholder="Masukan nomor resi pengiriman | contoh: 0112852000797588" id="first_name" type="text" class="validate">
                                                    <label for="first_name">Nomor Resi</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12" style="color:red;">
                                                    *Pastikan barang yang dikirim sudah benar
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s2 offset-s10">
                                                    <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="row">
                            <div class="col s12 tulisan">
                                Untuk saat ini seluruh ajuan pengembalian barang anda ditolak. Silahkan konfirmasi atau lapor admin bila terjadi kesalahan.
                            </div>
                        </div>
                        <form action="/kirimPengembalian" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_seller" value="{{$htrans->id_seller}}">
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#kembali">Konfirmasi Ajuan</a>
                                    <div id="kembali" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Konfirmasi Pengembalian Barang</h4>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                @else
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12" id="lacak"><!--DISINI BUAT TRACKING JNT-->

                                </div>
                            </div>
                        </div>
                    </div>
                    @if($htrans->status_pengiriman == "DONE")
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:green;">
                                Pesanan sudah dikonfirmasi
                            </div>
                        </div>
                    @else
                        <?php
                            $today = new DateTime('');
                            $expired = new DateTime($htrans->updated_at);
                            $expired->add(new DateInterval('P10D'));
                        ?>
                        @if($expired < $today)
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:green;">
                                Sudah melebihi batas pengembalian, segera konfirmasi.
                            </div>
                        </div>
                        <form action="/konfirmasiPenerimaan" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#konfirmasi-kirim">Pesanan Diterima</a>
                                    <div id="konfirmasi-kirim" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Konfirmasi Penerimaan Barang</h4>
                                        </div>
                                        <?php $ctr = 0;?>
                                        @foreach($dtrans as $d)
                                            @foreach($dsneaker as $ds)
                                                @if($d->id_dsneaker == $ds->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($ds->id_sneaker == $s->id_sneaker)
                                                        <h5>{{$s->nama_sneaker}}</h5>
                                                        <input type="hidden" name="id_sneaker-{{$ctr}}" value="{{$s->id_sneaker}}">
                                                        <div class="file-field input-field col s12">
                                                            <div class="btn">
                                                                <span>Foto Penerimaan Barang</span>
                                                                <input name="img-terima-{{$ctr}}" type="file" id="terima"><br>
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s1" >
                                                                Rate : <input name="rate-{{$ctr}}" id="icon_prefix" type="number" class="validate" style="text-align: center;" min="0" max="5">
                                                            </div>
                                                            <div class="col s2">
                                                                <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" width="50%" height="100px">
                                                            </div>
                                                            <div class="col s9">
                                                                <textarea placeholder="Komentar Review..." id="komentar" class="materialize-textarea bottom" style="height: 100%;" name="komentar-{{$ctr}}"></textarea>
                                                                <div style="color:red;"><span id="err-isi"></span></div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            <?php $ctr++?>
                                        @endforeach

                                        <input type="hidden" name="ctr" value="{{$ctr}}">
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col s2 offset-s10">
                                                    <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                        <div class="row">
                            <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                Menunggu konfirmasi penerimaan barang oleh penerima
                            </div>
                        </div>
                        <form action="/konfirmasiPenerimaan" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#konfirmasi-kirim">Pesanan Diterima</a>
                                    <div id="konfirmasi-kirim" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Konfirmasi Penerimaan Barang</h4>
                                        </div>
                                        <?php $ctr = 0;?>
                                        @foreach($dtrans as $d)
                                            @foreach($dsneaker as $ds)
                                                @if($d->id_dsneaker == $ds->id_dsneaker)
                                                    @foreach($sneaker as $s)
                                                        @if($ds->id_sneaker == $s->id_sneaker)
                                                        <h5>{{$s->nama_sneaker}}</h5>
                                                        <input type="hidden" name="id_sneaker-{{$ctr}}" value="{{$s->id_sneaker}}">
                                                        <div class="file-field input-field col s12">
                                                            <div class="btn">
                                                                <span>Foto Penerimaan Barang</span>
                                                                <input name="img-terima-{{$ctr}}" type="file" id="terima">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s1" >
                                                                Rate : <input name="rate-{{$ctr}}" id="icon_prefix" type="number" class="validate" style="text-align: center;" min="0" max="5">
                                                            </div>
                                                            <div class="col s2">
                                                                <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" width="50%" height="100px">
                                                            </div>
                                                            <div class="col s9">
                                                                <textarea placeholder="Komentar Review..." id="komentar" class="materialize-textarea bottom" style="height: 100%;" name="komentar-{{$ctr}}"></textarea>
                                                                <div style="color:red;"><span id="err-isi"></span></div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            <?php $ctr++?>
                                        @endforeach

                                        <input type="hidden" name="ctr" value="{{$ctr}}">
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col s2 offset-s10">
                                                    <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="/ajukanPengembalian" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id_seller" value="{{$htrans->id_seller}}">
                            <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                            <div class="row">
                                <div class="col s12 tengah">
                                    <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#kembali">Ajukan Pengembalian</a>
                                    <div id="kembali" class="modal" style="height: 500px;">
                                        <div class="modal-content">
                                            <h4>Pengajuan Pengembalian Barang</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <?php $ctr = 0;?>
                                            @foreach($dtrans as $d)
                                                @foreach($dsneaker as $ds)
                                                    @if($d->id_dsneaker == $ds->id_dsneaker)
                                                        @foreach($sneaker as $s)
                                                            @if($ds->id_sneaker == $s->id_sneaker)
                                                            <div class="row">
                                                                <div class="col s2">
                                                                    <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" alt="" width="100px" height="100px">
                                                                </div>
                                                                <div class="col s3">
                                                                    <p class="left">
                                                                        <label>
                                                                            <input type="checkbox" class="filled-in" name="list-kembali-{{$ctr}}" value="{{$d->id_dsneaker}}"/>
                                                                            <span>{{$s->nama_sneaker}} [{{$ds->ukuran_sneaker}}]</span>
                                                                        </label>
                                                                    </p>
                                                                    <br>


                                                                </div>
                                                                <div class="input-field col s1">
                                                                    <input placeholder="Qty" id="qty" type="number" name="qty-{{$ctr}}" class="validate" min="1" max="{{$d->jumlah}}">
                                                                    <label for="qty">QTY</label>
                                                                </div>
                                                                <div class="input-field col s4">
                                                                    <input placeholder="Alasan Pengembalian" name="alasan-{{$ctr}}" id="alasan" type="text" class="validate">
                                                                    <label for="first_name">Alasan Pengembalian</label>
                                                                </div>
                                                                <div class="col s2">
                                                                    <div class="file-field input-field">
                                                                        <div class="btn">
                                                                            <span>Foto</span>
                                                                            <input type="file" name="foto_kembali-{{$ctr}}">
                                                                        </div>
                                                                        <div class="file-path-wrapper">
                                                                            <input class="file-path validate" type="text">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?php $ctr++?>
                                            @endforeach
                                            <input type="hidden" name="ctr" value="{{$ctr}}">
                                            <div class="row">
                                                <div class="col s2 offset-s10">
                                                    <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Ajukan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif

                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
