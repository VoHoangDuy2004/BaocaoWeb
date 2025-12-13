<?php 
$page_title = "Quản Lý Sản Phẩm";
include 'includes/header.php'; 

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $delete_id = (int)$_POST['delete_id'];
    
    try {
        $sql = "DELETE FROM books WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delete_id);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Đã xóa sản phẩm #$delete_id thành công.</p>";
        } else {
            $message = "<p class='error'>Lỗi khi xóa sản phẩm. (Kiểm tra ràng buộc khóa ngoại).</p>";
        }
        $stmt->close();
    } catch (Exception $e) {
        $message = "<p class='error'>Lỗi DB: Không thể xóa sản phẩm.</p>";
    }
}

$products_sql = "SELECT id, title, author, price, image, status FROM books ORDER BY id ASC";
$products_result = $conn->query($products_sql);
?>

<div class="main-content">
    <h2>Quản Lý Sản Phẩm</h2>
    
    <?php echo $message; ?>

    <a href="product_form.php" class="btn btn-primary" style="margin-bottom: 20px;">
        <i class="fas fa-plus"></i> Thêm Sản Phẩm Mới
    </a>

    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Tác giả</th>
                <th>Giá</th>
                <th>Trạng thái</th> <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $products_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="<?php echo htmlspecialchars($row['image']); ?>" style="width: 50px; height: 50px; object-fit: cover;"></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['author']); ?></td>
                <td><?php echo number_format($row['price']); ?> đ</td>
                <td>
                    <?php 
                        $status_label = ($row['status'] == 1 || $row['status'] == 'visible') ? 'Hiển thị' : 'Ẩn';
                        $status_class = ($row['status'] == 1 || $row['status'] == 'visible') ? 'status-visible' : 'status-hidden';
                        echo "<span class='status-tag $status_class'>$status_label</span>";
                    ?>
                </td>
                <td>
                    <a href="product_form.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                    <form method="post" style="display: inline-block;">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa sản phẩm \'<?php echo htmlspecialchars($row['title']); ?>\'?');">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>

<style> 
    .status-tag { padding: 3px 8px; border-radius: 4px; font-size: 0.9em; font-weight: bold; }
    .status-visible { background-color: #d4edda; color: #155724; }
    .status-hidden { background-color: #f8d7da; color: #721c24; }
</style>