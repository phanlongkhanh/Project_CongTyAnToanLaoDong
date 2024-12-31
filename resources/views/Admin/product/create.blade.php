@extends('Layout.admin')

@section('title', 'Tạo Sản Phẩm Mới')

@section('content')
    <h1 class="mb-4 text-center text-success">Tạo Sản Phẩm Mới</h1>

    <!-- Form tạo sản phẩm -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                            placeholder="Nhập tên sản phẩm" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control form-control-lg" id="price" name="price"
                            placeholder="Nhập giá sản phẩm" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="discount">Giảm Giá (%)</label>
                        <input type="number" class="form-control form-control-lg" id="discount" name="discount"
                            placeholder="Nhập % giảm giá" min="0" max="100">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <div class="border p-2 rounded" style="height: 200px; overflow-y: auto;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]" value="1" id="category1">
                                <label class="form-check-label" for="category1">Danh mục 1</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product-type">Loại Sản Phẩm</label>
                        <div class="border p-2 rounded" style="height: 200px; overflow-y: auto;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="product_type[]" value="1" id="type1">
                                <label class="form-check-label" for="type1">Loại 1</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control form-control-lg" id="description" name="description" rows="4"
                    placeholder="Nhập mô tả sản phẩm"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" class="form-control form-control-lg" id="image" name="image" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success btn-lg">Lưu sản phẩm</button>
                <a href="{{ route('index-product') }}" class="btn btn-secondary btn-lg ml-3">Hủy</a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/product/product.css') }}" rel="stylesheet">
@endpush
