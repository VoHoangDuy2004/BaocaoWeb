    </main>

    <footer>
        <div class="container">
            <div>
                <h3>DuyBooks</h3>
                <p>Cửa hàng sách online đơn giản, hiện đại.<br>Dự án học tập PHP & MySQL.</p>
            </div>

            <div>
                <h4>Liên Kết Nhanh</h4>
                <ul>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><a href="<?php echo ($_SESSION['role'] === 'admin') ? 'admin.php' : 'index.php'; ?>">Trang Chủ</a></li>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <li><a href="admin_books.php">Quản Lý Sách</a></li>
                            <li><a href="admin_orders.php">Quản Lý Đơn Hàng</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a href="login.php">Đăng Nhập</a></li>
                        <li><a href="register.php">Đăng Ký</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div>
                <h4>Thông Tin</h4>
                <p>© <?php echo date('Y'); ?> DuyBooks<br>
                Dự án thực hành PHP + MySQL<br>
                </p>
            </div>
        </div>

        <div class="copyright">
            <p>Phiên bản 1.0 – Ngày <?php echo date('d/m/Y'); ?></p>
        </div>
    </footer>
</body>
</html>