@extends('Layout.master')
@section('title')
@section('content')
    <title>Giới Thiệu</title>
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/introduce/index.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-introduce') }}">Giới Thiệu</a>
    </div>

    <header>
        <h1>CÔNG TY TNHH PC-MASTER SYSTEMS
            <br>
            NÂNG TẦM CÔNG NGHỆ</h1>
    </header>

    <div class="container">
        <div class="content">
            <div class="section">
                <h2>Giới thiệu về công ty</h2>
                <p><p class="text-danger">CÔNG TY TNHH PC-MASTER SYSTEMS NÂNG TẦM CÔNG NGHỆ</p>là một trong những đơn vị hàng đầu trong lĩnh
                    vực cung cấp linh kiện điện
                    tử tại Việt Nam. Chúng tôi chuyên cung cấp các sản phẩm linh kiện điện tử chất lượng cao, đáp ứng nhu
                    cầu của các khách hàng trong các ngành công nghiệp điện tử, tự động hóa, và nhiều lĩnh vực khác.</p>
            </div>

            <div class="section">
                <h2>Chúng tôi cung cấp các sản phẩm gì?</h2>
                <ul>
                    <li>Linh kiện điện tử cho các dự án điện tử công nghiệp</li>
                    <li>Động cơ và các bộ phận liên quan</li>
                    <li>Các thiết bị viễn thông và phụ kiện</li>
                    <li>Các giải pháp tùy chỉnh theo yêu cầu của khách hàng</li>
                </ul>
            </div>

            <div class="section">
                <h2>Sứ mệnh của chúng tôi</h2>
                <p>Chúng tôi cam kết cung cấp sản phẩm linh kiện điện tử chất lượng cao, đảm bảo sự tin cậy và hiệu quả cho
                    các đối tác và khách hàng. Mục tiêu của chúng tôi là trở thành đối tác chiến lược của các doanh nghiệp
                    trong và ngoài nước, đóng góp vào sự phát triển bền vững của ngành công nghiệp điện tử.</p>
            </div>

            <div class="section">
                <h2>Tầm nhìn</h2>
                <p>Trở thành công ty cung cấp linh kiện điện tử hàng đầu tại Việt Nam, mở rộng ra thị trường quốc tế, cung
                    cấp các sản phẩm và giải pháp tối ưu nhất cho khách hàng.</p>
            </div>

            <div class="section">
                <h2>Liên hệ với chúng tôi</h2>
                <p>Địa chỉ: Số 123, Đường ABC, Quận XYZ, TP.HCM</p>
                <p>Điện thoại: 0777855202</p>
                <p>Email: phanlongkhanh@linhkiendientu.com</p>
            </div>
        </div>
    </div>

@endsection
