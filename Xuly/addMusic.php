<?php
include("../DB/ketnoi.php"); 
  $songId = $_GET['maBaiHat1'];
  $namePlaylist = $_GET['tenPlaylist'];
  $sql = "SELECT * FROM thuoc WHERE thuoc.Ma_Bai_Hat = ' $songId' AND thuoc.Ma_Playlist = '$namePlaylist' ";
  $stm = $conn ->prepare($sql);
  $stm->execute();
  $data = $stm->fetchAll(PDO::FETCH_ASSOC);
 if(count($data) > 0)
 {
  echo "Bài hát đã tồn tại trong playlist";
 }
 else
 {
    $sql = "INSERT INTO thuoc(Ma_Bai_Hat, Ma_Playlist) VALUES ('$songId','$namePlaylist')";
    $stm = $conn->prepare($sql);
    $stm->execute();
    echo "Thêm nhạc vào thành công.";
 }


?>
