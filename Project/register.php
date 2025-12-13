<?php
include 'db.php';

$message = "";
$username = '';
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $message = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
    } elseif (strlen($username) < 3 || strlen($username) > 50) {
        $message = 'Tên đăng nhập phải từ 3 đến 50 ký tự.';
    } elseif (strlen($password) < 6) {
        $message = 'Mật khẩu phải có ít nhất 6 ký tự.';
    } else {
        $checkSql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = $conn->prepare($checkSql)) {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($res && $res->num_rows > 0) {
                $message = 'Tên đăng nhập đã tồn tại!';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $insertSql = "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')";
                if ($ins = $conn->prepare($insertSql)) {
                    $ins->bind_param('ss', $username, $hash);
                    if ($ins->execute()) {
                        header('Location: login.php?registered=1');
                        exit();
                    } else {
                        $message = 'Lỗi khi tạo tài khoản: ' . htmlspecialchars($ins->error);
                    }
                    $ins->close();
                } else {
                    $message = 'Lỗi hệ thống. Vui lòng thử lại sau.';
                }
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
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-box { max-width:420px; margin:60px auto; background:#fff; padding:22px; border-radius:8px; box-shadow:0 6px 18px rgba(0,0,0,0.06); }
        .form-box label{display:block;margin-bottom:6px;font-weight:600}
        .form-box input[type="text"], .form-box input[type="password"]{width:100%;padding:10px;margin-bottom:12px;border:1px solid #ccc;border-radius:4px}
        .form-box input[type="submit"]{background:#27ae60;color:#fff;padding:10px 14px;border:none;border-radius:4px;cursor:pointer}
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Đăng Ký Tài Khoản</h2>
        <?php if ($message): ?>
            <p class="error"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Tên đăng nhập</label>
            <input id="username" type="text" name="username" required value="<?php echo htmlspecialchars($username); ?>">

            <label for="password">Mật khẩu</label>
            <input id="password" type="password" name="password" required>

            <input type="submit" value="Đăng Ký">
        </form>
        <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </div>
</body>
</html>