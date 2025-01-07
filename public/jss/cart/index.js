$(document).ready(function () {
    // Cập nhật tổng tiền khi thay đổi số lượng
    $('.quantity').on('input', function () {
        // Lấy số lượng (đảm bảo giá trị luôn là số dương)
        var quantity = parseInt($(this).val());
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1; // Mặc định là 1 nếu nhập sai
            $(this).val(quantity);
        }

        // Lấy giá sản phẩm (tính theo giá đã giảm)
        var price = parseInt($(this).closest('tr').find('td:nth-child(3)').text().replace(/[^\d]/g, ''));
        var discount = parseInt($(this).closest('tr').find('input[name^="items["][name$="][discount]"]').val()); // Lấy giá trị giảm giá

        // Tính toán giá sau giảm
        var discountedPrice = price - (price * discount / 100);

        // Tính toán tổng tiền cho sản phẩm
        var total = quantity * discountedPrice;
        $(this).closest('tr').find('.total-price').text(total.toLocaleString() + ' VNĐ');

        // Cập nhật lại giá trị trong input "amount"
        var rowIndex = $(this).closest('tr').index();
        $('input[name="items[' + rowIndex + '][amount]"]').val(quantity); // Cập nhật giá trị amount trong form

        // Cập nhật tổng số tiền
        updateTotalAmount();
    });

    // Cập nhật tổng số tiền
    function updateTotalAmount() {
        var totalAmount = 0;

        $('.total-price').each(function () {
            // Lấy giá trị và cộng dồn
            totalAmount += parseInt($(this).text().replace(/[^\d]/g, ''));
        });

        $('#total-amount').text(totalAmount.toLocaleString() + ' VNĐ');
    }
});

function confirmCheckout() {
    Swal.fire({
        title: 'Bạn có chắc chắn muốn thanh toán?',
        text: "Sau khi thanh toán, đơn hàng sẽ được xử lý.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Thanh Toán',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Gửi form khi người dùng xác nhận
            document.querySelector('form').submit();
        }
    });
}
