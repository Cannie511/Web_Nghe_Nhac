<?php

if (isset($_POST["username"]) && isset($_POST["password"])) {
      require_once("login.php");
      $result = login($_POST["username"], $_POST["password"]);
      echo $result;
} else {
      $response = array("code" => "400", "message" => "Missing email or password");
      echo json_encode($response);
}

?>