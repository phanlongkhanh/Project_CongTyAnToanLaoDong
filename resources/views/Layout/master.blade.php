<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/master/master.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/p5.png') }}" type="image/x-icon">

</head>

<body>

    <div class="navbar-item">
        <div class="text"> Email: PhanLongKhanh@gmail.com</div>
    </div>

    
    <div class="navbar-box">
        <img src="{{asset('logo/logo.png')}}" height="200px" width="200px" style="margin-left: 50px" alt="">
         <nav class="nav">
            <h3>CÔNG TY TNHH HUẤN LUYỆN AN TOÀN VÀ KIỂM ĐỊNH SÀI GÒN</h3>
            <h4>Chuyên Nghiệp - Uy Tín - Hiện Đại</h4>
         </nav>
    </div>


    <!-- Navbar -->
    <div class="navbar">
        <div></div>
        <div>
            <a href="#">Home</a>
            <a href="#">Bài Viết</a>
            <a href="#">Liên Hệ</a>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <div>
            <span style="cursor: pointer;" onclick="openSidebar()">☰ Menu</span>
        </div>
    </div>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
        <a href="#">Danh Mục</a>
        <a href="#">Hình Ảnh</a>
        <a href="#">Bài Viết</a>
    </div>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('jss/master/master.js') }}"></script>
</body>

</html>
