<?php


function login($username, $password)
{
      ///rang buoc du lieu
      // if (!preg_match('/^.{3,50}$/', $username)) {
      //       $response = array("code" => "400", "message" => "Invalid username or password");
      //       return json_encode($response);
      // }

      // if (!preg_match('/^.{6,50}$/', $password)) {
      //       $response = array("code" => "400", "message" => "Invalid username or password");
      //       return json_encode($response);
      // }
      session_start();
      require_once('../DB/loginDB.php');
      try {

            $query = 'SELECT Ma_ND as id,Phan_Quyen as role FROM nguoi_dung WHERE Ten_Dang_Nhap = :username and Mat_Khau = :password ';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                  $response = array("code" => "200", "message" => "Login successfully", "id" => $result["id"], "role" => $result["role"]);
                  foreach($result as $key => $v)
                  {
                        $_SESSION['Ma_ND'] = $result['id'];
                  }
                  return json_encode($response);
            } else {
                  $response = array("code" => "404", "message" => "Account's Credential not found ");
                  return json_encode($response);
            }
      } catch (PDOException $e) {
            $response = array("code" => "500", "message" => "Error:" . $e->getMessage());
            return json_encode($response);
      }

      // if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Lấy dữ liệu từ form
//     $username = $_POST["username"];
//     $password = $_POST["password"];

      //     // Mã hóa mật khẩu bằng MD5
//     $hashed_password = md5($password);

      //     // Kiểm tra thông tin đăng nhập (ví dụ: chỉ đơn giản in ra)
//     echo "Username: $username<br>";
//     echo "Password: $hashed_password";
// } else {
//     // Redirect về trang đăng nhập nếu không phải là POST request
//     header("Location: index.php");
//     exit();
// }
}


?>