<?php 
 
include("DB/ketnoi.php");
$name = $_POST['genreName'];

$sql = "select Ten from the_loai where Ten LIKE '%$name'";
$stm = $conn->prepare($sql);
$stm->execute();

$data = $stm->fetchAll(PDO::FETCH_ASSOC);
 if (empty($data))
 {
    $sql1 = "INSERT INTO the_loai (Ten,Ma_BXH) VALUES ('$name',2)";
    $stm = $conn->prepare($sql1);
    $stm->execute();
    echo "da them thanh cong";
 }
else
{
    echo "ton tai";
}



?>