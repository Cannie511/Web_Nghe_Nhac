<?php
// Kết nối đến MySQL và xử lý đăng nhập ở đây
if(isset($_POST['aaa'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
if($user == "abc" && $pass == "abc") {
    // Đăng nhập thành công
    echo 'Đăng nhập thành công';
    }
    else {
        // Đăng nhập không thành công
        echo 'Đăng nhập không thành công';
    }
} 
?>
