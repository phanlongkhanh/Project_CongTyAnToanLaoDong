@extends('Layout.master')
@section('title')
@section('content')
    <title>Sản Phẩm</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/breadcrumb/breadcrumb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product/product1.css') }}">

    <div class="breadcrumb">
        <a href="/">Trang chủ</a>
        <span>/</span>
        <a href="{{ route('index-product-user') }}">Sản Phẩm</a>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-md-3">
                <div class="filters">
                    <h5>Thương hiệu sản phẩm</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="converse">
                        <label class="form-check-label" for="converse">Sam Sung</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="converse">
                        <label class="form-check-label" for="converse">Apple</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="converse">
                        <label class="form-check-label" for="converse">Hwei</label>
                    </div>

                    <h5 class="mt-3">Loại sản phẩm</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="giay-co-cao">
                        <label class="form-check-label" for="giay-co-cao">52in</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="giay-co-thap">
                        <label class="form-check-label" for="giay-co-thap">42in</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="socks">
                        <label class="form-check-label" for="socks">33in</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="socks">
                        <label class="form-check-label" for="socks">29in</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="socks">
                        <label class="form-check-label" for="socks">27in</label>
                    </div>

                    <h5 class="mt-3">Kích thước</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-33x40">
                        <label class="form-check-label" for="size-33x40">33x40cm</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-40x30">
                        <label class="form-check-label" for="size-40x30">40x30cm</label>
                    </div>

                    <h5 class="mt-3">Màu sắc</h5>
                    <div>
                        <span class="badge bg-success">Green</span>
                        <span class="badge bg-danger">Red</span>
                        <span class="badge bg-dark">Black</span>
                        <span class="badge bg-primary">Blue</span>
                        <span class="badge bg-warning text-dark">Yellow</span>
                    </div>

                    <h5 class="mt-3">Giá sản phẩm</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="price-1">
                        <label class="form-check-label" for="price-1">Dưới 1.000.000đ</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="price-2">
                        <label class="form-check-label text-nowrap" for="price-2">Từ 1.000.000đ - 3.000.000đ</label>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <img src="{{asset('images/h1.jpg')}}" alt="Product Image">
                            <h6>TiVi 42in Taylor All Star</h6>
                            <p class="product-discount">1.900.000đ <span class="product-price">2.139.000đ</span></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <img src="{{asset('images/h2.jpg')}}" alt="Product Image">
                            <h6>Tivi 42in All Star Classic</h6>
                            <p class="product-discount">1.309.000đ <span class="product-price">1.500.000đ</span></p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            <img src="{{asset('images/h3.jpg')}}" alt="Product Image">
                            <h6>Tivi 52in All Star High Top</h6>
                            <p class="product-discount">4.399.000đ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
