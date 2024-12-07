@extends('Layout.admin')

@section('title', 'Sản Phẩm')

@section('content') 
    <h1 class="mb-4">Danh sách Sản Phẩm</h1>

    <!-- Nút Thêm Mới -->
    <a href="{{route('create-product')}}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Thêm mới
    </a>

    <!-- Bảng Sản Phẩm -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Giá</th>
                <th scope="col">Danh mục</th>
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
