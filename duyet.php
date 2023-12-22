<?php 
include("DB/ketnoi.php");


$ma = $_POST['maDuyet'];
$action = $_POST['action'];

 
 
$sql = "SELECT * FROM duyet WHERE duyet.Ma_Duyet = '$ma'";
$stm = $conn->prepare($sql);
$stm->execute();
$data = $stm->fetch(PDO::FETCH_ASSOC);
if ($action == 'duyet')
{
if ($data) {
    $tenBai = $data['Ten_Bai_Hat'];
    $anh_bia = $data['Anh_Bia'];
    $thoiLuong = $data['Thoi_Luong'];
    $Ma_QG =  $data['Ma_Quoc_GIa'];
    
    $Ma_TL = $data['Ma_The_Loai'];
    $Ma_ND = $data['Ma_ND'];
    $path = $data['path'];
    $trang_thai = $data['trang_thai'];
    $sql1 = "INSERT INTO bai_hat(bai_hat.Ten_Bai_Hat,bai_hat.Ngay_Phat_Hanh,
    bai_hat.Luot_nghe,bai_hat.Anh_Bia,bai_hat.Thoi_Luong,bai_hat.path,bai_hat.Ma_The_Loai, bai_hat.Ma_Quoc_GIa) 
    VALUES ('$tenBai',CURDATE(),1,'$anh_bia',' $thoiLuong','$path','$Ma_TL','$Ma_QG')";
    $stm = $conn->prepare($sql1);
    $stm->execute();
    $maBaiHat = $conn->lastInsertId();

    $sql2 = "SELECT Ma_NS FROM nghesi where Ma_ND = '$Ma_ND'";
    $stm = $conn->prepare($sql2);
    $stm->execute();
    $maNS = $stm->fetch(PDO::FETCH_COLUMN);;

    $sql3 = "INSERT INTO trinhbay (trinhbay.Ma_NS,trinhbay.Ma_Bai_Hat) VALUES ('$maNS','$maBaiHat')";
    $stm = $conn->prepare($sql3);
    $stm->execute();

    $sql4 = "UPDATE duyet
    SET trang_thai = 1
    WHERE Ma_Duyet = '$ma'";
    $stm = $conn->prepare($sql4);
    $stm->execute();
    echo "dang bai";
}
}
elseif($action == 'huy')
{
   $sql = "DELETE FROM duyet WHERE duyet.Ma_Duyet = '$ma'";
   $stm = $conn->prepare($sql);
    $stm->execute();
    echo "Huy bai";
}
?>