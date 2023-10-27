<?php
// $_POST['nm_produto'];
// $_POST['vl_produto'];
// $_POST['ds_produto'];
// $_POST['nm_imagem_produto'];
// $_POST['pc_desconto'];
// $_POST['nm_promocao'];
// $_POST['cd_produto'];




if($_POST['nm_promocao'] != "null"){
    function calcularDesconto($valor, $desconto) {
        $novoValor = $valor - $valor * $desconto / 100;
        return  number_format($novoValor, 2 , ",", ".");
    }
    
    $valor = calcularDesconto($_POST['vl_produto'], $_POST['pc_desconto']);
?>

<a href="<?php echo "produto.php?cd={$_POST['cd_produto']}" ?>" class="link-no-style">
        <div class="carousel-item active" data-bs-interval="3000 ">
            <div class="row ">
                <div class="col-md-6 img-carousel  text-center p-4">
                    <img src="assets/img/<?php echo $_POST['nm_imagem_produto']; ?>" alt="" >
                </div>
                <div class="col-md-6 row descPromotion text-center p-5">
                    <span class="w-100 col-md-6"><?php echo $_POST['nm_promocao']; ?></span>
                    <span class="w-100 col-md-6"><?php echo $_POST['nm_produto'] ?></span>
                    <span class="w-100 col-md-6">
                        <s>R$: <?php echo $_POST['vl_produto'] ?>  </s>
                        <span class="icone-desconto">-<?php echo $_POST['pc_desconto'] ?>% </span>
                    </span>
                    <h5 class="w-100 col-md-6">R$: <?php echo $valor ?></h5>
                </div>
            </div>
        </div>
</a> 
<?php 
} if($_POST['nm_promocao'] == "null"){ 
    $valor = number_format($_POST['vl_produto'], 2 , ",", ".");
?>
<a href="<?php echo "produto.php?cd={$_POST['cd_produto']}" ?>" class="link-no-style">
        <div class="carousel-item active" data-bs-interval="3000 ">
            <div class="row ">
                <div class="col-md-6 img-carousel  text-center p-4">
                    <img src="assets/img/<?php echo $_POST['nm_imagem_produto']; ?>" alt="" >
                </div>
                <div class="col-md-6 row descPromotion text-center p-5">
                    <span class="w-100 col-md-6"><?php echo $_POST['nm_produto'] ?></span>
                    <h5 class="w-100 col-md-6">R$: <?php echo $valor ?></h5>
                </div>
            </div>
        </div>
</a> 
<?php } ?>