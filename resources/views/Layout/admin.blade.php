<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    <!-- Liên kết Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Liên kết Font Awesome cho icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
    <link rel="shortcut icon" href="{{ asset('homepage-images/p5.png') }}" type="image/x-icon">
</head>

<body>

    <!-- Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-dark text-white" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <div class="bg-danger text-center"><h4>Quản Trị</h4></div>
            </div>
            <div class="list-group list-group-flush">
                <!-- Dashboard -->
                <a href="{{route('index-dashboard')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <!-- Danh mục sản phẩm -->
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-list"></i> Danh Mục Sản Phẩm
                </a>
                <!-- Quản lý Sản phẩm -->
                <a href="{{ route('index-product') }}"
                    class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-cogs"></i> Quản Lý Sản Phẩm
                </a>
                <!-- Đơn hàng -->
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-box"></i> Đơn hàng
                </a>

                <!-- Danh mục bài viết -->
                <a href="{{route('index-category-post')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-th-list"></i> Danh mục bài viết
                </a>
                <!-- Bài viết -->
                <a href="{{route('index-post')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-newspaper"></i> Bài viết
                </a>
                <!-- Người dùng -->
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-users"></i> Người dùng
                </a>
                <!-- Cài đặt -->
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-cogs"></i> Cài đặt
                </a>

            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="btn btn-primary" id="menu-toggle">
                    <i class="fas fa-bars"></i> Menu
                </button>

                <!-- Tài khoản và Logout -->
                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <!-- Tài khoản người dùng -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user"></i> Tài khoản
                            </a>
                        </li>
                        <!-- Logout -->
                        <li class="nav-item">
                            <a class="nav-link" href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </a>

                            <!-- Form logout -->
                            <form id="logout-form" action="" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>


        <!-- Liên kết Bootstrap JS và jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

</body>

</html>
