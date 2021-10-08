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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forum.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="forum-container">
        <div class="forum-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Forum</h1>
        </div>
        <div class="forum-control" style="padding-bottom: 1%;">
            <div class="forum-content">
                <div class="forum-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">My Post</h1>
                </div>
                <div class="master-forum-content">
                    <div class="master-forum-list">
                        @foreach($post as $p)
                            <div class="master-forum-list-wrapper">
                                <div class="item-forum-image">
                                    <img src="{{asset('assets/images/post/'.$p->id_post.'.jpeg')}}" alt="" width="150px" height="150px">
                                </div>
                                <section class="item-forum-content">
                                    <div class="item-forum-name">
                                        <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;"> {{$p->judul_post}}</span>
                                    </div>
                                    <div class="item-forum-like-dislike">
                                        <span class="font-secondary color-secondary" style="padding-right: 40px"><i class="fas fa-thumbs-up" style="color:  #7dcdc2"></i>{{$p->total_up}}</span>
                                        <span class="font-secondary color-secondary"><i class="fas fa-thumbs-down" style="color: red"></i>{{$p->total_down}}</span>
                                    </div>
                                    <div class="item-forum-warning">
                                        <span class="font-secondary color-secondary" style="color: red">{{$p->caption_post}}</span>
                                    </div>
                                    <div class="item-forum-warning">
                                        <form action="/editPost" method="GET" style="margin-bottom:10px;">
                                            @csrf
                                            <input type="hidden" name="id_post" value="{{$p->id_post}}">
                                            <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;"><i class="material-icons">edit</i></button>
                                        </form>
                                        <form action="/deletePost" method="GET">
                                            @csrf
                                            <input type="hidden" name="id_post" value="{{$p->id_post}}">
                                            <button class="waves-effect waves-light btn grey lighten-2" style="color: #02075d;font-family: 'Roboto Condensed', sans-serif;font-weight: bold;"><i class="material-icons">delete</i></button>
                                        </form>
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
