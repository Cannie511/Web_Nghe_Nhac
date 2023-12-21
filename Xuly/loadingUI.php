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