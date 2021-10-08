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
    <script src="{{asset('assets/js/auto-tables.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>
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
                    <a href="/masterBarang"><i class="fas fa-key"></i><span id="nav-master">Master Barang</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterRsneaker"><i class="fas fa-shoe-prints"></i> <span id="nav-master" >Master Review Sneaker</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterTrans"><i class="fas fa-chart-line" style="color: #7fccbf;"></i> <span id="nav-master" style="color:#253f58">Data Transaksi</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/editSlider"><i class="fas fa-flag"></i> <span id="nav-master">Master Banner</span></a>
                </div>
                @include('properties-import.master-laporan')
            </div>
            <div class="master-content">
                <div class="master-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Data Transaksi</h1><br>
                </div>
                <!-- disini masternya beda beda -->
                <div class="master-trans-content">
                    <div class="master-trans-filter">
                        <div class="master-trans-search-wrapper">
                            <input type="text" name="" id="myInput" class="master-user-input" placeholder="Search"><br><br>
                        </div>
                    </div>
                    <div class="master-trans-table">
                        <table class="tablesort" id="datatable">
                            <thead>
                                <tr>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Id Transaksi</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Nama Pembeli</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Nama Seller</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Status Pemesanan</th>
                                    <th class="font-primary color-secondary">Tangga Transaksi</th>
                                    <th class="font-primary color-secondary">Total</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach($htrans as $h)
                                    <tr>
                                        <td>TR{{$h->tgl_beli}}#{{$h->id_transaksi}}</td>
                                        @foreach($user as $u)
                                            @if($u->id_user == $h->id_user)
                                                <td>{{$u->nama}}</td>
                                            @elseif($u->id_user == $h->id_seller)
                                                <td>{{$u->nama}}</td>
                                            @endif
                                        @endforeach
                                        @if($h->status_pengiriman == "SENDING")
                                            <td class="tengah tulisan" style="color:red;">{{$h->status_pengiriman}}</td>
                                        @else
                                            <td class="tengah tulisan" style="color:green;">{{$h->status_pengiriman}}</td>
                                        @endif
                                        <td>{{$h->tgl_beli}}</td>
                                        <td>{{ 'IDR '.number_format($h->total, 2, ",",".") }}</td>
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
