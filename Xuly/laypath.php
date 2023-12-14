<?php
include("../DB/ketnoi.php");

$sql = "SELECT bai_hat.path FROM nghesi JOIN trinhbay JOIN bai_hat ON nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat";
$stm = $conn->prepare($sql);
$stm->execute();
$playlist = $stm->fetchAll(PDO::FETCH_ASSOC);

// Chỉ trả về mảng path
$paths = array_column($playlist, 'path');
echo json_encode($paths);
?>