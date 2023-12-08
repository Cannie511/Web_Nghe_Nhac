<?php
function timNhac(){
    if (isset($_GET["search"]) && $_GET["search"] !== "" ) {
        require_once(__DIR__ . '/DB/ketnoi.php');
        try {
            $timKiem = '%' . trim(strtolower($_GET["search"])) . '%';
            $query = "SELECT Ma_Bai_Hat, Ten_Bai_Hat,path FROM bai_hat WHERE LOWER(TRIM(Ten_Bai_Hat)) LIKE :timKiem";
            $stmt = $conn->prepare($query);
            $stmt->bindValue(':timKiem', $timKiem, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (count($result) > 0) {
                // print_r($result);
                foreach ($result as $row) {
                    echo " <div style = 'color: white; position: absolute; z-index:2000;' > tìm thấy <strong>{$row['Ten_Bai_Hat']}</strong></div>";
                }
            } else {
                echo "<div style = 'color: white; position: absolute; z-index:2000;' >Không tìm thấy</div>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
//  else {
//     header("Location: /index.php");
//     exit();
// }
?>