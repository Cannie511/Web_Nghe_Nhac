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
        // else if ($password != $Rpass)
        // {
        //     echo "Mật khẩu không trùng nhau";
        // }
        // else{
			// truy vấn kiểm tra tồn tại
            $sql="select Ten_Dang_Nhap  from nguoi_dung where Ten_Dang_Nhap='$username'";
            if(mysqli_num_rows($conn->query($sql))  > 0){
                echo "Tài khoản đã tồn tại";
            }else{
                $sql= "INSERT INTO nguoi_dung(
                    Ten_Dang_Nhap,
                    Ngay_Sinh,
                    Gioi_Tinh,
                    Phan_Quyen,
                    Mat_Khau
                    ) 
                    VALUES (
                    '$username',
                    '$birth',
                    '$gioiTinh',
                    '0',
                    '$password'
                    )";
                   $conn->query($sql);
                //    header("Location: Register.php");
            }
		}
	
	// }
    
?>