<?php
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
            print_r($result);
        } else {
            echo "Không tìm thấy";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    header("Location: /index.php");
    exit();
}
?>
