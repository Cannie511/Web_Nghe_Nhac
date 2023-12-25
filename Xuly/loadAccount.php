<?php
function loadUserAccount(){
    include("DB/ketnoi.php");
    $sql="select * from nguoi_dung";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $userAccount = $stm->fetchAll(PDO::FETCH_ASSOC);
    $no=1;
        foreach ($userAccount as $k => $v) {
            echo "<tr>
            <td>".$no."</td>
            <td>".$userAccount[$k]['Ten_Dang_Nhap']."</td>
            <td><input type='password' id='pass' readonly value='".$userAccount[$k]['Mat_Khau']."'></td>
            <td>";
            if($userAccount[$k]['Phan_Quyen'] == 0){
                echo "Người dùng";
            }
            if($userAccount[$k]['Phan_Quyen'] == 1){
                echo "Nghệ sĩ";
            }
            if($userAccount[$k]['Phan_Quyen'] == 2){
                echo "Admin";
            } 
            echo "</td>
            <td>".$userAccount[$k]['Ngay_Sinh']."</td>"; 
            echo "
            <td><i class='fas fa-pen' data-bs-toggle='offcanvas' href='#editRole' role='button' aria-controls='offcanvasExample'  data-ma-ND='" . $userAccount[$k]['Ma_ND'] .
            "' onclick='phanQuyen(this)' ></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-trash' data-ma-xoa='" .$userAccount[$k]['Ma_ND'].
            "' onclick='xoaND(this)'></i></td>
          </tr>";
         $no++;
        }
}
?>