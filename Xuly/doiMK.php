<?php 

function doiMK($a,$b,$c,$d)
{
    if(isset($_POST['doiMK']))
    {
    include('../DB/ketnoi.php');
    $oldpass =$a;
    $newpass =$b;
    $cpass = $c;
    $maND = $d;

    $sql = "select Ten_Dang_Nhap  from nguoi_dung where Mat_Khau='$oldpass'";

    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) > 0) {
    
        if($newpass == $cpass)
        {
        $sqlUpdatePass = "UPDATE nguoi_dung SET Mat_Khau = :newpass WHERE Ma_ND = :maND";
        $stmtUpdatePass = $conn->prepare($sqlUpdatePass);
        $stmtUpdatePass->bindParam(':newpass', $newpass);
        $stmtUpdatePass->bindParam(':maND', $maND);
        $stmtUpdatePass->execute();
        $rowCount = $stmtUpdatePass->rowCount();

        if ($rowCount > 0) {
            echo "Đổi mật khẩu thành công.";
        } 
        
    }
        else
        {
            echo "Mật khẩu không khớp";
        }
    }
    
    else
    {
        echo "Loi";
    }

    }

}

?>