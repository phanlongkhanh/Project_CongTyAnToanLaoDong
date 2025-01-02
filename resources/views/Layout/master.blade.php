<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('homepage-images/p5.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/master/master.css') }}">
    <script src="{{ asset('jss/master/master.js') }}"></script>
</head>

<body>
    <!-- Header -->

    <div class="header">
        <span>Email: phanlongkhanh.tdc2223@gmail.com</span>
    </div>

    <!-- Main Banner -->
    <div class="banner">
        {{-- <img src="{{ asset('logo/logo.png') }}" alt="Logo"> --}}
        <h1>CÔNG TY TNHH PC-MASTER SYSTEMS<br>NÂNG TẦM CÔNG NGHỆ</h1>
        <h4 style="color: #56931f; text-align: center; font-family: 'Allura', sans-serif; font-weight: 400; font-style: normal;"
            class="vc_custom_heading vc_custom_1692147398253">
            Chuyên Nghiệp - Uy Tín - Hiện Đại
        </h4>
    </div>

    <!-- Navigation Menu -->
    <div class="nav">
        <a href="/">TRANG CHỦ</a>
        <a href="{{ route('index-introduce') }}">GIỚI THIỆU</a>
        <a href="{{ route('index-product-user') }}">SẢN PHẨM</a>
        <div class="dropdown">
            <a href="">DỊCH VỤ</a>
            <div class="dropdown-content">
                <div class="dropdown">
                    <a class="text-nowrap" style="font-size: 3mm" href="{{ route('index-post-news') }}">Tin tức</a>
                    <a class="text-nowrap" style="font-size: 3mm" href="{{ route('index-post-news') }}">Hồ Sơ</a>
                    <div class="dropdown-content">

                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('index-post-ceremony') }}">THÔNG TIN</a>
        <a href="{{ route('index-recruitment') }}">TUYỂN DỤNG</a>
        <a href="#">LIÊN HỆ</a>


        <!-- Thêm Giỏ hàng -->
        <div class="cart-container">
            <a href="{{ route('index-cart') }}" class="cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="cart-count">0</span>
            </a>
            <div class="cart-dropdown">
                <ul>
                    <p class="text-danger">Sản Phẩm Mới Thêm:</p>
                    <hr>
                    {{-- @foreach ($products as $item)
                    <a href="#">
                        <li class="cart-item">
                            <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                            <div class="item-details">
                                <span class="item-name">{{ Str::limit($item->name, 15) }}</span>
                                <span class="item-price">{{ number_format($item->price) }}₫</span>
                            </div>
                        </li>
                    </a>
                    <hr>
                    @endforeach --}}
                </ul>
                <a href="{{ route('index-cart') }}" class="view-cart">Xem Giỏ Hàng</a>
            </div>
        </div>


        <!-- Danh Sách Yêu Thích -->
        <a href="#" class="heart-icon">
            <i class="fas fa-heart"></i>
            <span class="heart-count">0</span>
        </a>



        <!-- Thêm Chuông Thông Báo -->
        <a href="#" class="notification-icon">
            <i class="fas fa-bell"></i>
            <span class="notification-count">5</span>
        </a>
    </div>


    <!-- Container -->
    <div class="container">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <div class="phone-numbers">
        <span class="zalo"><a href="https://www.facebook.com/HackerPLK.OffCiryLife/">Zalo</a></span>
        <span class="zalo"><a href="https://www.facebook.com/HackerPLK.OffCiryLife/">FaceBook</a></span>
        <span class="phone">0777.855.202</span>
        <span class="phone">0777.533.302</span>
    </div>


    <footer class="footer mt-5">
        <div class="footer-container">
            <!-- Cột 1: Thông tin liên hệ -->
            <div class="footer-column">
                <h3>THÔNG TIN LIÊN HỆ</h3>
                <p><strong>CÔNG TY TNHH PC-MASTER SYSTEMS <br>NÂNG TẦM CÔNG NGHỆ</strong></p>
                <p><strong>Điện thoại:</strong> 0777.855.202 – 0777.533.302 – 0777.877.101</p>
                <p><strong>Email:</strong> phanlongkhanh.tdc2223@gmail</p>
                <p><strong>Địa chỉ:</strong> D19 Đường số 19, Khóm 4, Thị Trấn Càng Long, TP. Trà Vinh</p>
                <p><strong>Văn phòng:</strong> D10 Khóm 4 TT Càng Long, Huyện Càng Long, TP. Trà Vinh</p>
            </div>

            <!-- Cột 2: Dịch vụ của chúng tôi -->
            <div class="footer-column">
                <h3>DỊCH VỤ CỦA CHÚNG TÔI</h3>
                <ul>
                    <li>ĐÀO TẠO LẬP TRÌNH VIÊN</li>
                    <li>BÁN CÁC LINH KIỆN ĐIỆN TỬ</li>
                    <li>QUAN TRẮC MÔI TRƯỜNG CÔNG NGHỆ</li>
                    <li>ĐÀO TẠO NGHỀ SỮA CHỮA LINH KIỆN ĐIỆN TỬ</li>
                    <li>TƯ VẤN & ĐÀO TẠO HSE</li>
                    <li>HỒ SƠ CÔNG NGHỆ THÔNG TIN</li>
                    <li>ĐĂNG KÝ GIẤY PHÉP KINH DOANH</li>
                    <li>THU MUA LINH KIỆN ĐÃ QUA SỬ DỤNG</li>
                </ul>
            </div>

            <!-- Cột 3: Bản đồ -->
            <div class="footer-column">
                <h3>BẢN ĐỒ</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d280.4335453662649!2d106.20211622453647!3d9.994766617785718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1svi!2s!4v1735652339947!5m2!1svi!2s"
                    width="100%" height="250" style="border:0; border-radius: 8px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
        <!-- Dòng chữ cuối footer -->
        <div class="footer-bottom">
            <p>Thiết kế website bởi Phan Long Khánh</p>
        </div>
    </footer>

</body>

</html>
