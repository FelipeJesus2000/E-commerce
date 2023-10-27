<?php
try{
    require("../connection.php");
    if(isset($_POST['search']) || ($_POST['search'] != "")){
        $search = $_POST['search'];
    }

    $sql = "SELECT prod.cd_produto, prod.nm_produto, prod.vl_produto,
    prod.nm_imagem_produto, des.pc_desconto, prom.nm_promocao
    FROM tb_produto AS prod
    LEFT JOIN tb_desconto AS des
    ON prod.cd_produto = des.cd_produto
    LEFT JOIN tb_promocao AS prom
    ON prom.cd_promocao = des.cd_promocao
    LEFT JOIN tb_categoria as cat
    on cat.cd_categoria = prod.cd_categoria
    WHERE prod.nm_produto like '$search%'";

    $query = $conn->query($sql);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    // $result = $result[0];
    // print_r($result);
    // echo (json_encode($result));

}
catch(PDOException $error){
    echo $error->getMessage();
}
echo "<h3>Resultado da pesquisa '$search' </h3>";
if($result != null){
    foreach ($result as $key => $val) {
        $valor = number_format($val['vl_produto'], 2 , ",", ".");
?>
<a href="produto.php?cd=<?php echo $val['cd_produto'] ?>" class="link-no-style col-4">
<div class=" mt-3">
    <div class="card">
        <img src="assets/img/<?php echo $val['nm_imagem_produto']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $val['nm_produto'] ?></h5>
            <p class="card-text">R$: <?php echo $valor ?></p>
        </div>
    </div>
</div>
</a>
<?php }}else{?>

<h1>Nenhum Resultado encontrado!</h1>

<?php } ?>