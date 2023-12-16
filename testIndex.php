<?php
include("DB/ketnoi.php");

$sql = "SELECT bai_hat.path, bai_hat.Anh_Bia, Ten_Ca_Si, Ten_Bai_Hat FROM nghesi 
        JOIN trinhbay ON nghesi.Ma_NS = trinhbay.Ma_NS 
        JOIN bai_hat ON bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat";
$stm = $conn->prepare($sql);
$stm->execute();
$playlist = $stm->fetchAll(PDO::FETCH_ASSOC);

// Chuyển định dạng dữ liệu để trả về
$response = array();

foreach ($playlist as $song) {
    $response[] = array(
        'path' => $song['path'],
        'Anh_Bia' => $song['Anh_Bia'],
        'Ten_Ca_Si' => $song['Ten_Ca_Si'],
        'Ten_Bai_Hat' => $song['Ten_Bai_Hat']
    );

}
echo json_encode($response);
// Trả về dữ liệu dưới dạng JSON


?>
