<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../IMAGE/logoWeb.png" />
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>TriVie Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>
<?php include "MusicProcess.php" ?>

<body>
    <div class="container-fluid">

        <div class="col-sm-4">
            <div id="menu">

                <div id="logo" class="col-xl-12">
                    <h1>
                        <strong id="logo_T" class="col">T</strong>
                        <h1 id="logo_ri">ri</h1>&nbsp<strong id="logo_V">V</strong>
                        <h1 id="logo_ie">ie</h1>
                    </h1>
                </div>
                <div id="menu_cover">
                    <div class="col-md-4 menu_item init" id="home"><ion-icon name="home-outline"></ion-icon><span>TRANG
                            CHỦ</span></div>
                    <div class="col-md-4 menu_item" id="timkiem"><ion-icon name="search-outline"></ion-icon><span>TÌM
                            KIẾM</span></div>
                    <div class="col-md-4 menu_item" id="dsphat"><ion-icon name="list-outline">
                            </ion-icon><span>DANH SÁCH PHÁT</span></div>
                    <div class="col-md-4 menu_item" id="bxh"><ion-icon name="bar-chart-outline"></ion-icon><span>BẢNG XẾP
                            HẠNG</span>
                    </div>
                    <div class="col-md-4 menu_item" id="yeu thich"><ion-icon name="heart-outline"></ion-icon><span>YÊU
                            THÍCH</span></div>
                    <div class="col-md-4 menu_item" id="caidat"><ion-icon name="settings-outline"></ion-icon><span>CÀI
                            ĐẶT</span></div>
                </div>
                <div id="navbar"><ion-icon name="chevron-back-outline"></ion-icon></div>
            </div>
        </div>
        <div class="col-sm-7">
            <div id="main_play">
                <!-- ----------------------------------MENU FIXED------------------------------------------ -->
                <div id="topMenu">
                    <div id="personal" onmouseup='showMore()' onmouseleave="setTimeout('hideMore(),1500')">
                        <ion-icon id="ic_per" name="person-circle-sharp"></ion-icon>
                        <div id="more">
                            <div onclick="Edit()"><ion-icon name="key-outline"></ion-icon><span>Tài khoản</span></div>
                            <div onclick="log_in()"><ion-icon name="person"></ion-icon><span>Đăng nhập</span></div>
                            <div><ion-icon name="settings-sharp"></ion-icon><span>Cài đặt</span></div>
                            <div>
                                <div id="switch">
                                    <div id="scroll"></div>
                                </div><span>Nền tối</span>
                            </div>
                        </div>
                    </div>
                    <div id="search" class="col-sm-4">
                        <ion-icon name="chevron-back-circle" style="margin-left: 10px;" id = "backTab"></ion-icon>
                        <form action="" method="get">
                            <div>
                                <ion-icon name="search-outline" ></ion-icon>
                                <input type="text" placeholder="Bạn muốn nghe gì ?" id="search_input" class="col-sm-4">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- -----------------------------------CAN CHANGED------------------------------------------ -->

                <div id="music_list" class="layout">
                    <div id="banner_play_list">
                        <img src="IMAGE/Hay-Trao-Cho-Anh-3.jpg" alt="">
                        <div id="play_list_info">
                            <strong style="font-size: 110%;">playlist</strong><br>
                            <strong style="font-size: 300%;">SƠN TÙNG M-TP Radio</strong>
                            <br>
                            <strong style="font-size: 120%";>20 Bài hát <ion-icon name="musical-notes-outline"></ion-icon>: Có chắc yêu là đây,
                                There's no one at all, Em của ngày hôm qua,...</strong>
                        </div>
                    </div>
                    <div id="title_music">
                        <ion-icon name="play-circle-sharp"></ion-icon>
                        <ion-icon name="heart-outline"></ion-icon>
                        <strong
                            style="margin-left: 20px; font-family: Georgia, 'Times New Roman', Times, serif;">...</strong>
                    </div>
                    <div id='music_panel'>
                        <table id='list_mp3'>
                            <tr>
                                <th>STT</th>
                                <th>hình</th>
                                <th>Tiêu đề</th>
                                <th>Tác giả, Ca sĩ</th>
                                <th>Ngày phát hành</th>
                                <th>Thời lượng</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <hr>
                                </td>
                            </tr>
                            <?php loadMusic() ?>
                        </table>
                    </div>
                </div>

                <!-- -------------------------------------THẺ PLAYLISTS------------------------------------------------- -->
                <?php $path = './IMAGE/album_demo.png' ?>
                <div id="playlist" class="col-md-5 layout show">
                    <div class="title_pl">
                        <h1>THỊNH HÀNH</h1>
                    </div>
                    <div id="popular" class="list_item">
                        <?php loadPlaylist($path, 3) ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>CHỦ ĐỀ MỚI</h1>
                    </div>
                    <div id="theme" class="list_item">
                        <?php loadPlaylist($path, 6) ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>NỔI BẬT</h1>
                    </div>
                    <div id="hot_album" class="list_item">
                        <?php loadPlaylist($path, 2) ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>NGHỆ SĨ</h1>
                    </div>
                    <div id="artis" class="list_item">
                        <?php loadPlaylist($path, 10) ?>
                    </div>
                </div>
                <!-- ---------------------------------------DANH SÁCH PHÁT CỦA TÔI---------------------------------------------------- -->
                <?php $pathPL = './IMAGE/pathPL.png' ?>
                <div id="myPL" class="layout">
                    <div class="title_pl">
                        <h1>DANH SÁCH CỦA TÔI</h1>
                    </div>
                    <div id="popular" class="list_item">
                        <?php loadPlaylist($pathPL, 10) ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>GẦN ĐÂY</h1>
                    </div>
                    <div id="theme" class="list_item">
                        <?php loadPlaylist($pathPL, 3) ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>GỢI Ý</h1>
                    </div>
                    <div id="hot_album" class="list_item">
                        <?php loadPlaylist($pathPL, 5) ?>
                    </div>
                    <br>
                </div>
                <!-- -----------------------------------------BẢNG XẾP HẠNG----------------------------------------- -->
                <div id="Ranked" class="layout">
                    <div id="banner_play_list_BXH">
                        <img src="IMAGE/bannerBXH.png" alt="">
                        <div id="play_list_info">
                            <strong style="font-size: 110%;">Bảng Xếp Hạng</strong><br>
                            <strong style="font-size: 300%;">V-POP INDIE Việt</strong>
                            <br>
                            <strong style="font-size: 120%;">50 Bài hát <ion-icon name="musical-notes-outline"></ion-icon>: Không thể say, Nấu ăn
                                cho em, That's way, GODs,...</strong>
                        </div>
                    </div>
                    <div id="title_music">
                        <ion-icon name="play-circle-sharp"></ion-icon>
                        <ion-icon name="heart-outline"></ion-icon>
                        <strong
                            style="margin-left: 20px; font-family: Georgia, 'Times New Roman', Times, serif;">...</strong>
                    </div>
                    <div id='music_panel'>
                        <table id='list_mp3'>
                            <tr>
                                <th>STT</th>
                                <th>hình</th>
                                <th>Tiêu đề</th>
                                <th>Tác giả, Ca sĩ</th>
                                <th>Ngày phát hành</th>
                                <th>Thời lượng</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <hr>
                                </td>
                            </tr>
                            <?php loadMusic() ?>
                        </table>
                    </div>
                </div>
                <!-- -----------------------------------------------------YÊU THÍCH------------------------------------------ -->
                <div id="LoveIt" class="layout">
                    <div id="banner_play_list_LoveIt">
                        <img src="IMAGE/LoveThumb.png" alt="">
                        <div id="play_list_info">
                            <strong style="font-size: 110%;">Playlist</strong><br>
                            <strong style="font-size: 300%;"> PLAYLIST YÊU THÍCH CỦA TÔI</strong>
                            <br>
                            <strong style="font-size: 120%;">13 Bài hát <ion-icon name="musical-notes-outline"></ion-icon>:Cắt đôi nỗi sầu, Trời hôm nay nhiều mây cực,...</strong>
                        </div>
                    </div>
                    <div id="title_music">
                        <ion-icon name="play-circle-sharp"></ion-icon>
                        <ion-icon name="heart-outline"></ion-icon>
                        <strong
                            style="margin-left: 20px; font-family: Georgia, 'Times New Roman', Times, serif;">...</strong>
                    </div>
                    <div id='music_panel'>
                        <table id='list_mp3'>
                            <tr>
                                <th>STT</th>
                                <th>hình</th>
                                <th>Tiêu đề</th>
                                <th>Tác giả, Ca sĩ</th>
                                <th>Ngày phát hành</th>
                                <th>Thời lượng</th>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <hr>
                                </td>
                            </tr>
                            <?php loadMusic() ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -----------------------------------------------HIỆN NÚT BẤM NGHE--------------------------------------------- -->
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
    </div>
