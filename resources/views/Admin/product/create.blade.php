@extends('Layout.admin')

@section('title', 'Tạo Sản Phẩm Mới')

@section('content')
    <h1 class="mb-4 text-center text-success">Tạo Sản Phẩm Mới</h1>

    <!-- Form tạo sản phẩm -->
    <div class="card shadow-sm p-4">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Nhập tên sản phẩm" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control form-control-lg" id="price" name="price" placeholder="Nhập giá sản phẩm" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount">Giảm Giá (%)</label>
                        <input type="number" class="form-control form-control-lg" id="discount" name="discount" placeholder="Nhập % giảm giá" min="0" max="100">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select class="form-control form-control-lg" id="category" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            <option value="1">Danh mục 1</option>
                            <option value="2">Danh mục 2</option>
                            <option value="3">Danh mục 3</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control form-control-lg" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm"></textarea>
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
