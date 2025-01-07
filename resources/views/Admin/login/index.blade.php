<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login/login.css">
</head>

<body>
    <!-- Video background -->
    <video class="bg-video" autoplay muted loop>
        <source src="{{ asset('video/video.mp4') }}" type="video/mp4">
    </video>

    <!-- Login Form -->
    <div class="login-container">
        <h2 class="text-center text-white mb-4">Login</h2>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      <span>  {{ $error }}</span>
                    @endforeach
            </div>
        @endif
        <form action="{{ route('store-login') }}" method="GET">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tài Khoản</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Đăng Nhập</button>
            </div>
          
            <div class="text-center text-white mt-3">
                <a href="#" class="text-primary m-3">Đăng Ký?</a>
                <a href="#" class="text-white">Forgot Password?</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
