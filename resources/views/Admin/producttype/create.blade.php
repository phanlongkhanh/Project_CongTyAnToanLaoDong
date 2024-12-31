@extends('Layout.admin')

@section('title', 'Thêm Mới Danh Mục Bài Viết')

@section('content')
<div class="container">
    <h2 class="mt-4 text-center">Thêm Mới Loại Sản Phẩm</h2>

    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{route('store-producttypes')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên Loại Sản Phẩm</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="description">Mô Tả</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3 text-center">
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('index-producttypes') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
