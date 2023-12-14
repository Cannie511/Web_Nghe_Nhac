<?php
session_start();
include('Xuly/doiMK.php');
print_r($_POST);
if (isset($_POST['doiMK'])) {
    doiMK($_POST['pass_user'], $_POST['new_pass'], $_POST['retype_pass'], $_SESSION['Ma_ND']);
}
?>