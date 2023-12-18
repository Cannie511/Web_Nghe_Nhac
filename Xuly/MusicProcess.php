
<?php
$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';
$dataMusic = $idPlaylist;
echo $dataMusic;
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
function getAllMusic(){
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM bai_hat JOIN trinhbay JOIN nghesi ON bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat 
    and  trinhbay.Ma_NS = nghesi.Ma_NS ORDER BY Ngay_Phat_Hanh DESC";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    $no = 1;
    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link=''>";
        echo "<td><ion-icon name='play'  
        data-music-link='" . $data[$key]['path'] . 
        "'data-img-link ='".$data[$key]['Anh_Bia']. "' data-title-link = '".$data[$key]['Ten_Bai_Hat']."' data-singer-link='".$data[$key]['Ten_Ca_Si']."' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'>
        </ion-icon></td>";
        echo "</td>";
        echo "<td>";
        print_r("#".$no);
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
        echo "</tr>";
        $no++;
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
    $no = 1;
    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link='" . $data[$key]['path'] . "'>";
        echo "<td>";
        print_r("#".$no);
        echo "</td>";
        echo "<td data-img-link ='".$data[$key]['Anh_Bia']."'>";
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
        print_r(intval($data[$key]['Thoi_Luong']/60).":".($data[$key]['Thoi_Luong']%60));
        echo "</td>";
        echo "<td>";
        print_r($data[$key]['Luot_nghe']);
        echo "</td>";
        echo "<td><ion-icon name='play'  
        data-music-link='" . $data[$key]['path'] . 
        "'data-img-link ='".$data[$key]['Anh_Bia']. "' data-title-link = '".$data[$key]['Ten_Bai_Hat']."' data-singer-link='".$data[$key]['Ten_Ca_Si']."' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'>
        </ion-icon>&nbsp;<ion-icon name='heart'></ion-icon></td>";
        echo "</tr>";
        $no++;
    }
}
function loadUserAccount()
{
    require_once("../DB/ketnoi.php");
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

function loadThinhHanh()
 {
    include("DB/ketnoi.php");
    $sql = "SELECT playlist.bia,playlist.Ten_playlist, nghesi.Ten_Ca_Si, 
    playlist.Ma_Playlist, SUM(bai_hat.Luot_nghe) AS TongLuotNghe
    FROM playlist
    JOIN thuoc ON playlist.Ma_Playlist = thuoc.Ma_Playlist
    JOIN bai_hat ON thuoc.Ma_Bai_Hat = bai_hat.Ma_Bai_Hat
    join trinhbay ON bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat
    join nghesi ON trinhbay.Ma_NS =nghesi.Ma_NS
    GROUP BY playlist.Ma_Playlist
    ORDER BY TongLuotNghe DESC LIMIT 5;";
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
 
//  hien nghệ sĩ
 function loadNgheSi()
 {
    include("DB/ketnoi.php");
    $sql = "select * from nghesi join nguoi_dung 
    on nghesi.Ma_ND = nguoi_dung.Ma_ND";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $ngheSi = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($ngheSi as $key => $music) {
        echo "<div class='col view_item' class='view_NS'  id='" .$ngheSi[$key]['Ma_NS'] . "'>
            <div class='img_item singer_img'><img src='" . $ngheSi[$key]['Anh_dai_dien'] . "'></div>
            <div class='info_item row'>
                <h5>" . $ngheSi[$key]['Ten_Ca_Si'] . "</h5>
            </div>
        </div>";
    }
 }

//  hien Bai hat cua ns
 function loadNhacNgheSi()
 {
    include("DB/ketnoi.php");
    $sql = "Select * from nghesi join trinhbay join bai_hat  on nghesi.Ma_NS = trinhbay.Ma_NS AND bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat 
    and nghesi.Ma_NS = ? ";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link='" . $data[$key]['path'] . "' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'>";
        echo "<td><ion-icon name='play'></ion-icon></td>";
        echo "<td>";
        print_r("#".$data[$key]['Ma_Bai_Hat']);
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
        print_r(intval($data[$key]['Thoi_Luong']/60).":".($data[$key]['Thoi_Luong']%60));
        echo "</td>";
        echo "<td>";
        echo "";
        echo "</td>";
        echo "</tr>";
    }
 }
 // nhạc mới
 function loadNhacMoi()
 {
    include("DB/ketnoi.php");
      $sql = "SELECT * FROM bai_hat JOIN nghesi join trinhbay on trinhbay.Ma_NS = nghesi.Ma_NS and bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat
      ORDER BY bai_hat.Ngay_Phat_Hanh DESC";
      $stm = $conn->prepare($sql);
      $stm->execute();
      $data = $stm->fetchAll(PDO::FETCH_ASSOC);

      foreach ($data as $key => $music) {
        echo "<div class='col view_item' id='" . $data[$key]['Ma_Bai_Hat'] . "' data-music-path='" . $data[$key]['path'] . "'>
            <div class='img_item'><img src='" . $data[$key]['Anh_Bia'] . "'></div>
            <div class='info_item row'>
                <strong>" . $data[$key]['Ten_Bai_Hat'] . "</strong>
                <h6>" . $data[$key]['Ten_Ca_Si'] . "</h6>
            </div>
        </div>";
    }
 }
 function loadYeuThich()
 {
    include("DB/ketnoi.php");
    $user = $_SESSION['Ma_ND'];
    $sql = "SELECT * FROM bai_hat JOIN trinhbay join nghesi JOIN yeu_thich JOIN nguoi_dung ON bai_hat.Ma_Bai_Hat = trinhbay.Ma_Bai_Hat AND trinhbay.Ma_NS = nghesi.Ma_NS AND bai_hat.Ma_Bai_Hat = yeu_thich.Ma_Bai_Hat 
    and yeu_thich.Ma_ND = nguoi_dung.Ma_ND and nguoi_dung.Ma_ND = ' $user'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $key => $music) {
        echo "<tr class='music-row' data-music-link='" . $data[$key]['path'] . "' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'>";
        echo "<td><ion-icon name='play'></ion-icon></td>";
        echo "<td>";
        print_r("#".$data[$key]['Ma_Bai_Hat']);
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
        print_r(intval($data[$key]['Thoi_Luong']/60).":".($data[$key]['Thoi_Luong']%60));
        echo "</td>";
        echo "<td>";
        echo "<ion-icon name='trash'></ion-icon>";
        echo "</td>";
        echo "</tr>";
    }
 }
?>