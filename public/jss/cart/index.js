$(document).ready(function() {
    // Cập nhật tổng tiền khi thay đổi số lượng
    $('.quantity').on('input', function() {
        // Lấy số lượng (đảm bảo giá trị luôn là số dương)
        var quantity = parseInt($(this).val());
        if (isNaN(quantity) || quantity < 1) {
            quantity = 1; // Mặc định là 1 nếu nhập sai
            $(this).val(quantity);
        }

        // Lấy giá (xóa ký tự không cần thiết trước khi chuyển đổi)
        var price = parseInt($(this).closest('tr').find('td:nth-child(3)').text().replace(/[^\d]/g,
            ''));

        // Tính toán tổng tiền
        var total = quantity * price;
        $(this).closest('tr').find('.total-price').text(total.toLocaleString() + ' VNĐ');

        // Cập nhật tổng số tiền
        updateTotalAmount();
    });

    // Cập nhật tổng số tiền
    function updateTotalAmount() {
        var totalAmount = 0;

        $('.total-price').each(function() {
            // Lấy giá trị và cộng dồn
            totalAmount += parseInt($(this).text().replace(/[^\d]/g, ''));
        });

        $('#total-amount').text(totalAmount.toLocaleString() + ' VNĐ');
    }

    // Xóa sản phẩm
    $('.remove-item').click(function() {
        $(this).closest('tr').remove();
        updateTotalAmount();
    });
});