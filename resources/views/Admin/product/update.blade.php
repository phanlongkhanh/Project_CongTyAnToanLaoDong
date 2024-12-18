@extends('Layout.admin')

@section('title', 'Cập Nhật Sản Phẩm')

@section('content')
    <h1 class="mb-4 text-center text-primary">Cập Nhật Sản Phẩm</h1>

    <!-- Form cập nhật sản phẩm -->
    <div class="card shadow-sm p-4">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" value="#" placeholder="Nhập tên sản phẩm" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" class="form-control form-control-lg" id="price" name="price" value="#" placeholder="Nhập giá sản phẩm" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="discount">Giảm Giá (%)</label>
                        <input type="number" class="form-control form-control-lg" id="discount" name="discount" value="#" placeholder="Nhập % giảm giá" min="0" max="100">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select class="form-control form-control-lg" id="category" name="category_id" required>
                            <option value="">Chọn danh mục</option>
                            {{-- @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control form-control-lg" id="description" name="description" rows="4" placeholder="Nhập mô tả sản phẩm">#</textarea>
            </div>

            <div class="form-group">
                <label for="image"></label>
                <input type="file" class="form-control form-control-lg" id="image" name="image">
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Cập Nhật Sản Phẩm</button>
                <a href="{{ route('index-product') }}" class="btn btn-secondary btn-lg ml-3">Hủy</a>
            </div>
        </form>
    </div>
@endsection
