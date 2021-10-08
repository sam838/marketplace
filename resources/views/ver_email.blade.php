<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('properties-import.data-logo-icon')
    <title>Our Daily Sneak</title>
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/loginregis.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi verifikasi -->
    <div class="form-login-container">
        <div class="block-form-login">
            <h1 class="title-form">Verification Email !</h1>
            <hr class="hr-modified">
            <p class="note">Silahkan cek kembali email anda untuk melakukan verifikasi</p>
            <a href="/goLogin" style="text-decoration: none;"><button class="custom-button text-white" style="width: 100%;">Login Now</button></a>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
