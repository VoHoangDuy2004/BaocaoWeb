<?php 
include 'includes/check_admin.php'; 

$page_title = "Quản Lý Người Dùng";
include 'includes/header.php'; 

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_user'])) {
    $delete_id = (int)$_POST['delete_id'];
    
    if ($delete_id == $_SESSION['user_id']) {
        $message = "<p class='error'>Không thể tự xóa tài khoản quản trị đang hoạt động.</p>";
    } else {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("id", $delete_id);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Đã xóa người dùng có ID #$delete_id thành công.</p>";
        } else {
            $message = "<p class='error'>Lỗi khi xóa người dùng. Đảm bảo người dùng không có đơn hàng liên quan.</p>";
        }
        $stmt->close();
    }
}

$users_sql = "SELECT id, username, role FROM users ORDER BY id ASC";
$users_result = $conn->query($users_sql);
if ($users_result === false) {
    $message = "<p class='error'>Lỗi khi truy vấn danh sách người dùng: " . htmlspecialchars($conn->error) . "</p>";
}
?>

<div class="main-content">
        <h2>Quản Lý Người Dùng</h2>
        
        <?php echo $message; ?>

        <a href="user_form.php" class="btn btn-primary" style="margin-bottom: 20px;">
            <i class="fas fa-plus"></i> Thêm Người Dùng Mới
        </a>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Vai trò</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $users_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><span class="role-<?php echo strtolower($row['role']); ?>"><?php echo htmlspecialchars($row['role']); ?></span></td>
                    <td><?php echo date('d/m/Y', strtotime($row['created_at'] ?? date('Y-m-d'))); ?></td>
                    <td>
                        <a href="user_form.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <form method="post" style="display: inline-block;">
                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete_user" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xóa người dùng \'<?php echo htmlspecialchars($row['username']); ?>\'?');" 
                                <?php echo ($row['id'] == $_SESSION['user_id'] || $row['role'] == 'admin') ? 'disabled' : ''; ?>>
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

<?php include 'includes/footer.php'; ?>