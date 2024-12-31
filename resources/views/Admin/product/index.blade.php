@extends('Layout.admin')

@section('title', 'Sản Phẩm')

@section('content')
    <h1 class="mb-4 text-center">Danh sách Sản Phẩm</h1>

    <!-- Nút Thêm Mới -->
    <a href="{{ route('create-product') }}" class="btn btn-success mb-3">
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
                <th scope="col">Thuộc Tính</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Lặp qua danh sách sản phẩm -->
            @foreach ($products as $item)
                <tr>
                    <th style="line-height: 150px" class="text-center text-nowrap" scope="row">{{ $item->id }}</th>
                    <td style="line-height: 150px" class="text-center text-nowrap">{{ Str::limit($item->name, 20) }}</td>
                    <td> <img src="{{ asset('images/' . $item->image) }}" class="img-fluid rounded" alt="Không Có Ảnh"
                            width="150px" height="150px"></td>
                    <td style="line-height: 150px" class="text-center text-nowrap"> {{ number_format($item->price) }} VND
                    </td>
                    <td style="line-height: 150px" class="text-center text-nowrap">
                        <span>{{ $item->category->name ?? 'Không Có' }} </span>
                        <span>-</span>
                        <span>{{ $item->productType->name ?? 'Không Có' }}</span>
                    </td>

                    <td class="text-center">
                        @if ($item->checkactive == 1)
                            <button class="btn btn-success btn-sm" style="margin-top: 62px"
                                onclick="confirmToggleActive({{ $item->id }}, 'hide')">Chặn</button>
                        @else
                            <button class="btn btn-danger btn-sm" style="margin-top: 62px"
                                onclick="confirmToggleActive({{ $item->id }}, 'show')">Mở Chặn</button>
                        @endif
                        <form id="active-form-{{ $item->id }}" action="{{ route('active-product', $item->id) }}"
                            method="GET" style="display: none;">
                            @csrf
                        </form>
                    </td>
                    <td style="line-height: 150px" class="text-center text-nowrap">
                        <button class="btn btn-warning btn-sm"
                            onclick="confirmEdit('{{ route('edit-product', ['id' => Crypt::encrypt($item->id)]) }}')">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <form id="delete-form-{{ $item->id }}"
                            action=" {{ route('destroy-product', ['id' => $item->id]) }}" method="POST"
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

<!-- SweetAlert2 CDN -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>


<script>
    // Xác nhận xóa
    function confirmDelete(id) {
        Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Bạn không thể hoàn tác hành động này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                Swal.fire({
                    title: 'Cập nhật thành công!',
                    text: 'Bài viết đã được xóa.',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    timer: 5000,
                    timerProgressBar: true,
                });
            }
        });
    }

    // Xác nhận sửa
    function confirmEdit(url) {
        Swal.fire({
            title: 'Bạn có muốn sửa?',
            text: "Hành động này sẽ đưa bạn đến trang sửa thông tin.",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sửa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    // Xác nhận chặn/mở chặn
    function confirmToggleActive(id, action) {
        const actionText = action === 'show' ? 'Mở Chặn' : 'Chặn';
        Swal.fire({
            title: `Bạn có chắc chắn muốn ${actionText}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('active-form-' + id).submit();
                Swal.fire({
                    title: 'Cập nhật thành công!',
                    text: 'Trạng thái bài viết đã được cập nhật.',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    timer: 15000,
                    timerProgressBar: true,
                });
            }
        });
    }
</script>
