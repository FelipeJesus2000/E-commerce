<a href="produto.php?cd=<?php echo $_POST['cd_produto'] ?>" class="link-no-style">
<div class="col">
    <div class="card">
        <img src="assets/img/<?php echo $_POST['nm_imagem_produto']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['nm_produto'] ?></h5>
            <p class="card-text"><?php echo $_POST['ds_produto'] ?></p>
        </div>
    </div>
</div>
</a>