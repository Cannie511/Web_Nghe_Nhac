<?php
include("DB/ketnoi.php"); 
  $songId = $_GET['maBaiHat1'];
  $namePlaylist = $_GET['tenPlaylist'];
    $getMa = "SELECT Ma_Playlist FROM playlist WHERE Ten_playlist = '$namePlaylist'";
    $stm = $conn->prepare($getMa);
    $stm->execute();
    $maPL = $stm->fetch(PDO::FETCH_COLUMN);
    $sql = "INSERT INTO thuoc(Ma_Bai_Hat, Ma_Playlist) VALUES ('$songId','$namePlaylist')";
    $stm = $conn->prepare($sql);
    $stm->execute();
echo "THÊM THÀNH CÔNG";
?>
