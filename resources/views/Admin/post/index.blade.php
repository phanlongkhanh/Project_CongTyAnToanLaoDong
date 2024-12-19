@extends('Layout.admin')
@section('title', 'POST')
@section('content')

    <h1 class="mb-4">Bài Viết</h1>

    <a href="{{ route('create-post') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Thêm mới
    </a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center text-nowrap">STT</th>
                <th scope="col" class="text-left text-nowrap">Tên Bài Viết</th>
                <th scope="col" class="text-center text-nowrap">Hình Ảnh</th>
                <th scope="col" class="text-left text-nowrap">Danh Mục Bài Viết</th>
                <th scope="col" class="text-center text-nowrap">Trạng Thái</th>
                <th scope="col" class="text-center text-nowrap">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <th style="line-height: 150px" scope="row" class="text-center text-nowrap">{{ $item->id }}
                    </th>
                    <td style="line-height: 150px" class="text-left text-nowrap">
                        {{ \Illuminate\Support\Str::limit($item->title, 30, '...') }}</td>
                    <td class="text-center"><img src="images/<?= $item->image ?>" alt="" width="200px"
                            height="150px"></td>
                    <td style="line-height: 150px" class="text-left text-center">
                        @if ($item->categoryPost)
                            {{ $item->categoryPost->name }}
                        @else
                            Chưa có danh mục
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($item->checkactive == 1)
                            <button class="btn btn-success btn-sm" style="margin-top: 62px"
                                onclick="confirmToggleActive({{ $item->id }}, 'hide')">Chặn</button>
                        @else
                            <button class="btn btn-danger btn-sm" style="margin-top: 62px"
                                onclick="confirmToggleActive({{ $item->id }}, 'show')">Mở Chặn</button>
                        @endif
                        <form id="active-form-{{ $item->id }}" action="{{ route('active-post', $item->id) }}"
                            method="GET" style="display: none;">
                            @csrf
                        </form>
                    </td>
                    <td style="line-height: 150px" class="text-center text-nowrap">
                        <button class="btn btn-warning btn-sm"
                            onclick="confirmEdit('{{ route('edit-post', ['id' => Crypt::encrypt($item->id)]) }}')">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <form id="delete-form-{{ $item->id }}"
                            action="{{ route('destroy-post', ['id' => $item->id]) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm"
                                onclick="confirmDelete({{ $item->id }})">
                                <i class="fas fa-trash-alt"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <!-- Phân trang nếu cần -->
    {{ $products->links() }} --}}
  
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="jss/post/post.js"></script>