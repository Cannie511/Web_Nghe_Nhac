<?php
include("DB/ketnoi.php");

if (isset($_GET['Ma_Bai_Hat'])) {
    $songId = $_GET['Ma_Bai_Hat'];
    $sql = "UPDATE bai_hat SET Luot_nghe = Luot_nghe + 1 WHERE Ma_Bai_Hat = ?";
    $stm = $conn->prepare($sql);
    $stm->execute([$songId]);
}
?>
