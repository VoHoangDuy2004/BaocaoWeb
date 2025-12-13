<?php 
include 'includes/check_admin.php'; 
include '../db.php'; 

$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$page_title = "Sửa Đơn Hàng #$order_id";
$message = '';
$order = null;
$details = [];

// === Xử lý Cập nhật Thông tin Người nhận (SỬA) ===
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_recipient'])) {
    $recipient_name = trim($_POST['recipient_name']);
    $phone = trim($_POST['phone']);
    $shipping_address = trim($_POST['shipping_address']);
    
    $sql = "UPDATE orders SET recipient_name = ?, phone = ?, shipping_address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $recipient_name, $phone, $shipping_address, $order_id);
    
    if ($stmt->execute()) {
        $message = "<p class='success'>Đã cập nhật thông tin người nhận thành công.</p>";
    } else {
        $message = "<p class='error'>Lỗi khi cập nhật thông tin người nhận.</p>";
    }
    $stmt->close();
}

// === Lấy dữ liệu Đơn hàng ===
$order_sql = "SELECT id, order_date, total_amount, recipient_name, phone, shipping_address, payment_method FROM orders WHERE id = ?";
$order_stmt = $conn->prepare($order_sql);
$order_stmt->bind_param("i", $order_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();

if ($order_result->num_rows > 0) {
    $order = $order_result->fetch_assoc();
} else {
    $message = "<p class='error'>Đơn hàng không tồn tại.</p>";
    $order = false;
}

// === Lấy Chi tiết Đơn hàng ===
if ($order) {
    $details_sql = "SELECT od.quantity, od.price_at_time, b.title 
                    FROM order_details od
                    JOIN books b ON od.book_id = b.id
                    WHERE od.order_id = ?";
    $details_stmt = $conn->prepare($details_sql);
    $details_stmt->bind_param("i", $order_id);
    $details_stmt->execute();
    $details_result = $details_stmt->get_result();
    $details = $details_result->fetch_all(MYSQLI_ASSOC);
}

include 'includes/header.php'; 
?>

<div class="main-container">
    
    <div class="main-content">
        <h2><?php echo $page_title; ?></h2>
        
        <a href="orders.php" class="btn btn-secondary" style="margin-bottom: 20px;">
            <i class="fas fa-arrow-left"></i> Quay lại Danh sách Đơn hàng
        </a>

        <?php echo $message; ?>

        <?php if ($order): ?>
            <div class="order-details-grid">
                <div class="info-box">
                    <h3>Thông tin Đơn hàng</h3>
                    <p><strong>Ngày đặt:</strong> <?php echo date('d/m/Y H:i', strtotime($order['order_date'])); ?></p>
                    <p><strong>Tổng tiền:</strong> <?php echo number_format($order['total_amount']); ?> đ</p>
                    <p><strong>Phương thức TT:</strong> <?php echo htmlspecialchars($order['payment_method']); ?></p>
                </div>

                <div class="info-box">
                    <h3>Sửa Địa chỉ nhận hàng (Sửa)</h3>
                    <form method="post" class="admin-form">
                        <div class="form-group">
                            <label for="recipient_name">Người nhận:</label>
                            <input type="text" id="recipient_name" name="recipient_name" value="<?php echo htmlspecialchars($order['recipient_name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">SĐT:</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($order['phone']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address">Địa chỉ chi tiết:</label>
                            <textarea id="shipping_address" name="shipping_address" rows="3" required><?php echo htmlspecialchars($order['shipping_address']); ?></textarea>
                        </div>
                        <button type="submit" name="update_recipient" class="btn btn-warning">Cập nhật</button>
                    </form>
                </div>
            </div>

            <h3 style="margin-top: 30px;">Sản phẩm đã mua</h3>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá (tại thời điểm mua)</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($details as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['title']); ?></td>
                        <td><?php echo number_format($item['price_at_time']); ?> đ</td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo number_format($item['price_at_time'] * $item['quantity']); ?> đ</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>