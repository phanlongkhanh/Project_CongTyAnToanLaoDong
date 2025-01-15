@extends('Layout.admin')
@section('title')
    <title>Đơn Hàng</title>
@endsection

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh Sách Đơn Hàng</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Người Mua Hàng</th>
                    <th class="text-center">Thông Tin Sản Phẩm</th>
                    <th class="text-center">Tổng Tiền</th>
                    <th class="text-center">Phê Duyệt</th>
                    <th class="text-center">Trạng Thái</th>
                    <th class="text-center">Chi Tiết Đơn Hàng</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($orders))
                    @foreach ($orders as $item)
                        <tr>
                            <td style="line-height:30px">
                                <ul>
                                    @if ($item->user->id_role == 1)
                                        <li>Họ Tên: <span class="text-danger">{{ $item->user->name }}</span></li>
                                        <li>Email: {{ $item->user->email }} </li>
                                        <li>Số Điện Thoại: {{ $item->user->phone }} </li>
                                    @else
                                        <li>Họ Tên: <span class="text-primary">{{ $item->user->name }}</span></li>
                                        <li>Email: {{ $item->user->email }} </li>
                                        <li>Số Điện Thoại: {{ $item->user->phone }} </li>
                                    @endif
                                </ul>
                            </td>

                            <td style="line-height:30px">
                                <ul>
                                    <li>Tên SP: {{ Str::limit($item->name, 10) }} </li>
                                    <li>Số Lượng: {{ $item->amount }} </li>
                                    <li>Giá Tiền: {{ number_format($item->price) }} VNĐ </li>
                                </ul>
                            </td>
                            <td style="line-height:100px" class="text-center">{{ number_format($item->total_price) }} VNĐ
                            </td>

                            <!-- Cải thiện hiển thị trạng thái Phê Duyệt -->
                            <td style="line-height:100px" class="text-center">
                                @if ($item->active == 1)
                                    <a href="#" class="badge badge-warning">Chờ Xác Nhận</a>
                                @else
                                    <a href="#" class="badge badge-success">Đã Xác Nhận</a>
                                @endif
                            </td>

                            <!-- Cải thiện hiển thị trạng thái Trạng Thái -->
                            <td style="line-height:100px" class="text-center">
                                @if ($item->status == 1)
                                    <a href="#" class="badge badge-danger">Chưa Bàn Giao</a>
                                @else
                                    <a href="#" class="badge badge-primary">Đã Bàn Giao</a>
                                @endif
                            </td>

                            <!-- Thêm nút Chi Tiết Đơn Hàng -->
                            <td style="line-height:100px" class="text-center">
                                <a href="#" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>






        <!-- Phân trang -->
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $orders->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <li class="page-item {{ $orders->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection
