<?php
include("DB/ketnoi.php");
$ma = $_GET['maND'];
$sql = "DELETE FROM nguoi_dung WHERE nguoi_dung.Ma_ND = '$ma'";
$stm = $conn->prepare($sql);
$stm->execute();
?>