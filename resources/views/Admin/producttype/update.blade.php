@extends('Layout.admin')

@section('title', 'Cập Nhật Danh Mục Bài Viết')

@section('content')
    <div class="container">
        <h2 class="mt-4 text-center">Cập Nhật Loại Sản Phẩm</h2>

        <!-- Hiển thị thông báo thành công -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
       
        <form action="{{ route('update-producttypes', ['id' => $producttypes->id]) }}" method="POST">
            @csrf
            @method('PUT') 
            <div class="form-group">
                <label for="name">Tên Danh Mục</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $producttypes->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="description">Mô Tả</label>
                <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $producttypes->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3 text-center">
                <button type="submit" class="btn btn-success">Cập Nhật</button>
                <a href="{{ route('index-producttypes') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </form>
    </div>
@endsection
