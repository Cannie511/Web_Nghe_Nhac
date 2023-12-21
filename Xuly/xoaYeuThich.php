<?php

include("../DB/ketnoi.php"); 
$maBai =$_GET['maBaiHat1'] ;
$user = $_GET['maND'];
$sql = "DELETE FROM yeu_thich WHERE yeu_thich.Ma_Bai_Hat = '$maBai' AND yeu_thich.Ma_ND = '$user'";
$stm = $conn->prepare($sql);
$stm->execute();
?>