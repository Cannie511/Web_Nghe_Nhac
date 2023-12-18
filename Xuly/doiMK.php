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
                            echo "
                            <div class='toast-container position-fixed bottom-0 end-0 p-3' >
                                <div id='liveToast'style='background-color: green;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                                    <div class='toast-header'>
                                        <strong class='me-auto'>Thông báo</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                    </div>
                                    <div class='toast-body' style=' color: white'>
                                        Đổi mật khẩu thành công!
                                    </div>
                                </div>
                            </div>
                            ";
                        } else {
                            echo "
                            <div class='toast-container position-fixed bottom-0 end-0 p-3' >
                                <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                                    <div class='toast-header'>
                                        <strong class='me-auto'>Thông báo</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                    </div>
                                    <div class='toast-body' style=' color: white'>
                                        Đổi mật khẩu thất bại, vui lòng thử lại sau!
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    } else {
                        echo "
                        <div class='toast-container position-fixed bottom-0 end-0 p-3' >
                        <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                            <div class='toast-header'>
                                <strong class='me-auto'>Thông báo</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                            </div>
                            <div class='toast-body' style=' color: white'>
                                Đổi mật khẩu thất bại, vui lòng thử lại sau!
                            </div>
                        </div>
                    </div>
                        ";
                    }
                } else {
                    echo "<div class='toast-container position-fixed bottom-0 end-0 p-3' >
                    <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                        <div class='toast-header'>
                            <strong class='me-auto'>Thông báo</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                        </div>
                        <div class='toast-body' style=' color: white'>
                            Mật khẩu cũ không đúng!
                        </div>
                    </div>
                </div>";
                }
            } else {
                echo "<div class='toast-container position-fixed bottom-0 end-0 p-3' >
                <div id='liveToast'style='background-color: red;' class='toast fade show' role='alert' aria-live='ssertive' aria-atomic='true'>
                    <div class='toast-header'>
                        <strong class='me-auto'>Thông báo</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body' style=' color: white'>
                        không tìm thấy người dùng, vui lòng <a href='login.php'>Đăng nhập</a> lại!
                    </div>
                </div>
            </div>";
            }
        } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
        } finally {
            $conn = null;
        }
    }
}

?>