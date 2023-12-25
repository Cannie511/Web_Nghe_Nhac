<?php
include("DB/ketnoi.php");

if (isset($_POST['submitAddMusic'])) {
    try {
        $duoiAnh = ['png', 'jpg', 'jpeg', 'gif'];
        $duoiFile = ['mp3'];

        $tenBai = $_POST['tenBaiHat'];
        $tenBaiBoTrang = trim($tenBai);
        $maNS = $_SESSION['Ma_ND'];
        $thoiLuong = $_POST['thoiLuong'];
        // $anh = $_FILES['coverImage'];
        // $file =  $_FILES['musicFile'];
        $theLoai = $_POST['musicGenre'];
        $quocGia = $_POST['country'];
        $nameAnh = $_FILES['anhBia']['name'];
        $nameFile = $_FILES['fileAmNhac']['name']; //lấy tên
        $anh_tmp = $_FILES['anhBia']['tmp_name'];
        $file_tmp = $_FILES['fileAmNhac']['tmp_name']; // lấy tên tạm
        $targetDir1 = "imgUpload/${nameAnh}"; //nơi lưu

        $targetDir2 = "fileUpload/${nameFile}"; //nơi lưu
        $sql = "SELECT quocgia.Ma_Quoc_GIa FROM quocgia WHERE quocgia.Ma_Quoc_GIa  = '" . $quocGia . "'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $maQG = $stm->fetch(PDO::FETCH_COLUMN);
        // var_dump($maQG);

        $sql1 = "SELECT Ma_The_Loai FROM the_loai WHERE Ma_The_Loai = '$theLoai'";
        $stm = $conn->prepare($sql1);
        $stm->execute();
        $maTL = $stm->fetch(PDO::FETCH_COLUMN);
        move_uploaded_file($anh_tmp, $targetDir1);
        move_uploaded_file($file_tmp, $targetDir2);

        if ($thoiLuong >= 100) {
            $sql = "INSERT INTO duyet(Ten_Bai_Hat,Ngay_Phat_Hanh,Anh_Bia,Thoi_Luong,Ma_The_Loai,Ma_Quoc_GIa,Ma_ND,duyet.path,duyet.trang_thai)
            VALUES ('$tenBai',CURDATE(), '$targetDir1','$thoiLuong','$maTL','$maQG','$maNS','$targetDir2',0)";
            $stm = $conn->prepare($sql);
            if ($stm->execute()) {
                // Câu truy vấn đã được thực hiện thành công
                echo "
                <div class='toast-container position-fixed bottom-0 end-0 p-3' >
                                    <div id='liveToast'style='background-color: green;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                                        <div class='toast-header'>
                                            <strong class='me-auto'>Thông báo</strong>
                                            <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                        </div>
                                        <div class='toast-body' style=' color: white'>
                                            Thêm thành công, vui lòng chờ Admin phê duyệt
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
                    Bài hát đã tồn tại, vui lòng sử dụng 1 tên khác
                </div>
            </div>
        </div>";
            }
        } else {
            echo " <div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
               Thời lượng phải lớn hơn hoặc bằng 100 giây
            </div>
        </div>
    </div>";
        }
    } catch (Exception) {
        echo " <div class='toast-container position-fixed bottom-0 end-0 p-3' >
        <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
            <div class='toast-header'>
                <strong class='me-auto'>Thông báo</strong>
                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
            </div>
            <div class='toast-body' style=' color: white'>
               Bài Hát đã tồn tại ở quốc gia này, vui lòng thử lại!
            </div>
        </div>
    </div>";
    }

}


?>