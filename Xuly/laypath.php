<?php
// include("../DB/ketnoi.php");

// $sql = "SELECT bai_hat.path FROM nghesi JOIN trinhbay JOIN bai_hat ON nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat";
// $stm = $conn->prepare($sql);
// $stm->execute();
// $playlist = $stm->fetchAll(PDO::FETCH_ASSOC);
// // Chỉ trả về mảng path
// $paths = array_column($playlist, 'path');
// echo json_encode($paths);
session_start();

$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';
$_SESSION['Maplaylist'] = $idPlaylist;
include("../DB/ketnoi.php");
$dataMusic = $idPlaylist;
$Maplaylist = $dataMusic;
$sql = "SELECT bai_hat.path, bai_hat.Anh_Bia, nghesi.Ten_Ca_Si, bai_hat.Ten_Bai_Hat FROM nghesi JOIN trinhbay join bai_hat JOIN thuoc JOIN playlist
     on nghesi.Ma_NS = trinhbay.Ma_NS AND trinhbay.Ma_Bai_Hat = bai_hat.Ma_Bai_Hat 
     AND bai_hat.Ma_Bai_Hat = thuoc.Ma_Bai_Hat and thuoc.Ma_Playlist = playlist.Ma_Playlist 
     AND playlist.Ma_Playlist = :idPlaylist";
$stm = $conn->prepare($sql);
$stm->bindParam(':idPlaylist', $idPlaylist, PDO::PARAM_STR);
$stm->execute();
$playlist = $stm->fetchAll(PDO::FETCH_ASSOC);

// Chuyển định dạng dữ liệu để trả về
$response = array();
foreach ($playlist as $song) {
    $response[] = array(
        'path' => $song['path'],
        'Anh_Bia' => $song['Anh_Bia'],
        'Ten_Ca_Si' => $song['Ten_Ca_Si'],
        'Ten_Bai_Hat' => $song['Ten_Bai_Hat']
    );
}
echo json_encode($response);
// Trả về dữ liệu dưới dạng JSON


?>

