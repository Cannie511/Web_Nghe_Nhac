<?php
try {
    //B1:
    $pdo = new PDO("mysql:host=localhost;dbname=bookstore", "root", "");
    //B2:
    $sql = "select masach, gia from sach where gia>=? and gia<=?";
    
    // $re = $pdo->query($sql);
    $stmt = $pdo->prepare($sql);
    $keyword = '%PHP%';
    // $stmt->bindValue(1,'%PHP%');
    // $stmt->bindValue(1,$keyword);
    // $stmt->execute();
    $stmt->execute(array(50000, 100000));
    // while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
    //     echo $row[1] , "<br>";
    // }
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo $row['tensach'] , "<br>";
    // }
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($data);
    // while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    //     echo $row['tensach'], '-', $row['gia'] , "<br>";
    //     echo "<hr>";
        
    // }
    
} catch (PDOException $e) {
    echo "co loi khi ket noi database";
}
?>