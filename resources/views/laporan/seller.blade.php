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
                    <a href="/masterBarang"><i class="fas fa-key"></i><span id="nav-master">Master Barang</span></a>
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
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Laporan Penjualan</h1>
                </div>
                <!-- disini masternya beda beda -->
                <div class="master-user-content">
                    <div class="master-user-table">
                        <h2 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;text-align: center;">Performa Penjualan</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th class="font-primary color-secondary">Id User</th>
                                    <th class="font-primary color-secondary">Nama</th>
                                    <th class="font-primary color-secondary">Total Transaksi</th>
                                    <th class="font-primary color-secondary">Pending</th>
                                    <th class="font-primary color-secondary">Dikembalikan</th>
                                    <th class="font-primary color-secondary">Sukses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $u)
                                <tr>
                                    <td class="tengah">{{$u->id_user}}</td>
                                    <td class="tengah">{{$u->nama}}</td>
                                    <?php
                                        $totalTrans = 0;
                                        $totalPending = 0;
                                        $totalKembali = 0;
                                        $totalDone = 0;
                                    ?>
                                    @foreach($htrans as $h)
                                        @if($h->id_seller == $u->id_user)
                                            <?php $totalTrans++;?>
                                            @if($h->status_pengiriman == "DONE")
                                                <?php $totalDone++;?>
                                            @elseif($h->status_pengiriman == "BAYAR" || $h->status_pengiriman == "DIKEMAS" || $h->status_pengiriman == "SENDING")
                                                <?php $totalPending++;?>
                                            @else
                                                <?php $totalKembali++;?>
                                            @endif
                                        @endif
                                    @endforeach
                                    <td class="tengah">{{$totalTrans}}</td>
                                    <td class="tengah" style="color:orangered;">{{$totalPending}}</td>
                                    <td class="tengah" style="color:red;">{{$totalKembali}}</td>
                                    <td class="tengah" style="color:green;">{{$totalDone}}</td>
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
    @include('properties-import.master-laporan-script')
</body>
</html>
