<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="Register.css" />
    <style>
    body {
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .allAlert {
        width: 400px;
        text-align: center;
        position: absolute;
        opacity: 0;
        top: 40%;
        z-index: 2000;
        transition: all 0.5s ease-in-out;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2000;
    }

    #register {
        opacity: 0.5;
    }
    </style>
</head>

<body>
    <div class="alert alert-success allAlert" id="alert-success" role="alert">
        <ion-icon name="checkmark"></ion-icon>&nbsp;&nbsp;
        Đăng ký thành công! <a href="log-in.php">Tiếp tục.</a>
    </div>
    <div class="alert alert-danger allAlert" id="alert-warning" role="alert">
        <ion-icon name="warning"></ion-icon>&nbsp;&nbsp;
        Tài khoản đã tồn tại! vui lòng <a href="Register.php">Thử lại</a>.
    </div>

    <div class="container-fluid text-center main">
        <div class="row row-cols-2 ">
            <div class="col info">
                <form id="register" method="post">
                    <h2><strong>Đăng Ký với <span style="color: var(--logo-Tri-custom);">Tri</span><span
                                style="color: var(--logo-Vie-custom);">Vie</span></strong></h2>
                    <div class="icon-btn">
                        <div class="icon"><i class="fab fa-google"></i></div>
                        <div class="icon"><i class="fab fa-facebook"></i></div>
                    </div>
                    Điền thông tin
                    <div class="input"></div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control readonly form-input" id="floatingInput" name="id_user"
                            placeholder="tên đăng nhập">
                        <label for="floatingInput">Tên đăng nhập</label>
                        <div class="emptynoti"></div>
                    </div>
                    <div class="emptynoti"></div>
                    <input type="Date" class="form-control" id="floatingDateInput" name="birth_user"
                        placeholder="name@example.com">
                    <select name="gender_user" id="" class="form-control">
                        <option value="-1">Giới tính</option>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Không rõ</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="pass_user"
                            placeholder="Password">
                        <label for="floatingPassword">Mật khẩu</label>
                    </div>
                    <div class="emptynoti"></div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingRetypePassword" name="retype_pass_user"
                            placeholder="Password">
                        <label for="floatingPassword">Nhập Lại Mật khẩu</label>
                    </div>
                    <div class="emptynoti"></div>
                    <span><input type="checkbox" id="policy" name="policy_user"
                            style="width: 16px; height: 16px;">&nbsp;&nbsp;
                        Tôi đồng ý với <a href="">Điều khoản</a> của ứng dụng.</span>
                    <button type="submit" class="form-control confirm" id="btnDK" value="Đăng ký"
                        name="dangKy"></button>
                </form>
                <div id="result"></div>
            </div>


            <div class="col banner">
                <img src="IMAGE/banner-log-vertical.jpg" alt="">
            </div>
        </div>
    </div>

=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="icon" href="IMAGE/T.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="Register.css" />
  <style>
    body {
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .allAlert {
      width: 400px;
      text-align: center;
      position: absolute;
      display: none;
      top: 35%;
      z-index: 2000;
      transition: all 0.5s ease-in-out;
    }

    .modal {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1500;
    }

    #register {
      opacity: 0.5;
    }
  </style>
</head>

<body>
      <div class="alert alert-success allAlert" role="alert" id="alert-success">
      <ion-icon name="checkmark"></ion-icon>&nbsp;&nbsp;
      Đăng ký thành công! <a href="log-in.php" class="alert-link">Tiếp tục</a>
      </div>
      
      <div class="alert alert-danger allAlert" id="alert-warning" role="alert">
        <ion-icon name="warning"></ion-icon>&nbsp;&nbsp;
        Tài khoản đã tồn tại! vui lòng <a href="Register.php">Thử lại</a>.
      </div>
  
  <div class="container-fluid text-center main">
 
    <div class="row row-cols-2 ">
      <div class="col info">
        <form id="register" method="post">
          <h2><strong>Đăng Ký với <span style="color: var(--logo-Tri-custom);">Tri</span><span
                style="color: var(--logo-Vie-custom);">Vie</span></strong></h2>
          <div class="icon-btn">
            <div class="icon"><i class="fab fa-google"></i></div>
            <div class="icon"><i class="fab fa-facebook"></i></div>
          </div>
          Điền thông tin
          <div class="input" ></div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control readonly form-input" id="floatingInput" name="id_user" disabled
              placeholder="tên đăng nhập">
            <label for="floatingInput">Tên đăng nhập</label>
            <div class="emptynoti"></div>
          </div>
          <div class="emptynoti"></div>
          <input type="Date" class="form-control" id="floatingDateInput" name="birth_user" disabled
            placeholder="name@example.com">
          <select name="gender_user" id="" class="form-control" disabled>
            <option value="-1">Giới tính</option>
            <option value="0">Nữ</option>
            <option value="1">Nam</option>
            <option value="2">Không rõ</option>
          </select>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="pass_user" placeholder="Password" disabled>
            <label for="floatingPassword">Mật khẩu</label>
          </div>
          <div class="emptynoti"></div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingRetypePassword" name="retype_pass_user" disabled
              placeholder="Password">
            <label for="floatingPassword">Nhập Lại Mật khẩu</label>
          </div>
          <div class="emptynoti"></div>
          <span><input type="checkbox" id="policy" name="policy_user" style="width: 16px; height: 16px;" disabled>&nbsp;&nbsp;
            Tôi đồng ý với <a href="">Điều khoản</a> của ứng dụng.</span>
          <button type="submit" class="form-control confirm" id="btnDK" value="Đăng ký" name="dangKy" disabled></button>
        </form>
        <div id="result"></div>
      </div>


      <div class="col banner">
        <img src="IMAGE/banner-log-vertical.jpg" style = 'opacity: 0.5' alt="">
      </div>
    </div>
  </div>
  </div>


</body>
<script src="index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"></script>

</html>
<?php
require_once("DB/ketnoi.php");
if (isset($_POST["dangKy"])) {
  //lấy thông tin từ các form 
  $username = $_POST["id_user"];
  $password = $_POST["pass_user"];
  $Rpass = $_POST["retype_pass_user"];
  $birth = $_POST["birth_user"];
  // $check = $_POST["policy_user"];
  $gioiTinh = $_POST["gender_user"];
  //Kiểm tra rỗng
  // if ($username == "" || $password == "" ||$Rpass == "" ||$birth == ""||$gioiTinh == -1) {
  // 	echo "bạn vui lòng nhập đầy đủ thông tin";
  // }
  // else if ($check == "")
  // {

  //     echo"Vui lòng đồng ý điều khoản dịch vụ";
  // }
  // if ($password != $Rpass) {
  //   echo "Mật khẩu không trùng nhau";
  // } else {
    //truy vấn kiểm tra tồn tại
    $sql = "select Ten_Dang_Nhap  from nguoi_dung where Ten_Dang_Nhap='$username'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    if (count($data) > 0) {
      echo "<script>$('.allAlert').css('display','none')</script>";
      echo "<script>$('#alert-warning').css('display','block')</script>";
    } else {
      $sql = "INSERT INTO nguoi_dung(Ten_Dang_Nhap,Ngay_Sinh,Gioi_Tinh,Phan_Quyen,Mat_Khau) 
                    VALUES ('$username','$birth','$gioiTinh','0','$password')";
      $conn->query($sql);
      echo "<script>$('.allAlert').css('display','none')</script>";
      echo "<script>$('#alert-success').css('display','block')</script>";
      //    header("Location: Register.php");
    }
  }

// }
// }
?>