<?php 

function timNguoiDung($name)
{
    include ("DB/ketnoi.php");

$sql = "SELECT Ten_Dang_Nhap FROM nguoi_dung WHERE LEFT(Ten_Dang_Nhap, 3) = '$name'";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    if(count($data) > 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}
if(isset($_GET['timKiem']))
{
    $name = $_GET["IDsearch"];
    timNguoiDung($name);
}

?>