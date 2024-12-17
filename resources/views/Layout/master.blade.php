<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/master/master.css') }}">
    <script src="{{ asset('jss/master/master.js') }}"></script>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <span>Email: Antoanvn.com.vn@gmail.com</span>
    </div>

    <!-- Main Banner -->
    <div class="banner">
        <img src="{{ asset('logo/logo.png') }}" alt="Logo">
        <h1>CÔNG TY TNHH HUẤN LUYỆN AN TOÀN<br>VÀ KIỂM ĐỊNH SÀI GÒN</h1>
        <p>Chuyên Nghiệp - Uy Tín - Hiện Đại</p>
    </div>

    <!-- Navigation Menu -->
    <div class="nav">
        <a href="/">TRANG CHỦ</a>
        <a href="#">GIỚI THIỆU</a>

        <div class="dropdown">
            <a href="#">DỊCH VỤ</a>
            <div class="dropdown-content">
                <div class="dropdown">
                    <a href="#">Huấn Luyện</a>
                    <div class="dropdown-content">
                        @foreach($category_posts as $item)
                        <a href="#">{{$item -> name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <a href="{{route('index-post-user')}}">TIN TỨC</a>
        <a href="#">VĂN BẢN PHÁP QUY</a>
        <a href="#">KHAI GIẢNG</a>
        <a href="#">TUYỂN DỤNG</a>
        <a href="#">LIÊN HỆ</a>
    </div>
    <!-- Container -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Phone Numbers at Bottom Right -->
    <div class="phone-numbers">
        <span class="zalo"><a href="https://www.facebook.com/HackerPLK.OffCiryLife/">Zalo</a></span>
        <span class="phone">09380.7777.1</span>
        <span class="phone">09382.7777.1</span>
    </div>


    <footer class="footer">
        <div class="footer-container">
            <!-- Cột 1: Thông tin liên hệ -->
            <div class="footer-column">
                <h3>THÔNG TIN LIÊN HỆ</h3>
                <p><strong>CÔNG TY TNHH HUẤN LUYỆN AN TOÀN VÀ KIỂM ĐỊNH SÀI GÒN</strong></p>
                <p><strong>Điện thoại:</strong> 09382.7777.1 – 0905.2116.89 – 09380.7777.1</p>
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509634!2d144.9537363153168!3d-37.81627917975151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5776b4c6ed1d4c6!2sMelbourne%20Central!5e0!3m2!1sen!2sau!4v1611812832134!5m2!1sen!2sau"
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
