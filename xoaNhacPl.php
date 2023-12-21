<?php

include("DB/ketnoi.php");
$maBai =$_GET['maBaiHat1'] ;
$maPL =$_GET['maPL'];
$sql = "DELETE FROM thuoc WHERE thuoc.Ma_Bai_Hat = '$maBai' AND thuoc.Ma_Playlist = '$maPL'";
$stm = $conn->prepare($sql);
$stm->execute();
?>