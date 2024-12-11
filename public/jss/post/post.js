
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
