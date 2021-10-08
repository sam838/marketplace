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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/auto-tables.js')}}"></script>
    <script src="https://unpkg.com/jquery-tablesortable"></script>
    <script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="seller-container">
        <div class="seller-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Seller</h1>
        </div>
        <div class="seller-control">
            <div class="seller-content">
                <div class="seller-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Seller Item</h1>
                </div>
                <!-- disini masternya beda beda -->
                <div class="seller-item-content">
                    <div class="seller-item-search-filter">
                        <div class="seller-item-search-wrapper">
                            <input type="text" id="myInput"/>
                        </div>
                        <div class="seller-add-item">
                            <form action="/addItem">
                                <button  class="custom-button text-white" style="min-height: 35px">Add Item</button>
                            </form>
                        </div>
                    </div>
                    <div class="seller-item-table">
                        <table class="tablesort" id="datatable">
                            <thead>
                                <tr>
                                    <th class="font-primary color-secondary">Image</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Nama Sneaker</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Brand</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Kategori</th>
                                    <th data-tablesort-type="string" class="font-primary color-secondary">Harga</th>
                                    <th class="font-primary color-secondary">Action</th>
                                </tr>
                            </thead>
                            <tbody id = "tableBody">
                                @foreach($sneaker as $s)
                                <tr>

                                    <td><img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-right.jpg')}}" alt="" width="100px" height="100px"> </td>
                                    <td>{{$s->nama_sneaker}}</td>
                                    <td>{{$s->brand_sneaker}}</td>
                                    <td>
                                        @foreach($kategori as $k)
                                            @if($k->id_kategori == $s->id_kategori)
                                                {{$k->nama_kategori}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }}</td>
                                    <td>
                                        <form action="/editItem">
                                            <input type="hidden" name="id_sneaker" value="{{$s->id_sneaker}}">
                                            <button class="custom-button text-white">edit</button>
                                        </form><br>
                                        <form action="/deleteItem">
                                            <input type="hidden" name="id_sneaker" value="{{$s->id_sneaker}}">
                                            <button class="custom-button text-white">delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
