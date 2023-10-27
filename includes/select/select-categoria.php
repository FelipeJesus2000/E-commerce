<?php
try{
    require("../connection.php");

    $sql = "SELECT nm_categoria, nm_icone_categoria from tb_categoria";

    $query = $conn->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
    //  echo (json_encode($result));
}
catch(PDOException $error){
    echo $error->getMessage();
}
?>