<?php 

include("DB/ketnoi.php");
$ma = $_GET['maBH'];

$sql = "DELETE FROM bai_hat WHERE bai_hat.Ma_Bai_Hat = '$ma'";
$stm = $conn->prepare($sql);
$stm->execute();

?>