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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/detail.css')}}">
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
            <div style="max-width: 1920px; width: 80%;">
                <div class="row">
                    <div class="col s12">
                        <h2 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">{{$post->judul_post}}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col s8 offset-s2">
                        <div class="row">
                            <div class="col s12">
                                <div class="row" >
                                </div>
                                <div class="row">
                                    <div class="col s12" style="color:gray;font-size:100%;">
                                        <div class="item-forum-posted">
                                            <span class="font-secondary color-secondary">
                                                @foreach($user as $u)
                                                    @if($u->id_user == $post->id_user)
                                                        Posted By : {{$u->nama}}
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <img src="{{asset('assets/images/post/'.$post->id_post.'.jpeg')}}" alt="image couldn't loaded" width="100%">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <p style="color: #17293b;font-weight: bold;font-family: 'Montserrat', sans-serif">Ini Caption blaa blaa blaa</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <span class="font-secondary color-secondary" style="padding-right: 40px"><i class="fas fa-thumbs-up" style="color: #7dcdc2"></i> {{$post->total_up}}</span>
                                    <span class="font-secondary color-secondary"><i class="fas fa-thumbs-down" style="color: red"></i> {{$post->total_down}}</span>
                                </div>
                                <hr>
                                <div class="comment-container">
                                    @foreach($rpost as $rv)
                                        <div class="comment-content">
                                            @foreach($user as $u)
                                                @if($u->id_user == $rv->id_user)
                                                    <div class="comment-user font-secondary color-secondary">
                                                        {{$u->nama}}
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="comment-text font-secondary">{{$rv->komentar_post}}</div>
                                            <span class="comment-created">{{$rv->created_at}}</span>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                                <form class="col s12" method="post" action="/handleRpost">
                                    @csrf
                                    <input type="hidden" name="id_post" value="{{$post->id_post}}">
                                    <div class="input-field col s6">
                                        <textarea name="comment" placehodler="Message here" id="icon_prefix2" class="master-forum-input"></textarea>
                                    </div>
                                    <div class="input-field col s4">
                                    <select name="thumbs">
                                        <option value="up">UP</option>
                                        <option value="down">DOWN</option>
                                    </select>
                                    <label>Thumbs</label>
                                    </div>
                                    <div class="input-field col s1">
                                        <button class="btn waves-effect waves-light grey lighten-1" type="submit" name="action"> Send
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
    {{-- @include('properties-import.master-laporan-script') --}}
</body>
</html>
