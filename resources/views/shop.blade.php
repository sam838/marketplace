<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Our Daily Sneak</title>
    @include('properties-import.data-logo-icon')
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/shop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select-box.css')}}">
    <style>
        @font-face {
            font-family: "poiretone";
            src: url("../font/poiretone-regular.woff")format("woff");
        }
    </style>
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="dashboard-container">
        <div class="dashboard-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Dashboard</h1>
        </div>
        <div class="sort-dashboard-container">
            <div class="sort-dashboard-content">
                <form role = "search" method="get" action = "q_shop">
                    <div class="select-box-sort select-box">
                        <input type="hidden" name="query" value="{{$query}}">
                        <div class="options-container-sort options-container no-search">
                            <div class="option-sort option">
                                <input type="submit" class="radio" id="newest" name="sort" value="Newest"/>
                                <label for="newest" class="font-secondary">Newest</label>
                            </div>
                            <div class="option-sort option">
                                <input type="submit" class="radio" id="newest" name="sort" value="Newest"/>
                                <label for="newest" class="font-secondary">Newest</label>
                            </div>
                            <div class="option-sort option">
                                <input type="submit" class="radio" id="highest" name="sort" value="Highest Price"/>
                                <label for="highest" class="font-secondary">Highest Price</label>
                            </div>
                            <div class="option-sort option">
                                <input type="submit" class="radio" id="cheapest" name="sort" value="Lowest Price"/>
                                <label for="cheapest" class="font-secondary">Lowest Price</label>
                            </div>
                            <div class="option-sort option">
                                <input type="submit" class="radio" id="alpha-a-z" name="sort" value="Alpha-a-z"/>
                                <label for="alpha-a-z" class="font-secondary">Alphabet A - Z</label>
                            </div>
                            <div class="option-sort option">
                                <input type="submit" class="radio" id="alpha-z-a" name="sort" value="Alpha-z-a"/>
                                <label for="alpha-z-a" class="font-secondary">Alphabet Z - A</label>
                            </div>
                        </div>
                        <div class="selected-sort selected font-secondary">
                            {{$pilihan}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <section class="dashboard-search-container">
            <div class="filter-navigation">
                <h3 class="color-secondary" style="font-family: 'Montserrat', sans-serif">
                    Brand
                </h3>
                <hr style="margin-top:-10px;">
                <form method = "GET" action="q_shop">
                    <input type="hidden" name="query" value="{{$query}}">
                    <input type="hidden" name="sort" value = "{{$pilihan}}">
                    @foreach($brand as $s)
                        <input type="submit" class="font-secondary" name = "brand" style="cursor:pointer;font-weight: bold;font-family: 'Montserrat', sans-serif;line-height: 22px;font-size: 18px;background:transparent;border:1px solid white" value="{{$s->brand_sneaker}}"><br>
                    @endforeach
                </form>
                <h3 class="color-secondary" style="font-family: 'Montserrat', sans-serif">Size</h3>
                <hr style="margin-top:-10px;">
                <form method = "get" action ="q_shop">
                    <input type="hidden" name="minimum_price" id="minimum_price" value = {{$min}}>
                    <input type="hidden" name="maximum_price" id="maximum_price" value = {{$max}}>
                    <div class="size-container">
                        @foreach($size as $s)
                            <div class="size-content">
                                <input type ="submit" name="size" class="font-secondary" id="size-sneaker" style="font-weight:bold;background:transparent;border:1px solid white" value="{{$s->ukuran_sneaker}}">
                            </div>
                        @endforeach
                    </div>
                    <h3 class="color-secondary" style="font-family: 'Montserrat', sans-serif">Price</h3>
                    <hr style="margin-top:-10px;">
                    <div class="range-slider">
                        <p>
                            <label for="amount"></label>
                            <input type="text" name="amount" class="font-primary color-secondary" id="amount" readonly style="border: 0;font-weight: bold;font-size: 18px" />
                        </p>
                        <div id="slider-range"></div>
                    </div>
                    <div class="button-range-slider">
                        <button type = "submit" name = "filter_price" class="custom-button text-white" style="width: 100%;">OK</button>
                    </div>
                </form>
            </div>
            <div class="filter-content">
                @foreach ($sneaker as $s)
                <form action="/handleBarang" method="post">
                @csrf
                    <div class="filter-content-item" id="box">
                        <div>
                            <img src="{{asset('assets/images/sneakers/'.$s->id_sneaker.'-right.jpg')}}" alt="" id="border-image">
                        </div>
                        <div id="description-item">
                            <input type="hidden" name="id_sneaker" value="{{$s->id_sneaker}}">
                            <h5 style="font-family: 'Montserrat', sans-serif;font-size: 22px;margin-bottom: 2px">{{$s->nama_sneaker}}</h5>
                            <span style="font-family: 'Montserrat', sans-serif;font-size: 18px;">{{ 'IDR '.number_format($s->harga_sneaker, 2, ",",".") }} </span>
                            <br>
                            <button type="submit" class="custom-button text-white" value="*" name="btnWishlist" style="margin-top: 10px;" class=""><i class="fas fa-heart"></i></button>
                            <button type="submit" class="custom-button text-white" value="Detail Item" name="btnDetail" style="margin-top: 10px;" class="font-secondary">Detail Item</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </section>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 100,
                max: 10000,
                values: [parseInt($("#minimum_price").val()), parseInt($("#maximum_price").val())],
                slide: function (event, ui) {
                    $("#amount").val(
                        "Rp. " + ui.values[0] + "K" + " - Rp. " + ui.values[1] + "K"
                    );
                    $("#minimum_price").val(ui.values[0]);
                    $("#maximum_price").val(ui.values[1]);

                },
            });
            $("#amount").val(
                "Rp. " +
                $("#slider-range").slider("values", 0) +
                "K - Rp. " +
                $("#slider-range").slider("values", 1) + "K"
            );

        });
    </script>
    <script>
        const selected = document.querySelector(".selected-sort");
        const optionsContainer = document.querySelector(".options-container-sort");
        const optionsList = document.querySelectorAll(".option-sort");

        selected.addEventListener("click", () => {
          optionsContainer.classList.toggle("active");
        });

        optionsList.forEach(o => {
          o.addEventListener("click", () => {
            selected.innerHTML = o.querySelector("label").innerHTML;
            optionsContainer.classList.remove("active");
          });
        });
        </script>
    @include('properties-import.data-card-hover')
</body>
</html>
