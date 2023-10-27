<?php
try{
    require("../connection.php");

    $sql = "SELECT prod.cd_produto, prod.nm_produto, prod.vl_produto, prod.ds_produto, 
    prod.nm_imagem_produto, des.pc_desconto, prom.nm_promocao
    FROM tb_produto AS prod
    LEFT JOIN tb_desconto AS des
    ON prod.cd_produto = des.cd_produto
    LEFT JOIN tb_promocao AS prom
    ON prom.cd_promocao = des.cd_promocao;";

    $query = $conn->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($result));
    // echo (json_encode($result));
}
catch(PDOException $error){
    echo $error->getMessage();
}
?>