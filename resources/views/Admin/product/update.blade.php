@extends('Layout.admin')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content')
    <h1 class="mb-4 text-center text-warning">Chỉnh Sửa Sản Phẩm</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form chỉnh sửa sản phẩm -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('update-product', ['id' => $products->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                            placeholder="Nhập tên sản phẩm" value="{{ old('name', $products->name) }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control form-control-lg" id="price" name="price"
                            placeholder="Nhập giá sản phẩm" value="{{ old('price', $products->price) }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Số Lượng</label>
                        <input type="number" class="form-control form-control-lg" id="amount" name="amount"
                            placeholder="Nhập số lượng sản phẩm" value="{{ old('amount', $products->amount) }}"
                            min="0" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="discount">Giảm Giá (%)</label>
                        <input type="number" class="form-control form-control-lg" id="discount" name="discount"
                            placeholder="Nhập % giảm giá" min="0" max="100"
                            value="{{ old('discount', $products->discount) }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_category">Danh mục</label>
                        <select class="form-control form-control-lg" id="id_category" name="id_category" required>
                            <option value="">-- Chọn danh mục --</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_category', $products->id_category) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_producttype">Loại Sản Phẩm</label>
                        <select class="form-control form-control-lg" id="id_producttype" name="id_producttype" required>
                            <option value="">-- Chọn loại sản phẩm --</option>
                            @foreach ($producttypes as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('id_producttype', $products->id_producttype) == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control form-control-lg" id="description" name="description" rows="4"
                    placeholder="Nhập mô tả sản phẩm">{{ old('description', $products->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" class="form-control form-control-lg" id="image" name="image">
                @if ($products->image)
                    <p class="mt-2">Hình ảnh hiện tại: <img src="{{ asset('images/' . $products->image) }}"
                            alt="Hình ảnh sản phẩm" class="img-thumbnail" style="max-height: 150px;"></p>
                @endif
                <small class="text-muted">Nếu không tải ảnh, hệ thống sẽ sử dụng ảnh mặc định.</small>
            </div>

            <div class="form-group">
                <label for="list_image">Danh sách Hình Ảnh</label>
                <input type="file" class="form-control form-control-lg" id="list_image" name="list_image[]" multiple>
                <small class="text-muted">Chọn nhiều hình ảnh (Nếu không chọn, sẽ không có hình ảnh thêm).</small>
            </div>

         
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-warning btn-lg">Cập nhật sản phẩm</button>
                <a href="{{ route('index-product') }}" class="btn btn-secondary btn-lg ml-3">Hủy</a>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/product/product.css') }}" rel="stylesheet">
@endpush
