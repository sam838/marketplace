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
    <div class="account-dashboard-container" style="min-height: 685px;">
        <div class="account-dashboard-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Account</h1>
        </div>
        <div class="account-dashboard-content">
            <div class="account-navigation">
                <hr style="margin:0;height: 1px;">
                @if($user_logon->jenis_user == "seller")
                    <div class="account-navigation-wrapper">
                        <a href="/goAccdash"><i class="fas fa-th-large"></i> <span id="nav-acc" >My Account</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goEditacc"><i class="fas fa-user" style="color: #7fccbf;"></i><span id="nav-acc" style="color:#253f58"> Account Information</span></a>
                    </div>
                @else
                    <div class="account-navigation-wrapper">
                        <a href="/goAccdash"><i class="fas fa-th-large"></i> <span id="nav-acc" >My Account</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goMyorder"><i class="fas fa-shopping-bag"></i> <span id="nav-acc">My Orders</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goAdress"><i class="fas fa-address-book"></i> <span id="nav-acc">Address Book</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goEditacc"><i class="fas fa-user" style="color: #7fccbf;"></i><span id="nav-acc" style="color:#253f58"> Account Information</span></a>
                    </div>
                    <div class="account-navigation-wrapper">
                        <a href="/goWishlist"><i class="fas fa-heart"></i> <span id="nav-acc">My Wishlist</span></a>
                    </div>
                @endif
            </div>
            <div class="editacc-content">
                <div class="account-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Account Information</h1>
                </div>
                <br>
                <form action="/handleEditInfo" method="post">
                    <div class="">
                        <h3 style="margin:0;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;" class="color-secondary">Fullname</h3>
                        <input type="text" name="nama" id="" value = "{{$user_logon['nama']}}" class="edit-acc-input">
                        <div style="color:red;">{{ $errors->first('nama') }}</div>
                    </div>
                    <div class="">
                        <h3 style="margin:0;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;" class="color-secondary">Email</h3>
                        <input type="text" name="email" id="" value ="{{$user_logon['email']}}" disabled class="edit-acc-input">
                        <div style="color:red;">{{ $errors->first('email') }}</div>
                    </div>
                    <div class="">
                        <h3 style="margin:0;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;" class="color-secondary">Current Password</h3>
                        <input type="text" name="curr_password" class="edit-acc-input">
                        @if (Session::has('msgerror'))
                        <div class="font" style="font-size: 12pt;">
                            {{ Session::get('msgerror') }}
                        </div>
                        @endif
                    </div>
                    <div class="">
                        <h3 style="margin:0;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;" class="color-secondary">New Password</h3>
                        <input type="text" name="new_password" id="" class="edit-acc-input">
                        @if (Session::has('msgerror'))
                        <div style="color:red;">{{ $errors->first('confirm_password') }}</div>
                        @endif
                    </div>
                    <div class="">
                        <h3 style="margin:0;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;" class="color-secondary">Confirm Password</h3>
                        <input type="text" name="confirm_password" id="" class="edit-acc-input">
                        <div style="color:red;"> {{ Session::get('msgerror') }}</div>
                    </div>
                    <button type="submit" class="btn-save custom-button text-white">Save</button>
                </form>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
