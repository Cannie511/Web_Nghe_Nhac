<?php
function loadMusic()
{
    $stt = 1;
    for ($i = $stt; $i <= 20; $i++) {
        $stt = $i;
        $data = array(
            array("stt" => $stt, "img" => "", "name" => "tên bài hát", "singer" => "Nguyễn Văn A", "date" => "1 tháng 1, 2023", "time" => "00:00")
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

function showBtn(){
  
}
?>