<?php
if (isset($_GET["search"]) && $_GET["search"] !== "") {
    require_once(__DIR__ . '/DB/ketnoi.php');
    try {
        $timKiem = '%' . trim(strtolower($_GET["search"])) . '%';
        $query = "SELECT * FROM bai_hat JOIN trinhbay JOIN nghesi ON bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat 
        and  trinhbay.Ma_NS = nghesi.Ma_NS  WHERE LOWER(TRIM(Ten_Bai_Hat)) LIKE :timKiem";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':timKiem', $timKiem, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            foreach ($result as $row) {
                echo "<tr>
                        <td>#{$row['Ma_Bai_Hat']}</td>
                        <td><img src = '{$row['Anh_Bia']}'></td>
                        <td>{$row['Ten_Bai_Hat']}</td>
                        <td>{$row['Ten_Ca_Si']}</td>
                        <td>{$row['Ngay_Phat_Hanh']}</td><td>";
                        print_r(intval($row['Thoi_Luong']/60).":".($row['Thoi_Luong']%60));
                      "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không tìm thấy</td></tr>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

// if (isset($_GET["search"]) && $_GET["search"] !== "") {
//     require_once(__DIR__ . '/DB/ketnoi.php');
//     try {
//         $timKiem = '%' . trim(strtolower($_GET["search"])) . '%';
//         $query = "SELECT Ma_Bai_Hat, Ten_Bai_Hat,path FROM bai_hat WHERE LOWER(TRIM(Ten_Bai_Hat)) LIKE :timKiem";
//         $stmt = $conn->prepare($query);
//         $stmt->bindValue(':timKiem', $timKiem, PDO::PARAM_STR);
//         $stmt->execute();
//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//         if (count($result) > 0) {
//             // print_r($result);
//             foreach ($result as $row) {
//                 echo "<tr>
//                 <td>{$row['Ten_Bai_Hat']}</td>
//                 </tr>";
//             }
//         } else {
//             echo "<div style = 'color: white; position: absolute; z-index:2000;' >Không tìm thấy</div>";
//         }
//     } catch (PDOException $e) {
//         echo $e->getMessage();
//     }
// }

//  else {
//     header("Location: /index.php");
//     exit();
// }
?>