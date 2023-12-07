
<?php
$servername = "localhost";
$username ="root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=webnghenhac", $username, $password);
  $conn->query("set names 'utf8' ");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
    echo "ERROR! Connect problem!";
}
?>