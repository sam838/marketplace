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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/seller.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <div class="seller-container">
        <div class="seller-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Seller</h1>
        </div>
        <div class="seller-control">
            <div class="seller-content">
                <div class="seller-title">
                    @if($msg == "add")
                        <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Add Item</h1>
                    @else
                        <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Edit Item</h1>
                    @endif
                </div>
                @if(isset($sneaker))
                    <form action="/handleEditItem" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_sneaker" value="{{$sneaker->id_sneaker}}">
                @else
                    <form action="/handleNewItem" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf
                        <div class="seller-add-content">
                            <div class="">
                                <input name="nama" id="first_name" type="text" placeholder= "Nama Sneaker" class="seller-item-input" @if(isset($sneaker)) value="{{$sneaker->nama_sneaker}}" @endif>
                                <div style="color:red;">{{ $errors->first('nama') }}</div>
                            </div>
                            <div class="">
                                <input  name="brand" id="last_name" type="text" class="seller-item-input" placeholder="Brand Sneaker" @if(isset($sneaker)) value="{{$sneaker->brand_sneaker}}" @endif>
                                <div style="color:red;">{{ $errors->first('brand') }}</div>
                            </div>
                            <div class="seller-add-harga">
                                <input name="harga" id="harga" type="number" class="seller-item-input" placeholder="Harga Sneaker" @if(isset($sneaker)) value="{{$sneaker->harga_sneaker}}" @endif>
                                <div style="color:red;">{{ $errors->first('harga') }}</div>
                            </div>
                            <div class="select" style="width: 615px;margin-bottom: 15px;">
                                <select name="kategori" id="kategori" >
                                    <option value="" disabled selected hidden>Choose your option</option>
                                    @foreach($kategori as $k)
                                        @if(isset($sneaker))
                                            @if($k->id_kategori == $sneaker->id_kategori)
                                                <option value="{{$k->id_kategori}}" selected>{{$k->nama_kategori}}</option>
                                            @else
                                                <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                            @endif
                                        @else
                                            <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div style="color:red;">{{ $errors->first('kategori') }}</div>
                            </div>
                            <div class="" style="width: 100%; margin-bottom: 15px;">
                                <input type="file" name="img-up" multiple>
                            </div>
                            <div class="" style="width: 100%; margin-bottom: 15px;">
                                <input type="file" name="img-def"  multiple>
                                <div style="color:red;">{{ $errors->first('img-def') }}</div>
                            </div>
                            <div class="" style="width: 100%; margin-bottom: 15px;">
                                <input type="file" name="img-back" multiple>
                            </div>
                            <div class="">
                                <button class="custom-button text-white">Save</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
</body>
</html>
