
function openSidebar() {
    document.getElementById("mySidebar").style.width = "0px";
}

function closeSidebar() {
    document.getElementById("mySidebar").style.width = "250px";
}


document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function (event) {
            event.preventDefault(); // Ngăn link chuyển trang
            const dropdownContent = this.nextElementSibling; // Phần tử dropdown-content kế tiếp
            dropdownContent.classList.toggle('show'); // Thêm hoặc xóa lớp 'show'

            // Đóng các dropdown khác
            document.querySelectorAll('.dropdown-content').forEach(content => {
                if (content !== dropdownContent) {
                    content.classList.remove('show');
                }
            });
        });
    });

    // Đóng dropdown khi click ra ngoài
    window.addEventListener('click', function (e) {
        if (!e.target.matches('.dropdown-toggle')) {
            document.querySelectorAll('.dropdown-content').forEach(content => {
                content.classList.remove('show');
            });
        }
    });
});

// Xác nhận thêm vào giỏ hàng
function confirmAddToCart() {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn thêm vào giỏ hàng?',
        text: "Sản phẩm sẽ được thêm vào giỏ hàng của bạn.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Thêm',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Logic to add product to the cart
            console.log('Sản phẩm đã được thêm vào giỏ hàng');
            Swal.fire({
                title: 'Thêm vào giỏ hàng thành công!',
                text: 'Sản phẩm đã được thêm vào giỏ hàng.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                timerProgressBar: true,
            });
        }
    });
}

//Xác nhận vào trang chi tiết sản phẩm
function confirmDetails(url) {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn vào trang chi tiết sản phẩm ?',
        text: "Đã hiển thị trang chi tiết sản phẩm!.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác Nhận',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

// Xác nhận thêm vào yêu thích
function confirmAddToFavorites() {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn thêm vào yêu thích?',
        text: "Sản phẩm sẽ được thêm vào danh sách yêu thích của bạn.",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Thêm',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Logic to add product to the favorites
            console.log('Sản phẩm đã được thêm vào yêu thích');
            Swal.fire({
                title: 'Thêm vào yêu thích thành công!',
                text: 'Sản phẩm đã được thêm vào yêu thích.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                timer: 5000,
                timerProgressBar: true,
            });
        }
    });
}
