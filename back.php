<?php
session_start();

// Kiểm tra xem có URL trước đó được lưu trong session không
if (isset($_SESSION['return_to'])) {
    // Sử dụng header để thực hiện chuyển hướng với URL trước đó
    header('Location: ' . $_SESSION['return_to']);
    exit();
} else {
    // Nếu không có URL trước đó, chuyển hướng về một trang mặc định
    header('Location: menu.php');
    exit();
}
?>
