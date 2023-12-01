<?php
// Dữ liệu từ PHP
$someDataFromPHP = "Hello from PHP!";

// Sinh ra mã HTML và JavaScript
echo '<button onclick="myFunction(\'' . $someDataFromPHP . '\')">Click me</button>';
?>

<script>
    // Hàm JavaScript
    function myFunction(dataFromPHP) {
        alert(dataFromPHP);
    }
</script>
