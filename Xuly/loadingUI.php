<?php
function loadDashboardMusic()
{
    include("DB/ketnoi.php");
    $sql = "SELECT COUNT(Ma_Bai_Hat) as totalSongs FROM bai_hat";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchColumn();
    echo $data;
}
function loadDashboardUser()
{
    include("DB/ketnoi.php");
    $sql = "SELECT COUNT(Ma_ND) as totalSongs FROM nguoi_dung";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchColumn();
    echo $data;
}
function loadDashboardDuyet()
{
    include("DB/ketnoi.php");
    $sql = "SELECT COUNT(Ma_ND) as totalSongs FROM duyet where trang_thai = 0";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchColumn();
    if($data > 0){
        echo "
        <div class='card duyet'
        onclick='canDuyet()'>
            <div class='card-body'>
                <strong>Bạn có nhạc cần duyệt!</strong>
                <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
                   ".$data."
                </span>
            </div>
        </div>
        ";
    }
    else{
        echo "
        <div class='card koduyet'
        onclick='canDuyet()'>
            <div class='card-body'>
                <strong>Không có bài hát nào cần duyệt &nbsp</strong>
            </div>
        </div>
        ";
    }
}
function loadQuocGia()
{
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM `quocgia`";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $k => $quocGia) {
        echo "<option value='" . $data[$k]['Ma_Quoc_GIa'] . "'>" . $data[$k]['Ten_Quoc_Gia'] . "</option>";
    }
}
function loadTheLoai()
{
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM `the_loai`";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $k => $theloai) {
        echo "<option value='" . $data[$k]['Ma_The_Loai'] . "'>" . $data[$k]['Ten'] . "</option>";
    }
}

function loadUserPL()
{
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM `playlist` WHERE Ma_ND = {$_SESSION['Ma_ND']}";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $k => $playlist) {
        echo "<option value='" . $data[$k]['Ma_Playlist'] . "'>" . $data[$k]['Ten_playlist'] . "</option>";
    }
}
?>