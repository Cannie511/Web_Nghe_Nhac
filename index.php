<?php
session_start();
if (isset($_SESSION['Ma_ND'])) {
    // echo $_SESSION['Ma_ND'];
}
include "Xuly/MusicProcess.php";
include('Xuly/NewPlaylist.php');
include('Xuly/doiMK.php');
// Xử lý khi form được submit
if (isset($_POST['TaoMoi'])) {
    // Gọi hàm khi cần thiết
    TaoMoiPlaylist($_POST['TenPlayL'], $_SESSION['Ma_ND']);
}
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="style/index.css">

</head>
<?php  ?>

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
                    <div class="menu_item init" data-bs-toggle="tooltip" data-bs-placement="top" title="Trang chủ"
                        id="home">
                        <ion-icon name="home-outline"></ion-icon><span>TRANG CHỦ</span>
                    </div>
                    <div class="menu_item" id="timkiem">
                        <ion-icon name="search-outline"></ion-icon>
                        <span>TÌM KIẾM</span>
                    </div>
                    <div class="menu_item" id="dsphat" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <ion-icon name="list-outline">
                        </ion-icon><span>DANH SÁCH PHÁT</span>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <!-- data-bs-target="#exampleModal" -->
                        <div class="col-md-4 menu_item" id="newPlaylist" data-bs-toggle="modal" data-bs-whatever="@mdo"
                            data-bs-target="#exampleModal">
                            <ion-icon name="add"></ion-icon><span>Tạo mới</span>
                        </div>
                    </div>

                    <div class="col-md-4 menu_item" id="bxh"><ion-icon name="bar-chart-outline"></ion-icon><span>BẢNG
                            XẾP HẠNG</span>
                    </div>
                    <div class="col-md-4 menu_item" id="yeu thich"><ion-icon name="heart-outline"></ion-icon><span>YÊU
                            THÍCH</span></div>
                    <div class="menu_item" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true"
                        aria-controls="collapseOne1">
                        <ion-icon name="settings"></ion-icon><span>CÀI ĐẶT</span>
                    </div>
                    <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <!-- data-bs-target="#ModalChangePass" -->
                        <div class="col-md-4 menu_item" id="btnChangePass" data-bs-toggle="modal"
                            data-bs-target="#ModalChangePass">
                            <ion-icon name="lock-closed"></ion-icon><span>Đổi mật khẩu</span>
                        </div>
                    </div>

                </div>
                <div id="navbar">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------------GIAO DIỆN TẠO MỚI-------------------------------------------------- -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" style= "color: black;" id="exampleModalLabel">Danh Sách Mới</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="index.php">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label" style= "color: black;">Tên Danh Sách:</label>
                                <input type="text" class="form-control" id="recipient-name" name="TenPlayL">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" style= "color: black;" class="col-form-label">Mô tả:</label>
                                <textarea class="form-control" id="message-text" name="MoTa"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button id="btnConfirm" type="Submit" class="btnAll primary" name="TaoMoi">Tạo
                                    mới</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- --------------------------------------------------GIAO DIỆN ĐỔI MK-------------------------------------------------- -->
        <div class="modal fade " id="ModalChangePass" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style= "color: black;">Đổi mật khẩu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="old-pass" name="pass_user"
                                    placeholder="Mật khẩu cũ">
                                <label for="floatingPassword" style= "color: black;">Mật khẩu cũ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="new-pass" name="pass_user"
                                    placeholder="Mật khẩu mới">
                                <label for="floatingPassword" style= "color: black;">Mật khẩu mới</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="retype-new-pass" name="retype_pass_user"
                                    placeholder="Nhập lại mật khẩu mới">
                                <label for="floatingPassword" style= "color: black;">Nhập lại mật khẩu mới</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btnCancel"
                                    data-bs-dismiss="modal">Hủy</button>
                                <input type="submit" class="btnAll primary" id='btnPassConfirm' value="Đổi mật khẩu">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- --------------------------------------------ADVANCED LIST---------------------------------------------- -->

        <!-- --------------------------------------------ADVANCED LIST---------------------------------------------- -->
        <div class="col-sm-7">
            <div id="main_play">
                <!-- ----------------------------------MENU FIXED------------------------------------------ -->
                <div id="topMenu">
                    <div id="personal" onmouseup='showMore()' onmouseleave="setTimeout('hideMore(),1500')">
                        <ion-icon id="ic_per" name="person-circle-sharp"></ion-icon>
                        <div id="more">
                            <div onclick="Edit()">
                                <ion-icon name="key-outline"></ion-icon><span>Tài khoản</span>
                            </div>
                            <div onclick="Register()">
                                <ion-icon name="log-in-outline"></ion-icon><span>Đăng
                                    ký</span>
                            </div>
                            <div onclick="log_in()">
                                <ion-icon name="person"></ion-icon><span>Đăng nhập</span>
                            </div>
                            <div>
                                <ion-icon name="settings-sharp"></ion-icon><span>Cài đặt</span>
                            </div>
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
                <!-- -----------------------------------CAN CHANGED------------------------------------------ -->

                <div id="music_list" class="layout">
                    <div id="banner_play_list">
                        <img src="IMAGE/Hay-Trao-Cho-Anh-3.jpg" alt="">
                        <div id="play_list_info">
                            <strong style="font-size: 110%;">playlist</strong><br>
                            <strong style="font-size: 300%;">PLAYLIST của tôi</strong>
                            <br>
                        </div>
                    </div>
                    <div id="title_music">
                        <div class="cover">
                            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
                            <strong>Play</strong>
                        </div>
                        
                        <!-- <ion-icon name="heart-outline"></ion-icon> -->
                    </div>
                    <div id='music_panel'>
                        <table class="table table-dark table-hover list">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Tác giả, ca sĩ</th>
                                    <th scope="col">Ngày phát hành</th>
                                    <th scope="col">Thời lượng</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id='result'>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- -------------------------------------THẺ PLAYLISTS------------------------------------------------- -->
                <?php $path = './IMAGE/album_demo.png' ?>
                <div id="playlist" class="col-md-5 layout show">
                    <div class="title_pl">
                        <h1>TẤT CẢ PLAYLIST HIỆN CÓ</h1>
                    </div>
                    <div id="1" class="list_item">
                        <?php loadPlaylist();
                        ?>
                    </div>
                </div>
                <!-- -------------------------------------THẺ TÌM KIẾM------------------------------------------------- -->
                <div id="searchModal" class="layout">
                    <h1 id='searchKeys' style = 'color:white'>&nbsp;&nbsp;&nbsp;&nbsp;Kết Quả Tìm Kiếm:</h1><br>
                    <div id='music_panel'>
                        <table class="table table-dark table-hover list">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Tác giả, ca sĩ</th>
                                    <th scope="col">Ngày phát hành</th>
                                    <th scope="col">Thời lượng</th>

                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                <script>
                                    document.getElementById('searchForm').addEventListener('submit', function (e) {
                                        e.preventDefault();
                                        $(".layout.show").removeClass("show");
                                        $("#searchModal").addClass("show");
                                        var searchInput = document.getElementById('search_input').value;
                                        var showKeys = document.getElementById('searchKeys');
                                        showKeys.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;Kết Quả Tìm Kiếm: "' + searchInput + '"';
                                        searchWithAjax(searchInput);
                                    });

                                    function searchWithAjax(searchTerm) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState == 4 && xhr.status == 200) {
                                                // Xử lý kết quả từ PHP
                                                document.getElementById('searchResults').innerHTML = xhr.responseText;
                                            }
                                        };
                                        xhr.open('GET', 'timkiem.php?search=' + searchTerm, true);
                                        xhr.send();
                                    }
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ---------------------------------------DANH SÁCH PHÁT CỦA TÔI---------------------------------------------------- -->
                <?php $pathPL = './IMAGE/pathPL.png' ?>
                <div id="myPL" class="layout">
                    <div class="title_pl">
                        <h1>DANH SÁCH CỦA TÔI</h1>
                    </div>
                    <div id="popular" class="list_item">
                        <?php loadPlaylist() ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>GẦN ĐÂY</h1>
                    </div>
                    <div id="theme" class="list_item">
                        <?php loadPlaylist() ?>
                    </div>
                    <br>
                    <div class="title_pl">
                        <h1>GỢI Ý</h1>
                    </div>
                    <div id="hot_album" class="list_item">
                        <?php loadPlaylist() ?>
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
                        </div>
                    </div>
                    <div id="title_music">
                    <div class="cover">
                            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
                            <strong>Play</strong>
                        </div>
                        <select class="form-select form-select-lg mb-3 BXH_item" aria-label=".form-select-lg example">
                            <option selected>Bảng xếp hạng theo lượt thích</option>
                            <option value="1">Bảng xếp hạng theo Quốc gia</option>
                        </select>
                    </div>
                    <div id='music_panel'>
                        <table class="table table-dark table-hover list">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Tác giả, ca sĩ</th>
                                    <th scope="col">Ngày phát hành</th>
                                    <th scope="col">Thời lượng</th>
                                    <th scope="col">Lượt nghe</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php loadBXHNgheNhieu(); ?>
                            </tbody>
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
                        </div>
                    </div>
                    <div id="title_music">
                    <div class="cover">
                            <ion-icon id="playButton" name="play-circle-sharp"></ion-icon>
                            <strong>Play</strong>
                        </div>
                    </div>
                    <div id='music_panel'>
                        <table class="table table-dark table-hover list">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Tác giả, ca sĩ</th>
                                    <th scope="col">Ngày phát hành</th>
                                    <th scope="col">Thời lượng</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -----------------------------------------------HIỆN NÚT BẤM NGHE--------------------------------------------- -->
        <div id="play">
            <div id="music_play_info">
                <img src="https://is1-ssl.mzstatic.com/image/thumb/Music116/v4/04/6f/81/046f815e-0e4a-db2c-7d18-4dfc82944c8a/23UM1IM14926.rgb.jpg/1200x1200bf-60.jpg" alt="" id="music_play_banner">
                
                <div id="music_play_title">
                    <Strong>Vui vẻ</Strong>
                    <h6>Nguyễn Văn Chung</h3>
                </div>
            </div>
            <div id="info_music"></div>
            <div id="btn">
                <ion-icon name="shuffle"></ion-icon>
                <ion-icon name="play-skip-back-circle" onclick="playPrev()"></ion-icon>
                <ion-icon id="play_btn" name="play-circle" onclick="play()"></ion-icon>
                <ion-icon id="pause_btn" name="pause-circle" onclick="pause()"></ion-icon>
                <ion-icon name="play-skip-forward-circle" onclick="playNext()"></ion-icon>
                <ion-icon name="refresh" id="loopBtn" onclick="Loop()"></ion-icon>
            </div>
            <div id="time_play">
                <span id="start-time">00:00</span>
                <input type="range" id="timeline" min="0" value="0" step="0.5">
                <span id="end-time">00:00</span>
            </div>
        </div>
        <audio controls style='opacity:0' id='music' onplay="showStopButton()" onpause="showPlayButton()">
            <source src="https://vnso-zn-5-tf-a128-zmp3.zmdcdn.me/966012e4e868f2efc96237dedc1145af?authen=exp=1702723501~acl=/966012e4e868f2efc96237dedc1145af/*~hmac=56bbcbb0ff47336e4a4ffebcbeb9bc7c" />
        </audio>
        <form id="myForm" action="MusicProcess.php" method="POST">
            <input type="hidden" id="idPLInput" name="idPL" value="">
        </form>
    </div>
