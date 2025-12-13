<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); 
    exit();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php"); 
    exit();
}
$admin_username = $_SESSION['username'];
$dbPath = __DIR__ . '/../../db.php';
if (file_exists($dbPath)) {
    require_once $dbPath;
} else {
    die("Database config not found at: " . htmlspecialchars($dbPath));
}
?>