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

    <div class="container mt-5 shadow-lg p-3">
        <h2 class="text-center">Giỏ Hàng Của Bạn</h2>
        <form action="{{ route('place-order') }}" method="POST">
            @csrf
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Sản Phẩm</th>
                            <th class="text-center" scope="col">Tên</th>
                            <th class="text-center" scope="col">Giá</th>
                            <th class="text-center" scope="col">Số Lượng</th>
                            <th class="text-center" scope="col">Tổng Tiền</th>
                            <th class="action text-center" scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $index => $item)
                            @isset($carts)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('images/' . $item->product->image) }}" alt="product" height="auto"
                                            width="50%" class="img-fluid">
                                    </td>
                                    <td class="productName text-center">{{ Str::limit($item->product->name, 15) }}</td>
                                    <td class="price text-center">
                                        {{ number_format($item->product->price - ($item->product->price * $item->product->discount) / 100) }}
                                        VNĐ
                                    </td>
                                    <td>
                                        <input type="number" name="items[{{ $index }}][amount]"
                                            value="{{ $item->amount }}" min="1" class="form-control quantity">
                                    </td>
                                    <td class="total-price">
                                        {{ number_format(($item->product->price - ($item->product->price * $item->product->discount) / 100) * $item->amount) }}
                                        VNĐ
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger remove-item" data-id="{{ $item->id }}">Xóa</button>
                                    </td>
                                    <!-- Hidden fields -->
                                    <input type="hidden" name="items[{{ $index }}][product_id]"
                                        value="{{ $item->product->id }}">
                                    <input type="hidden" name="items[{{ $index }}][price]"
                                        value="{{ $item->product->price }}">
                                    <input type="hidden" name="items[{{ $index }}][discount]"
                                        value="{{ $item->product->discount }}">
                                    <input type="hidden" name="items[{{ $index }}][id_cart]"
                                        value="{{ $item->id }}">
                                    <input type="hidden" name="items[{{ $index }}][id_user]"
                                        value="{{ Auth::id() }}">
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
                    <h4>Tổng Tiền: <span id="total-amount">{{ number_format($tongtien) }} VNĐ</span></h4>
                    <input type="hidden" name="total_amount" value="{{ $tongtien }}">
                    <button type="button" class="btn btn-success btn-block" onclick="confirmCheckout()">Đặt Hàng</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('jss/cart/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
