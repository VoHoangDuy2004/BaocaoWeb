<?php 
include 'includes/check_admin.php'; 
include '../db.php'; 

$page_title = "Quản Lý Đơn Hàng";
include 'includes/header.php'; 

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_order'])) {
    $delete_id = (int)$_POST['delete_id'];
    
    $conn->begin_transaction();
    try {
        $sql_details = "DELETE FROM order_details WHERE order_id = ?";
        $stmt_details = $conn->prepare($sql_details);
        $stmt_details->bind_param("i", $delete_id);
        $stmt_details->execute();
        $stmt_details->close();
        
        $sql_order = "DELETE FROM orders WHERE id = ?";
        $stmt_order = $conn->prepare($sql_order);
        $stmt_order->bind_param("i", $delete_id);
        $stmt_order->execute();
        $stmt_order->close();
        
        $conn->commit();
        $message = "<p class='success'>Đã xóa đơn hàng #$delete_id thành công.</p>";
    } catch (Exception $e) {
        $conn->rollback();
        $message = "<p class='error'>Lỗi khi xóa đơn hàng: " . $e->getMessage() . "</p>";
    }
}

$orders_sql = "SELECT 
                o.id, o.order_date, o.total_amount, 
                o.recipient_name, o.phone
               FROM orders o
               ORDER BY o.id ASC";
$orders_result = $conn->query($orders_sql);
?>

    <div class="main-content">
        <h2>Quản Lý Đơn Hàng</h2>
        
        <?php echo $message; ?>
        
        <table class="data-table">
            <thead>
                <tr>
                    <th>Mã ĐH</th>
                    <th>Người nhận</th>
                    <th>SĐT</th>
                    <th>Tổng tiền</th>
                    <th>Ngày đặt</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $orders_result->fetch_assoc()): ?>
                <tr>
                    <td>#<?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['recipient_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo number_format($row['total_amount']); ?> đ</td>
                    <td><?php echo date('d/m/Y', strtotime($row['order_date'])); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<?php include 'includes/footer.php'; ?>