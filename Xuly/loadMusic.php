<?php
include("../DB/ketnoi.php");
$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';
session_start();
// Gán giá trị cho biến $test
$dataMusic = $idPlaylist;

// Trả về giá trị $test
$Maplaylist = $dataMusic;
    $sql = "Select * from nghesi join trinhbay join bai_hat join thuoc join playlist on nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat and playlist.Ma_Playlist = '$Maplaylist'
    and thuoc.Ma_Playlist = '$Maplaylist' and thuoc.Ma_Bai_Hat =bai_hat.Ma_Bai_Hat";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link=')'>";
        echo "<td><ion-icon name='play'  data-music-link='" . $data[$key]['path'] . "' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'></ion-icon>&nbsp;<ion-icon name='heart' class='yeu-thich' data-ma-bai-hat='" . $data[$key]['Ma_Bai_Hat'] . "' onclick='addToFavorites(this)'></ion-icon></td>";

        echo "<td>";
        print_r("#".$data[$key]['Ma_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        echo "<div id='crop_img'><img src = '" . $data[$key]['Anh_Bia'] . "'></div>";
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ten_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ten_Ca_Si']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ngay_Phat_Hanh']);
        echo "</td>";
        echo "<td>";
        print_r(intval($data[$key]['Thoi_Luong']/60).":".($data[$key]['Thoi_Luong']%60));
        echo "</td>";
        echo "<td>";
        echo "";
        echo "</td>";
        echo "</tr>";
    }
    
?>

