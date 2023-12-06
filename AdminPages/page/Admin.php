<!DOCTYPE html>
<html lang="en">
<?php include "C:\Users\Admin\OneDrive\Máy tính\CodeNhacc\Web_Nghe_Nhac\MusicProcess.php" ;
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="IMAGE/user-cog-solid.svg" />
  <title>TriVie Administrator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"></script>
  <link rel="stylesheet" href="style/Admin.css">
</head>
<style>

</style>

<body>
  <div class='dashboard'>
    <div class="dashboard-nav">
      <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#" class="brand-logo"><span><span
              style="color: var(--logo-Tri-custom);">Tri</span><span style="color: var(--logo-Vie-custom);">Vie</span>
            Admin</span></a></header>
      <nav class="dashboard-nav-list"><a href="#" class="dashboard-nav-item active"><ion-icon name="home"></ion-icon>
          Home </a><a href="#" class="dashboard-nav-item "><ion-icon name="stats-chart"></ion-icon>Tổng quan
        </a>
        <a href="#" class="dashboard-nav-item"><ion-icon name="lock-open"></ion-icon>Phân quyền </a>
        <div class='dashboard-nav-dropdown'><a href="#!"
            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><ion-icon name="people"></ion-icon> Quản lý người
            dùng </a>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="#" class="dashboard-nav-dropdown-item">Chỉnh sửa người dùng</a>
            <a href="#" class="dashboard-nav-dropdown-item">Xóa người dùng</a>
            <a href="#" class="dashboard-nav-dropdown-item">Khóa tài khoản</a>
          </div>
        </div>
        <div class='dashboard-nav-dropdown'><a href="#!"
            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><ion-icon name="bookmarks"></ion-icon> Duyệt Nhạc
          </a>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="#" class="dashboard-nav-dropdown-item">Đang chờ duyệt</a>
            <a href="#" class="dashboard-nav-dropdown-item">Đã duyệt</a>
            <a href="#" class="dashboard-nav-dropdown-item">Đã hủy</a>
          </div>
        </div>
        <div class='dashboard-nav-dropdown'><a href="#!"
            class="dashboard-nav-item dashboard-nav-dropdown-toggle"><ion-icon name="key"></ion-icon>Quản lý tài
            khoản</a>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="#" class="dashboard-nav-dropdown-item">Đang hoạt động</a>
            <a href="#" class="dashboard-nav-dropdown-item">Đã khóa</a>
          </div>
        </div>
        <a href="#" class="dashboard-nav-item"><ion-icon name="person-sharp"></ion-icon> Hồ sơ </a>
        <div class="nav-item-divider"></div>
        <a href="#" class="dashboard-nav-item"><ion-icon name="log-out"></ion-icon> Đăng xuất </a>
      </nav>
    </div>
    <div class='dashboard-app'>

      <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><ion-icon name="grid"
            style="font-size: 20px"></ion-icon></a></header>
      <div class='dashboard-content'>
        <div class='container'>

          <div class='card'>

            <div class='card-header '>
              <h1>Welcome to <strong><span style="color: var(--logo-Tri-custom);">Tri</span><span
                    style="color: var(--logo-Vie-custom);">Vie</span></strong> Administrator</h1>
            </div>
            <div class='card-body fade' id="Account">
              <div class='card-header'>
                <h1><strong>Quản lý tài khoản</strong></h1>
              </div>
              <nav class="navbar bg-light">
                <div class="search_input md-8">
                  <form class="d-flex" role="search" method="get" action="xuLyTimKiem.php" >
                    <input class="form-control me-2" type="search" placeholder="ID người dùng" aria-label="Search" name="IDsearch">
                    <button class="btn btn-outline-success" type="submit" name= "timKiem"><i class="fas fa-search"></i></button>
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
                  <?php loadUserAccount(5) ?>
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
                    <input class="form-control me-2" type="search" placeholder="ID người dùng" aria-label="Search">
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
          </div>

        </div>
      </div>
    </div>
  </div>
</body>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
  });
</script>

</html>