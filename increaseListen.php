<?php
include("DB/ketnoi.php");

$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';

// Tăng giá trị cột luot_nghe lên 1
$sqlUpdateLuotNghe = "UPDATE bai_hat SET luot_nghe = luot_nghe + 1 WHERE Ma_Bai_Hat IN (SELECT Ma_Bai_Hat FROM thuoc WHERE Ma_Playlist = :idPlaylist)
BEGIN
    DECLARE Ma_Bai_Hat INT;
    SET Ma_Bai_Hat = (SELECT Ma_Bai_Hat FROM bai_hat WHERE Ma_Bai_Hat IN (SELECT Ma_Bai_Hat FROM thuoc WHERE Ma_Playlist = :idPlaylist) ORDER BY Ma_Bai_Hat LIMIT 1);
    INSERT INTO luot_nghe (Ngay_Nghe,Ma_Bai_Hat) VALUES (CURDATE(), Ma_Bai_Hat) 
END;
";
$stmtUpdateLuotNghe = $conn->prepare($sqlUpdateLuotNghe);
$stmtUpdateLuotNghe->bindParam(':idPlaylist', $idPlaylist, PDO::PARAM_INT);
$stmtUpdateLuotNghe->execute();

echo "Đã tăng lượt nghe thành công cho playlist có ID $idPlaylist";
?>
