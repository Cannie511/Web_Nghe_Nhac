<?php
include("DB/ketnoi.php");
if (isset($_POST['countryName'])) {
    $name = $_POST['countryName'];
    $sql = "select Ten_Quoc_Gia from quocgia where Ten_Quoc_Gia LIKE '%$name'";
    $stm = $conn->prepare($sql);
    $stm->execute();

    $data = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (empty($data)) {
        $sql1 = "INSERT INTO quocgia (Ten_Quoc_Gia) VALUES ('$name')";
        $stm = $conn->prepare($sql1);
        $stm->execute();
        echo "
        <div class='alert alert-success allAlert' style = 'text-align: center' id='alert-warning' role='alert'>
        <ion-icon name='checkmark'></ion-icon>&nbsp;&nbsp;
            Thêm Mới Thành Công
        </div>";
    } else {
        echo "
    <div class='alert alert-danger allAlert' style = 'text-align: center' id='alert-warning' role='alert'>
            <ion-icon name='warning'></ion-icon>&nbsp;&nbsp;
            Quốc Gia đã tồn tại !!!
        </div>
    ";
    }
}
?>