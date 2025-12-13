<?php
include 'includes/check_admin.php';

$user_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $user_id > 0;
$page_title = $is_edit ? "Sửa Người Dùng (ID: $user_id)" : "Thêm Người Dùng Mới";
$message = '';

$user_data = [ 'username' => '', 'role' => 'user' ];

if ($is_edit) {
    $sql = "SELECT id, username, role FROM users WHERE id = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res && $res->num_rows > 0) {
        $user_data = $res->fetch_assoc();
    } else {
        $message = "<p class='error'>Người dùng không tồn tại.</p>";
        $is_edit = false;
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $role = ($_POST['role'] ?? 'user') === 'admin' ? 'admin' : 'user';
    $password = $_POST['password'] ?? '';

    if ($username === '') {
        $message = "<p class='error'>Vui lòng nhập tên đăng nhập.</p>";
    } else {
        if ($is_edit) {
            if ($password !== '') {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssi', $username, $hash, $role, $user_id);
            } else {
                $sql = "UPDATE users SET username = ?, role = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssi', $username, $role, $user_id);
            }

            if ($stmt->execute()) {
                header('Location: users.php?message=update_success');
                exit();
            } else {
                $message = "<p class='error'>Lỗi cập nhật: " . htmlspecialchars($conn->error) . "</p>";
            }
            $stmt->close();
        } else {
            if ($password === '') {
                $message = "<p class='error'>Vui lòng nhập mật khẩu cho tài khoản mới.</p>";
            } else {
                $check = $conn->prepare("SELECT id FROM users WHERE username = ? LIMIT 1");
                $check->bind_param('s', $username);
                $check->execute();
                $r = $check->get_result();
                if ($r && $r->num_rows > 0) {
                    $message = "<p class='error'>Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.</p>";
                    $check->close();
                } else {
                    $check->close();
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('sss', $username, $hash, $role);
                    if ($stmt->execute()) {
                        header('Location: users.php?message=insert_success');
                        exit();
                    } else {
                        $message = "<p class='error'>Lỗi khi thêm: " . htmlspecialchars($conn->error) . "</p>";
                    }
                    $stmt->close();
                }
            }
        }
    }

    $user_data = [ 'username' => $username, 'role' => $role ];
}
include 'includes/header.php';
?>

<div class="main-content">
    <h2><?php echo $page_title; ?></h2>
    <?php echo $message; ?>

    <form method="post" class="admin-form">
        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user_data['username']); ?>" required>
        </div>

        <div class="form-group">
            <label for="password"><?php echo $is_edit ? 'Mật khẩu (để trống nếu không đổi):' : 'Mật khẩu:'; ?></label>
            <input type="password" id="password" name="password" <?php echo $is_edit ? '' : 'required'; ?> >
        </div>

        <div class="form-group">
            <label for="role">Vai trò:</label>
            <select id="role" name="role">
                <option value="user" <?php echo ($user_data['role'] ?? '') === 'user' ? 'selected' : ''; ?>>Người dùng</option>
                <option value="admin" <?php echo ($user_data['role'] ?? '') === 'admin' ? 'selected' : ''; ?>>Quản trị</option>
            </select>
        </div>

        <button class="btn btn-primary" type="submit"><?php echo $is_edit ? 'Cập nhật Người dùng' : 'Thêm Người dùng'; ?></button>
        <a href="users.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
