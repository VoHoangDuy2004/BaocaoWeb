<?php
session_start();
include 'db.php'; 

$page_title = "Danh Sách Sách";

// Lấy danh sách sách
$books_sql = "SELECT * FROM books ORDER BY id DESC";
$books_result = $conn->query($books_sql);

include "main_header.php";

// Hiển thị thông báo (nếu có)
$message = "";
if (isset($_SESSION['redirect_message'])) {
    $message = $_SESSION['redirect_message'];
    unset($_SESSION['redirect_message']); 
}
?>
<h2 style="margin: 30px 0 10px; font-size: 28px; color: #333;">Tất Cả Sách</h2>

<?php echo $message; ?>

<?php if ($books_result->num_rows > 0): ?>
    <div class="books-grid">
        <?php while ($row = $books_result->fetch_assoc()): ?>
            <?php
            // Accept multiple possible representations of "visible/active" status
            $statusVal = isset($row['status']) ? (string)$row['status'] : '';
            $is_active = in_array($statusVal, ['1', '1', 'visible', 'active', 'true'], true) || $statusVal === '1';
            ?>
            
            <div class="book-card">
                
                <?php if ($is_active): ?>
                    <a href="add_to_cart.php?book_id=<?php echo $row['id']; ?>" class="purchase-link" 
                       title="Nhấp để thêm vào giỏ hàng và thanh toán ngay">
                <?php endif; ?>
                
                    <img src="<?php echo htmlspecialchars($row['image'] ?? 'placeholder.jpg'); ?>"
                         alt="<?php echo htmlspecialchars($row['title']); ?>">

                    <div class="book-title">
                        <?php echo htmlspecialchars($row['title']); ?>
                    </div>

                    <div class="book-price">
                        <?php echo number_format($row['price']); ?>đ
                    </div>
                    
                    <div class="book-author">
                        Tác giả: <?php echo htmlspecialchars($row['author']); ?>
                    </div>

                <?php if ($is_active): ?>
                    </a>
                <?php endif; ?>

                <div class="status-info">
                    <?php if (!$is_active): ?>
                        <small style="color: #95a5a6; font-weight: bold;">Tạm ngưng bán</small>
                    <?php else: ?>
                        <small style="color: #27ae60; font-weight: bold;">(Nhấp để mua ngay)</small>
                    <?php endif; ?>
                </div>
                
                </div>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <p style="text-align: center; font-size: 20px; color: #7f8c8d; margin: 80px 0;">
        Hiện tại chưa có sách nào trong cửa hàng.
    </p>
<?php endif; ?>

<?php include "main_footer.php"; ?>