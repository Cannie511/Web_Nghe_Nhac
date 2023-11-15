<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Nghe Nhạc</title>
    <link rel="stylesheet" href="index.css">

</head>
<?php include "MusicProcess.php" ?>
<body>

    <div id="menu">
        
        <div id = "logo">
            <h1>
                <strong id = "logo_T">T</strong>
                <h1 id = "logo_ri">ri</h1>&nbsp<strong id = "logo_V">V</strong>
                <h1 id = "logo_ie">ie</h1>
            </h1>
        </div>
        <ul>
            <li><ion-icon name="home-outline"></ion-icon><a href="" id = "title_menu">TRANG CHỦ</a></li>
            <li><ion-icon name="search-outline"></ion-icon><a href="" id = "title_menu">TÌM KIẾM</a></li>
            <li><ion-icon name="list-outline"></ion-icon><a href="" id = "title_menu">DANH SÁCH PHÁT</a></li>
            <li><ion-icon name="reorder-four-outline"></ion-icon><a href="" id = "title_menu">BẢNG XẾP HẠNG</a></li>
            <li><ion-icon name="heart-outline"></ion-icon><a href="" id = "title_menu">YÊU THÍCH</a></li>
            <li><ion-icon name="settings-outline"></ion-icon><a href="" id = "title_menu">CÀI ĐẶT</a></li>
            <li><ion-icon name="diamond-outline"></ion-icon><a href="" id = "title_menu">PREMIUM</a></li>
        </ul>
        <div id="navbar"><ion-icon name="chevron-back-outline"></ion-icon></div>
    </div>
    <div id="main_play">
        <div id="personal" onmouseup='showMore()' onmouseleave="setTimeout('hideMore(),1500')">
            <ion-icon id="ic_per" name="person-circle-outline" id = "nav_rotate"></ion-icon>
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
            <form action="" method="get">
            <span>
                <ion-icon name="search-outline"></ion-icon>
                <input type="text" placeholder="Bạn muốn nghe gì ?">
            </span>
            </form>
        </div>
        
        <div id="music_list">
            <div id = "title_music"><h1>Danh sách phát</h1></div>
            <div id = 'music_panel'>
                <table  id='list_mp3'>
                    <tr>
                        <th>STT</th>
                        <th>hình</th>
                        <th>Tiêu đề</th>
                        <th>Tác giả, Ca sĩ</th>
                        <th>Ngày phát hành</th>
                        <th>Thời lượng</th>
                    </tr>
                    <tr>
                    <td colspan = "7"><hr></td>
                    </tr>
                    
                    <?php loadMusic()?>
                </table>   
            </div>
            
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