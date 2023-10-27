<?php
    $host = "localhost";
    $db  = "db_ecommerce";
    $user = "root";
    $pass = "admin";
try{
    $conn = new PDO("mysql:dbname=$db; host=$host", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");

    // $sql = "SELECT * FROM TB_PRODUTO";
    // $query = $conn->prepare($sql);
    // $query->execute();

    // while ($row = $query->fetch()) {
    //     echo $row['nm_produto']."<br />\n";
    // }

}
catch(PDOException $error){
    echo $error->getMessage();
}
?>