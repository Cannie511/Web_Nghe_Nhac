<?php 
include("DB/ketnoi.php");
$duoiAnh = ['png','jpg','jpeg','gif'];
$duoiFile = ['mp3'];

session_start();

        $tenBai = $_POST['tenBaiHat'];
        $maNS = $_SESSION['Ma_ND'];
        $thoiLuong = $_POST['thoiLuong'];
        // $anh = $_FILES['coverImage'];
        // $file =  $_FILES['musicFile'];
        $theLoai = $_POST['musicGenre'];
        $quocGia = $_POST['country'];
        $nameAnh = $_FILES['anhBia']['name'];
        $nameFile = $_FILES['fileAmNhac']['name'];//lấy tên
        $anh_tmp = $_FILES['anhBia']['tmp_name'];
        $file_tmp = $_FILES['fileAmNhac']['tmp_name'];// lấy tên tạm
        $targetDir1 = "imgUpload/${nameAnh}";//nơi lưu
        
        $targetDir2 = "fileUpload/${nameFile}";//nơi lưu
        $sql = "SELECT quocgia.Ma_Quoc_GIa FROM quocgia WHERE quocgia.Ma_Quoc_GIa  = '".$quocGia."'";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $maQG = $stm->fetch(PDO::FETCH_COLUMN);
        // var_dump($maQG);

        $sql1 = "SELECT Ma_The_Loai FROM the_loai WHERE Ma_The_Loai = '$theLoai'";
        $stm = $conn->prepare($sql1);
        $stm->execute();
        $maTL = $stm->fetch(PDO::FETCH_COLUMN);
        move_uploaded_file($anh_tmp,$targetDir1);
        move_uploaded_file($file_tmp,$targetDir2);
           $sql = "INSERT INTO duyet(Ten_Bai_Hat,Ngay_Phat_Hanh,Anh_Bia,Thoi_Luong,Ma_The_Loai,Ma_Quoc_GIa,Ma_ND,duyet.path,duyet.trang_thai)
           VALUES ('$tenBai',CURDATE(), '$targetDir1','$thoiLuong','$maTL','$maQG','$maNS','$targetDir2',0)";
        $stm = $conn->prepare($sql);
        if ($stm->execute()) {
            // Câu truy vấn đã được thực hiện thành công
            echo "Thêm dữ liệu thành công!";
        }
        else
        {
            echo "lỗi";
        }

?>