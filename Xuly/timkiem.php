<?php
if (isset($_GET["search"]) && $_GET["search"] !== "") {
    require_once('../DB/ketnoi.php');
    try {
        $timKiem = '%' . trim(strtolower($_GET["search"])) . '%';
        $query = "SELECT * FROM bai_hat JOIN trinhbay JOIN nghesi ON bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat 
        and  trinhbay.Ma_NS = nghesi.Ma_NS  WHERE LOWER(TRIM(Ten_Bai_Hat)) LIKE :timKiem OR LOWER(TRIM(Ten_Ca_Si)) LIKE :timKiem";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':timKiem', $timKiem, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $no = 1;
        if (count($result) > 0) {
            foreach ($result as $key => $music) {
                echo "<tr class='music-row' data-music-link=''>";
                echo "<td><ion-icon name='play'  
                data-music-link='" . $result[$key]['path'] . 
                "'data-img-link ='".$result[$key]['Anh_Bia']. "' data-title-link = '".$result[$key]['Ten_Bai_Hat']."' data-singer-link='".$result[$key]['Ten_Ca_Si']."' onclick='playMusic(this, " . $result[$key]['Ma_Bai_Hat'] . ")'>
                </ion-icon></td>";
                echo "</td>";
                echo "<td>";
                print_r("#".$no);
                echo "</td>";
                echo "<td>";
                echo "<div id='crop_img'><img src = '" . $result[$key]['Anh_Bia'] . "'></div>";
                echo "</td>";
                echo "<td>";
                print_r($result[$key]['Ten_Bai_Hat']);
                echo "</td>";
                echo "<td>";
                print_r($result[$key]['Ten_Ca_Si']);
                echo "</td>";
                echo "<td>";
                print_r($result[$key]['Ngay_Phat_Hanh']);
                echo "</td>";
                echo "<td>";
                print_r(intval($result[$key]['Thoi_Luong']/60).":".($result[$key]['Thoi_Luong']%60));
                echo "</td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='7'>Không tìm thấy</td></tr>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>