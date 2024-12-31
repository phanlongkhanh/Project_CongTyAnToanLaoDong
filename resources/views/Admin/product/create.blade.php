@extends('Layout.admin')

@section('title', 'Tạo Sản Phẩm Mới')

@section('content')
    <h1 class="mb-4 text-center text-success">Tạo Sản Phẩm Mới</h1>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form tạo sản phẩm -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('store-product') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                            placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control form-control-lg" id="price" name="price"
                            placeholder="Nhập giá sản phẩm" value="{{ old('price') }}" required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Số Lượng</label>
                        <input type="number" class="form-control form-control-lg" id="amount" name="amount"
                            placeholder="Nhập số lượng sản phẩm" value="{{ old('amount') }}" min="0" required>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="discount">Giảm Giá (%)</label>
                        <input type="number" class="form-control form-control-lg" id="discount" name="discount"
                            placeholder="Nhập % giảm giá" min="0" max="100" value="{{ old('discount') }}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <div class="border p-2 rounded" style="height: 200px; overflow-y: auto;">
                            @foreach ($categories as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="id_category"
                                        value="{{ $item->id }}" id="category{{ $item->id }}"
                                        {{ in_array($item->id, old('id_category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="category{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="product-type">Loại Sản Phẩm</label>
                        <div class="border p-2 rounded" style="height: 200px; overflow-y: auto;">
                            @foreach ($producttypes as $item)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="id_producttype"
                                        value="{{ $item->id }}" id="producttype{{ $item->id }}"
                                        {{ in_array($item->id, old('id_producttype', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="producttype{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control form-control-lg" id="description" name="description" rows="4"
                    placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" class="form-control form-control-lg" id="image" name="image" required>
                @if ($errors->has('image'))
                    <small class="text-danger">Vui lòng tải lại hình ảnh.</small>
                @endif
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
