<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    @include('properties-import.data-logo-icon')
    <!-- import link rel -->
    @include('properties-import.data-link')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/loginregis.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select-box.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="form-login-container" style="padding-top: 20px; padding-bottom: 20px;background-image: url(/assets/images/bgimage/buat_sign_up_nya.png);background-repeat: no-repeat;">
        <div class="block-form-login">
            <h1 class="title-form">Sign Up</h1>
            <hr class="hr-modifed">
            <p class="note">Create an account easily and quickly. By creating an account, you can access <br>your data again
                when you visit this site. You can also add shipping addresses,<br> track orders, and much more.</p>
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
            <form action="/handleRegister" method="POST">
                @csrf
                <div class="input-wrapper">
                    <input type="text" name="first_name">
                    <label for="first_name"><span class="font-secondary">First Name</span></label>
                    <div style="color:red;">{{ $errors->first('first_name') }}</div>
                </div>
                <div class="input-wrapper">
                    <input type="text" name="last_name">
                    <label for="last_name"><span class="font-secondary">Last Name</span></label>
                    <div style="color:red;">{{ $errors->first('last_name') }}</div>
                </div>
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
                    <input type="text" name="email">
                    <label for="email"><span class="font-secondary">Email</span></label>
                    <div style="color:red;">{{ $errors->first('email') }}</div>
                </div>
                <div class="input-warpper">
                    <div class="select-box-jenis select-box">
                        <div class="options-container-jenis options-container no-search">
                            <div class="option-jenis option">
                                <input type="radio" class="radio" id="op_jenis1" name="jenis_user" value="customer" />
                                <label for="customer" class="font-secondary">Customer</label>
                            </div>
                            <div class="option-jenis option">
                                <input type="radio" class="radio" id="op_jenis2" name="jenis_user" value="seller" />
                                <label for="seller" class="font-secondary">Seller</label>
                            </div>
                        </div>
                        <div class="selected-jenis selected font-secondary">
                            Jenis User
                        </div>
                      </div>
                    <div style="color:red;">{{ $errors->first('jenis_user') }}</div>
                </div>
                <div class="input-wrapper">
                    <div class="select-box-provinsi select-box">
                        <div class="options-container-provinsi options-container">
                            @foreach ($provinsi as $p)
                            <div class="option-provinsi option">
                                <input type="radio" class="radio" id="{{$p->nama_provinsi}}" name="provinsi" value="{{$p->id_provinsi}}" />
                                <span class="font-secondary">{{$p->nama_provinsi}}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="selected-provinsi selected font-secondary">
                            Provinsi
                        </div>
                        <div class="search-box-provinsi search-box">
                            <input type="text" placeholder="Pilih Provinsi" />
                        </div>
                    </div>
                    <div style="color:red;">{{ $errors->first('provinsi') }}</div>
                </div>
                <div class="input-wrapper">
                    <div class="select-box select-box-kota">
                        <div class="options-container options-container-kota">
                            @foreach ($kota as $k)
                            <div class="option-kota option">
                                <input type="radio" class="radio" id="{{$k->nama_kota}}" name="kota" value="{{$k->id_kota}}"/>
                                <span class="font-secondary">{{$k->nama_kota}}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="selected selected-kota font-secondary">
                            Kota
                        </div>
                        <div class="search-box-kota search-box">
                            <input type="text" placeholder="Pilih Kota" />
                        </div>
                      </div>
                    <div style="color:red;">{{ $errors->first('kota') }}</div>
                </div>
                <div class="input-wrapper">
                    <input type="text" name="alamat">
                    <label for="alamat"><span class="font-secondary">Alamat</span></label>
                    <div style="color:red;">{{ $errors->first('alamat') }}</div>
                </div>
                <div class="input-wrapper">
                    <button type="submit" class="text-white custom-button" style="width: 100%;">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    <script>
        const selected_sort = document.querySelector(".selected-jenis");
        const optionsContainer_sort = document.querySelector(".options-container-jenis");
        const optionsList_sort = document.querySelectorAll(".option-jenis");

        selected_sort.addEventListener("click", () => {
            optionsContainer_sort.classList.toggle("active");
        });

        optionsList_sort.forEach(o => {
          o.addEventListener("click", () => {
            selected_sort.innerHTML = o.querySelector("label").innerHTML;
            if(selected_sort.innerHTML == "customer"){
                document.getElementById("op_jenis1").checked = true;
            }
            else{
                document.getElementById("op_jenis2").checked = true;
            }
            optionsContainer_sort.classList.remove("active");
          });
        });
        </script>
    <script>
    const selected_provinsi = document.querySelector(".selected-provinsi");
    const optionsContainer_provinsi = document.querySelector(".options-container-provinsi");
    const optionsList_provinsi = document.querySelectorAll(".option-provinsi");
    const searchBoxProvinsi = document.querySelector(".search-box-provinsi input");
    selected_provinsi.addEventListener("click", () => {
      optionsContainer_provinsi.classList.toggle("active");
      searchBoxProvinsi.value = "";
      filterList("");

      if (optionsContainer_provinsi.classList.contains("active")) {
        searchBoxProvinsi.focus();
      }
    });

    optionsList_provinsi.forEach(o => {
      o.addEventListener("click", () => {
        selected_provinsi.innerHTML = o.querySelector("span").innerHTML;
        document.getElementById(selected_provinsi.innerHTML).checked = true;
        optionsContainer_provinsi.classList.remove("active");
      });
    });

    searchBoxProvinsi.addEventListener("keyup", function(e) {
      filterList(e.target.value);
    });

    const filterList = searchTerm => {
      searchTerm = searchTerm.toLowerCase();
      optionsList_provinsi.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
          option.style.display = "block";
        } else {
          option.style.display = "none";
        }
      });
    };
    </script>
    <script>
    const selected_kota = document.querySelector(".selected-kota");
    const optionsContainer_kota = document.querySelector(".options-container-kota");
    const optionsList_kota = document.querySelectorAll(".option-kota");
    const searchBoxKota = document.querySelector(".search-box-kota input");

    selected_kota.addEventListener("click", () => {
      optionsContainer_kota.classList.toggle("active");
      searchBoxKota.value = "";
      filterList("");
      if (optionsContainer_kota.classList.contains("active")) {
        searchBoxKota.focus();
      }
    });

    optionsList_kota.forEach(o => {
      o.addEventListener("click", () => {
        selected_kota.innerHTML = o.querySelector("span").innerHTML;
        document.getElementById(selected_kota.innerHTML).checked = true;
        optionsContainer_kota.classList.remove("active");
    });
    searchBoxKota.addEventListener("keyup", function(e) {
      filterList(e.target.value);
    });
    const filterList = searchTerm => {
      searchTerm = searchTerm.toLowerCase();
      optionsList_kota.forEach(option => {
        let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
        if (label.indexOf(searchTerm) != -1) {
          option.style.display = "block";
        } else {
          option.style.display = "none";
        }
      });
    };
    });
    </script>
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
