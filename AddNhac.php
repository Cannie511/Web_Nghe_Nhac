<?php 

    include("DB/ketnoi.php");

        
       
        $tenBai = $_POST['songTitle'];
        $caSi = $_POST['artistName'];
        $thoiLuong = $_POST['duration'];
        // $anh = $_FILES['coverImage'];
        // $file =  $_FILES['musicFile'];
        $theLoai = $_POST['musicGenre'];
        $quocGia = $_POST['country'];
        $nameAnh = $_FILES['coverImage']['name'];
        $nameFile = $_FILES['musicFile']['name'];//lấy tên
        $anh_tmp = $_FILES['coverImage']['tmp_name'];
        $file_tmp = $_FILES['musicFile']['tmp_name'];// lấy tên tạm
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
           $sql = "INSERT INTO bai_hat(bai_hat.Ten_Bai_Hat,
           bai_hat.Ngay_Phat_Hanh,bai_hat.Luot_nghe,bai_hat.
           Anh_Bia,bai_hat.Thoi_Luong,bai_hat.path,bai_hat.Ma_The_Loai,bai_hat.Ma_Quoc_GIa) 
           VALUES ('$tenBai',CURDATE(),0, '$targetDir1','$thoiLuong','$targetDir2','$maTL','$maQG')";
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