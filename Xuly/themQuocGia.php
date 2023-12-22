<?php 
include("DB/ketnoi.php");
$name = $_POST['countryName'];

$sql = "select Ten_Quoc_Gia from quocgia where Ten_Quoc_Gia LIKE '%$name'";
$stm = $conn->prepare($sql);
$stm->execute();

$data = $stm->fetchAll(PDO::FETCH_ASSOC);

if (empty($data)) {
    $sql1 = "INSERT INTO quocgia (Ten_Quoc_Gia) VALUES ('$name')";
    $stm = $conn->prepare($sql1);
    $stm->execute();
    echo "Đã thêm thành công";
} else {
    echo "Quốc gia đã tồn tại";
}
?>