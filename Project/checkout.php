<?php
session_start();
include 'db.php'; 

// === NHẬN DỮ LIỆU TỪ FORM (Mới) ===
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cart.php"); // Ngăn truy cập trực tiếp
    exit();
}

$recipient_name = trim($_POST['recipient_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$shipping_address = trim($_POST['shipping_address'] ?? '');
$payment_method = trim($_POST['payment_method'] ?? 'COD'); // Mặc định là COD

if (empty($recipient_name) || empty($phone) || empty($shipping_address)) {
    $_SESSION['redirect_message'] = "<p class='error'>Vui lòng nhập đầy đủ thông tin nhận hàng.</p>";
    header("Location: checkout_page.php");
    exit();
}
// ======================================


// 1. Kiểm tra Đăng nhập và Giỏ hàng (như trước)
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_message'] = "<p class='error'>Vui lòng đăng nhập để hoàn tất đơn hàng!</p>";
    header("Location: login.php");
    exit();
}

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    $_SESSION['redirect_message'] = "<p class='error'>Giỏ hàng của bạn đang trống.</p>";
    header("Location: cart.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$total_amount = 0;

foreach ($cart as $item) {
    $total_amount += $item['price'] * $item['quantity'];
}


// BẮT ĐẦU GIAO DỊCH
$conn->begin_transaction();
$success = false;

try {
    // 2. Thêm vào bảng ORDERS (ĐÃ THÊM CÁC TRƯỜNG MỚI)
    $order_sql = "INSERT INTO orders (user_id, total_amount, status, recipient_name, phone, shipping_address, payment_method) 
                  VALUES (?, ?, 'Pending', ?, ?, ?, ?)";
    
    $order_stmt = $conn->prepare($order_sql);
    
    // Lưu ý: "idssdss" tương ứng với: INT, DECIMAL, STRING, STRING, STRING, STRING
    $order_stmt->bind_param("idssss", 
        $user_id, 
        $total_amount, 
        $recipient_name, 
        $phone, 
        $shipping_address, 
        $payment_method
    );

    if (!$order_stmt->execute()) {
        throw new Exception("Lỗi khi tạo đơn hàng chính.");
    }
    
    $order_id = $conn->insert_id;

    // 3. Thêm vào bảng ORDER_DETAILS (Như cũ)
    $details_sql = "INSERT INTO order_details (order_id, book_id, quantity, price_at_time) VALUES (?, ?, ?, ?)";
    $details_stmt = $conn->prepare($details_sql);

    foreach ($cart as $item) {
        // ... (logic thêm chi tiết đơn hàng như cũ)
        $book_id = $item['id'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        
        $details_stmt->bind_param("iiid", $order_id, $book_id, $quantity, $price);
        
        if (!$details_stmt->execute()) {
            throw new Exception("Lỗi khi thêm chi tiết sản phẩm: " . htmlspecialchars($item['title']));
        }
    }

    $conn->commit();
    $success = true;

} catch (Exception $e) {
    $conn->rollback();
    error_log("Checkout Error: " . $e->getMessage()); 
}
if ($success) {
    unset($_SESSION['cart']); 
    $_SESSION['redirect_message'] = "<p class='success'>Đặt hàng thành công! Vui lòng chờ xác nhận đơn hàng (Mã đơn hàng: <strong>$order_id</strong>).</p>";
    
    header("Location: index.php");
    exit();
} else {
    $_SESSION['redirect_message'] = "<p class='error'>Lỗi thanh toán. Vui lòng thử lại. Lỗi: " . ($e->getMessage() ?? 'Lỗi không xác định') . "</p>";
    header("Location: checkout_page.php");
    exit();
}

$conn->close();
?>
