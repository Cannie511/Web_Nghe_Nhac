
<?php
$idPlaylist = isset($_GET['idPlaylist']) ? $_GET['idPlaylist'] : '';
$dataMusic = $idPlaylist;
echo $dataMusic;
function loadPlaylist()
{
    include("DB/ketnoi.php");
    $idUser = $_SESSION['Ma_ND'];
    $sql = "Select * from playlist WHERE playlist.Ma_ND != ' $idUser'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $playlist = $stm->fetchAll(PDO::FETCH_ASSOC);

    // $playlist = array(
    //     array("thumb"=> "","title"=> "Playlist song","artist"=> "Lyly, Sơn Tùng, Mono")
    // );
    foreach ($playlist as $key => $music) {
        echo "<div class='col view_item' id='" . $playlist[$key]['Ma_Playlist'] . "'>
            <div class='img_item'><img src='"; 
            if($playlist[$key]['bia']!=null){
               echo $playlist[$key]['bia'];
            } 
               else echo "IMAGE/playlist.jpg";
        echo "'></div>
            <div class='info_item row'>
                <strong>" . $playlist[$key]['Ten_playlist'] . "</strong>
               
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
        echo "<td><ion-icon name='play' data-music-link='" . $data[$key]['path'] . 
        "'data-img-link ='".$data[$key]['Anh_Bia']. "' data-title-link = '".$data[$key]['Ten_Bai_Hat']."' data-singer-link='".$data[$key]['Ten_Ca_Si']."' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'></ion-icon>&nbsp;<ion-icon name='heart' data-ma-bai-hat='" . $data[$key]['Ma_Bai_Hat'] . 
        "' onclick='addToFavorites(this)'></ion-icon></td>";
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
            <div class='img_item singer_img'><img src='";
            if($ngheSi[$key]['Anh_dai_dien']!=null){
                echo $ngheSi[$key]['Anh_dai_dien'] ;
             } 
                else echo "IMAGE/loadAnh.jpg";
             
        echo "'></div>
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


 function loadBXHTuan()
 {
     
     include("DB/ketnoi.php");
     $sql = "SELECT b.Ma_Bai_Hat, COUNT(*) AS SoLuotNghe,b.Anh_Bia,b.Thoi_Luong,b.Ngay_Phat_Hanh,ns.Ten_Ca_Si,b.Ten_Bai_Hat,b.path
     FROM luot_nghe l
     JOIN bai_hat b ON l.Ma_Bai_Hat = b.Ma_Bai_Hat
     JOIN trinhbay tb ON b.Ma_Bai_Hat = tb.Ma_Bai_Hat
     JOIN nghesi ns ON tb.Ma_NS = ns.Ma_NS
     WHERE l.Ngay_Nghe BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() 
     GROUP BY l.Ma_Bai_Hat LIMIT 10";
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
         print_r($data[$key]['SoLuotNghe']);
         echo "</td>";
         echo "<td><ion-icon name='play' data-music-link='" . $data[$key]['path'] . 
         "'data-img-link ='".$data[$key]['Anh_Bia']. "' data-title-link = '".$data[$key]['Ten_Bai_Hat']."' data-singer-link='".$data[$key]['Ten_Ca_Si']."' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'></ion-icon>&nbsp;<ion-icon name='heart' data-ma-bai-hat='" . $data[$key]['Ma_Bai_Hat'] . 
         "' onclick='addToFavorites(this)'></ion-icon></td>";
         echo "</tr>";
         $no++;
     }
 }
 
 function loadBXHThang()
 {
     
     include("DB/ketnoi.php");
     $sql = "SELECT b.Ma_Bai_Hat, COUNT(*) AS SoLuotNghe,b.Anh_Bia,b.Thoi_Luong,b.Ngay_Phat_Hanh,ns.Ten_Ca_Si,b.Ten_Bai_Hat,b.path
     FROM luot_nghe l
     JOIN bai_hat b ON l.Ma_Bai_Hat = b.Ma_Bai_Hat
     JOIN trinhbay tb ON b.Ma_Bai_Hat = tb.Ma_Bai_Hat
     JOIN nghesi ns ON tb.Ma_NS = ns.Ma_NS
     WHERE MONTH(l.Ngay_Nghe) = MONTH(CURDATE()) AND YEAR(l.Ngay_Nghe) = YEAR(CURDATE())  
     GROUP BY l.Ma_Bai_Hat LIMIT 10";
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
         print_r($data[$key]['SoLuotNghe']);
         echo "</td>";
         echo "<td><ion-icon name='play' data-music-link='" . $data[$key]['path'] . 
         "'data-img-link ='".$data[$key]['Anh_Bia']. "' data-title-link = '".$data[$key]['Ten_Bai_Hat']."' data-singer-link='".$data[$key]['Ten_Ca_Si']."' onclick='playMusic(this, " . $data[$key]['Ma_Bai_Hat'] . ")'></ion-icon>&nbsp;<ion-icon name='heart' data-ma-bai-hat='" . $data[$key]['Ma_Bai_Hat'] . 
         "' onclick='addToFavorites(this)'></ion-icon></td>";
         echo "</tr>";
         $no++;
     }
 }
 function loadPlaylistUser()
{
    $idUser = $_SESSION['Ma_ND'];
    include("DB/ketnoi.php");
    $sql = "SELECT * FROM playlist JOIN nguoi_dung on playlist.Ma_ND = nguoi_dung.Ma_ND And playlist.Ma_ND = '$idUser' ";
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
            </div>
        </div>";
    }
}
?>