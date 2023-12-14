<?php
function loadQuocGia(){
    include("../DB/ketnoi.php");
    $sql = "SELECT * FROM `quocgia`";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $k=> $quocGia){
        echo "<option value='".$data[$k]['Ma_Quoc_GIa']."'>".$data[$k]['Ten_Quoc_Gia']."</option>";  
    }
}
function loadTheLoai(){
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM `the_loai`";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $k=> $theloai){
        echo "<option value='".$data[$k]['Ma_The_Loai']."'>".$data[$k]['Ten']."</option>";  
    }
}
?>