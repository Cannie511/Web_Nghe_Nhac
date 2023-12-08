<?php
include("DB/ketnoi.php");
      $sql = "Select bai_hat.path from nghesi join trinhbay join bai_hat on nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);


    var_dump($data[1]);
    ?>