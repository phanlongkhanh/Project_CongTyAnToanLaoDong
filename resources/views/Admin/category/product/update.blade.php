@extends('Layout.admin')

@section('title', 'Cập Nhật Danh Mục Sản Phẩm')

@section('content')
    <div class="container">
        <h2 class="mt-4">Cập Nhật Danh Mục Sản Phẩm</h2>

        <!-- Hiển thị thông báo thành công -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('update-category-product', $category->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="description">Mô Tả</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Cập Nhật Danh Mục</button>
                <a href="{{ route('index-category-product') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection
