<?php
include("../DB/ketnoi.php");
$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';

$dataMusic = $idPlaylist;

$Maplaylist = $dataMusic;
$sql = "Select * from nghesi join trinhbay join bai_hat join thuoc join playlist on nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat and playlist.Ma_Playlist = '$Maplaylist' and thuoc.Ma_Playlist = '$Maplaylist' and thuoc.Ma_Bai_Hat =bai_hat.Ma_Bai_Hat";
$stm = $conn->prepare($sql);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);

// Trả về dữ liệu dưới dạng JSON
echo json_encode($data);
?>