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
        <h1>CÔNG TY TNHH CÔNG NGHỆ KỸ THUẬT<br>THIẾT KẾ HỖ TRỢ WEB-SITE</h1>
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
        <a href="{{ route('index-post-ceremony') }}">KHAI GIẢNG</a>
        <a href="{{ route('index-recruitment') }}">TUYỂN DỤNG</a>
        <a href="#">LIÊN HỆ</a>

        <!-- Thêm Giỏ hàng -->
        <a href="#" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">3</span>
        </a>

        <!-- Thêm Chuông Thông Báo -->
        <a href="#" class="notification-icon">
            <i class="fas fa-bell"></i>
            <span class="notification-count">5</span>
        </a>
    </div>


    <!-- Container -->
    <div class="container">
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
                <p><strong>CÔNG TY TNHH CÔNG NGHỆ KỸ THUẬT
                        THIẾT KẾ <br>  HỖ TRỢ WEB-SITE</strong></p>
                <p><strong>Điện thoại:</strong> 0777.855.202 – 0777.533.302 – 09380.7777.1</p>
                <p><strong>Email:</strong> Antoanvn.com.vn@gmail.com</p>
                <p><strong>Địa chỉ:</strong> 6D Đường số 19, KP3, P.Linh Chiểu, TP. Thủ Đức</p>
                <p><strong>Văn phòng:</strong> 417 Trần Hưng Đạo, Phan Thiết, Bình Thuận</p>
            </div>

            <!-- Cột 2: Dịch vụ của chúng tôi -->
            <div class="footer-column">
                <h3>DỊCH VỤ CỦA CHÚNG TÔI</h3>
                <ul>
                    <li>HUẤN LUYỆN AN TOÀN</li>
                    <li>KIỂM ĐỊNH AN TOÀN</li>
                    <li>QUAN TRẮC MÔI TRƯỜNG LAO ĐỘNG</li>
                    <li>ĐÀO TẠO NGHỀ</li>
                    <li>TƯ VẤN & ĐÀO TẠO HSE</li>
                    <li>HỒ SƠ MÔI TRƯỜNG</li>
                </ul>
            </div>

            <!-- Cột 3: Bản đồ -->
            <div class="footer-column">
                <h3>BẢN ĐỒ</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7836.484197362878!2d106.762306!3d10.869182!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175275fc861239d%3A0x7aae604e45ecdc27!2zQ8OUTkcgVFkgSFXhuqROIExVWeG7hk4gQU4gVE_DgE4gVsOAIEtJ4buCTSDEkOG7ik5IIFPDgEkgR8OSTg!5e0!3m2!1svi!2sus!4v1692148573839!5m2!1svi!2sus"
                    width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <!-- Dòng chữ cuối footer -->
        <div class="footer-bottom">
            <p>Thiết kế website bởi Phan Long Khánh</p>
        </div>
    </footer>

</body>

</html>
