
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
