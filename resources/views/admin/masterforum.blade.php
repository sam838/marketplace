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
                    <a href="/masterForum"><i class="fas fa-dice-d6" style="color: #7fccbf;"></i> <span id="nav-master" style="color:#253f58">Master Forum</span></a>
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
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Master Forum</h1>
                </div>
                <!-- disini masternya beda beda -->
                <div class="master-forum-content">
                    <div class="master-forum-list">
                        @foreach($post as $p)
                        <br>
                            <div class="master-forum-list-wrapper">
                                <div class="item-forum-image">
                                    <img src="{{asset('assets/images/post/'.$p->id_post.'.jpeg')}}" alt="" width="500px" height="400px">
                                </div>
                                <section class="item-forum-content">
                                    <div class="item-forum-name" id="tableBody">
                                        <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;">{{$p->judul_post}}</span>
                                    </div>
                                    <div class="item-forum-posted">
                                        <span class="font-secondary color-secondary">Posted By:
                                            @foreach($user as $u)
                                                @if ($u->id_user == $p->id_user)
                                                    {{$u->nama}}
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                    <div class="item-forum-like-dislike">
                                        <span class="font-secondary color-secondary" style="padding-right: 40px"><i class="fas fa-thumbs-up" style="color:  #7dcdc2"></i>{{$p->total_up}}</span>
                                        <span class="font-secondary color-secondary"><i class="fas fa-thumbs-down" style="color: red"></i>{{$p->total_down}}</span>
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
