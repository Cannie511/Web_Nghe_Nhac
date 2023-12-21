<?php
session_start();
if (isset($_SESSION['Ma_ND'])) {
    session_destroy();
}
include "Xuly/MusicProcess.php";
?>



<?php

if (isset($_POST['doiMK'])) {
    doiMK($_POST['old_pass_user'], $_POST['new_pass_user'], $_POST['retype_pass_user'], $_SESSION['Ma_ND']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="IMAGE/T.png" />
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>TriVie Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="style/index.css">

</head>

<body>
    <div class="noti">
        <div class="alert alert-success allAlert" id="alert-success" role="alert">
            <ion-icon name="checkmark"></ion-icon>&nbsp;&nbsp;
            Tạo mới thành công!
        </div>
        <div class="alert alert-danger allAlert" id="alert-warning" role="alert">
            <ion-icon name="warning"></ion-icon>&nbsp;&nbsp;
            Tạo thất bại - vui lòng thử lại
        </div>
        <div class="alert alert-danger allAlert" id="alert-login" role="alert">
            <ion-icon name="warning"></ion-icon>&nbsp;&nbsp;
            Vui lòng <a href="log-in.php">Đăng nhập</a> để thực hiện chức năng
        </div>

    </div>
    <div class="container-fluid">
        <div class="">
            <div id="menu">
                <div id="logo" class="col-xl-12">
                    <h1>
                        <strong id="logo_T" class="col">T</strong>
                        <h1 id="logo_ri">ri</h1>&nbsp<strong id="logo_V">V</strong>
                        <h1 id="logo_ie">ie</h1>
                    </h1>
                </div>
                <div id="menu_cover">
                    <div class="index init" data-bs-toggle="tooltip" data-bs-placement="top" title="Trang chủ"
                        id="home">
                        <ion-icon name="home-outline"></ion-icon><span>TRANG CHỦ</span>
                    </div>
                    <div class="index " id="timkiem">
                        <ion-icon name="search-outline"></ion-icon>
                        <span>TÌM KIẾM</span>
                    </div>
                    <div class="index " id="bxh"><ion-icon name="bar-chart-outline"></ion-icon><span>BẢNG
                            XẾP HẠNG</span>
                    </div>
                </div>
                <div id="navbar">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------ADVANCED LIST---------------------------------------------- -->
        <div class="col-sm-7">
            <div id="main_play">
                <!-- ----------------------------------MENU FIXED------------------------------------------ -->
                <div id="topMenu">
                    <div id="personal" onmouseup='showMore()' onmouseleave="setTimeout('hideMore(),1500')">
                        <ion-icon id="ic_per" name="person-circle-sharp"></ion-icon>
                        <div id="more">
                            <div onclick="Register()">
                                <ion-icon name="link-outline"></ion-icon><span>Đăng
                                    ký</span>
                            </div>
                            <div onclick="log_in()">
                                <ion-icon name="person"></ion-icon><span>Đăng nhập</span>
                            </div>
                            <!-- <div>
                                <ion-icon name="settings-sharp"></ion-icon><span>Cài đặt</span>
                            </div> -->
                            <!-- <div>
                                <div id="switch">
                                    <div id="scroll"></div>
                                </div><span>Nền tối</span>
                            </div> -->
                        </div>
                    </div>
                    <div id="search" class="col-sm-4">
                        <ion-icon name="chevron-back-circle" style="margin-left: 10px;" id="backTab"></ion-icon>
                        <form action="" id="searchForm" method="get">
                            <div>
                                <ion-icon name="search-outline"></ion-icon>
                                <input type="text" placeholder="Bạn muốn nghe gì ?" id="search_input" name="search"
                                    class="col-sm-4">
                                <button type="submit" class="btn btn-secondary"
                                    style="border-radius: 50%; width: 45px; height: 45px; margin-left: 5px; display: none"><ion-icon
                                        name="search-outline"></ion-icon>
                                </button>
                            </div>
                        </form>

                    </div>

                </div>
                <?php
                include_once "view/view_trangChu.php";
                include_once "view/view_timKiem.php";
                include_once "view/view_BXH.php";
                ?>
                <!-- -----------------------------------------------------YÊU THÍCH------------------------------------------ -->

            </div>
        </div>
        <!-- -----------------------------------------------HIỆN NÚT BẤM NGHE--------------------------------------------- -->
        <div id="play">
            <div id="music_play_info">
                <img src="IMAGE/s960_music-Streaming.jpg" alt="" id="music_play_banner">

                <div id="music_play_title">
                    <Strong id="title">Bài Hát</Strong>
                    <h6 id="singer"></h6>
                </div>
            </div>
            <div id="info_music"></div>
            <div id="btn">
                <!-- <ion-icon name="shuffle"></ion-icon> -->
                <ion-icon name="play-skip-back-circle" id="prevButton"></ion-icon>
                <ion-icon id="play_btn" name="play-circle" onclick="play()"></ion-icon>
                <ion-icon id="pause_btn" name="pause-circle" onclick="pause()"></ion-icon>
                <ion-icon name="play-skip-forward-circle" id="nextButton"></ion-icon>
                <!-- <ion-icon name="refresh" id="loopBtn" onclick="Loop()"></ion-icon> -->
            </div>
            <div id="time_play">
                <span id="start-time">00:00</span>
                <input type="range" id="timeline" min="0" value="0" step="0.5">
                <span id="end-time">00:00</span>
            </div>
        </div>
        <audio controls style='opacity:0' id='music' onplay="showStopButton()" onpause="showPlayButton()">
            <source
                src="https://vnso-zn-5-tf-a128-zmp3.zmdcdn.me/966012e4e868f2efc96237dedc1145af?authen=exp=1702723501~acl=/966012e4e868f2efc96237dedc1145af/*~hmac=56bbcbb0ff47336e4a4ffebcbeb9bc7c" />
        </audio>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="index.js"></script>

</html>