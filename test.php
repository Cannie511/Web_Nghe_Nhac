<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Your Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
  <h1>Dashboard</h1>

  <div class="row mt-4">
    <!-- Total Songs -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Songs</h5>
          <p class="card-text">1000</p>
        </div>
      </div>
    </div>

    <!-- Total Users -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Users</h5>
          <p class="card-text">500</p>
        </div>
      </div>
    </div>

    <!-- Total Artists -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total Artists</h5>
          <p class="card-text">200</p>
        </div>
      </div>
    </div>

    <!-- Unapproved Songs -->
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Unapproved Songs</h5>
          <p class="card-text">50</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-6">
      <!-- Add a chart here using a chart library like Chart.js -->
      <canvas id="myChart"></canvas>
    </div>
  </div>
</div>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Example chart data (replace with your actual data)
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [{
      label: 'Songs in the Last 12 Months',
      data: [50, 60, 80, 120, 90, 100, 70, 110, 130, 100, 80, 60],
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgba(75, 192, 192, 1)',
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
</script>

</body>
</html>
