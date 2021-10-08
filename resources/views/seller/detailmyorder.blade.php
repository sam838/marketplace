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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}"  media="screen,projection"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/modal.css')}}">
    <script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">
</head>
<script>
   $(document).ready(function(){
        $('.modal').modal();
    });
</script>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="master-container">
        <div class="master-title" style="text-align: center;padding-top:2%;">
            <h4 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Seller</h4>
        </div>
        <div class="master-control">
            <div class="master-content">
                <div class="master-title">
                    <h4 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Seller Orders</h4>
                </div>
                <!-- disini masternya beda beda -->
                <div class="detail-trans-content">
                    <div class="detail-trans-top" style="text-align: center">
                        <h5 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">
                            ID Transaksi: {{$htrans->tgl_beli}}#{{$htrans->id_transaksi}}
                        </h5>
                        <h5  style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">
                            @foreach($user as $u)
                                @if($u->id_user == $htrans->id_user)
                                    Nama Pembeli: {{$u->nama}}
                                @endif
                            @endforeach
                        </h5>
                        <h5 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;margin-bottom:10px">
                             @foreach($address as $a)
                                @if($a->id_addr == $htrans->id_addr)
                                    @foreach($kota as $k)
                                        @if($k->id_kota == $a->id_kota)
                                            @foreach($provinsi as $p)
                                                @if($k->id_provinsi == $p->id_provinsi)
                                                    Alamat Kirim:{{$a->nama_alamat}}, {{$k->nama_kota}}, {{$p->nama_provinsi}} {{$a->kode_pos}}, Indonesia
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </h5>
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
                                                                <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" width="100px" height="60px" alt="data Foto">
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
                                                                <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;">{{$s->nama_sneaker}}</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach

                                                </div>
                                                <div class="item-cart-size">
                                                    @foreach($dsneaker as $ds)
                                                    @if($ds->id_dsneaker == $c->id_dsneaker)
                                                    <span class="font-secondary color-secondary">{{$ds->ukuran_sneaker}}</span>
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
                                                <td class="font-secondary">{{$c->jumlah}}</td>
                                                <td class="font-secondary">{{ 'IDR '.number_format($c->subtotal, 2, ",",".") }}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                                </tr>
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
                                    <td>IDR 30.000,00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="detail-trans-shipping">
                        <div class="detail-shipping-proceed font-primary" style="text-align: center">
                            @if($htrans->status_pengiriman == "BAYAR")
                                <div class="row">
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                        Menunggu konfirmasi pembayaran oleh customer
                                    </div>
                                </div>
                            @elseif($htrans->status_pengiriman == "DIKEMAS")
                                <div class="row">
                                    <div class="col s12">
                                        <img src="{{asset('assets/images/transaksi/bukti-'.$htrans->id_transaksi).'.jpg'}}" alt="no image" width="100%">
                                    </div>
                                </div>
                                <form action="/sellerKonfirmasiPengiriman" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                                    <div class="row">
                                        <div class="col s12 tengah">
                                            <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#konfirmasi-kirim">Konfirmasi Pengiriman</a>
                                            <div id="konfirmasi-kirim" class="modal" style="height: 900px;">
                                                <div class="modal-content">
                                                    <h4>Konfirmasi Pengiriman</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <input name="resi" placeholder="Masukan nomor resi pengiriman | contoh: 0112852000797588" id="first_name" type="text" class="validate">
                                                            <label for="first_name">Nomor Resi</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="file-field input-field col s12">
                                                            <div class="btn">
                                                                <span>Bukti Resi</span>
                                                                <input name="img-resi" type="file" id="bukti-resi">
                                                            </div>
                                                            <div class="file-path-wrapper">
                                                                <input class="file-path validate" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <img src="{{asset('assets/images/SwiperFoto/contoh-resi.jpeg')}}" alt="" width="100%">
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
                                <div class="row">
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                        Menunggu konfirmasi pengiriman barang
                                    </div>
                                </div>
                            @elseif($htrans->status_pengiriman == "KEMBALI")
                                <div class="row">
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                        Pembeli mengajukan pengembalian barang!
                                    </div>
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                        MOHON SEGERA DITINDAK LANJUTI!
                                    </div>
                                </div>

                                <form action="/responPengembalian" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id_seller" value="{{$htrans->id_seller}}">
                                    <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                                    <div class="row">
                                        <div class="col s12 tengah">
                                            <a class="waves-effect waves-light btn pink darken-1 modal-trigger" href="#kembali">Respon Ajuan Pengembalian</a>
                                            <div id="kembali" class="modal" style="height: 500px;">
                                                <div class="modal-content">
                                                    <h4>Laporan Pengembalian Barang</h4>
                                                </div>
                                                <div class="modal-footer">
                                                <?php $ctr = 0;?>
                                                    @foreach($dretur as $dr)
                                                        @foreach($dsneaker as $d)
                                                            @if($d->id_dsneaker == $dr->id_dsneaker)
                                                                @foreach($sneaker as $s)
                                                                    @if($s->id_sneaker == $d->id_sneaker)
                                                                    <input type="hidden" name="id_dsneaker-{{$ctr}}" value="{{$d->id_dsneaker}}">
                                                                        <div class="row">
                                                                            <div class="col s1">
                                                                                <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-side.jpeg')}}" alt="" width="50px" height="50px">
                                                                            </div>
                                                                            <div class="col s2">
                                                                                <img src="{{asset('assets/images/transaksi/foto_kembali-'.$dr->id_transaksi.'-'.$d->id_dsneaker.'.jpg')}}" alt="No Images" width="100px" height="100px">
                                                                            </div>
                                                                            <div class="col s2">
                                                                                <div class="tulisan left">
                                                                                    {{$s->nama_sneaker}}
                                                                                </div>
                                                                                <br>
                                                                                <div class="left" style="color:{{$ds->warna_sneaker}}">
                                                                                    {{$ds->warna_sneaker}}
                                                                                </div>
                                                                                <br>
                                                                                <div class="left">
                                                                                    [{{$ds->ukuran_sneaker}}]
                                                                                </div>
                                                                            </div>
                                                                            <div class="col s4" style="border:1px solid #cfcfcf; width: 30%; height: 100px;">
                                                                                <div class="left tulisan">
                                                                                    ALASAN PENGEMBALIAN
                                                                                </div>
                                                                                <br>
                                                                                <div class="left">
                                                                                    {{$dr->alasan_pengembalian}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col s4">
                                                                                <div class="tulisan left">
                                                                                    Respon :
                                                                                </div>
                                                                                <br>
                                                                                <p class="left">
                                                                                    <label>
                                                                                        <input name="respon-{{$ctr}}" class="with-gap" type="radio" value="terima" checked />
                                                                                        <span>Terima</span>
                                                                                    </label>
                                                                                    <label>
                                                                                        <input name="respon-{{$ctr}}" class="with-gap" type="radio" value="tolak"/>
                                                                                        <span>Tolak</span>
                                                                                    </label>
                                                                                </p>
                                                                                <br><br>
                                                                                <div class="input-field">
                                                                                    <input placeholder="Note tambahan" name="note-{{$ctr}}" id="alasan" type="text" class="validate">
                                                                                    <label for="alasan">Note Tambahan</label>
                                                                                </div>
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
                                                    <div class="row">
                                                        <div class="col s2 offset-s10">
                                                            <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Kirim</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @elseif($htrans->status_pengiriman == "PENGEMBALIAN DIRESPON")
                                <div class="row">
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:green;">
                                        Menunggu pengiriman dari customer
                                    </div>
                                </div>
                            @elseif($htrans->status_pengiriman == "SENDING PENGEMBALIAN")
                                @if($htrans->status_pengiriman == "DIKEMBALIKAN")
                                <div class="row">
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:green;">
                                        Pengembalian sudah dikonfirmasi
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                        Menunggu konfirmasi penerimaan barang oleh anda
                                    </div>
                                </div>
                                <form action="/konfirmasiPengembalian" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="id_trans" value="{{$htrans->id_transaksi}}">
                                    <div class="row">
                                        <div class="col s2 offset-s10">
                                            <button class="waves-effect waves-red btn red lighten-1" style="right:0;bottom:0;">Konfirmasi</button>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            @else
                                <div class="row">
                                    <div class="col s12">
                                        <img src="{{asset('assets/images/transaksi/resi-'.$htrans->id_transaksi).'.jpg'}}" alt="no image" width="100%">
                                    </div>
                                </div>
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
                                            Pesanan sudah dikonfirmasi oleh penerima
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col s12 tulisan tengah" style="font-size:150%; font-weight: bold; color:red;">
                                            Menunggu konfirmasi penerimaan barang oleh penerima
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
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
