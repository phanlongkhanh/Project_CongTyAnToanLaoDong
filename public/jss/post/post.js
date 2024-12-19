
document.getElementById('keywords').addEventListener('input', function (e) {
    var inputText = e.target.value;
    var container = document.getElementById('keywords-container');
    var keywords = inputText.split(',');

    container.innerHTML = '';

    keywords.forEach(function (keyword) {
        if (keyword.trim() !== '') {
            var keywordElement = document.createElement('div');
            keywordElement.classList.add('keyword');
            keywordElement.textContent = keyword.trim();
            container.appendChild(keywordElement);
        }
    });
});


function convertToSlug(text) {
    var accents = {
        'á': 'a', 'à': 'a', 'ả': 'a', 'ã': 'a', 'ạ': 'a', 'ă': 'a', 'ắ': 'a', 'ặ': 'a', 'ằ': 'a', 'ẳ': 'a', 'ẵ': 'a', 'â': 'a', 'ấ': 'a', 'ầ': 'a', 'ẩ': 'a', 'ẫ': 'a', 'ậ': 'a',
        'é': 'e', 'è': 'e', 'ẻ': 'e', 'ẽ': 'e', 'ẹ': 'e', 'ê': 'e', 'ế': 'e', 'ề': 'e', 'ể': 'e', 'ễ': 'e', 'ệ': 'e',
        'í': 'i', 'ì': 'i', 'ỉ': 'i', 'ĩ': 'i', 'ị': 'i',
        'ó': 'o', 'ò': 'o', 'ỏ': 'o', 'õ': 'o', 'ọ': 'o', 'ô': 'o', 'ố': 'o', 'ồ': 'o', 'ổ': 'o', 'ỗ': 'o', 'ộ': 'o', 'ơ': 'o', 'ớ': 'o', 'ờ': 'o', 'ở': 'o', 'ỡ': 'o', 'ợ': 'o',
        'ú': 'u', 'ù': 'u', 'ủ': 'u', 'ũ': 'u', 'ụ': 'u', 'ư': 'u', 'ứ': 'u', 'ừ': 'u', 'ử': 'u', 'ữ': 'u', 'ự': 'u',
        'ý': 'y', 'ỳ': 'y', 'ỷ': 'y', 'ỹ': 'y', 'ỵ': 'y',
        'đ': 'd', 'Đ': 'd'
    };

    // Chuyển toàn bộ tiêu đề thành chữ thường
    text = text.toLowerCase();

    // Thay thế các ký tự có dấu thành không dấu
    for (var key in accents) {
        text = text.replace(new RegExp(key, 'g'), accents[key]);
    }

    // Tiến hành tạo slug: Loại bỏ ký tự đặc biệt và thay khoảng trắng bằng dấu gạch ngang
    var slug = text.replace(/[^a-z0-9\s-]/g, '')  // Loại bỏ các ký tự đặc biệt
        .replace(/\s+/g, '-')          // Thay dấu cách thành dấu gạch ngang
        .replace(/-+/g, '-');          // Thay nhiều dấu gạch ngang liên tiếp thành 1 dấu
    return slug;
}

document.getElementById('title').addEventListener('input', function () {
    var title = this.value;
    var slug = convertToSlug(title);
    document.getElementById('slug').value = slug;
});


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
            }).then(() => {
                // Sau khi thông báo đóng, có thể thực hiện các hành động khác nếu cần
            });
        }
    });
}

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
            }).then(() => {        
                // Sau khi thông báo đóng, có thể thực hiện các hành động khác nếu cần
            });
        }
    });
}


function checkTitleLength() {
    const title = document.getElementById('title').value;
    const warning = document.getElementById('titleLengthWarning');
    if (title.length > 70) {
        warning.style.display = 'inline';
    } else {
        warning.style.display = 'none';
    }
}

function checkDescriptionLength() {
    const description = document.getElementById('description').value;
    const warning = document.getElementById('descriptionWarning');

    const wordArray = description.split(/\s+/).filter(word => word.length > 0);

    if (wordArray.length > 200) {
        warning.style.display = 'inline';
    } else {
        warning.style.display = 'none';
    }
}
