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
