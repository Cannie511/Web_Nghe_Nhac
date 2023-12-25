<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "Xuly/loadAccount.php";
include "Xuly/MusicProcess.php";

include('Xuly/loadingUI.php');
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" href="IMAGE/user-cog-solid.svg" /> -->
  <title>TriVie Administrator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
            <span style="color: var(--logo-Tri-custom);">Tri</span><span
              style="color: var(--logo-Vie-custom);">Vie</span>
            Admin
          </span>
        </a>
      </header>
      <nav class="dashboard-nav-list">
        <a href="/Admin.php?action=dashboard" class="dashboard-nav-item "><ion-icon name="stats-chart"></ion-icon>Tổng
          quan</a>
        <a href="/Admin.php?action=useraccount" class="dashboard-nav-item"><ion-icon name="people"></ion-icon>Quản lý
          người dùng</a>
        <div class='dashboard-nav-dropdown'>
          <a href="#" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><ion-icon name="bookmarks"></ion-icon>
            Quản Lý Nhạc</a>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="/Admin.php?action=addMusic" id="loadThemNhac" class="dashboard-nav-dropdown-item">Thêm nhạc mới</a>
          </div>
          <div class='dashboard-nav-dropdown-menu'>
            <a href="/Admin.php?action=duyetMusic" id="loadThemNhac" class="dashboard-nav-dropdown-item">Duyệt Nhạc</a>
          </div>
        </div>
        <a href="index-ID.php" class="dashboard-nav-item"><ion-icon name="sync-outline"></ion-icon> Trang người dùng
        </a>
        <div class="nav-item-divider"></div>
        <a href="login.php" class="dashboard-nav-item"><ion-icon name="log-out"></ion-icon> Đăng xuất </a>
      </nav>
    </div>
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
            <?php
            if (isset($_GET['action'])) {
              switch ($_GET['action']) {
                case 'dashboard':
                  include "view/Admin_dashboard.php";
                  break;
                case 'permision':
                  include "view/Admin_phanQuyen.php";
                  break;
                case 'useraccount':
                  include "view/Admin_UserAccount.php";
                  break;
                case 'addMusic':
                  include "view/Admin_addMusic.php";
                  break;
                case 'duyetMusic':
                  include "view/Admin_duyetNhac.php";
                  break;
                default:
                  include "view/Admin_duyetNhac.php";
                  break;
              }
            } else {
              include "view/Admin_dashboard.php";
            }
            ?>
          </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
  function loadDashboardData() {
    // Get data from totalSongs and totalUsers elements
    var totalSongs = parseInt(document.getElementById('totalSongs').innerText.replace('Total Songs: ', ''), 10);
    var totalUsers = parseInt(document.getElementById('totalUsers').innerText.replace('Total Users: ', ''), 10);

    // Update the chart data
    myChart.data.datasets[0].data = [totalSongs, totalUsers];
    myChart.update();
  }

  // Example chart data (replace with your actual data)
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Total Songs', 'Total Users'],
      datasets: [{
        label: 'Dashboard Data',
        data: [0, 0], // Initial data
        backgroundColor: [
          'rgba(75, 192, 192, 0.2)',
          'rgba(255, 99, 132, 0.2)'
        ],
        borderColor: [
          'rgba(75, 192, 192, 1)',
          'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Load data initially
  loadDashboardData();

  // Refresh data every 5 seconds (adjust as needed)
  setInterval(loadDashboardData, 5000);
</script>

<script>
  function submitForm(button) {
    var maDuyet = button.getAttribute("data-ma-duyet");
    var action = button.getAttribute("data-action");
    document.getElementById("maDuyetInput").value = maDuyet;
    document.getElementById("duyetForm").innerHTML += "<input type='hidden' name='action' value='" + action + "'>";
    document.getElementById("duyetForm").submit();
  }
</script>


</html>