</body>
<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script>
    $(document).ready(function () {
        var backBtn = 0
        $('#main_play').scroll(function () {
            if ($(this).scrollTop() >= 200) {
                $('#topMenu').css('background-color', 'var(--primary-color-custom)');
                $('#topMenu').css('box-shadow', '1px 2px 5px black');
                $('#personal').css('color', 'black');
            }
            else {
                $('#topMenu').css('background-color', 'transparent');
                $('#personal').css('color', 'white');
                $('#topMenu').css('box-shadow', '0 0 0 white');
            }
        });
        $('.menu_item').click(function () {
            $('#main_play').animate({
                scrollTop: 0
            }, 400);
            return false;
        })
        $('.menu_item').click(function (event) {
            index = $(this).index();
            backBtn = index;
            $('.menu_item').removeClass('init');
            $(this).addClass('init');
            switch (index) {
                case 0:
                    $('.layout.show').removeClass('show');
                    $('#playlist').addClass('show');
                    break;
                case 1:
                    var searchinput = document.getElementById('search_input');
                    searchinput.focus();
                    break;
                case 2:
                    $('.layout.show').removeClass('show');
                    $('#myPL').addClass('show');
                    break;
                case 3:
                    $('.layout.show').removeClass('show');
                    $('#Ranked').addClass('show');
                    break;
                case 4:
                    $('.layout.show').removeClass('show');
                    $('#LoveIt').addClass('show');
                    break;
                case 5:
                    break;
                    break;
                default:
                    break;
            }
            
        });
       $('.view_item').click(function(){
            $('.layout.show').removeClass('show');
            $('#music_list').addClass('show');
       });
       $('#backTab').click(function(){
                switch (backBtn) {
                        case 0:
                            $('.layout.show').removeClass('show');
                            $('#playlist').addClass('show');
                            break;
                        case 1:
                            var searchinput = document.getElementById('search_input');
                            searchinput.focus();
                            break;
                        case 2:
                            $('.layout.show').removeClass('show');
                            $('#myPL').addClass('show');
                            break;
                        case 3:
                            $('.layout.show').removeClass('show');
                            $('#Ranked').addClass('show');
                            break;
                        case 4:
                            $('.layout.show').removeClass('show');
                            $('#LoveIt').addClass('show');
                            break;
                        case 5:
                            break;
                        default:
                            break;
                }
             })
       

    })
</script>
<script>

</script>

</html>