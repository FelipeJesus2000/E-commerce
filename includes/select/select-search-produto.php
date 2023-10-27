<?php
try{
    require("../connection.php");
    if(!isset($_POST['nm_produto']) || $_POST['nm_produto'] == "" || $_POST['nm_produto'] == null){
        $result = null;
    }
    else{
        $nm = $_POST['nm_produto'];

        $sql = "SELECT cd_produto, nm_produto, nm_imagem_produto
        FROM tb_produto
        WHERE nm_produto LIKE '$nm%' 
        LIMIT 3;";

        $query = $conn->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // $result = $result[0];
    // print_r(json_encode($result));
    // echo (json_encode($result));
    

}
catch(PDOException $error){
    echo $error->getMessage();
}
if($result != null){
    foreach ($result as $key => $val) {
?>
<a href="produto.php?cd=<?php echo $val['cd_produto'] ?>" class="link-no-style">
<div class="col-md-12 row">
    <img src="./assets/img/<?php echo $val['nm_imagem_produto'] ?>" class="col-md-3" />
    <span id="search-name" class="col-md-6"><?php echo substr($val['nm_produto'], 0, 20)."..." ?></span>
</div>
</a>
<hr>

<?php }}else{?>
    
 
<div class="col-md-12 row">
    <span id="search-name" class="col-md-6">Ops! nenhum produto foi encontrado</span>
</div>

<?php } ?>