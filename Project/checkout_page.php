<?php
session_start();
include 'db.php'; 
$page_title = "Xác Nhận Thanh Toán";
include "main_header.php";

$cart = $_SESSION['cart'] ?? [];
$cart_count = count($cart);
$total_amount = 0;

if (empty($cart)) {
    $_SESSION['redirect_message'] = "<p class='error'>Giỏ hàng trống. Vui lòng quay lại chọn sản phẩm.</p>";
    header("Location: index.php");
    exit();
}

foreach ($cart as $item) {
    $total_amount += $item['price'] * $item['quantity'];
}

$default_address = "";
$default_phone = "";
?>

<div class="checkout-form-container">
    
    <div class="checkout-main-area">
        <form action="checkout.php" method="post">
            
            <div class="section-box">
                <h3>1. Địa Chỉ Nhận Hàng</h3>
                
                <div class="form-group">
                    <label for="name">Tên người nhận:</label>
                    <input type="text" id="name" name="recipient_name" value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($default_phone); ?>" required>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ chi tiết:</label>
                    <textarea id="address" name="shipping_address" required><?php echo htmlspecialchars($default_address); ?></textarea>
                </div>

            </div>
            
            <div class="section-box">
                <h3>2. Phương Thức Thanh Toán</h3>
                
                <div class="payment-option">
                    <input type="radio" id="cod" name="payment_method" value="COD" checked required>
                    <label for="cod">
                        <i class="fas fa-money-bill-wave"></i> 
                        Thanh toán bằng tiền mặt khi nhận hàng
                    </label>
                </div>
                
                </div>
            
            <div class="section-box">
                <h3>3. Sản Phẩm (<?php echo $cart_count; ?> cuốn)</h3>
                
                <?php foreach ($cart as $item): ?>
                    <div class="product-line">
                        <span><?php echo htmlspecialchars($item['title']); ?> (x<?php echo $item['quantity']; ?>)</span>
                        <span><?php echo number_format($item['price'] * $item['quantity']); ?> đ</span>
                    </div>
                <?php endforeach; ?>
                
                <div class="summary-total-final">
                    Tổng cộng: <?php echo number_format($total_amount); ?> đ
                </div>

            </div>

            <button type="submit" class="checkout-btn-final">
                HOÀN TẤT ĐẶT HÀNG
            </button>
        </form>
    </div>

    <div class="checkout-summary-area">
        <div class="section-box">
             <h3>Tổng Kết</h3>
             
                 <div class="summary-row-inline">
                     <span>Thành tiền:</span>
                     <span><?php echo number_format($total_amount); ?> đ</span>
                 </div>
             
                 <div class="summary-total-line">
                     <span>Tổng phải trả:</span>
                     <span class="amount"><?php echo number_format($total_amount); ?> đ</span>
                 </div>
        </div>
    </div>

</div>

<?php include " main_footer.php"; ?>