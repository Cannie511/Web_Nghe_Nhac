<?php 

require_once("DB/ketnoi.php");
$sql="select * from nguoi_dung ";
$stm = $conn->prepare($sql);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);



var_dump($data);

?>