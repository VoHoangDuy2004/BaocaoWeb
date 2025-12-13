<?php
session_start();
include 'db.php';

$message = "";
$username = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $message = 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.';
    } else {
        $sql = "SELECT id, password, role FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $hash = $row['password'];
                $ok = false;
                if (password_verify($password, $hash)) {
                    $ok = true;
                } elseif ($password === $hash) {
                    // Fallback for unhashed/legacy passwords. Consider migrating these.
                    $ok = true;
                }

                if ($ok) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['username'] = $username;

                    if ($row['role'] === 'admin') {
                        header("Location: admin.php");
                    } else {
                        header("Location: index.php");
                    }
                    exit();
                } else {
                    $message = 'Mật khẩu sai!';
                }
            } else {
                $message = 'Tài khoản không tồn tại!';
            }
            $stmt->close();
        } else {
            $message = 'Lỗi hệ thống. Vui lòng thử lại sau.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .login-container { max-width: 420px; margin: 60px auto; background: #fff; padding: 28px; border-radius: 8px; box-shadow: 0 6px 18px rgba(0,0,0,0.06); }
        .login-container h2 { margin-top: 0; }
        .login-container label { display:block; margin-bottom:6px; font-weight:600; }
        .login-container input[type="text"], .login-container input[type="password"] { width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:4px; box-sizing:border-box; }
        .login-container input[type="submit"] { background:#3498db; color:#fff; padding:10px 16px; border:none; border-radius:4px; cursor:pointer; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập Hệ Thống</h2>
        <?php if ($message): ?>
            <p class="error"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Tên đăng nhập</label>
            <input id="username" type="text" name="username" required value="<?php echo htmlspecialchars($username ?? ''); ?>">

            <label for="password">Mật khẩu</label>
            <input id="password" type="password" name="password" required>

            <input type="submit" value="Đăng Nhập">
        </form>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
    </div>
</body>
</html>