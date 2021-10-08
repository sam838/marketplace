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
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Laporan Transaksi</h1>
                </div>
                <!-- disini masternya beda beda -->
                <div class="master-user-content">
                    <div class="master-user-search-filter" style="gap:3%;">
                        <div class="master-user-search-wrapper">
                            <input type="text" name="" id="" class="master-user-input" placeholder="Tanggal Awal">
                        </div>
                        <div class="master-user-search-wrapper">
                            <input type="text" name="" id="" class="master-user-input" placeholder="Batas Tanggal">
                        </div>
                        <div class="master-user-search-wrapper">
                            <button class="custom-button text-white" style="min-height: 35px;">Search</button>
                        </div>
                    </div>
                    <div class="master-laporan-chart">
                        <div class="laporan-sold-item">
                            <h2 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;text-align: center;">Top 10 Seller</h2>
                            <!-- tabel disni-->
                            <table>
                                <thead>
                                    <tr>
                                        <th class="font-primary color-secondary">#</th>
                                        <th class="font-primary color-secondary">Nama</th>
                                        <th class="font-primary color-secondary">Jumlah Pembelian</th>
                                        <th class="font-primary color-secondary">Total Pembelian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach disni -->
                                </tbody>
                            </table>
                        </div>
                        <div class="laporan-wishlist-item">
                            <h2 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;text-align: center;">Top 10 Customer</h2>
                            <!-- tabel disni-->
                            <table>
                                <thead>
                                    <tr>
                                        <th class="font-primary color-secondary">#</th>
                                        <th class="font-primary color-secondary">Nama</th>
                                        <th class="font-primary color-secondary">Jumlah Penjualan</th>
                                        <th class="font-primary color-secondary">Total Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach disni -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="master-user-table">
                        <h2 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;text-align: center;">Data Transaksi</h2>
                        <h4 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;padding-bottom: 10px">Total Transaksi Bulan Ini : <!-- back end disni --></h4>
                        <table>
                            <thead>
                                <tr>
                                    <th class="font-primary color-secondary">Id Transaksi</th>
                                    <th class="font-primary color-secondary">Nama Pembeli</th>
                                    <th class="font-primary color-secondary">Nama Penjual</th>
                                    <th class="font-primary color-secondary">Status Pemesanan</th>
                                    <th class="font-primary color-secondary">Tanggal Transaksi</th>
                                    <th class="font-primary color-secondary">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach disni -->
                                <tr>
                                    <td>michaeltenoyo</td>
                                    <td>Michael Tenoyo</td>
                                    <td>seller</td>
                                    <td>michaeltenoyo@gmail.com</td>
                                    <td>123</td>
                                    <td>123</td>
                                </tr>
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
