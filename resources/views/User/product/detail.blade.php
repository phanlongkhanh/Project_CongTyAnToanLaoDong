@extends('Layout.master')

@section('title')

@section('content')
    <title>Chi Tiết Sản Phẩm</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/details/details.css') }}">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 border rounded shadow-lg">
                <div id="productImages" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/' . $products->image) }}" class="d-block w-100" alt="Product Image">
                        </div>
                        @foreach ($products->images as $image)
                            <div class="carousel-item">
                                <img src="{{ asset('images/' . $image->image_path) }}" class="d-block w-100"
                                    alt="Product Image">
                            </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productImages"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productImages"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    <div class="mt-3">
                        <div class="d-flex justify-content-center">
                            <button type="button" data-bs-target="#productImages" data-bs-slide-to="0"
                                class="active thumbnail-btn">
                                <img src="{{ asset('images/' . $products->image) }}" class="img-thumbnail"
                                    style="width: 80px;">
                            </button>
                            @foreach ($products->images as $key => $image)
                                <button type="button" data-bs-target="#productImages"
                                    data-bs-slide-to="{{ $key + 1 }}" class="thumbnail-btn">
                                    <img src="{{ asset('images/' . $image->image_path) }}" class="img-thumbnail"
                                        style="width: 80px;">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
                <h2 class="product-name">{{ $products->name }}</h2>
                <p class="product-category">Thương Hiệu: {{ $products->productType->name }}</p>

                @if ($products->discount > 0)
                    <p class="product-discount">Giảm Giá: -{{ $products->discount }}%</p>
                @else
                    <span></span>
                @endif
                <div class="product-price">
                    @if ($products->discount > 0)
                        <span
                            class="discounted-price">{{ number_format($products->price - ($products->price * $products->discount) / 100, 0, ',', '.') }}
                            VNĐ</span>
                        <span class="original-price"
                            style="text-decoration: line-through;">{{ number_format($products->price, 0, ',', '.') }}
                            VNĐ</span>
                    @else
                        <span class="discounted-price">{{ number_format($products->price, 0, ',', '.') }} VNĐ</span>
                    @endif
                </div>
                <hr>
                <div class="product-description">
                    <h5>Mô Tả Sản Phẩm</h5>
                    <p>{{ $products->description }}</p>
                </div>

                <div class="product-actions mt-4">
                    <button class="btn btn-primary" onclick="addToCart()">
                        <i class="fas fa-cart-plus"></i> Thêm Vào Giỏ
                    </button>
                    <button class="btn btn-outline-danger" onclick="addToFavorites()">
                        <i class="fas fa-heart"></i> Thêm Vào Yêu Thích
                    </button>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews mt-5">
            <h4>Đánh Giá Sản Phẩm</h4>
            <div class="review">
                <div class="review-user">
                    <strong>Nguyễn Văn A</strong> - <span>01/01/2024</span>
                </div>
                <div class="review-content">
                    <p>Rất hài lòng với sản phẩm này, cấu hình mạnh mẽ và màn hình đẹp!</p>
                </div>
            </div>
            <div class="review">
                <div class="review-user">
                    <strong>Trần Thị B</strong> - <span>02/01/2024</span>
                </div>
                <div class="review-content">
                    <p>Máy chạy mượt, thiết kế đẹp, đáng mua!</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addToCart() {
            Swal.fire('Đã thêm vào giỏ hàng!');
        }

        function addToFavorites() {
            Swal.fire('Đã thêm vào yêu thích!');
        }
    </script>
@endsection
