@extends('Layout.admin')
@section('title', 'Admin')

@section('content')


    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif

    @if ($errors->has('description'))
    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
    @endif
    <h1 class="mb-4">Bài Viết</h1>

    <!-- Nút Thêm Mới -->
    <a href="{{route('create-product')}}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Thêm mới
    </a>

    <!-- Bảng Sản Phẩm -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Bài Viết</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Danh Mục Bài Viết</th>
                <th scope="col">Content</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            {{-- <!-- Lặp qua danh sách sản phẩm -->
            @foreach ($products as $product) --}}
                <tr>
                    <th scope="row">1</th>
                    <td>Sản phẩm mẫu</td>
                    <td>Hình ảnh 1</td>
                    <td>100,000 VND</td>
                    <td>Danh mục 1</td>
                    <td>Active</td>
                    <td>
                        <a href="{{route('update-product')}}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="#" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    {{-- <!-- Phân trang nếu cần -->
    {{ $products->links() }} --}}


@endsection