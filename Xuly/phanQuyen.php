<?php
// var_dump($_POST['quyen']);

include("DB/ketnoi.php");
if (isset($_POST['btnLuuND'])) {
    $ma = $_POST['maND'];
    $phanQuyen = $_POST['PhanQuyen'];


    $sql1 = "Select Phan_Quyen from nguoi_dung WHERE Ma_ND = '$ma'";
    $stm = $conn->prepare($sql1);
    $stm->execute();
    $quyenTruoc = $stm->fetch(PDO::FETCH_COLUMN);

    $sql3 = "Select Ten_Dang_Nhap from nguoi_dung WHERE Ma_ND = '$ma'";
    $stm = $conn->prepare($sql3);
    $stm->execute();
    $user = $stm->fetch(PDO::FETCH_COLUMN);


    if ($phanQuyen == $quyenTruoc) {
        echo "
        <div class='toast-container position-fixed bottom-0 end-0 p-3' >
                                <div id='liveToast'style='background-color: yellow;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                                    <div class='toast-header'>
                                        <strong class='me-auto'>Thông báo</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                    </div>
                                    <div class='toast-body' style=' color: white'>
                                        Người dùng đã có quyền này rồi!
                                    </div>
                                </div>
                            </div>
        ";
    } elseif ($phanQuyen == 1 && $quyenTruoc == 0) {
        $sql = "UPDATE nguoi_dung
    SET Phan_Quyen = '$phanQuyen'
    WHERE Ma_ND = '$ma'";
        $stm = $conn->prepare($sql);
        $stm->execute();

        $sql = "INSERT INTO nghesi (Luot_Theo_Doi,Ten_Ca_Si,Ma_ND) VALUES (1,'$user','$ma')";
        $stm = $conn->prepare($sql);
        $stm->execute();
        echo "<div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: green;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
                Người dùng đã được đổi thành nghệ sĩ
            </div>
        </div>
    </div>";
    } elseif ($phanQuyen == 0 && $quyenTruoc == 1) {
        $sql = "UPDATE nguoi_dung
    SET Phan_Quyen = '$phanQuyen'
    WHERE Ma_ND = '$ma'";
        $stm = $conn->prepare($sql);
        $stm->execute();

        $sql = "DELETE FROM nghesi WHERE nghesi.Ma_ND = '$ma'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        echo "<div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: green;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
            Người dùng đã được đổi thành người dùng cơ bản
            </div>
        </div>
    </div>";
    } else {
        $sql = "UPDATE nguoi_dung
    SET Phan_Quyen = '$phanQuyen'
    WHERE Ma_ND = '$ma'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        echo "<div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: green;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
            Người dùng đã được đổi thành Adminstrator
            </div>
        </div>
    </div>";
    }
}
?>