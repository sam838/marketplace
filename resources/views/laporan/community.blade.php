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

                </div>
                <!-- disini masternya beda beda -->
                <div class="master-user-content">
                    <div class="master-laporan-chart">
                        <!-- chart disni-->
                    </div>
                    <div class="master-user-table">

                        <table>
                            <thead>
                                <tr>
                                    <th class="font-primary color-secondary">#</th>
                                    <th class="font-primary color-secondary">Judul Post</th>
                                    <th class="font-primary color-secondary">Nama Pengunggah</th>
                                    <th class="font-primary color-secondary">Like</th>
                                    <th class="font-primary color-secondary">Dislike</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ctr = 0;?>
                                @foreach($t_post as $p)
                                    <tr>
                                        <?php $ctr++;?>
                                        <td class="tengah">{{$ctr}}</td>
                                        <td class="tengah">{{$p->judul_post}}</td>
                                        @foreach($t_user as $u)
                                            @if($u->id_user == $p->id_user)
                                                <td class="tengah">{{$u->nama}}</td>
                                            @endif
                                        @endforeach
                                        <td class="tengah">{{$p->total_up}}</td>
                                        <td class="tengah">{{$p->total_down}}</td>
                                        <tr style="background-color:blanchedalmond;">
                                            <td class="tengah" colspan="2">
                                                <img src="{{asset('assets/images/post/'.$p->id_post.'.jpeg')}}" alt="images not found" width="150px">
                                            </td>
                                            <?php $tempKomen = 0;?>
                                            @foreach($t_rpost as $r)
                                                @if($r->id_post == $p->id_post)
                                                    <?php $tempKomen++; ?>
                                                @endif
                                            @endforeach
                                            <td class="tengah" colspan="3">
                                                <h5>Total Komentar</h5>
                                                <br>
                                                <h5>{{$tempKomen}}</h5>
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
