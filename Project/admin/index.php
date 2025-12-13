<?php 
// Tiêu đề trang
$page_title = "Tổng Quan";

// Header sẽ tự động include check_admin.php và sidebar.php
include 'includes/header.php'; 

// === Logic lấy thống kê (Tùy chọn) ===
$total_products = 0;
$total_orders = 0;
$total_users = 0;

try {
    $products_res = $conn->query("SELECT COUNT(id) FROM books");
    $total_products = $products_res->fetch_row()[0] ?? 0;
    
    $orders_res = $conn->query("SELECT COUNT(id) FROM orders");
    $total_orders = $orders_res->fetch_row()[0] ?? 0;

    $users_res = $conn->query("SELECT COUNT(id) FROM users");
    $total_users = $users_res->fetch_row()[0] ?? 0;
} catch (Exception $e) {
    // Bỏ qua lỗi nếu bảng chưa tồn tại
}
// ======================================
?>

<div class="main-content">
    <h2>Chào mừng, <?php echo htmlspecialchars($admin_username); ?>!</h2>
    
    <p>Đây là trang tổng quan quản trị. Bạn có thể theo dõi nhanh các hoạt động dưới đây.</p>

    <div class="stats-grid" style="display: flex; gap: 20px; margin-top: 30px;">
        
        <div class="stat-card" style="flex: 1; padding: 20px; background: #ecf0f1; border-radius: 6px; text-align: center;">
            <i class="fas fa-box fa-3x" style="color: #3498db;"></i>
            <h3>Tổng Sản phẩm</h3>
            <p style="font-size: 2em; font-weight: bold;"><?php echo $total_products; ?></p>
            <a href="products.php" style="color: #3498db;">Quản lý Sản phẩm</a>
        </div>

        <div class="stat-card" style="flex: 1; padding: 20px; background: #ecf0f1; border-radius: 6px; text-align: center;">
            <i class="fas fa-shopping-basket fa-3x" style="color: #27ae60;"></i>
            <h3>Tổng Đơn hàng</h3>
            <p style="font-size: 2em; font-weight: bold;"><?php echo $total_orders; ?></p>
            <a href="orders.php" style="color: #27ae60;">Quản lý Đơn hàng</a>
        </div>

        <div class="stat-card" style="flex: 1; padding: 20px; background: #ecf0f1; border-radius: 6px; text-align: center;">
            <i class="fas fa-users fa-3x" style="color: #e74c3c;"></i>
            <h3>Tổng Người dùng</h3>
            <p style="font-size: 2em; font-weight: bold;"><?php echo $total_users; ?></p>
            <a href="users.php" style="color: #e74c3c;">Quản lý Người dùng</a>
        </div>
        
    </div>
    
    </div>

<?php 
// Footer được include ở cuối file
include 'includes/footer.php'; 
?>