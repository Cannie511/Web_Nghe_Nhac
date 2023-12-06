<?php
define("DB_HOST", "localhost");
define("DB_DATABASE", "webnghenhac");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
try {
$conn = new PDO("mysql:host=" . constant("DB_HOST") . ";dbname=" . constant("DB_DATABASE"), constant("DB_USERNAME"),
constant("DB_PASSWORD"));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "<script>
    console.log('DB CONNECTED FAILED. ');
    </script><br>";
}
// $server_username = "root";
// $server_password = "";
// $server_host = "localhost";
// $database = 'webnghenhac';
// $conn = mysqli_connect($server_host,$server_username,$server_password,$database) ;
// mysqli_query($conn,"SET NAMES 'UTF8'");
?>