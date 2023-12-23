<?php
function loadUserAccount(){
    require_once("DB/ketnoi.php");
    // $userAccount = array(
    //     array("Id" => "admin@trivieco.com", "pass"=>"Abc123@", "rule"=>2,"birth"=>"05/11/2002", "state"=>1),
    //     array("Id" => "Demo1@trivieco.com", "pass"=>"Abc123@", "rule"=>1, "birth"=>"25/08/2002", "state"=>0),
    //     array("Id" => "Demo2@trivieco.com", "pass"=>"Abc123@", "rule"=>0, "birth"=>"31/10/2002","state"=>0),
    //     array("Id" => "Demo3@trivieco.com", "pass"=>"Abc123@", "rule"=>0, "birth"=>"15/11/2002","state"=>1),
    // );

    $sql="select * from nguoi_dung  ";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $userAccount = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach ($userAccount as $k => $v) {
            echo "<tr>
            <td>".$userAccount[$k]['Ma_ND']."</td>
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
            <td>".$userAccount[$k]['Ngay_Sinh']."</td>
            <td>"; 
            echo "</td>
            <td><i class='fas fa-pen' data-bs-toggle='offcanvas' href='#editRole' role='button' aria-controls='offcanvasExample'  data-ma-ND='" . $userAccount[$k]['Ma_ND'] .
            "' onclick='phanQuyen(this)' ></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class='fas fa-trash' data-ma-xoa='" .$userAccount[$k]['Ma_ND'].
            "' onclick='xoaND(this)'></i></td>
          </tr>";
         
        }
    
}
?>