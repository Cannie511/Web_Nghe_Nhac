<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Nghe Nhạc</title>
    <link rel="stylesheet" href="index.css">

</head>

<body>

    <div id="menu">
        <div id="navbar"></div>
        <h1><b id="logo_C">C</b><span>&</span><i id="logo_N">N</i> <span>Music</span></h1>
        <!-- <div id="option"></div>
                <div id="option"><ion-icon name="home-outline"></ion-icon><b>TRANG CHỦ</b></div>
                <div id="option"><ion-icon name="search-outline"></ion-icon><b>TÌM KIẾM</b></div>
                <div id="option"><ion-icon name="list-outline"></ion-icon><b>DANH SÁCH PHÁT</b></div>
                <div id="option"><ion-icon name="reorder-four-outline"></ion-icon><b>BẢNG XẾP HẠNG</b></div>
                <div id="option"><ion-icon name="heart-outline"></ion-icon><b>YÊU THÍCH</b></div>
                <div id="option"><ion-icon name="settings-outline"></ion-icon><b>CÀI ĐẶT</b></div>
                <div id="option"><ion-icon name="diamond-outline"></ion-icon><b>PREMIUM</b></div>
            </div> -->
        <ul>
            <li><ion-icon name="home-outline"></ion-icon><a href="">TRANG CHỦ</a></li>
            <li><ion-icon name="search-outline"></ion-icon><a href="">TÌM KIẾM</a></li>
            <li><ion-icon name="list-outline"></ion-icon><a href="">DANH SÁCH PHÁT</a></li>
            <li><ion-icon name="reorder-four-outline"></ion-icon><a href="">BẢNG XẾP HẠNG</a></li>
            <li><ion-icon name="heart-outline"></ion-icon><a href="">YÊU THÍCH</a></li>
            <li><ion-icon name="settings-outline"></ion-icon><a href="">CÀI ĐẶT</a></li>
            <li><ion-icon name="diamond-outline"></ion-icon><a href="">PREMIUM</a></li>
        </ul>
    </div>
    <div id="main_play">
        <div id="personal" onmouseup='showMore()' onmouseleave="setTimeout('hideMore(),1500')">
            <ion-icon id="ic_per" name="person-circle-outline"></ion-icon>
            <div id="more">
                <div onclick="log_in()"><ion-icon name="person"></ion-icon><span>Đăng nhập</span></div>
                <div><ion-icon name="settings-sharp"></ion-icon><span>Cài đặt</span></div>
                <div>
                    <div id="switch">
                        <div id="scroll"></div>
                    </div><span>Nền tối</span>
                </div>
            </div>
        </div>
        <div id="search">
            <ion-icon name="chevron-back-circle" style="margin-left: 10px;"></ion-icon>
            <span>
                <ion-icon name="search-outline"></ion-icon>
                <input type="text" placeholder="Bạn muốn nghe gì ?">
            </span>
        </div>
        <div id="music_list">
            <table id="list_mp3">
                <?php
                echo "<tr>";
                $stt = 1;
                for ($i = $stt; $i <= 20; $i++) {
                    $stt = $i;
                    $data = array(
                        array("stt" => $stt, "img" => "hình", "name" => "tên bài hát", "singer" => "Ca sĩ", "date" => "Ngày đăng", "time" => "thời lượng")
                    );

                    foreach ($data as $key => $music) {
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
                    }
                    echo "</tr>";
                }

                ?>
            </table>
        </div>
    </div>
    <div id="play">
        <div id="btn">
            <ion-icon name="shuffle"></ion-icon>
            <ion-icon name="play-skip-back-circle"></ion-icon>
            <ion-icon id="play_btn" name="play-circle" onclick="play()"></ion-icon>
            <ion-icon id="pause_btn" name="pause-circle" onclick="pause()"></ion-icon>
            <ion-icon name="play-skip-forward-circle"></ion-icon>
            <ion-icon name="refresh"></ion-icon>
        </div>

        <div id="time_play">
            <span>-:-</span><input type="range"> <span>00:00</span>
        </div>
    </div>
</body>
<script src="index.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</html>