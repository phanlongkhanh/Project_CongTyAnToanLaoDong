@extends('Layout.master')
@section('title')
@section('content')
<title>Tuyển Dụng</title>
<link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
<link rel="stylesheet" href="{{ asset('css/recruitment/index.css') }}">

<div class="breadcrumb">
    <a href="/">Trang chủ</a>
    <span>/</span>
    <a href="{{ route('index-recruitment') }}">Tuyển dụng</a>
</div>

<div class="container">
    <header>
        <h1>CÔNG TY TNHH CÔNG NGHỆ KỸ THUẬT THIẾT KẾ HỖ TRỢ WEB-SITE TUYỂN DỤNG</h1>
    </header>

    <section class="job-positions">
        <h2>Vị trí tuyển dụng:</h2>
        <ul>
            <li><strong>Nhân viên phát triển web (Web Developer)</strong></li>
            <li><strong>Nhân viên thiết kế giao diện web (UI/UX Designer)</strong></li>
            <li><strong>Nhân viên hỗ trợ kỹ thuật (Technical Support)</strong></li>
        </ul>
    </section>

    <section class="job-description">
        <h2>Mô tả công việc:</h2>
        <div class="job-item">
            <h3>Nhân viên phát triển web (Web Developer):</h3>
            <ul>
                <li>Lập trình, phát triển và duy trì các website, ứng dụng web cho khách hàng.</li>
                <li>Thực hiện các công việc liên quan đến front-end và back-end.</li>
                <li>Đảm bảo tính ổn định, bảo mật và hiệu suất của website.</li>
            </ul>
        </div>
        <div class="job-item">
            <h3>Nhân viên thiết kế giao diện web (UI/UX Designer):</h3>
            <ul>
                <li>Thiết kế giao diện website, ứng dụng với trải nghiệm người dùng tốt nhất.</li>
                <li>Phối hợp với các bộ phận phát triển để đảm bảo tính khả dụng và dễ sử dụng.</li>
                <li>Cập nhật xu hướng thiết kế mới và áp dụng vào các dự án.</li>
            </ul>
        </div>
        <div class="job-item">
            <h3>Nhân viên hỗ trợ kỹ thuật (Technical Support):</h3>
            <ul>
                <li>Cung cấp hỗ trợ kỹ thuật cho khách hàng trong quá trình sử dụng dịch vụ.</li>
                <li>Giải quyết các vấn đề kỹ thuật liên quan đến website và ứng dụng web.</li>
                <li>Hướng dẫn khách hàng về các tính năng và công cụ sử dụng trên website.</li>
            </ul>
        </div>
    </section>

    <section class="requirements">
        <h2>Yêu cầu:</h2>
        <div class="requirement-item">
            <h3>Nhân viên phát triển web (Web Developer):</h3>
            <ul>
                <li>Có kinh nghiệm lập trình với HTML, CSS, JavaScript, PHP, hoặc các ngôn ngữ lập trình web khác.</li>
                <li>Hiểu biết về các hệ quản trị cơ sở dữ liệu như MySQL, PostgreSQL.</li>
                <li>Kinh nghiệm với các framework PHP như Laravel, WordPress là một lợi thế.</li>
            </ul>
        </div>
        <div class="requirement-item">
            <h3>Nhân viên thiết kế giao diện web (UI/UX Designer):</h3>
            <ul>
                <li>Thành thạo các công cụ thiết kế như Adobe XD, Figma, Photoshop.</li>
                <li>Có khả năng sáng tạo, chú trọng đến chi tiết và trải nghiệm người dùng.</li>
                <li>Kinh nghiệm thiết kế website hoặc ứng dụng là một lợi thế.</li>
            </ul>
        </div>
        <div class="requirement-item">
            <h3>Nhân viên hỗ trợ kỹ thuật (Technical Support):</h3>
            <ul>
                <li>Kiến thức cơ bản về quản lý và bảo trì website.</li>
                <li>Kỹ năng giao tiếp tốt, kiên nhẫn và giải quyết vấn đề hiệu quả.</li>
                <li>Có kinh nghiệm làm việc trong môi trường kỹ thuật là một lợi thế.</li>
            </ul>
        </div>
    </section>

    <section class="benefits">
        <h2>Quyền lợi:</h2>
        <ul>
            <li>Môi trường làm việc năng động, sáng tạo và thân thiện.</li>
            <li>Cơ hội thăng tiến và phát triển nghề nghiệp.</li>
            <li>Chế độ đãi ngộ hấp dẫn, bao gồm lương thưởng và các phúc lợi khác.</li>
            <li>Được đào tạo, phát triển kỹ năng chuyên môn.</li>
        </ul>
    </section>

    <section class="application">
        <h2>Cách thức ứng tuyển:</h2>
        <p>Ứng viên quan tâm vui lòng gửi CV và portfolio (nếu có) về địa chỉ email: <strong>phanlongkhanh.tdc2223@gmail.com</strong></p>
        <p>Hoặc nộp hồ sơ trực tiếp tại: <strong>Khóm 4 Thị Trấn Càng Long , Huyện Càng Long, Thành Phố Trà Vinh</strong></p>
    </section>

    <footer>
        <p>CÔNG TY TNHH CÔNG NGHỆ KỸ THUẬT THIẾT KẾ HỖ TRỢ WEB-SITE rất mong được đón nhận các ứng viên nhiệt huyết, đam mê và sẵn sàng cống hiến cho sự phát triển của công ty!</p>
    </footer>
</div>



@endsection