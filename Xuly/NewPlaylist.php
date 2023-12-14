<?php 

function TaoMoiPlaylist( $a,$b) {
if(isset($_POST['TaoMoi']))
{
    include('../DB/ketnoi.php');
    $name =$a;
    $maND = $b;
    $sql = "INSERT INTO playlist (So_Luong,ma_nd,ten_playlist) VALUES (0, :maND, :name)";
    $stm = $conn->prepare($sql);
   
    $stm->bindParam(':maND', $maND, PDO::PARAM_INT);
    $stm->bindParam(':name', $name, PDO::PARAM_STR);
    
    $stm->execute();
    $rowCount = $stm->rowCount();

    if ($rowCount > 0) {
        echo "Lệnh SQL đã được thực thi thành công.";
    } else {
        echo "Lệnh SQL đã được thực thi nhưng không có hàng nào được thêm vào bảng playlists.";
    }
}    

}
?>