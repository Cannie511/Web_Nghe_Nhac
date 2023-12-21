<?php
session_start();
if (isset($_SESSION['Ma_ND'])) {
    // echo"&nbsp;&nbsp;&nbsp;&nbsp". $_SESSION['Ma_ND'];
    // echo $_SESSION['Ten_Dang_Nhap'];
    
} else {
    header("Location: log-in.php");
}
include "Xuly/MusicProcess.php";
include('Xuly/NewPlaylist.php');
include('Xuly/doiMK.php');
include('Xuly/loadingUI.php');

?>
<?php
if (isset($_POST['TaoMoi'])) {
    TaoMoiPlaylist($_POST['TenPlayL'], $_SESSION['Ma_ND']);
}
if (isset($_POST['doiMK'])) {
    doiMK($_POST['pass_user'], $_POST['new_pass'], $_POST['retype_pass'], $_SESSION['Ma_ND']);
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
    <div id="menu">
        <div id="logo" class="">
            <h1>
                <strong id="logo_T" class="col">T</strong>
                <h1 id="logo_ri">ri</h1>&nbsp<strong id="logo_V">V</strong>
                <h1 id="logo_ie">ie</h1>
            </h1>
        </div>
        <div id="menu_cover">
            <div class="menu_item init" data-bs-toggle="tooltip" data-bs-placement="top" title="Trang chủ">
                <ion-icon name="home-outline"></ion-icon><span>TRANG CHỦ</span>
            </div>
            <div class="menu_item">
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

            <div class="menu_item"><ion-icon name="bar-chart-outline"></ion-icon><span>BẢNG
                    XẾP HẠNG</span>
            </div>
            <div class="menu_item" id="yeu thich"><ion-icon name="heart-outline"></ion-icon><span>YÊU
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
            
            <?php
            if($_SESSION['Phan_Quyen'] == "1"){
                        echo "
                        <div class='menu_item' id='upMusic'><ion-icon name='mic'></ion-icon><span>ĐĂNG NHẠC</span></div>
                        ";
                    }if($_SESSION['Phan_Quyen'] == "2"){
                        echo "
                        <div class='menu_item' onclick ='admin()' id='upMusic'><ion-icon name='sync-outline'></ion-icon><span>ADMINISTRATOR</span></div>
                        "; 
                    }
            ?>
        </div>
        <div id="navbar">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </div>
    </div>
    <!-- --------------------------------------------------GIAO DIỆN TẠO MỚI PLAYLIST-------------------------------------------------- -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" style="color: black;" id="exampleModalLabel">Danh Sách Mới</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index-ID.php">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="color: black;">Tên Danh
                                Sách:</label>
                            <input type="text" class="form-control" id="recipient-name" name="TenPlayL">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" style="color: black;" class="col-form-label">Mô tả:</label>
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
    <div class="modal fade " id="ModalChangePass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black;">Đổi mật khẩu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="index-ID.php">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="old-pass" name="pass_user"
                                placeholder="Mật khẩu cũ">
                            <label for="floatingPassword" style="color: black;">Mật khẩu cũ</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="new-pass" name="new_pass"
                                placeholder="Mật khẩu mới">
                            <label for="floatingPassword" style="color: black;">Mật khẩu mới</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="retype-new-pass" name="retype_pass"
                                placeholder="Nhập lại mật khẩu mới">
                            <label for="floatingPassword" style="color: black;">Nhập lại mật khẩu mới</label>
                        </div>
                        <input type="hidden" class="form-control" id="trigger" name="doiMK" value="active" />
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btnCancel"
                                data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btnAll primary">
                                Đổi mật khẩu
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- --------------------------------------------CHỌN DANH SÁCH---------------------------------------------- -->
    <!-- SỬA TÍ -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="playlistChoice"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Chọn playlist</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <strong style="font-size: 20px">Playlist hiện có</strong>
            <form action="" id="listChoice" method="get" onsubmit="addPlayListSubmit()">
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="tenPlaylist">
                    <option selected>chọn danh sách thêm vào</option>
                    <?php loadUserPL(); ?>
                </select>
                <input type="hidden" id="maBaiHat1Input" name="maBaiHat1">
                <button type="submit" class="btn btn-success float-sm-end">Xác nhận</button>
            </form>
            
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------------- -->
    <div class="col-sm-7">
        <div id="main_play">
            <div id="topMenu">
                <div id="personal" onmouseup='showMore()' onmouseleave="setTimeout('hideMore(),1500')">
                    <h5><strong>
                            <?php echo $_SESSION['Ten_Dang_Nhap'] ?>
                        </strong></h5>&nbsp;
                    <ion-icon id="ic_per" name="person-circle-sharp"></ion-icon>
                    <div id="more">
                        <div>
                            &nbsp;&nbsp; <strong>
                                <?php echo $_SESSION['Ten_Dang_Nhap'] ?>
                            </strong>
                        </div>
                        <div onclick="Home()">
                            <ion-icon name="log-in-outline"></ion-icon><span>Đăng Xuất</span>
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
            if($_SESSION['Phan_Quyen'] == "1"){
                include_once "view/view_themNhac.php";
            }
            include_once "view/view_BXH.php";
            include_once "view/view_yeuThich.php";
            include_once "view/view_danhSach.php";
            ?>
            
        </div>
    </div>
    <!-- -----------------------------------------------HIỆN NÚT BẤM NGHE--------------------------------------------- -->
    <div id="play">
        <div id="music_play_info">
            <img src="IMAGE/s960_music-Streaming.jpg"
                alt="" id="music_play_banner">

            <div id="music_play_title">
                <Strong id="title">Vui vẻ</Strong>
                <h6 id="singer">Nguyễn Văn Chung</h3>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="index.js"></script>
<script>
    const toastLiveExample = document.getElementById('liveToast');
    setInterval(function () {
        toastLiveExample.style.display = "none";
    }, 5000);
</script>
<script>
    var maBaiHat1 = -1;
    function addPlayList(icon) {
        maBaiHat1 = icon.getAttribute('data-ma-bai');
        console.log(maBaiHat1);
    }
    function addPlayListSubmit() {
        document.getElementById('maBaiHat1Input').value = maBaiHat1;{
        // Lấy giá trị từ input và select
        var songId = $('#maBaiHat1Input').val();
        var playlistName = $('select[name="tenPlaylist"]').val();

        // Gửi yêu cầu Ajax
        $.ajax({
            type: 'GET',
            url: 'Xuly/addMusic.php',
            data: {
                maBaiHat1: songId,
                tenPlaylist: playlistName
            },
            success: function(response) {
                // Hiển thị thông báo trên console hoặc có thể hiển thị trực tiếp trên trang
                
                alert(response);
            },
            error: function() {
                alert('Đã xảy ra lỗi.');
            }
        });
    }
}
</script>
<!-- -- Xoa Nhac -->

<script>
var maBaiHat1 = -1;
function xoa(icon) {
    maBaiHat1 = icon.getAttribute("data-ma-bai-xoa");
     maPL =icon.getAttribute("data-ma");

  var z = new XMLHttpRequest();
  z.onreadystatechange = function () {
    if (z.readyState == 4 && z.status == 200) {
      location.reload();
      alert('Xóa thành công');
    }
  };
  z.open("GET", "xoaNhacPl.php?maBaiHat1=" + maBaiHat1 + "&maPL=" + maPL, true);
  z.send();
}
</script>
</html>

