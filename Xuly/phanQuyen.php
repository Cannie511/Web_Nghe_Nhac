<?php
// var_dump($_POST['quyen']);

include("../DB/ketnoi.php");
$ma = $_POST['maND'];
$phanQuyen = $_POST['PhanQuyen'];


$sql1 = "Select Phan_Quyen from nguoi_dung WHERE Ma_ND = '$ma'";
$stm = $conn->prepare($sql1);
$stm->execute();
$quyenTruoc = $stm->fetch(PDO::FETCH_COLUMN);

$sql3 = "Select Ten_Dang_Nhap from nguoi_dung WHERE Ma_ND = '$ma'";
$stm = $conn->prepare($sql3);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_COLUMN);


if ($phanQuyen == $quyenTruoc)
{
    echo "đã là quyền này rồi";
}

elseif($phanQuyen == 1 && $quyenTruoc == 0)
{
    $sql = "UPDATE nguoi_dung
    SET Phan_Quyen = '$phanQuyen'
    WHERE Ma_ND = '$ma'";
    $stm = $conn->prepare($sql);
    $stm->execute();

    $sql = "INSERT INTO nghesi (Luot_Theo_Doi,Ten_Ca_Si,Ma_ND) VALUES (1,'$user','$ma')";
    $stm = $conn->prepare($sql);
    $stm->execute();
    echo "thành công 1";
}

elseif($phanQuyen == 0 && $quyenTruoc == 1)
{
    $sql = "UPDATE nguoi_dung
    SET Phan_Quyen = '$phanQuyen'
    WHERE Ma_ND = '$ma'";
    $stm = $conn->prepare($sql);
    $stm->execute();

    $sql = "DELETE FROM nghesi WHERE nghesi.Ma_ND = '$ma'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    echo "thành công2";
}
else
{
    $sql = "UPDATE nguoi_dung
    SET Phan_Quyen = '$phanQuyen'
    WHERE Ma_ND = '$ma'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    echo "thành công";
}
?>