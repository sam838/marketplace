<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('properties-import.data-logo-icon')
    <title>Our Daily Sneaky</title>
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/loginregis.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <div class="form-login-container" style="padding-top: 20px; padding-bottom: 20px;background-image: url(/assets/images/bgimage/buat_loginnya.png);background-repeat: no-repeat;">
        <div class="block-form-login">
            <h1 class="title-form">Reset Password</h1>
            <hr class="hr-modifed">
            <p class="note">Always remember your password! But we can help you here! Enter your new password!</p>
            <form action="/handleReset" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{$email}}">
                <div class="input-wrapper">
                    <input type="password" name="new_password">
                    <label for="new_password"><span class="font-secondary">New Password</span></label>
                    <div style="color:red;">{{ $errors->first('new_password') }}</div>
                </div>
                <div class="input-wrapper">
                    <input type="password" name="confirm_password">
                    <label for="confirm_password"><span class="font-secondary">Confirm Password</span></label>
                    <div style="color:red;">{{ $errors->first('confirm_password') }}</div>
                </div>
                <div class="input-wrapper">
                    <button type="submit" class="text-white custom-button" style="width: 100%;">Confirm</button>
                </div>
            </form>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
<script>
    $(document).ready(function () {
        $("input").each(function () {
            if ($(this).val().length > 0)
            {
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
</html>
