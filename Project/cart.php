<?php
session_start();
include 'db.php'; 
$page_title = "Giỏ Hàng Của Bạn";

$cart = $_SESSION['cart'] ?? [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update_quantity'])) {
        $book_id = (int)$_POST['book_id'];
        $quantity = (int)$_POST['quantity'];
        
        if ($quantity > 0) {
            $_SESSION['cart'][$book_id]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$book_id]);
        }
        header("Location: cart.php");
        exit();
    }
    
    if (isset($_POST['remove'])) {
        $book_id = (int)$_POST['book_id'];
        unset($_SESSION['cart'][$book_id]);
        header("Location: cart.php");
        exit();
    }
}
$cart = $_SESSION['cart'] ?? [];
$cart_count = count($cart);
$total_amount = 0;
$page_title = "Giỏ Hàng Của Bạn";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['update_quantity'])) {
        $book_id = (int)$_POST['book_id'];
        $quantity = (int)$_POST['quantity'];
        
        if ($quantity > 0) {
            $_SESSION['cart'][$book_id]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$book_id]);
        }
        header("Location: cart.php");
        exit();
    }
    
    if (isset($_POST['remove'])) {
        $book_id = (int)$_POST['book_id'];
        unset($_SESSION['cart'][$book_id]);
        header("Location: cart.php");
        exit();
    }
}
include "main_header.php";
?>

<div class="cart-container">
    
    <div class="cart-items">
        <h2>Giỏ Hàng (<?php echo $cart_count; ?> sản phẩm)</h2>
        <div class="cart-header">
            <div class="cart-spacer"></div>
            <div class="cart-product-detail">Sản phẩm</div>
            <div class="item-quantity">Số lượng</div>
            <div class="item-price">Thành tiền</div>
            <div class="item-actions"></div>
        </div>

        <?php if ($cart_count > 0): ?>
            <?php foreach ($cart as $book_id => $item): 
                $subtotal = $item['price'] * $item['quantity'];
                $total_amount += $subtotal;
            ?>
            <div class="cart-item">
                <div style="width: 30px; margin-right: 20px;"><input type="checkbox" checked></div>
                
                <div class="cart-product-detail">
                    <img src="<?php echo htmlspecialchars($item['image'] ?? 'placeholder.jpg'); ?>" 
                         alt="<?php echo htmlspecialchars($item['title']); ?>">
                    <div class="item-info">
                        <div class="title"><?php echo htmlspecialchars($item['title']); ?></div>
                        <small><?php echo number_format($item['price']); ?> đ</small>
                    </div>
                </div>

                <form method="post" class="item-quantity quantity-form">
                    <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                    <input type="number" name="quantity" min="1" value="<?php echo $item['quantity']; ?>" class="quantity-input" onchange="this.form.submit()">
                    <input type="hidden" name="update_quantity" value="1">
                </form>
                
                <div class="item-price">
                    <?php echo number_format($subtotal); ?> đ
                </div>
                
                <div class="item-actions">
                    <form method="post">
                        <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                        <button type="submit" name="remove" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                            <i class="fas fa-trash-alt"></i> </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="cart-empty">
                <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
                <a href="index.php" class="checkout-btn">Mua sắm ngay</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="cart-summary">
        <h3>Tóm Tắt Đơn Hàng</h3>
        
        <div class="summary-row">
            <span>Thành tiền (<?php echo $cart_count; ?> sản phẩm)</span>
            <span><?php echo number_format($total_amount); ?> đ</span>
        </div>
        
        <div class="summary-total">
            <div class="summary-row">
                <span>Tổng Số Tiền (gồm VAT)</span>
                <span><?php echo number_format($total_amount); ?> đ</span>
            </div>
        </div>
        
        <form action="checkout_page.php" method="get" style="margin-top: 15px;">
            <button class="checkout-btn" type="submit" 
                    <?php echo $cart_count == 0 ? 'disabled' : ''; ?>>
                THANH TOÁN
            </button>
        </form>
    </div>

</div>

<?php include "main_footer.php"; ?>