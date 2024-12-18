@extends('Layout.admin')

@section('title', 'Danh Mục Bài Viết')

@section('content')
    <div class="container">
        <h2 class="mt-4">Quản Lý Danh Mục Bài Viết</h2>
        <br>

        <!-- Thêm danh mục -->
        <div class="mb-3">
            <a href="{{ route('create-category-post') }}" class="btn btn-danger">Thêm Danh Mục</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Bảng danh mục bài viết -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category_posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <!-- Sửa danh mục -->
                            <a href="#" class="btn btn-warning btn-sm"
                                onclick="confirmEdit('{{ route('edit-category-post', ['id' => Crypt::encrypt($item->id)]) }}')">Sửa</a>

                            <!-- Xóa danh mục -->
                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('destroy-category-post', ['id' => $item->id]) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $item->id }})">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="jss/post/post.js"></script>
