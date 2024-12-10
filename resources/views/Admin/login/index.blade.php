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
        <source src="{{asset('video/video.mp4')}}" type="video/mp4">
    </video>

    <!-- Login Form -->
    <div class="login-container">
        <h2 class="text-center text-white mb-4">Login</h2>
        <form action="{{route('index-dashboard')}}">
            <div class="mb-3">
                <label for="email" class="form-label">Tài Khoản</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Đăng Nhập</button>
            </div>
            <div class="text-center text-white mt-3">
                <a href="#" class="text-white">Forgot Password?</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
