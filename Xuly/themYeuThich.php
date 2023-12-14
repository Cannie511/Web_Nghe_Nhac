<?php
session_start();
include("../DB/ketnoi.php"); 
    $songId = $_GET['maBaiHat'];
    $user = $_SESSION['Ma_ND'];
    $sql = "INSERT INTO yeu_thich VALUES('$songId','$user')";
    $stm = $conn->prepare($sql);
    $stm->execute();

?>
