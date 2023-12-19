<?php
include("../DB/ketnoi.php");

if (isset($_GET['Ma_Bai_Hat'])) {
    $songId = $_GET['Ma_Bai_Hat'];
    $sql = "UPDATE bai_hat SET Luot_nghe = Luot_nghe + 1 WHERE Ma_Bai_Hat = '$songId'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $sql = "INSERT INTO luot_nghe (Ngay_Nghe,Ma_Bai_Hat) VALUES (CURDATE(), ' $songId')";
    $stm = $conn->prepare($sql);
    $stm->execute();
    
}
?>
