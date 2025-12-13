<?php
 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

 
$search_query = '';
if (isset($_GET['search'])) {
    $search_query = trim($_GET['search']);
}
 
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tài khoản';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'DuyBooks - Cửa Hàng Sách Online'; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<header class="main-header">
    <div class="header-container">
        <a href="index.php" class="logo">DuyBooks</a>

        <form action="index.php" method="get" class="search-bar">
            <input type="text" name="search" placeholder="Tìm sách, tác giả..." value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <div class="header-icons">
            <a href="cart.php">
                <i class="fas fa-shopping-cart"></i>
                <span>Giỏ Hàng</span>
            </a>

            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="account-dropdown" id="accountDropdown">
                    <a href="javascript:void(0)" class="account-link" onclick="toggleDropdown(event)">
                        <i class="fas fa-user"></i>
                        <span><?php echo "Xin chào " . $username; ?></span>
                    </a>
                    <div class="dropdown">
                        <a href="logout.php">Đăng xuất</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.php">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Đăng nhập</span>
                </a>
                <a href="register.php">
                    <i class="fas fa-user-plus"></i>
                    <span>Đăng ký</span>
                </a>
            <?php endif; ?>

            <a href="#" class="flag-icon" title="Ngôn ngữ">
                <div style="width:24px;height:24px;background:#e74c3c;border-radius:3px;"></div>
            </a>
        </div>
    </div>
</header>

<main class="container">

<script>
     
    function toggleDropdown(event) {
         
        event.stopPropagation(); 
        
         
        const dropdownElement = document.getElementById('accountDropdown');
        
         
        document.querySelectorAll('.account-dropdown').forEach(function(el) {
            if (el !== dropdownElement) {
                el.classList.remove('active');
            }
        });

         
        dropdownElement.classList.toggle('active');
    }

    document.addEventListener('click', function(event) {
        const dropdowns = document.querySelectorAll('.account-dropdown');
        dropdowns.forEach(function(dropdown) {
             
            if (!dropdown.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });
    });
</script>