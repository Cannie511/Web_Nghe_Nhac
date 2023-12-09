<div id="searchModal" class="layout">
    <h1>Kết Quả Tìm Kiếm:</h1><br>
    <div id='music_panel'>
        <table class="table table-dark table-hover list">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Hình</th>
                    <th scope="col">Tiêu đề</th>
                    <th scope="col">Tác giả, ca sĩ</th>
                    <th scope="col">Ngày phát hành</th>
                    <th scope="col">Thời lượng</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                    
            </tbody>
        </table>
    </div>
</div>
<?php


    if (isset($_GET["search"]) && $_GET["search"] !== "") {
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
                    echo "<tr>
                    <td>{$row['Ten_Bai_Hat']}</td>
                    </tr>";
                }
            } else {
                echo "<div style = 'color: white; position: absolute; z-index:2000;' >Không tìm thấy</div>";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

//  else {
//     header("Location: /index.php");
//     exit();
// }
?>