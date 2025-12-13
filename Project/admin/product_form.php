<?php 
$page_title = "Quản Lý Sản Phẩm";
include 'includes/check_admin.php'; 

$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $product_id > 0;
$page_title = $is_edit ? "Sửa Sản Phẩm (ID: $product_id)" : "Thêm Sản Phẩm Mới";
$message = '';
$product_data = [
    'title' => '', 'author' => '', 'price' => '', 'image' => '', 'description' => '', 'status' => '1' 
];
$products_sql = "SELECT id, title, author, price, image, status FROM books ORDER BY id ASC";
$products_result = $conn->query($products_sql);

if ($is_edit) {
    $sql = "SELECT title, author, price, image, description, status FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
    } else {
        $message = "<p class='error'>Sản phẩm không tồn tại.</p>";
        $is_edit = false;
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $price = (float)$_POST['price'];
    $image = trim($_POST['image']);
    $description = trim($_POST['description']);
    $status = trim($_POST['status']); 

    if ($is_edit) {
        $sql = "UPDATE books SET title=?, author=?, price=?, image=?, description=?, status=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsssi", $title, $author, $price, $image, $description, $status, $product_id); 
        
        if ($stmt->execute()) {
            header("Location: products.php?message=update_success"); 
            exit();
        } else {
            $message = "<p class='error'>Lỗi cập nhật sản phẩm: " . $conn->error . "</p>";
        }
    } else {
        $sql = "INSERT INTO books (title, author, price, image, description, status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsss", $title, $author, $price, $image, $description, $status); 
        
        if ($stmt->execute()) {
            header("Location: products.php?message=insert_success");
            exit();
        } else {
            $message = "<p class='error'>Lỗi khi thêm sản phẩm: " . $conn->error . "</p>";
        }
    }
    $stmt->close();
    $product_data = compact('title', 'author', 'price', 'image', 'description', 'status');
}

include 'includes/header.php'; 

?>

<div class="main-content">
    <h2><?php echo $page_title; ?></h2>
    <?php echo $message; ?>
    
    <form method="post" class="admin-form">
        <div class="form-group">
            <label for="title">Tiêu đề (Tên sách):</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($product_data['title']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="author">Tác giả:</label>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($product_data['author']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="price">Giá bán (đ):</label>
            <input type="number" id="price" name="price" step="1000" min="0" value="<?php echo htmlspecialchars($product_data['price']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="image">URL Ảnh:</label>
            <input type="url" id="image" name="image" value="<?php echo htmlspecialchars($product_data['image']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" rows="5"><?php echo htmlspecialchars($product_data['description']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái (Hiển thị/Ẩn):</label>
            <select id="status" name="status" required>
                <option value="1" <?php echo ($product_data['status'] == 1 || $product_data['status'] == 'visible') ? 'selected' : ''; ?>>Hiển thị</option>
                <option value="0" <?php echo ($product_data['status'] == 0 || $product_data['status'] == 'hidden') ? 'selected' : ''; ?>>Ẩn</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">
            <?php echo $is_edit ? 'Cập nhật Sản phẩm' : 'Thêm Sản phẩm mới'; ?>
        </button>
        <a href="products.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<?php include 'includes/footer.php'; ?>