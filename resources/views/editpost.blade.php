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
            <div style="max-width: 1920px; width: 80%;">
                <div class="row">
                    <div class="col s12">
                        <h2 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Judul Post</h2>
                    </div>
                </div>
                <form action="/saveEpost" method="POST">
                    @csrf
                    <div class="row">
                        <?php $p = $post;?>
                        <input name="judul_post" style="font-size:300%;" placeholder="Placeholder" id="first_name" type="hidden" class="validate tulisan" value="{{$p->judul_post}}">
                        <div class="col s8 offset-s2">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row" >
                                    </div>
                                    <div class="row">
                                        <div class="col s12" style="color:gray;font-size:100%;">
                                            <div class="item-forum-posted">
                                                <span class="font-secondary color-secondary">Posted By:</span>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <img src="{{asset('assets/images/post/2.jpeg')}}" alt="image couldn't loaded" width="100%">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <textarea name="isi_post" id="icon_prefix2" class="master-forum-input">{{$p->caption_post}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="font-secondary color-secondary" style="padding-right: 40px"><i class="fas fa-thumbs-up" style="color: #7dcdc2"></i>{{$p->total_up}}</span>
                                        <span class="font-secondary color-secondary"><i class="fas fa-thumbs-down" style="color: red"></i>{{$p->total_down}}</span>
                                    </div>
                                    <hr>
                                    <div class="input-field col s1">
                                        <input type="hidden" name="id_post" value="{{$post->id_post}}">
                                        <button class="btn waves-effect waves-light grey lighten-1" type="submit"> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
    {{-- @include('properties-import.master-laporan-script') --}}
</body>
</html>
