<?php
session_start();

// Hủy tất cả các biến phiên và hủy phiên
session_destroy();

// Chuyển hướng đến trang đăng nhập hoặc trang chính
header("Location: index.php"); // Thay thế bằng đường dẫn bạn muốn chuyển hướng đến
exit;
?>
