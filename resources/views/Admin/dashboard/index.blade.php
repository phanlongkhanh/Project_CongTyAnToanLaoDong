@extends('Layout.admin')
@section('title', 'Admin')
@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Biểu đồ số người đăng nhập</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <body>

        <canvas id="loginChart" width="400" height="200"></canvas>

        <script>
            var ctx = document.getElementById('loginChart').getContext('2d');
            var loginChart = new Chart(ctx, {
                type: 'line', // Loại biểu đồ
                data: {
                    labels: @json($dates), // Dữ liệu cho trục X (ngày)
                    datasets: [{
                        label: 'Số Người Xem Bài Viết',
                        data: @json($uniqueVisits), // Dữ liệu cho trục Y (số lượt đăng nhập)
                        borderColor: 'rgba(75, 192, 192, 1)',
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            type: 'category',
                            title: {
                                display: true,
                                text: 'Ngày'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Số người xem bài viết'
                            }
                        }
                    }
                }
            });
        </script>

    </body>

    </html>

@endsection
