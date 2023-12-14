<?php 

function doiMK($a, $b, $c, $d)
{
    if (isset($_POST['doiMK'])) {
        include('DB/ketnoi.php');
        $oldpass = $a;
        $newpass = $b;
        $cpass = $c;
        $maND = $d;

        // Check if the old password matches
        $sql = "SELECT Mat_Khau FROM nguoi_dung WHERE Ma_ND = :maND";
        $stm = $conn->prepare($sql);
        $stm->bindParam(':maND', $maND);
        $stm->execute();
        $data = $stm->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // Verify if the old password matches
            if (password_verify($oldpass, $data['Mat_Khau'])) {
                // Check if new password and confirm password match
                if ($newpass == $cpass) {
                    // Hash the new password
                    $hashedNewPass = password_hash($newpass, PASSWORD_DEFAULT);

                    // Update the hashed password in the database
                    $sqlUpdatePass = "UPDATE nguoi_dung SET Mat_Khau = :newpass WHERE Ma_ND = :maND";

                    $stmtUpdatePass = $conn->prepare($sqlUpdatePass);
                    $stmtUpdatePass->bindParam(':newpass', $hashedNewPass);
                    $stmtUpdatePass->bindParam(':maND', $maND);
                    $stmtUpdatePass->execute();
                    $rowCount = $stmtUpdatePass->rowCount();

                    if ($rowCount > 0) {
                        echo "Đổi mật khẩu thành công.";

                        // Retrieve the new password from the form and use it as needed
                        echo "Mật khẩu mới: $newpass";
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
            echo "Lỗi truy vấn cơ sở dữ liệu.";
        }
    }
}

?>
