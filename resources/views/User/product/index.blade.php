@extends('Layout.master')
@section('title')
@section('content')
    <title>Sản Phẩm</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    @foreach ($producttypes as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="id_producttypes"
                                value="{{ $item->id }}" id="producttypes{{ $item->id }}"
                                {{ in_array($item->id, old('id_producttypes', [])) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="producttypes{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach

                    <h5 class="mt-3">Loại sản phẩm</h5>
                    @foreach ($categories as $item)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="id_category" value="{{ $item->id }}"
                                id="category{{ $item->id }}"
                                {{ in_array($item->id, old('id_category', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="category{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach

                    <h5 class="mt-3">Dung Lượng</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-33x40">
                        <label class="form-check-label" for="size-33x40">RAM:8GB / SSD:126GB</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-40x30">
                        <label class="form-check-label" for="size-40x30">RAM:16GB / SSD:256GB</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-40x30">
                        <label class="form-check-label" for="size-40x30">RAM:16GB / SSD:512GB</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="size-40x30">
                        <label class="form-check-label" for="size-40x30">RAM:32GB / SSD:256GB</label>
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="price-2">
                        <label class="form-check-label text-nowrap" for="price-2">Từ 3.000.000đ - 7.000.000đ</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="price-2">
                        <label class="form-check-label text-nowrap" for="price-2">Từ 10.000.000đ trở lên</label>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-md-9">
                <div class="row">
                    @foreach ($products as $item)
                        @if ($item->checkactive == 1)
                            <div class="col-md-4 mb-4">
                                <div class="product-card position-relative border rounded shadow-lg">
                                    <!-- Phần giảm giá -->
                                    @if ($item->discount > 0)
                                        <div class="discount-badge position-absolute top-0 end-0 bg-danger text-white p-2">
                                            -{{ $item->discount }}%
                                        </div>
                                    @endif
                                    <a href="{{ route('details-product-user', ['id' => Crypt::encrypt($item->id)]) }}')">
                                        <img src="{{ asset('images/' . $item->image) }}" alt="Product Image"
                                            class="img-fluid">
                                    </a>
                                    <a href="{{ route('details-product-user', ['id' => Crypt::encrypt($item->id)]) }}')">
                                        <h6 class="mt-3">{{ Str::limit($item->name, 40) }}</h6>
                                    </a>
                                    <p class="price">
                                        @if ($item->discount > 0)
                                            <span class="product-price">{{ number_format($item->price) }} VND</span>
                                            <br>
                                            <span
                                                class="discounted-price text-danger text-nowrap">{{ number_format($item->price - ($item->price * $item->discount) / 100) }}
                                                VND</span>
                                        @else
                                            <span class="product-price">{{ number_format($item->price) }} VND</span><br>
                                            <span class="price text-danger text-nowarp">{{ number_format($item->price) }}
                                                VND</span>
                                        @endif
                                    </p>
                                    <!-- Nút thêm vào giỏ hàng và yêu thích -->
                                    <div class="product-actions">
                                        <form action="{{ route('add-to-cart') }}" method="POST"
                                            id="add-to-cart-form-{{ $item->id }}">
                                            @csrf
                                            <input type="hidden" name="id_product" value="{{ $item->id }}">
                                            <input type="hidden" name="amount" value="1">
                                        </form>
                                        <button class="btn btn-primary add-to-cart" type="button"
                                            onclick="confirmAddToCart({{ $item->id }})">
                                            <i class="fas fa-cart-plus"></i>
                                        </button>
                                        <button class="btn btn-outline-danger add-to-favorites"
                                            onclick="confirmAddToFavorites()">
                                            <i class="fas fa-heart"></i>
                                        </button>
                                        <button class="btn btn-outline-primary details-products"
                                            onclick="confirmDetails('{{ route('details-product-user', ['id' => Crypt::encrypt($item->id)]) }}')">
                                            <i class="fas fa-star"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span>Không Có Sản Phẩm</span>
                        @endif
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>

                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Phân trang -->


@endsection

































<script>
    function addToCart(productId) {
        const form = document.getElementById('add-to-cart-form-' + productId);
        const formData = new FormData(form);

        fetch("{{ route('add-to-cart') }}", {
                method: "POST",
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Thành công!', data.success, 'success').then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Lỗi!', data.error, 'error');
                }
            })
            .catch(error => {
                Swal.fire('Lỗi!', 'Có lỗi xảy ra, vui lòng thử lại!', 'error');
            });
    }
</script>
