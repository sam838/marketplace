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
                    <a href="/masterRsneaker"><i class="fas fa-shoe-prints" style="color: #7fccbf;"></i> <span id="nav-master" style="color:#253f58">Master Review Sneaker</span></a>
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
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Master Review Sneaker</h1><br>
                </div>
                <div class="master-trans-content">
                    <div class="master-trans-filter">
                        <div class="master-trans-search-wrapper">
                            <input type="text" name="" id="myInput" class="master-user-input" placeholder="Search"> <br><br>
                        </div>
                    </div>
                    <div class="master-trans-table">
                        <table class="tablesort" id="datatable">
                            <thead>
                                <tr>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Tanggal Review</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Nama Sneaker</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Nama Uploader</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Nama Riviewer</th>
                                    <th data-tablesort-type="int"    class="font-primary color-secondary">Rate</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Isi Komentar</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @foreach($rbarang as $rp)
                                    <tr>
                                        <td>{{$rp->created_at}}</td>
                                        @foreach($barang as $p)
                                            @if($p->id_sneaker == $rp->id_sneaker)
                                                <td>{{$p->nama_sneaker}}</td>
                                                @foreach($user as $u)
                                                    @if($u->id_user == $p->id_user)
                                                        <td>{{$u->nama}}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        @foreach($user as $u)
                                            @if($u->id_user == $rp->id_user)
                                                <td>{{$u->nama}}</td>
                                            @endif
                                        @endforeach
                                        <td>{{$rp->rate}}</td>
                                        <td>{{$rp->komentar_sneaker}}</td>
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
