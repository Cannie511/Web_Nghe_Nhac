<?php
 
 
function ketNoi()
{
    
   
}
    
function loadMusic()
{
    $stt = 1;
    for ($i = $stt; $i <= 20; $i++) {
        $stt = $i;
        $data = array(
            array("stt" => $stt, "img" => "", "name" => "tên bài hát", "singer" => "Sơn Tùng M-TP, Mono", "date" => "1 tháng 1, 2023", "time" => "00:00")
        );

        foreach ($data as $key => $music) {
            echo "<tr>";
            echo "<td>";
            print_r($data[$key]['stt']);
            echo "<td>";
            echo "<div id='crop_img'><img src = 'IMAGE/apple-music-note.jpg'></div>";
            echo "</td>";
            echo "</td>";
            echo "<td>";
            print_r($data[$key]['name']);
            echo "</td>";
            echo "<td>";
            print_r($data[$key]['singer']);
            echo "</td>";
            echo "<td>";
            print_r($data[$key]['date']);
            echo "</td>";
            echo "<td>";
            print_r($data[$key]['time']);
            echo "</td>";
            echo "<td>";
            echo "<ion-icon name='trash'></ion-icon>";
            echo "</td>";
            echo "</tr>";
        }
    }
}
function loadPlaylist($imgPath, $n){
    $playlist = array(
        array("thumb"=> "","title"=> "Playlist song","artist"=> "Lyly, Sơn Tùng, Mono")
    );
    for ($i = 0; $i < $n; $i++) {
        foreach ($playlist as $key => $music) {
            echo "<div class='col view_item'>
            <div class='img_item'><img src='$imgPath'></div>
            <div class='info_item row'>
                <strong>".$playlist[$key]['title']."</strong>
                <h6>".$playlist[$key]['artist']."</h6>
            </div>
        </div>";
        }
    }
}
function loadUserAccount($n){
    require_once("DB/ketnoi.php");
    // $userAccount = array(
    //     array("Id" => "admin@trivieco.com", "pass"=>"Abc123@", "rule"=>2,"birth"=>"05/11/2002", "state"=>1),
    //     array("Id" => "Demo1@trivieco.com", "pass"=>"Abc123@", "rule"=>1, "birth"=>"25/08/2002", "state"=>0),
    //     array("Id" => "Demo2@trivieco.com", "pass"=>"Abc123@", "rule"=>0, "birth"=>"31/10/2002","state"=>0),
    //     array("Id" => "Demo3@trivieco.com", "pass"=>"Abc123@", "rule"=>0, "birth"=>"15/11/2002","state"=>1),
    // );

    $sql="select * from nguoi_dung ";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $userAccount = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($userAccount as $k => $v) {
            echo "<tr>
            <td>".$userAccount[$k]['Ma_ND']."</td>
            <td>".$userAccount[$k]['Ten_Dang_Nhap']."</td>
            <td><input type='password' id='pass' readonly value='".$userAccount[$k]['Mat_Khau']."'></td>
            <td>";
            if($userAccount[$k]['Phan_Quyen'] == 0){
                echo "Người dùng";
            }
            if($userAccount[$k]['Phan_Quyen'] == 1){
                echo "Nghệ sĩ";
            }
            if($userAccount[$k]['Phan_Quyen'] == 2){
                echo "Admin";
            } 
            echo "</td>
            <td>".$userAccount[$k]['Ngay_Sinh']."</td>
            <td>"; 
            echo "</td>
            <td><i class='fas fa-pen'></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-trash'></i></td>
          </tr>";
         
        }
    
}
?>