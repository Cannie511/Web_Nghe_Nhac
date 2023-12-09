<style>
    body {
        color: white;
    }
</style>
<?php
// $Ma = isset($_POST['idPL']) ? $_POST['idPL'] : 'không có dữ liệu';
// $Maplaylist = $Ma;  
// echo "<script>alert('. $Maplaylist.')</script>";
$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';

// Gán giá trị cho biến $test
$dataMusic = $idPlaylist;

// Trả về giá trị $test
echo $dataMusic;
function loadMusic()
{
    // $Maplaylist = isset($_COOKIE['idPL']) ? $_COOKIE['idPL'] : 'không có dữ liệu';
    // echo $Maplaylist;



    include("DB/ketnoi.php");
    // $Maplaylist = ????
    // "Select * from nghesi join trinhbay join bai_hat join playlist on nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat and playlist.Ma_Playlist = '$Maplaylist'"
    $Maplaylist = $dataMusic;
    $sql = "Select * from nghesi join trinhbay join bai_hat join thuoc join playlist on nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat and playlist.Ma_Playlist = '$Maplaylist'
    and thuoc.Ma_Playlist = '$Maplaylist' and thuoc.Ma_Bai_Hat =bai_hat.Ma_Bai_Hat";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link='" . $data[$key]['path'] . "'>";
        echo "<td>";
        print_r($data[$key]['Ma_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ma_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        echo "<div id='crop_img'><img src = '" . $data[$key]['Anh_Bia'] . "'></div>";
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ten_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ten_Ca_Si']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ngay_Phat_Hanh']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Thoi_Luong']);
        echo "</td>";
        echo "<td>";
        echo "<ion-icon name='trash'></ion-icon>";
        echo "</td>";
        echo "</tr>";
    }
}
function loadPlaylist()
{
    include("DB/ketnoi.php");
    $sql = "Select * from playlist join thuoc join bai_hat join trinhbay join nghesi on playlist.Ma_Playlist = thuoc.Ma_Playlist and bai_hat.Ma_Bai_Hat = thuoc.Ma_Bai_Hat 
    and bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat and trinhbay.Ma_NS =nghesi.Ma_NS  ";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $playlist = $stm->fetchAll(PDO::FETCH_ASSOC);

    // $playlist = array(
    //     array("thumb"=> "","title"=> "Playlist song","artist"=> "Lyly, Sơn Tùng, Mono")
    // );
    foreach ($playlist as $key => $music) {
        echo "<div class='col view_item' id='" . $playlist[$key]['Ma_Playlist'] . "'>
            <div class='img_item'><img src='" . $playlist[$key]['bia'] . "'></div>
            <div class='info_item row'>
                <strong>" . $playlist[$key]['Ten_playlist'] . "</strong>
                <h6>" . $playlist[$key]['Ten_Ca_Si'] . "</h6>
            </div>
        </div>";
    }
}
function loadBXHNgheNhieu()
{
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM bai_hat join trinhbay join nghesi on bai_hat.Ma_Bai_Hat =trinhbay.Ma_Bai_Hat  and nghesi.Ma_NS =trinhbay.Ma_NS  
    ORDER BY Luot_nghe  DESC LIMIT 10";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link='" . $data[$key]['path'] . "'>";
        echo "<td>";
        print_r($data[$key]['Ma_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ma_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        echo "<div id='crop_img'><img src = '" . $data[$key]['Anh_Bia'] . "'></div>";
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ten_Bai_Hat']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ten_Ca_Si']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Ngay_Phat_Hanh']);
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Thoi_Luong']);
        echo "</td>";
        echo "<td>";
        echo "<ion-icon name='trash'></ion-icon>";
        echo "</td>";
        echo "</tr>";
    }
}
function loadUserAccount($n)
{
    require_once("DB/ketnoi.php");
    // $userAccount = array(
    //     array("Id" => "admin@trivieco.com", "pass"=>"Abc123@", "rule"=>2,"birth"=>"05/11/2002", "state"=>1),
    //     array("Id" => "Demo1@trivieco.com", "pass"=>"Abc123@", "rule"=>1, "birth"=>"25/08/2002", "state"=>0),
    //     array("Id" => "Demo2@trivieco.com", "pass"=>"Abc123@", "rule"=>0, "birth"=>"31/10/2002","state"=>0),
    //     array("Id" => "Demo3@trivieco.com", "pass"=>"Abc123@", "rule"=>0, "birth"=>"15/11/2002","state"=>1),
    // );

    $sql = "select * from nguoi_dung ";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $userAccount = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($userAccount as $k => $v) {
        echo "<tr>
            <td>" . $userAccount[$k]['Ma_ND'] . "</td>
            <td>" . $userAccount[$k]['Ten_Dang_Nhap'] . "</td>
            <td><input type='password' id='pass' readonly value='" . $userAccount[$k]['Mat_Khau'] . "'></td>
            <td>";
        if ($userAccount[$k]['Phan_Quyen'] == 0) {
            echo "Người dùng";
        }
        if ($userAccount[$k]['Phan_Quyen'] == 1) {
            echo "Nghệ sĩ";
        }
        if ($userAccount[$k]['Phan_Quyen'] == 2) {
            echo "Admin";
        }
        echo "</td>
            <td>" . $userAccount[$k]['Ngay_Sinh'] . "</td>
            <td>";
        echo "</td>
            <td><i class='fas fa-pen'></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></td>
          </tr>";

    }

}
?>