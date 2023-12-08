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
    <link rel="stylesheet" href="index.css">
    
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
                    <div class="accordion " id="accordionExample">
                        <div class="menu_item" id="dsphat" data-bs-toggle="collapse" data-bs-target="#collapseOne"
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
                            aria-expanded="true" aria-controls="collapseOne">
                            <ion-icon name="settings"></ion-icon><span>CÀI ĐẶT</span>
                        </div>
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
                <div id="navbar">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </div>
            </div>
        </div>
 <script crossorigin src="https://unpkg.com/react@17/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
<script crossorigin src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="index.js"></script>
</body>