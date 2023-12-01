<?php
// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thực hiện xử lý đăng ký tại đây

    // Sau khi xử lý thành công, chuyển hướng tới trang thành công
    header("Location: regis.php");
    exit(); // Đảm bảo không có mã HTML hoặc dòng mã nào thêm vào sau lệnh header
}
?>

<!-- Biểu mẫu HTML -->
<html>
<head>
    <title>Đăng ký</title>
</head>
<body>
    <form method="post" action="reactjs.php">
      đây là trang form
        <!-- Các trường nhập liệu và các phần tử khác trong form -->
        <input type="submit" value="Đăng ký">
    </form>
</body>
</html>
