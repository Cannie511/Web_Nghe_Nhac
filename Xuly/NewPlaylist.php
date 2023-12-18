<?php

function TaoMoiPlaylist($a, $b)
{
    if (isset($_POST['TaoMoi'])) {
        include('DB/ketnoi.php');
        $name = $a;
        $maND = $b;
        $sql = "INSERT INTO playlist (So_Luong,ma_nd,ten_playlist) VALUES (0, :maND, :name)";
        $stm = $conn->prepare($sql);
        $stm->bindParam(':maND', $maND, PDO::PARAM_INT);
        $stm->bindParam(':name', $name, PDO::PARAM_STR);
        $stm->execute();
        $rowCount = $stm->rowCount();
        if ($rowCount > 0) {
            echo "
        <div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: green;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
                Tạo playlist " . $_POST['TaoMoi'] . " thành công!
            </div>
        </div>
    </div>
        ";
        } else {
            echo " <div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
                Tạo playlist " . $_POST['TaoMoi'] . " thất bại, vui lòng thử lại!
            </div>
        </div>
    </div>";
        }
    }

}
?>