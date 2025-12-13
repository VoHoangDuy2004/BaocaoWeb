<?php
// Đảm bảo check_admin.php được gọi ở đầu mỗi trang Admin
include 'check_admin.php'; 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Admin Dashboard'; ?> | DuyBooks</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style1.css">
</head>
<body>

<?php
// Cho phép bật chế độ full-width từ trang con bằng cách đặt $force_fullwidth = true trước khi include header
$containerClass = (isset($force_fullwidth) && $force_fullwidth) ? 'main-container fullwidth' : 'main-container';
echo "<div class=\"$containerClass\">\n";
if (!(isset($force_fullwidth) && $force_fullwidth)) {
    include 'sidebar.php'; // Thanh menu bên trái
}
?>