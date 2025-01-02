@extends('Layout.master')

@section('title')

@section('content')
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart/index.css') }}">

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

                    @foreach ($carts as $item)
                        @isset($carts)
                            <tr>
                                <td class="text-center"><img src="{{ asset('images/' . $item->product->image) }}" alt="product"
                                        height="auto" width="40%" class="img-fluid">
                                </td>
                                <td class="productName text-center">{{ Str::limit($item->product->name, 15) }}</td>
                                <td class="price text-center">
                                    {{ number_format($item->product->price - ($item->product->price * $item->product->discount) / 100) }}
                                    VND</td>
                                <td>
                                    <input width="10px" type="number" value="1" min="1"
                                        class="form-control quantity">
                                </td>

                                <td class="total-price">
                                    {{ number_format(($item->product->price - ($item->product->price * $item->product->discount) / 100) * $item->amount) }}
                                    VND</td>
                                <td>
                                    <button class="btn btn-danger remove-item">Xóa</button>
                                </td>
                            </tr>
                        @endisset
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row justify-content-end">
            <div class="col-md-4">
                @php
                    $tongtien = 0;
                @endphp
                @foreach ($carts as $item)
                    @php
                        $gia1sp =
                            ($item->product->price - ($item->product->price * $item->product->discount) / 100) *
                            $item->amount;
                        $tongtien += $gia1sp;
                    @endphp
                @endforeach
                <h4>Tổng Tiền: <span id="total-amount">{{ number_format($tongtien) }} VND</span></h4>
                <button class="btn btn-success btn-block">Thanh Toán</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('jss/cart/index.js') }}"></script>




@endsection
