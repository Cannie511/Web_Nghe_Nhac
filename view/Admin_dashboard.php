<div class='card-body' id="Dashboard">
    <div class="container mt-4">
        <div class='card-header'>
            <h1><strong>Dữ Liệu Tổng Quan</strong></h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Bài Hát</h5>
                        <!-- Replace the value with your actual total songs count -->
                        <p class="card-text" id="totalSongs">
                            <?php loadDashboardMusic(); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Người Dùng</h5>
                        <!-- Replace the value with your actual total users count -->
                        <p class="card-text" id="totalUsers">
                            <?php loadDashboardUser(); ?>
                        </p>
                    </div>
                </div>
            </div>

            <?php loadDashboardDuyet(); ?>
        </div>
        <div class="mt-4">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>
<script>
    function canDuyet() {
        window.location.href = "Admin.php?action=duyetMusic";
    }
</script>