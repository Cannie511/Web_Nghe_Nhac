<!-- <?php

require_once("DB/ketnoi.php");
$sql = "select * from nguoi_dung ";
$stm = $conn->prepare($sql);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);



var_dump($data);

?> -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slide Down Effect</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
   @keyframes slide-down {
  from {
    opacity: 0;
    transform: translateY(-50px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
<body>

<button onclick="hienThiDiv()">Hiển thị div</button>
<div id="myDiv" style="display: none;">
  <!-- Nội dung của div bạn muốn hiển thị -->
  Div đang ẩn
</div>


</body>
<script>
 function hienThiDiv() {
  var div = document.getElementById('myDiv');
  div.style.display = 'block';
  div.style.animation = 'slide-down 0.5s ease'; // Thêm animation slide-down
}

</script>
</html>
