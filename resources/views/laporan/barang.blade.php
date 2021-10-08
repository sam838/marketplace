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
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Laporan Barang</h1>
                </div>
                <div class="master-user-content">
                    <div class="master-laporan-chart">
                        <div class="laporan-sold-item">
                            <h2 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;text-align: center;">Pembelian Barang Terbanyak</h2>
                            <!-- chart disni-->
                        </div>
                        <div class="laporan-wishlist-item">
                            <h2 style="margin:0;color: #17293b;font-family: 'Montserrat', sans-serif;text-align: center;">Wishlist Barang Terbanyak</h2>
                            <!-- chart disni-->
                        </div>
                    </div>
                    <div class="master-user-table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="font-primary color-secondary">Id Sneaker</th>
                                    <th class="font-primary color-secondary">Nama Sneaker</th>
                                    <th class="font-primary color-secondary">Nama Penjual</th>
                                    <th class="font-primary color-secondary">Total Penjualan</th>
                                    <th class="font-primary color-secondary">Total Wishlist</th>
                                    <th class="font-primary color-secondary">Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($t_sneaker as $s)
                                <tr>
                                    <td class="tengah">{{$s->id_sneaker}}</td>
                                    <td class="tengah">{{$s->nama_sneaker}}</td>
                                    @foreach($t_user as $u)
                                        @if($u->id_user == $s->id_user)
                                            <td class="tengah">{{$u->nama}}</td>
                                        @endif
                                    @endforeach
                                    <?php $totalJual = 0;?>
                                    @foreach($t_dtrans as $dt)
                                        @foreach($t_dsneaker as $ds)
                                            @if($ds->id_dsneaker == $dt->id_dsneaker)
                                                @if($ds->id_sneaker == $s->id_sneaker)
                                                    <?php $totalJual += $dt->jumlah; ?>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <td class="tengah">{{$totalJual}}</td>

                                    <?php $totalWishlist = 0;?>
                                    @foreach($t_wishlist as $dt)
                                        @foreach($t_dsneaker as $ds)
                                            @if($ds->id_dsneaker == $dt->id_dsneaker)
                                                @if($ds->id_sneaker == $s->id_sneaker)
                                                    <?php $totalWishlist ++; ?>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                    <td class="tengah">{{$totalWishlist}}</td>

                                    <?php
                                        $totalRate = 0;
                                        $totalAll = 0;
                                    ?>
                                    @foreach($t_review_sneaker as $dt)
                                        @if($dt->id_sneaker == $s->id_sneaker)
                                            <?php
                                                $totalRate += $dt->rate;
                                                $totalAll++;
                                            ?>
                                        @endif
                                    @endforeach

                                    @if($totalAll == 0)
                                        <td class="tengah">None</td>
                                    @else
                                        <td class="tengah">{{round($totalRate/$totalAll,2)}}</td>
                                    @endif
                                    <tr style="background-color:beige;">
                                        <td class="center" colspan="2">
                                            Pertumbuhan Wishlist
                                            <br>
                                            <canvas id="CartWishlist{{$s->id_sneaker}}" width="100%" height="100%"></canvas>
                                            <script type="text/javascript">
                                                var ctx = document.getElementById("CartWishlist{{$s->id_sneaker}}");
                                                var labelW = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
                                                var dataW = new Array();

                                                <?php $labelW = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]; ?>
                                                @foreach($labelW as $l)
                                                    <?php
                                                        $total = 0;
                                                        foreach ($t_dsneaker as $cds) {
                                                            if($cds->id_sneaker == $s->id_sneaker){
                                                                $temptotal = DB::table('wishlist')->selectRaw('count(*) as total')->whereMonth('created_at', date('m'))->whereDay('created_at',date($l))->where('id_dsneaker',$cds->id_dsneaker)->first();
                                                                $total+=$temptotal->total;
                                                            }
                                                        }
                                                    ?>
                                                    dataW.push({{$total}});
                                                @endforeach

                                                var myChart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: labelW,
                                                        datasets: [{
                                                            label: 'Total Wishlist',
                                                            data: dataW,
                                                            borderWidth: 1,
                                                            borderColor: 'rgba(0, 0, 0, 0)',
                                                            backgroundColor: 'rgba(192, 75, 192, 0.5)'
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                },
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: 'Total Permintaan',
                                                                    fontSize: 24
                                                                }
                                                            }],
                                                            xAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                },
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: 'Tanggal',
                                                                    fontSize: 24
                                                                }
                                                            }],
                                                        }
                                                    }
                                                });
                                            </script>
                                        </td>
                                        <td class="center" colspan="2">
                                            Pertumbuhan Pembelian
                                            <br>
                                            <canvas id="CartCart{{$s->id_sneaker}}" width="100%" height="100%"></canvas>
                                            <script type="text/javascript">
                                                var ctx = document.getElementById("CartCart{{$s->id_sneaker}}");
                                                var labelW = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
                                                var dataW = new Array();

                                                <?php $labelW = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]; ?>
                                                @foreach($labelW as $l)
                                                    <?php
                                                        $total = 0;
                                                        foreach ($t_dsneaker as $cds) {
                                                            if($cds->id_sneaker == $s->id_sneaker){
                                                                $temptotal = DB::table('dtrans')->selectRaw('count(*) as total')->whereMonth('created_at', date('m'))->whereDay('created_at',date($l))->where('id_dsneaker',$cds->id_dsneaker)->first();
                                                                $total+=$temptotal->total;
                                                            }
                                                        }
                                                    ?>
                                                    dataW.push({{$total}});
                                                @endforeach

                                                var myChart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: labelW,
                                                        datasets: [{
                                                            label: 'Total Pembelian',
                                                            data: dataW,
                                                            borderWidth: 1,
                                                            borderColor: 'rgba(0, 0, 0, 0)',
                                                            backgroundColor: 'rgba(192, 75, 192, 0.5)'
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                },
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: 'Total Pembelian',
                                                                    fontSize: 24
                                                                }
                                                            }],
                                                            xAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                },
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: 'Tanggal',
                                                                    fontSize: 24
                                                                }
                                                            }],
                                                        }
                                                    }
                                                });
                                            </script>
                                        </td>
                                        <td class="center" colspan="2">
                                            Pertumbuhan Rate
                                            <br>
                                            <canvas id="CartRate{{$s->id_sneaker}}" width="100%" height="100%"></canvas>
                                            <script type="text/javascript">
                                                var ctx = document.getElementById("CartRate{{$s->id_sneaker}}");
                                                var labelW = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
                                                var dataW = new Array();

                                                <?php $labelW = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]; ?>
                                                @foreach($labelW as $l)
                                                    <?php
                                                        $total = DB::table('review_sneaker')->selectRaw('count(*) as total')->whereMonth('created_at', date('m'))->whereDay('created_at',date($l))->where('id_sneaker',$s->id_sneaker)->first();
                                                    ?>
                                                    dataW.push({{$total->total}});
                                                @endforeach

                                                var myChart = new Chart(ctx, {
                                                    type: 'line',
                                                    data: {
                                                        labels: labelW,
                                                        datasets: [{
                                                            label: 'Rating',
                                                            data: dataW,
                                                            borderWidth: 1,
                                                            borderColor: 'rgba(0, 0, 0, 0)',
                                                            backgroundColor: 'rgba(192, 75, 192, 0.5)'
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                },
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: 'Rating',
                                                                    fontSize: 24
                                                                }
                                                            }],
                                                            xAxes: [{
                                                                ticks: {
                                                                    beginAtZero: true
                                                                },
                                                                scaleLabel: {
                                                                    display: true,
                                                                    labelString: 'Tanggal',
                                                                    fontSize: 24
                                                                }
                                                            }],
                                                        }
                                                    }
                                                });
                                            </script>
                                        </td>
                                    </tr>
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
