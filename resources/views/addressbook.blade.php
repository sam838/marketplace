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
                <div class="account-navigation-wrapper">
                    <a href="/goAccdash"><i class="fas fa-th-large"></i> <span id="nav-acc" >My Account</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goMyorder"><i class="fas fa-shopping-bag"></i> <span id="nav-acc">My Orders</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goAdress"><i class="fas fa-address-book" style="color: #7fccbf;"></i> <span id="nav-acc" style="color:#253f58">Address Book</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goEditacc"><i class="fas fa-user"></i><span id="nav-acc"> Account Information</span></a>
                </div>
                <div class="account-navigation-wrapper">
                    <a href="/goWishlist"><i class="fas fa-heart"></i> <span id="nav-acc">My Wishlist</span></a>
                </div>
            </div>
            <div class="addressbook-content">
                <div class="account-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Address Book</h1>
                </div>
                <br>
                <h2 class="font-secondary" style="margin-top: 5px;color: #17293b;">Shipping Address</h2>
                <hr style="margin:0;height: 1px;">
                <div class="address-container">
                    @if(count($address) < 1)
                        <h3>No Shipping Address</h3>
                        Add new address book now to make order easier!
                    @else
                        @foreach($address as $a)
                            <div class="shipping-address">
                                <span class="font-secondary" style="color: #A9A9A9">{{$a->nama_alamat}}</span> <br>
                                @foreach($kota as $k)
                                    @if($k->id_kota == $a->id_kota)
                                        @foreach($provinsi as $p)
                                            @if($k->id_provinsi == $p->id_provinsi)
                                                <span class="font-secondary" style="color: #A9A9A9">{{$k->nama_kota}} ,{{$p->nama_provinsi}}</span> <br>
                                                <span class="font-secondary" style="color: #A9A9A9">{{$a->kode_pos}}</span> <br>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="add-address">
                    <form action="/handleAddAdress" method="POST" style="border:1px solid grey;padding:20px;width: 22.7em;">
                        @csrf
                        <div class="select">
                            <select name="provinsi">
                                <option value="" disabled selected>Pilih Provinsi</option>
                                @foreach ($provinsi as $p)
                                    <option value="{{$p->nama_provinsi}}">{{$p->nama_provinsi}}</option>
                                @endforeach
                            </select>
                            <div style="color:red;">{{ $errors->first('provinsi') }}</div>
                        </div>
                        <div class="select" style="margin-top: 10px">
                            <select name="kota">
                                <option value="" disabled selected>Pilih Kota</option>
                                @foreach ($kota as $k)
                                    <option value="{{$k->id_kota}}">{{$k->nama_kota}}</option>
                                @endforeach
                            </select>
                            <div style="color:red;">{{ $errors->first('kota') }}</div>
                        </div>
                        <div class="" style="margin-top: 10px">
                            <textarea name="alamat" id="alamat" class="address-item-input" placeholder="Alamat"></textarea>
                            <div style="color:red;">{{ $errors->first('alamat') }}</div>
                        </div>
                        <div class=""  style="margin-top: 10px">
                            <textarea name="kodepos" id="kodepos" class="address-item-input" placeholder="Kode Pos"></textarea>
                            <div style="color:red;">{{ $errors->first('alamat') }}</div>
                        </div>
                        <div class="" style="margin-top: 10px">
                            <button type="submit" class="button-add-to-cart button-add-address-effect custom-button text-white">
                                ADD NEW ADDRESS
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
