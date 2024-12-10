@extends('Layout.admin')
@section('title', 'POST')

@section('content')

    <h1 class="mb-4">
        Bài Viết</h1>
    <a href="{{ route('create-post') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Thêm mới
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center text-nowrap">STT</th>
                <th scope="col" class="text-left text-nowrap">Tên Bài Viết</th>
                <th scope="col" class="text-center text-nowrap">Hình Ảnh</th>
                <th scope="col" class="text-left text-nowrap">Danh Mục Bài Viết</th>
                <th scope="col" class="text-left text-nowrap">Từ Khóa SEO</th>
                <th scope="col" class="text-center text-nowrap">Trạng Thái</th>
                <th scope="col" class="text-center text-nowrap">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <th style="line-height: 150px" scope="row" class="text-center text-nowrap">{{ $item->id }}</th>
                    <td style="line-height: 150px" class="text-left text-nowrap">{{ \Illuminate\Support\Str::limit($item->title, 30, '...') }}</td>
                    <td class="text-center"><img src="images/<?= $item->image ?>" alt="" width="200px"
                            height="150px"></td>
                    <td style="line-height: 150px" class="text-left">
                        @if ($item->categoryPost)
                            {{ $item->categoryPost->name }}
                        @else
                            Chưa có danh mục
                        @endif
                    </td>
                    <td style="line-height: 150px" class="text-left text-nowrap">{{ \Illuminate\Support\Str::limit($item->keywords, 20, '...') }}</td>
                    <td style="line-height: 150px" class="text-center text-nowrap">Active</td>
                    <td style="line-height: 150px" class="text-center text-nowrap">
                        <a href="#" class="btn btn-warning btn-sm">
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
            @endforeach
        </tbody>
    </table>

    {{-- <!-- Phân trang nếu cần -->
    {{ $products->links() }} --}}

@endsection
