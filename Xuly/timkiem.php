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

        if (count($result) > 0) {
            foreach ($result as $row) {
                echo "<tr>
                        <td><ion-icon name='play'></ion-icon>&nbsp;<ion-icon name='heart'></ion-icon></td>
                        <td>#{$row['Ma_Bai_Hat']}</td>
                        <td><img src = '{$row['Anh_Bia']}'></td>
                        <td>{$row['Ten_Bai_Hat']}</td>
                        <td>{$row['Ten_Ca_Si']}</td>
                        <td>{$row['Ngay_Phat_Hanh']}</td><td>";
                        print_r(intval($row['Thoi_Luong']/60).":".($row['Thoi_Luong']%60));
                      "</td><td></td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không tìm thấy</td></tr>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>