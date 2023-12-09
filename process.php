<?php
// Nhận giá trị từ biến $_GET
$buttonId = isset($_GET['buttonId']) ? $_GET['buttonId'] : '';

// Gán giá trị cho biến $test
$test = $buttonId;

// Trả về giá trị $test
echo $test;
?>
