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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/c39198c184.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="forum-container">
        <div class="forum-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Forum</h1>
        </div>
        <div class="forum-control" style="padding-bottom: 1%; display: flex">
            @if($user_logon->jenis_user == "customer")
                <div class="forum-content">
                    <div class="forum-title">
                        <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Share your Design</h1>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <form method = "POST" action="/handlePost" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row" style="padding: 10px 0px">
                                        <input placeholder="Judul" id="judul_post" type="text" class="master-forum-input" name="judul_post">
                                        <textarea placeholder="Caption..." id="isi_post" class="master-forum-input" style="height: 100%;" name="isi_post"></textarea> <br>
                                        <div style="color:red;"><span id="err-isi"></span></div><br>
                                        <input type="file" name="upload" id="upload" multiple/><br><br>
                                        <div id="buttons">
                                            <button type="submit" class="text-white custom-button" style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">Post</button>
                                        </div>
                                    </div>
                                </form>
                                <a href="/myPost"><button class="text-white custom-button" style="font-family: 'Roboto Condensed', sans-serif;font-weight: bold;">My Post</button></a>
                            </div>
                            <div class="row">
                                <div class="col s8">
                                    <div class="row">
                                        <div class="col s2 offset-s3">

                                        </div>
                                        <div class="col s2 offset-s3" style="padding: 2px 3px">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="forum-content">
                <div class="forum-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Community Post</h1>
                </div>
                <div class="master-forum-content">
                    <div class="master-forum-list" style="overflow-y:scroll;height:575px; width:800px">
                        @foreach($post as $p)
                            <div class="master-forum-list-wrapper">
                                <div class="item-forum-image">
                                    <img src="{{asset('assets/images/post/'.$p->id_post.'.jpeg')}}" alt="image couldn't loaded" width="150px" height="150px">
                                </div>
                                <section class="item-forum-content">
                                    <div class="item-forum-name">
                                        <span class="font-secondary color-secondary" style="font-size: 18px;font-weight: bold;">{{$p->judul_post}}</span>
                                    </div>
                                    <div class="item-forum-posted">
                                        @foreach($user as $u)
                                            @if($u->id_user == $p->id_user)
                                                <span class="font-secondary color-secondary">Posted By: {{$u->nama}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="item-forum-like-dislike">
                                        <span class="font-secondary color-secondary" style="padding-right: 40px"><i class="fas fa-thumbs-up" style="color:  #7dcdc2"></i>{{$p->total_up}}</span>
                                        <span class="font-secondary color-secondary"><i class="fas fa-thumbs-down" style="color: red"></i>{{$p->total_down}}</span>
                                    </div>
                                    <div class="item-forum-warning">
                                        <span class="font-secondary color-secondary" style="color: red">{{$p->caption_post}}</span>
                                    </div>
                                    <div class="item-forum-warning">
                                        <form action="/dpost" method="post">
                                            @csrf
                                            <input type="hidden" name="id_post" value="{{$p->id_post}}">
                                            <button type="submit">Response to Me</button>
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
</body>
</html>
