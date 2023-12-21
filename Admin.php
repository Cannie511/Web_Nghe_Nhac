<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "Xuly/loadingUI.php";
include "Xuly/loadAccount.php";
include "Xuly/MusicProcess.php";
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" href="IMAGE/user-cog-solid.svg" /> -->
  <title>TriVie Administrator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="style/Admin.css">
</head>
<style>

</style>

<body>
  <div class='dashboard'>
    <div class="dashboard-nav">
      <header>
        <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
        <a href="#" class="brand-logo">
          <span>
            <span style="color: var(--logo-Tri-custom);">Tri</span>
            <span style="color: var(--logo-Vie-custom);">Vie</span>
            Admin
          </span>
        </a>
      </header>
      <nav class="dashboard-nav-list">
        <a href="#" class="dashboard-nav-item "><ion-icon name="stats-chart"></ion-icon>Tổng quan</a>
        <a href="#" class="dashboard-nav-item"><ion-icon name="lock-open"></ion-icon>Phân quyền </a>
        <div class='dashboard-nav-dropdown'><a href="#!"
            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><ion-icon name="people"></ion-icon> Quản lý người
            dùng </a>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="#" class="dashboard-nav-dropdown-item">Khóa tài khoản</a>
          </div>
        </div>
        <div class='dashboard-nav-dropdown'><a href="#!"
            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><ion-icon name="bookmarks"></ion-icon> Quản Lý Nhạc
          </a>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="#" class="dashboard-nav-dropdown-item">Đang chờ duyệt</a>
            <a href="#" id="loadThemNhac" class="dashboard-nav-dropdown-item">Thêm nhạc mới</a>
            <a href="#" class="dashboard-nav-dropdown-item">Đã duyệt</a>
            <a href="#" class="dashboard-nav-dropdown-item">Đã hủy</a>
          </div>
        </div>
        <a href="#" class="dashboard-nav-item"><ion-icon name="person-sharp"></ion-icon> Hồ sơ </a>
        <a href="index.php" class="dashboard-nav-item"><ion-icon name="sync-outline"></ion-icon> Trang người dùng </a>
        <div class="nav-item-divider"></div>
        <a href="#" class="dashboard-nav-item"><ion-icon name="log-out"></ion-icon> Đăng xuất </a>
      </nav>
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------------------------- -->
    <div class='dashboard-app'>
      <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><ion-icon name="grid"
            style="font-size: 20px"></ion-icon></a></header>
      <div class='dashboard-content'>
        <div class='container'>

          <div class='card'>

            <div class='card-header '>
              <h1>Chào mừng đến với <strong><span style="color: var(--logo-Tri-custom);">Tri</span><span
                    style="color: var(--logo-Vie-custom);">Vie</span></strong> Administrator</h1>
            </div>
            <!-- ---------------------------------------------------------------------------------------------------------------------------------------------- -->
            <div class='card-body' id="Dashboard">
              <div class="container mt-4">
                <div class='card-header'>
                  <h1><strong>Dữ Liệu Tổng Quan</strong></h1>
                </div>
                <div class="row mt-4">
                  <!-- Total Songs -->
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Bài Hát</h5>
                        <p class="card-text"><?php?></p>
                      </div>
                    </div>
                  </div>

                  <!-- Total Users -->
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Người dùng</h5>
                        <p class="card-text">500</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Ca Sĩ</h5>
                        <p class="card-text">200</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">chờ duyệt</h5>
                        <p class="card-text">50</p>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-md-6">
                      <!-- Add a chart here using a chart library like Chart.js -->
                      <canvas id="myChart"></canvas>
                    </div>
                  </div>
                  <!-- </div>
