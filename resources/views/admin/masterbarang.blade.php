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
        <div class="master-control" style="padding-bottom: 1%;">
            <div class="master-navigation">
                <hr style="margin:0;height: 1px;">
                <div class="master-navigation-wrapper">
                    <a href="/masterUser"><i class="fas fa-user-circle"></i> <span id="nav-master">Master User</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterForum"><i class="fas fa-dice-d6"></i> <span id="nav-master">Master Forum</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterRpost"><i class="fas fa-comment-alt"></i> <span id="nav-master">Master Review Forum</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterBarang"><i class="fas fa-key" style="color: #7fccbf;"></i><span id="nav-master" style="color:#253f58">Master Barang</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterRsneaker"><i class="fas fa-shoe-prints"></i> <span id="nav-master">Master Review Sneaker</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterTrans"><i class="fas fa-chart-line"></i> <span id="nav-master">Data Transaksi</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/editSlider"><i class="fas fa-flag"></i> <span id="nav-master">Master Banner</span></a>
                </div>
                @include('properties-import.master-laporan')
            </div>
            <div class="master-content">
                <div class="master-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Master Barang</h1>
                </div>
                <!-- disini masternya beda beda -->
                <div class="master-barang-content">
                    <div class="master-barang-list">
                        @foreach($sneaker as $s)
                            <div class="master-barang-list-wrapper">
                                <div class="item-barang-image">
                                    <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-left.jpg')}}" alt="" width="150px" height="150px">
                                </div>
                                <section class="item-barang-content">
                                    <div class="item-barang-name">
                                        <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;">{{$s->nama_sneaker}}</span>
                                    </div>
                                    <div class="item-barang-owner">
                                        @foreach($user as $u)
                                            @if($u->id_user == $s->id_user)
                                                <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;">{{$u->nama}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="item-barang-total" style="padding-top: 3px;">
                                        <?php
                                        $count_beli = 0;
                                        ?>
                                        @foreach($dsneaker as $ds)
                                            @if($ds->id_sneaker == $s->id_sneaker)
                                                @foreach($dtrans as $dt)
                                                    @if($dt->id_sneaker == $ds->id_dsneaker)
                                                        <?php
                                                            $count_beli += $dt->jumlah;
                                                        ?>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <span class="font-secondary color-secondary"> Total Pembelian : {{$count_beli}}</span>
                                    </div>
                                </section>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
    @include('properties-import.master-laporan-script')
</body>
</html>
