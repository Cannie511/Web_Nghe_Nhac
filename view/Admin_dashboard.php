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
                        <h5 class="card-title">Total Songs</h5>
                        <!-- Replace the value with your actual total songs count -->
                        <p class="card-text" id="totalSongs">
                            <?php loadDashboardMusic(); ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <!-- Replace the value with your actual total users count -->
                        <p class="card-text" id="totalUsers">
                            <?php loadDashboardUser(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>