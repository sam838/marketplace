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
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">
</head>
<body>
    @include('properties-import.navbar')
    <!-- isi -->
    <div class="master-container">
        <div class="master-title" style="text-align: center;padding-top:2%;">
            <h1 style="color: #17293b;font-weight: bold;padding-bottom: 5px;font-family: 'Montserrat', sans-serif;">Master</h1>
        </div>
        <div class="master-control" style="padding-bottom: 1%;">
            <div class="master-navigation">
                <hr style="margin:0;height: 1px;">
                <div class="master-navigation-wrapper">
                    <a href="/masterUser"><i class="fas fa-user-circle"></i> <span id="nav-master">Master User</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterForum"><i class="fas fa-dice-d6"></i> <span id="nav-master">Master Forum</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterRpost"><i class="fas fa-comment-alt"></i> <span id="nav-master">Master Review Forum</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterBarang"><i class="fas fa-key"></i><span id="nav-master">Master Barang</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterRsneaker"><i class="fas fa-shoe-prints"></i> <span id="nav-master">Master Review Sneaker</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/masterTrans"><i class="fas fa-chart-line"></i> <span id="nav-master">Data Transaksi</span></a>
                </div>
                <div class="master-navigation-wrapper">
                    <a href="/editSlider"><i class="fas fa-flag" style="color: #7fccbf;"></i> <span id="nav-master" style="color:#253f58">Master Banner</span></a>
                </div>
                @include('properties-import.master-laporan')
            </div>
            <div class="master-content">
                <div class="master-title">
                    <h1 style="margin: 0;color: #17293b;font-family: 'Montserrat', sans-serif;">Master Banner</h1>
                </div>
                <form method="post" action="upload.php" enctype="multipart/form-data">
                    @csrf
                    <div class="master-edit-slider-content">
                        <div class="slider-image-container">
                            <div class="slider-image-wrapper">
                                <h2 class="font-secondary" style="color: #17293b;">Image Banner 1</h2>
                                <img class="image-banner" src="{{asset('assets/images/SwiperFoto/5.jpg')}}" id="preview-upload" alt="Invalid image!"/>
                            </div>
                            <div class="slider-image-wrapper">
                                <h2 class="font-secondary" style="color: #17293b;">Image Banner 2</h2>
                                <img class="image-banner" src="{{asset('assets/images/SwiperFoto/6.jpg')}}" id="preview-upload" alt="Invalid image!"/>
                            </div>
                            <div class="slider-image-wrapper">
                                <h2 class="font-secondary" style="color: #17293b;">Image Banner 3</h2>
                                <img class="image-banner" src="{{asset('assets/images/SwiperFoto/7.jpg')}}" id="preview-upload" alt="Invalid image!"/>
                            </div>
                            <div class="slider-image-wrapper">
                                <h2 class="font-secondary" style="color: #17293b;">Image Banner 4</h2>
                                <img class="image-banner"  src="{{asset('assets/images/SwiperFoto/9.jpg')}}" id="preview-upload" alt="Invalid image!"/>
                            </div>
                        </div>
                        <div class="slider-image-control">
                            <h2 class="font-secondary" style="color: #17293b;">Edit Image</h2>
                            <img src="{{asset('assets/images/SwiperFoto/null-img.jpeg')}}" id="preview-upload" alt="Invalid image!"/> <br>
                            <input type="file" name="" id="" class=""> <br>
                            <button class="button-edit-banner custom-button text-white">Edit Banner 1</button>
                            <button class="button-edit-banner custom-button text-white">Edit Banner 2</button>
                            <button class="button-edit-banner custom-button text-white">Edit Banner 3</button>
                            <button class="button-edit-banner custom-button text-white">Edit Banner 4</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    @include('properties-import.footer')
    @include('properties-import.data-script')
    @include('properties-import.data-card-hover')
    @include('properties-import.master-laporan-script')
</body>
</html>
