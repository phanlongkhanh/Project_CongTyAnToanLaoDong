@extends('Layout.master')

@section('title')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="#">Giỏ Hàng</a>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Sản Phẩm</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Tổng Tiền</th>
                        <th scope="col">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><img src="https://via.placeholder.com/100" alt="product" class="img-fluid">
                        </td>
                        <td class="text-center">Áo Thun</td>
                        <td class="text-center">200.000 VNĐ</td>
                        <td>
                            <input width="10px" type="number" value="1" min="1"
                                class="form-control quantity">
                        </td>
                        <td class="total-price">200.000 VNĐ</td>
                        <td>
                            <button class="btn btn-danger remove-item">Xóa</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end">
            <div class="col-md-4">
                <h4>Tổng Tiền: <span id="total-amount">550.000 VNĐ</span></h4>
                <button class="btn btn-success btn-block">Thanh Toán</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cập nhật tổng tiền khi thay đổi số lượng
            $('.quantity').on('input', function() {
                // Lấy số lượng (đảm bảo giá trị luôn là số dương)
                var quantity = parseInt($(this).val());
                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1; // Mặc định là 1 nếu nhập sai
                    $(this).val(quantity);
                }

                // Lấy giá (xóa ký tự không cần thiết trước khi chuyển đổi)
                var price = parseInt($(this).closest('tr').find('td:nth-child(3)').text().replace(/[^\d]/g,
                    ''));

                // Tính toán tổng tiền
                var total = quantity * price;
                $(this).closest('tr').find('.total-price').text(total.toLocaleString() + ' VNĐ');

                // Cập nhật tổng số tiền
                updateTotalAmount();
            });

            // Cập nhật tổng số tiền
            function updateTotalAmount() {
                var totalAmount = 0;

                $('.total-price').each(function() {
                    // Lấy giá trị và cộng dồn
                    totalAmount += parseInt($(this).text().replace(/[^\d]/g, ''));
                });

                $('#total-amount').text(totalAmount.toLocaleString() + ' VNĐ');
            }

            // Xóa sản phẩm
            $('.remove-item').click(function() {
                $(this).closest('tr').remove();
                updateTotalAmount();
            });
        });
    </script>

@endsection
