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
    <link rel="stylesheet" href="index.css">
    <script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script crossorigin src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
</head>
<?php include "MusicProcess.php" ?>

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
            Vui lòng <a href="log-in.html">Đăng nhập</a> để thực hiện chức năng
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
                    <div class="accordion " id="accordionExample">
                        <div class="menu_item" id="dsphat" data-bs-toggle="collapse" data-bs-target=".collapse"
                            aria-expanded="true" aria-controls="collapseOne">
                            <ion-icon name="list-outline">
                            </ion-icon><span>DANH SÁCH PHÁT</span>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="menu_item col-md-4 " id="">
                                <ion-icon name="musical-notes"></ion-icon>
                                <span>DANH SÁCH 1</span>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="col-md-4 menu_item" id="">
                                <ion-icon name="musical-notes"></ion-icon><span>DANH SÁCH 2</span>
                            </div>
                        </div>
                        <div id="" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <!-- data-bs-target="#exampleModal" -->
                            <div class="col-md-4 menu_item" id="newPlaylist" data-bs-toggle="modal" 
                                data-bs-whatever="@mdo">
                                <ion-icon name="add"></ion-icon><span>Tạo mới</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 menu_item" id="bxh"><ion-icon name="bar-chart-outline"></ion-icon><span>BẢNG XẾP HẠNG</span>
                    </div>
                    <div class="col-md-4 menu_item" id="yeu thich"><ion-icon name="heart-outline"></ion-icon><span>YÊU THÍCH</span></div>
                    <div class="accordion" id="accordionExample">
                        <div class="menu_item" data-bs-toggle="collapse" data-bs-target="#collapseOne1"
                            aria-expanded="true" aria-controls="collapseOne"><ion-icon
                                name="settings"></ion-icon><span>CÀI ĐẶT</span></div>
                        <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="col-md-4 menu_item" id="" data-bs-toggle="modal"
                                data-bs-target="#ModalChangePass">
                                <ion-icon name="lock-closed"></ion-icon><span>Đổi mật khẩu</span>
                            </div>
                        </div>
                        <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="col-md-4 menu_item" id="">
                                <ion-icon name="pencil"></ion-icon><span>Chỉnh sửa tài khoản</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="navbar"><ion-icon name="chevron-back-outline"></ion-icon></div>
            </div>
        </div>
        <!-- --------------------------------------------------GIAO DIỆN TẠO MỚI-------------------------------------------------- -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Danh Sách Mới</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tên Danh Sách:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Mô tả:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btnCancel" data-bs-dismiss="modal">Hủy</button>
                        <button id="btnConfirm" type="button" class="btnAll primary">Tạo mới</button>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đổi mật khẩu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="old-pass" name="pass_user"
                                    placeholder="Mật khẩu cũ">
                                <label for="floatingPassword">Mật khẩu cũ</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="new-pass" name="pass_user"
                                    placeholder="Mật khẩu mới">
                                <label for="floatingPassword">Mật khẩu mới</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="retype-new-pass" name="retype_pass_user"
                                    placeholder="Nhập lại mật khẩu mới">
                                <label for="floatingPassword">Nhập lại mật khẩu mới</label>
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
                            <div onclick="Edit()"><ion-icon name="key-outline"></ion-icon><span>Tài khoản</span>
                            </div>
                            <div onclick="Register()"><ion-icon name="log-in-outline"></ion-icon><span>Đăng
                                    ký</span></div>
                            <div onclick="log_in()"><ion-icon name="person"></ion-icon><span>Đăng nhập</span></div>
                            <div><ion-icon name="settings-sharp"></ion-icon><span>Cài đặt</span></div>
                            <!-- <div>
                                <div id="switch">
                                    <div id="scroll"></div>
                                </div><span>Nền tối</span>
                            </div> -->
                        </div>
                    </div>
                    <div id="search" class="col-sm-4">
                        <ion-icon name="chevron-back-circle" style="margin-left: 10px;" id="backTab"></ion-icon>
                        <form action="" method="get">
                            <div>
                                <ion-icon name="search-outline"></ion-icon>
                                <input type="text" placeholder="Bạn muốn nghe gì ?" id="search_input" class="col-sm-4">
                                <button type="submit" class="btn btn-secondary" style="border-radius: 50%; width: 45px; height: 45px; margin-left: 5px;" ><ion-icon name="search-outline"></ion-icon></button>
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
                            <strong style="font-size: 120%" ;>20 Bài hát <ion-icon
                                    name="musical-notes-outline"></ion-icon>: Có chắc yêu là đây,
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
                            <strong style="font-size: 120%;">50 Bài hát <ion-icon
                                    name="musical-notes-outline"></ion-icon>: Không thể say, Nấu ăn
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
                            <strong style="font-size: 120%;">13 Bài hát <ion-icon
                                    name="musical-notes-outline"></ion-icon>:Cắt đôi nỗi sầu, Trời hôm nay nhiều mây
                                cực,...</strong>
                        </div>
                    </div>
                    <div id="title_music">
                        <ion-icon name="play-circle-sharp"></ion-icon>
                        <ion-icon name="heart-outline"></ion-icon>
                        <strong
                            style="margin-left: 20px; font-family: Georgia, 'Times New Roman', Times, serif;">...</strong>
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
                                <?php loadMusic() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- -----------------------------------------------HIỆN NÚT BẤM NGHE--------------------------------------------- -->
        <div id="play">
        <div id="info_music"></div>
            <div id="btn">
                <ion-icon name="shuffle"></ion-icon>
                <ion-icon name="play-skip-back-circle"  onclick="playPrev()"></ion-icon>
                <ion-icon id="play_btn" name="play-circle" onclick="play()"></ion-icon>
                <ion-icon id="pause_btn" name="pause-circle" onclick="pause()"></ion-icon>
                <ion-icon name="play-skip-forward-circle" onclick="playNext()"></ion-icon>
                <ion-icon name="refresh" id = "loopBtn" onclick="Loop()"></ion-icon>
            </div>

            <div id="time_play">
                <span id="start-time">00:00</span>
                <input type="range" id="timeline" min="0" value="0" step="0.5"> 
                <span id="end-time">00:00</span>
            </div>
        </div>
        <audio controls style='opacity:0' id='music'>
            <source src="https://vnso-pt-24-tf-a128-zmp3.zmdcdn.me/966012e4e868f2efc96237dedc1145af?authen=exp=1702026755~acl=/966012e4e868f2efc96237dedc1145af/*~hmac=082a75cb29b93bf5b0684f81ff20e085" />
        </audio>
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
            if ($(this).scrollTop()) {
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
                default:
                    break;
            }
            console.log(index);
        });
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
                default:
                    break;
            }
            console.log(index);
        });
        $('.view_item').click(function () {
            $('.layout.show').removeClass('show');
            $('#music_list').addClass('show');
        });
        $('#backTab').click(function () {
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
        });
        // $('#btnConfirm').click(function () {
        //     $('#alert-login').css("display", "block");
        //     setTimeout(function () {
        //         $('#alert-login').css("display", "none");
        //     }, 2500);
        //     $('#exampleModal').modal('hide');
        // });
        $('#btnPassConfirm').click(function () {
            $('#alert-success').css("display", "block");
            
            setTimeout(function () {
                $('#alert-success').css("display", "none");;
            }, 2500);
            $('#ModalChangePass').modal('hide');
            return false;
        });
        $('.btnCancel').click(function () {
            $('#alert-warning').css("display", "bloack");
            setTimeout(function () {
                $('#alert-warning').css("display", "none");;
            }, 2500);
        });
        const music = document.getElementById('music');
        $('#play_btn').click(function(){
            music.play();
        })
        $('#pause_btn').click(function(){
            music.pause();
        })
        $('#newPlaylist').click(function(){
            $('#alert-login').css("display", "block");
            setTimeout(function () {
                $('#alert-login').css("display", "none");
            }, 2500);
        })
    })
</script>
<!-- <script type="text/babel" src="Playlists.js"></script>
<script type="text/babel">
    function handleCLick(){
        ReactDOM.render(<Playlists />, document.getElementById('myPL'))
    }
    document.getElementById('dsphat').addEventListener('click', handleCLick)
</script> -->

</html>