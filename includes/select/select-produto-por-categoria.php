<?php
try{
    require("../connection.php");
    if(isset($_POST['categoria']) || ($_POST['categoria'] != "")){
        $categoria = $_POST['categoria'];
    }

    $sql = "SELECT prod.cd_produto, prod.nm_produto, prod.vl_produto, prod.ds_produto, 
    prod.nm_imagem_produto, des.pc_desconto, prom.nm_promocao
    FROM tb_produto AS prod
    LEFT JOIN tb_desconto AS des
    ON prod.cd_produto = des.cd_produto
    LEFT JOIN tb_promocao AS prom
    ON prom.cd_promocao = des.cd_promocao
    LEFT JOIN tb_categoria as cat
    on cat.cd_categoria = prod.cd_categoria
    WHERE cat.nm_categoria='$categoria'";

    $query = $conn->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $result = $result[0];
    // print_r($result);
    // echo (json_encode($result));
    $valor = number_format($result['vl_produto'], 2 , ",", ".");
}
catch(PDOException $error){
    echo $error->getMessage();
}
?>
<a href="produto.php?cd=<?php echo $result['cd_produto'] ?>" class="link-no-style col-12">
<div class="mt-3">
    <div class="card">
        <img src="assets/img/<?php echo $result['nm_imagem_produto']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $result['nm_produto'] ?></h5>
            <p class="card-text">R$: <?php echo $valor ?></p>
        </div>
    </div>
</div>
</a>


