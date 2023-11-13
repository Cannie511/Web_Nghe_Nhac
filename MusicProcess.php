<?php
function loadMusic(){
    $stt = 1;
                for ($i = $stt; $i <= 10; $i++) {
                    $stt = $i;
                    $data = array(
                        array("stt" => $stt, "img" => "hình", "name" => "tên bài hát", "singer" => "Ca sĩ", "date" => "Ngày đăng", "time" => "thời lượng")
                    );

                    foreach ($data as $key => $music) {
                        echo "<div id = 'music_panel'>";
                        echo "<table id='list_mp3'>";
                        echo "<tr>";
                        echo "<td>";
                        print_r($data[$key]['stt']);
                        echo "</td>";
                        echo "<td>";
                        print_r($data[$key]['img']);
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
                        echo "</tr>";
                        echo "</table>";
                        echo "</div>";
                    } 
                }
}
?>