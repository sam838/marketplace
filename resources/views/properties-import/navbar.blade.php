<div id="search">
    <form role="search" id="searchform" action="{{url('/q_shop')}}" method="get">
        <input value="" name="query" type="search" placeholder="Type to search"/>
    </form>
</div>
<div class='menu'>
    <span class='toggle'>
        <i></i>
        <i></i>
        <i></i>
    </span>
    <div class='menuContent'>
        <ul>
            @if (empty($user_logon))
                <li onclick="location.href='{{ url('') }}';">Home</li>
                <li><a href="#search" style="text-decoration: none; color: black;">Search</a></li>
                <li onclick="location.href='{{ url('goForum') }}';">Community</li>
                @if (empty($user_logon))
                    <li onclick="location.href='{{ url('goLogin') }}';">Login</li>
                @else
                    <li onclick="location.href='{{ url('goAccdash') }}';">{{$user_logon->nama}}</li>
                @endif
                <li onclick="location.href='{{ url('goChat') }}';"><i class="far fa-comments"></i>Chat</li>
                <li onclick="location.href='{{url('goCart')}}';">Cart</li>
            @elseif($user_logon->jenis_user == "customer")
                <li onclick="location.href='{{ url('') }}';">Home</li>
                <li><a href="#search" style="text-decoration: none; color: black;">Search</a></li>
                <li onclick="location.href='{{ url('goForum') }}';">Community</li>
                @if (empty($user_logon))
                    <li onclick="location.href='{{ url('goLogin') }}';">Login</li>
                @else
                    <li onclick="location.href='{{ url('goAccdash') }}';">{{$user_logon->nama}}</li>
                @endif
                <li onclick="location.href='{{ url('goChat') }}';"><i class="far fa-comments"></i>Chat</li>
                <li onclick="location.href='{{url('goCart')}}';">Cart</li>
                <li onclick="location.href='{{url('handleLogout')}}';">Logout</li>
            @else
                <li onclick="location.href='{{ url('goChat') }}';"><i class="far fa-comments"></i>Chat</li>
                @if (empty($user_logon))
                    <li onclick="location.href='{{ url('goLogin') }}';">Login</li>
                @else
                    <li onclick="location.href='{{ url('goAccdash') }}';">{{$user_logon->nama}}</li>
                @endif

                <li onclick="location.href='{{url('myItem')}}';">My item</li>
                <li onclick="location.href='{{url('myOrderAdmin')}}';">My Order</li>
                <li onclick="location.href='{{url('handleLogout')}}';">Logout</li>
            @endif
        </ul>
    </div>
</div>