</body>
<script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="index.js"></script>
<script>
    $(document).ready(function () {
        var idPL = document.querySelectorAll('.view_item');

        idPL.forEach(function (div) {
            div.addEventListener('click', function () {
                var idPlaylist = div.id;
                console.log('idPlaylist:', idPlaylist);
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById('result').innerHTML = this.responseText;
                    }
                };
                xhr.open("GET", "Xuly/loadMusic.php?idPlaylist=" + idPlaylist, true);
                xhr.send();
            });
        });
    });
</script>

<!-- play nhạc của playlist khi ấn vào nút play của playlist -->
<script>
    $(document).ready(function () {
        var idPL = document.querySelectorAll('.view_item');
        idPL.forEach(function (div) {
            div.addEventListener('click', function () {
                var idPlaylist = div.id;
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        var data = JSON.parse(this.responseText);
                        if (data.length > 0) {
                            var audioElement = document.getElementById('music');
                            audioElement.src = data[0].path;
                            audioElement.load(); // Tải lại audio
                        }
                        $('#playButton').on('click', function () {
                            console.log('Phát bài hát!');
                            var xhrIncreaseListen = new XMLHttpRequest();
                            xhrIncreaseListen.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    console.log(this.responseText);
                                }
                            };
                            xhrIncreaseListen.open("GET", "Xuly/increaseListen.php?idPlaylist=" + idPlaylist, true);
                            xhrIncreaseListen.send();
                            document.getElementById('music').play();
                        });
                    }
                };
                xhr.open("GET", "Xuly/playNhac.php?idPlaylist=" + idPlaylist, true);
                xhr.send();
            });
        });
    });

</script>

</html>