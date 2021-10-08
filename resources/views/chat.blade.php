<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    @include('properties-import.data-logo-icon')
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chat.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body >
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="container">
    <div class="messaging">
            <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                <div class="recent_heading">
                    <h4>Recent</h4>
                </div>
                <div class="srch_bar">
                    <div class="stylish-input-group">
                    <input type="text" class="search-bar"  placeholder="Search" >
                    <span class="input-group-addon">
                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </span> </div>
                </div>
                </div>
                <!--chat list-->
                <div class="inbox_chat">
                    @foreach($allChat as $all)
                        <div class="chat_list active_chat">
                            @foreach($allUser as $u)
                                @if($all->id_tujuan == $u->id_user)
                                    @if($currChat != null)
                                        @if($u->id_user == $currChat[0]->id_tujuan || $u->id_user == $currChat[0]->id_user)
                                            <div class="chat_people">
                                                <!-- ini nama orangnya -->
                                                {{$u->nama}}
                                            </div>
                                        @endif
                                    @else
                                        <form action="/goChat" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_tujuan" value="{{$u->id_user}}">
                                            <input type="submit" value="{{$u->nama}}" style="border:none;color:black;">
                                        </form>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <!--messagebox-->
            <div class="mesgs">
                <div class="msg_history">
                    @if($currChat == null)

                    @else
                        @foreach($currChat as $c)
                            @if($c->id_user != $user_logon->id_user)
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{$c->isi_chat}}</p>
                                            <span class="time_date">{{$c->created_at}}</span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{$c->isi_chat}}</p>
                                        <span class="time_date">{{$c->created_at}}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                @if($currChat == null)

                @else
                <form class="col s12" action="/sendChat" method="POST">
                    @csrf
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <textarea placehodler="Message here" id="icon_prefix2" placeholder = "Send A Message" class="materialize-textarea" style="width:95%;background:transparent;" name="msg"></textarea>
                                    @if($currChat[0]->id_user==$user_logon->id_user)
                                        <input type="hidden" name="id_tujuan" value="{{$currChat[0]->id_tujuan}}">
                                    @else
                                        <input type="hidden" name="id_tujuan" value="{{$currChat[0]->id_user}}">
                                    @endif

                            </div>

                        </div>
                        <button class="msg_send_btn" type="submit" name="action"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                </form>
                @endif
            </div>
            </div>
        </div>
    </div>
    <!-- -->
    @include('properties-import.data-script')
    <script>
        $(document).ready(function () {
            $("input").each(function () {
                if ($(this).val().length > 0) {
                    $(this).addClass("not-empty");
                } else {
                    $(this).removeClass("not-empty");
                }

                $(this).on("change", function () {
                    if ($(this).val().length > 0) {
                        $(this).addClass("not-empty");
                    } else {
                        $(this).removeClass("not-empty");
                    }
                });
            });
        });
    </script>
</body>
</html>
