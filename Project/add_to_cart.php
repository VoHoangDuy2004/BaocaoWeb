<?php
session_start();
include 'db.php'; 

if (isset($_GET['book_id'])) {
    $book_id = (int)$_GET['book_id'];

    // Allow different status representations in DB (1, 'visible', 'active')
    $sql = "SELECT id, title, price, image, status FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $book = $result->fetch_assoc();
        $statusVal = isset($book['status']) ? (string)$book['status'] : '';
        $is_active = in_array($statusVal, ['1', 'visible', 'active', 'true'], true) || $statusVal === '1';

        if (!$is_active) {
            $_SESSION['redirect_message'] = "<p class='error'>Sách này hiện không có sẵn để mua.</p>";
            header("Location: index.php");
            exit();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$book_id])) {
            $_SESSION['cart'][$book_id]['quantity']++;
        } else {
            $_SESSION['cart'][$book_id] = [
                'id' => $book['id'],
                'title' => $book['title'],
                'price' => $book['price'],
                'image' => $book['image'],
                'quantity' => 1
            ];
        }

        header("Location: cart.php");
        exit();

    } else {
        $_SESSION['redirect_message'] = "<p class='error'>Sách này hiện không có sẵn để mua.</p>";
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}