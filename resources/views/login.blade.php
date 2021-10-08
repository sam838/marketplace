<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @include('properties-import.data-logo-icon')
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/loginregis.css')}}">
</head>
<body >
    @include('properties-import.navbar')
    <div class="form-login-container" style="background-image: url(/assets/images/bgimage/buat_loginnya.png);background-repeat: no-repeat;">
        <div class="block-form-login">
            <h1 class="title-form">LOGIN</h1>
            <hr class="hr-modified">
            <p class="note">Enter your email address and password.</p>
            @if (Session::has('msg'))
                <div style="background-color: #FAEBE7; border-left: 5px solid #DF280A; margin-top: 20px; padding: 10px;width: ">
                    <div class="font" style="font-size: 12pt;">
                        {{ Session::get('msg') }}
                    </div>
                </div>
            @endif
            @if (isset($msg))
                <div style="background-color: lightgreen; border-left: 5px solid green; margin-top: 20px; padding: 10px;">
                    <div class="font" style="font-size: 12pt;">
                        {{ $msg }}
                    </div>
                </div>
            @endif
            <form action="/handleLogin" method="POST">
                @csrf
                <div class="input-wrapper">
                    <input type="text" name="username">
                    <label for="username"><span class="font-secondary">Username</span></label>
                    <div style="color:red;">{{ $errors->first('username') }}</div>
                </div>
                <div class="input-wrapper">
                    <input type="password" name="password">
                    <label for="password"><span class="font-secondary">Password</span></label>
                    <div style="color:red;">{{ $errors->first('password') }}</div>
                </div>
                <div class="input-wrapper">
                    <button type="submit" class="text-white custom-button" style="width: 100%;">Login</button>
                </div>
                <div class="forget-password">
                    <a href="/forgot_password" style="text-decoration: none;color: #17293b;">Forget Password?</a>
                </div>
                <div class="go-register">
                    <a href="{{ url('/goRegister') }}" style="text-decoration: none;color: #17293b;">Join Us!</a>
                </div>
            </form>
        </div>
    </div>
    @include('properties-import.footer')
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
    @include('properties-import.data-card-hover')
</body>
</html>
