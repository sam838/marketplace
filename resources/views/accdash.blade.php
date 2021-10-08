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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/account.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="account-dashboard-container" style="height: 685px;">
        <div class="account-dashboard-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Account</h1>
        </div>
        <div class="account-dashboard-content">
            <div class="account-navigation">
                <hr style="margin:0;height: 1px;">
                @if($user_logon->jenis_user == "seller")
                    <div class="account-navigation-wrapper">
                        <a href="/goAccdash"><i class="fas fa-th-large" style="color: #7fccbf;"></i> <span id="nav-acc" style="color:#253f58">My Account</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goEditacc"><i class="fas fa-user"></i><span id="nav-acc"> Account Information</span></a>
                    </div>
                @else
                    <div class="account-navigation-wrapper">
                        <a href="/goAccdash"><i class="fas fa-th-large" style="color: #7fccbf;"></i> <span id="nav-acc" style="color:#253f58">My Account</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goMyorder"><i class="fas fa-shopping-bag"></i> <span id="nav-acc">My Orders</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goAdress"><i class="fas fa-address-book"></i> <span id="nav-acc">Address Book</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goEditacc"><i class="fas fa-user"></i><span id="nav-acc"> Account Information</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goWishlist"><i class="fas fa-heart"></i> <span id="nav-acc">My Wishlist</span></a>
                    </div>
                @endif

            </div>
            <div class="account-content">
                <div class="account-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">My Account</h1>
                </div>
                <div class="my-account-content-wrapper">
                    <div class="my-account-information">
                        <h3 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Account Information</h3>
                        <hr style="margin-top:10px;height: 1.3px;">
                        <div class="">
                            <h4 class="font-secondary" style="margin-top: 10px;color: #17293b;">Contact Information</h4>
                            <span class="font-secondary" style="color: #A9A9A9">Name: {{$user_logon->nama}}</span> <br>
                            <span class="font-secondary" style="color: #A9A9A9">Email: {{$user_logon->email}}</span> <br>
                        </div>
                        <br>
                        <a href="/goEditacc" class="btn-edit font-secondary">Edit</a>
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