------------------------------------------------------------------------------------------------------------------------------- -->

                  <!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
                  <div class='card-body fade' id="Account">
                    <div class='card-header'>
                      <h1><strong>Quản lý tài khoản</strong></h1>
                    </div>
                    <nav class="navbar bg-light">
                      <div class="search_input md-8">
                        <form class="d-flex" role="search" method="get" action="xuLyTimKiem.php">
                          <input class="form-control me-2" type="search" placeholder="ID người dùng" aria-label="Search"
                            name="IDsearch">
                          <button class="btn btn-outline-success" type="submit" name="timKiem"><i
                              class="fas fa-search"></i></button>
                        </form>
                      </div>
                    </nav>
                    <table class="table table-dark table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tài khoản</th>
                          <th scope="col">Mật khẩu</th>
                          <th scope="col">Chức vụ</th>
                          <th scope="col">Ngày sinh</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php loadUserAccount(); ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- ----------------------------------------PHÂN QUYỀN------------------------------------------------- -->
                  <div class='card-body ' id="Permission">
                    <div class='card-header'>
                      <h1><strong>Quản Lý Quyền Truy Cập</strong></h1>
                    </div>
                    <nav class="navbar bg-light">
                      <div class="search_input md-8">
                        <form class="d-flex" role="search">
                          <input class="form-control me-2" type="search" placeholder="ID người dùng"
                            aria-label="Search">
                          <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                      </div>
                    </nav>
                    <table class="table table-dark table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tài khoản</th>
                          <th scope="col">Mật khẩu</th>
                          <th scope="col">Chức vụ</th>
                          <th scope="col">Ngày sinh</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope='row'>#1</th>
                          <td>admin@trivieco.com</td>
                          <td><input type='password' id='pass' readonly value='Abc123@'></td>
                          <td>
                            <Select>
                              <option value="0">Người dùng</option>
                              <option value="1">Nghệ sĩ</option>
                              <option value="2">Admin</option>
                            </Select>
                          </td>
                          <td>1/1/2023</td>
                        </tr>
                      </tbody>
                    </table>
                    <nav class="navbar bg-light">
                      <div class="search_input md-8">
                        <form class="d-flex" role="search">
                          <button type="button" class="btn btn-success right">Lưu thay đổi</button>
                        </form>
                      </div>
                    </nav>
                  </div>
                  <!-- --------------------------------------------------------------------------------------------------------------- -->
                  <div class='card-body' id="addMusic">
                    <div class="container max-width-xxl">
                      <h1 class="text-center mb-4"><strong>Thêm Nhạc Mới</strong> </h1>

                      <form action="AddNhac.php" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label for="songTitle" class="form-label">Tiêu đề bài hát</label>
                            <input type="text" class="form-control" id="songTitle" name="songTitle" required>
                          </div>

                          <div class="col-md-6">
                            <label for="artistName" class="form-label">Tên Nghệ Sĩ</label>
                            <input type="text" class="form-control" id="artistName" name="artistName" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label for="duration" class="form-label">Thời Lượng (giây)</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                          </div>

                          <div class="col-md-6">
                            <label for="coverImage" class="form-label">Banner Bài Hát</label>
                            <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*"
                              required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <div class="col-md-6">
                            <label for="musicFile" class="form-label">File Âm Thanh</label>
                            <input type="file" class="form-control" id="musicFile" name="musicFile" required>
                          </div>

                          <div class="col-md-6">
                            <label for="musicGenre" class="form-label">Thể Loại Bài Hát</label>
                            <select class="form-select" id="musicGenre" name="musicGenre" required>
                              <?php loadTheLoai() ?>
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <label for="country" class="form-label">Quốc Gia</label>
                            <select class="form-select" id="country" name="country" required>
                              <?php
                              loadQuocGia();
                              ?>
                            </select>
                          </div>

                        </div>

                        <div class="row mt-4">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary right" name="Submit">Add Music</button>
                          </div>
                        </div>
                      </form>
                      <h1>Thêm Quốc Gia</h1>
                      <form id="addCountryForm" class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                          <label for="countryName" class="sr-only">Country Name:</label>
                          <input type="text" class="form-control" id="countryName" name="countryName"
                            placeholder="Country Name" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Add Country</button>
                      </form>

                      <h1 class="mt-4">Thêm Thể Loại</h1>
                      <form id="addGenreForm" class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                          <label for="genreName" class="sr-only">Genre Name:</label>
                          <input type="text" class="form-control" id="genreName" name="genreName"
                            placeholder="Genre Name" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Add Genre</button>
                      </form>
                      <br>
                      <table class="table table-light table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hình</th>
                            <th scope="col">Tiêu Đề</th>
                            <th scope="col">Tác Giả, ca sĩ</th>
                            <th scope="col">Ngày Phát Hành</th>
                            <th scope="col">Thời Lượng</th>
                            <th scope="col">Thao Tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php loadNhacAdmin(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const mobileScreen = window.matchMedia("(max-width: 990px )");
  $(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
      $(this).closest(".dashboard-nav-dropdown")
        .toggleClass("show")
        .find(".dashboard-nav-dropdown")
        .removeClass("show");
      $(this).parent()
        .siblings()
        .removeClass("show");
    });
    $(".menu-toggle").click(function () {
      if (mobileScreen.matches) {
        $(".dashboard-nav").toggleClass("mobile-show");
      } else {
        $(".dashboard").toggleClass("dashboard-compact");
      }
    });
    $('.dashboard-nav-item').click(function (event) {
      index = $(this).index();
      $('.dashboard-nav-item').removeClass('active');
      $(this).addClass('active');
      switch (index) {
        case 0:
          $('.card-body').addClass('fade');
          $('#Account').removeClass('fade');
          break;
        case 1:

          break;
        case 2:
          $('.card-body').addClass('fade');
          $('#Permission').removeClass('fade');
          break;
        default:
          break;
      }
    });
    $('#loadThemNhac').click(function () {
      $('.card-body').addClass('fade');
      $('#addMusic').removeClass('fade');
    })
  });
  document.addEventListener("DOMContentLoaded", function () {
    // Gán sự kiện click cho thẻ a
    document.getElementById("loadThemNhac").addEventListener("click", function (e) {
      e.preventDefault();

      // Sử dụng Fetch API để tải nội dung từ file PHP
      fetch("ThemNhac.php")
        .then(response => response.text())
        .then(data => {
          // Thêm nội dung vào div#root
          document.getElementById("root").innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
    });
  });
</script>

</html>