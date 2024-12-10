@extends('Layout.admin')

@section('title', 'Thêm Mới Danh Mục Bài Viết')

@section('content')
<div class="container">
    <h2 class="mt-4">Thêm Mới Danh Mục Bài Viết</h2>

    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{route('store-category-post')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên Danh Mục</label>
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

        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">Lưu Danh Mục</button>
            <a href="{{ route('index-category-post') }}" class="btn btn-secondary">Quay Lại</a>
        </div>
    </form>
</div>
@endsection
