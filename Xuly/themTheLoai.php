<?php

include("DB/ketnoi.php");
if (isset($_POST['genreName'])) {
    $name = $_POST['genreName'];

    $sql = "select Ten from the_loai where Ten LIKE '%$name'";
    $stm = $conn->prepare($sql);
    $stm->execute();

    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    if (empty($data)) {
        $sql1 = "INSERT INTO the_loai (Ten,Ma_BXH) VALUES ('$name',2)";
        $stm = $conn->prepare($sql1);
        $stm->execute();
        echo "<div class='alert alert-success allAlert' style = 'text-align: center' id='alert-warning' role='alert'>
        <ion-icon name='checkmark'></ion-icon>&nbsp;&nbsp;
            Thêm Mới Thành Công
        </div>";
    } else {
        echo "
        <div class='alert alert-danger allAlert' style = 'text-align: center' id='alert-warning' role='alert'>
            <ion-icon name='warning'></ion-icon>&nbsp;&nbsp;
            Thể Loại Nhạc đã tồn tại!!!
        </div>
        ";
    }
}


?>