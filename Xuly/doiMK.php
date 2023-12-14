<?php

function doiMK($oldpass, $newpass, $cpass, $maND)
{
    if (isset($_POST['doiMK'])) {
        try {
            include('DB/ketnoi.php');
            $sql = "SELECT Mat_Khau FROM nguoi_dung WHERE Ma_ND = :maND";
            $stm = $conn->prepare($sql);
            $stm->bindParam(':maND', $maND);
            $stm->execute();
            $data = $stm->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                if ($oldpass === $data['Mat_Khau']) {
                    if ($newpass == $cpass) {
                        $sqlUpdatePass = "UPDATE nguoi_dung SET Mat_Khau = :newpass WHERE Ma_ND = :maND";
                        $stmtUpdatePass = $conn->prepare($sqlUpdatePass);
                        $stmtUpdatePass->bindParam(':newpass', $newpass);
                        $stmtUpdatePass->bindParam(':maND', $maND);
                        $stmtUpdatePass->execute();
                        $rowCount = $stmtUpdatePass->rowCount();

                        if ($rowCount > 0) {
                            echo "Đổi mật khẩu thành công.";
                        } else {
                            echo "Không thể cập nhật mật khẩu.";
                        }
                    } else {
                        echo "Mật khẩu mới không khớp.";
                    }
                } else {
                    echo "Mật khẩu cũ không đúng.";
                }
            } else {
                echo "Không tìm thấy người dùng.";
            }
        } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
}

?>
