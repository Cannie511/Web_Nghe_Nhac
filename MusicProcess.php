<?php
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
    for ($i = 0; $i <= $n; $i++) {
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
?>