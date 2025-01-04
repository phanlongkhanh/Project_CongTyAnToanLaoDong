@extends('Layout.master')
@section('title')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">

    <title>Thông Tin Cá Nhân</title>


    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-product-user') }}">Hồ Sơ Cá Nhân</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Section -->
    <div class="container my-4">
        <h2 class="mb-4 text-center text-danger">Hồ Sơ Cá Nhân</h2>
        <div class="row">
            @if ($users)
                <div class="col-md-4 text-center border shadow-lg p-3">
                    <img src="{{ asset('user-image/' . $users->image) }}" alt="Bạn Chưa Có Ảnh Đại Diện"
                        class="img-fluid rounded-circle mb-3" style="width: 200px; border: 3px solid #ff6f61;">
                    <h4 class="text-danger">{{ $users->name }}</h4>
                    <p>Email: {{ $users->email }}</p>
                </div>
            @endif

            <div class="col-md-8 border p-3">
                @if ($users)
                    <form action="{{ route('update-profile', ['id' => $users->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ Tên</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $users->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $users->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $users->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $users->address }}">
                        </div>
                        <button type="submit" class="btn btn-danger w-100">Cập Nhật</button>
                @endif
                </form>
            </div>

            <div class="col-md-4 border shadow-lg mt-2 p-3">
                <!-- Form tải ảnh đại diện -->
                <h3 class="mt-5">Tải Ảnh Đại Diện</h3>
                <form action="{{ route('update-image', ['id' => $users->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Tải ảnh đại diện</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Tải lên</button>
                </form>
            </div>

            <div class="col-md-8 border mt-2 p-3">
                <!-- Form đổi mật khẩu -->
                <h3 class="mt-5">Đổi Mật Khẩu</h3>
                <form action="{{ route('update-password', ['id' => $users->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Thay đổi mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
@endsection


<!-- Optional JavaScript -->
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
