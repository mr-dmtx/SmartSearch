<?php 
try {
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . '/php/connection-database.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';

  if(!isset($_SESSION['email'])){
    header("location: ../login/login.php");
  }


  $select = "select * from usuario u join loja l on l.fk_usuario_loja = u.cd_usuario join endereco e on e.fk_loja_endereco = l.cd_cnpj where u.cd_usuario%2 = 1 limit 6;";

  $cmd = $conexao->prepare($select);

  $cmd->execute();

  $v = $cmd->fetchAll();

  $selectProdutos = "select * from usuario join loja on fk_usuario_loja = cd_usuario join produto on fk_loja_produto = loja.cd_cnpj where produto.nm_produto like '%%' and produto.ds_produto like '%%';";

    $cmd = $conexao->prepare($selectProdutos);

    $cmd->execute();

    $vProd = $cmd->fetchAll();

} catch (Exception $e) {
  echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include '../php/links-head.php'; ?>
</head>
<body>
	<?php include '../php/nav-bar.php'; ?>
  <div class="container mt-5">
    <div class="card-group">
  <?php 
    $i = 0;
    foreach ($vProd as $prod) {
      if($i == 4){
        echo "<div class='w-100'></div>";
        $i = 0;
      }
      ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?=$prod['nm_produto']?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><a href="../catalogo/loja.php?loja=<?=$prod['cd_usuario']?>"><?=$prod['nm_usuario']?></a> | R$ <?=$prod['vl_produto']?></h6>
          <p class="card-text"><?=$prod['ds_produto']?></p>
        </div>
      </div>
      <?php 
      $i+=1;
    }
   ?>
   </div>
   <hr>
    <div class="card-group">
      <?php 

      foreach ($v as $loja) {
        if($i == 4){
        echo "<div class='w-100'></div>";
        $i = 0;
      }
        ?>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <a href="../catalogo/loja.php?loja=<?=$loja['cd_usuario']?>"><h5 class="card-title"><?=$loja['nm_usuario']?></h5></a>
            <h6 class="card-subtitle mb-2 text-muted"><?=$loja['nm_email']?> | <?=$loja['cd_telefone']?></h6>
            <p class="card-text"><?=$loja['nm_endereco']?>, <?=$loja['cd_numero_endereco']?>, <?=$loja['cd_complemento']?>, <?=$loja['nm_bairro']?>, <?=$loja['nm_cidade']?>, <?=$loja['sg_uf']?></p>
          </div>
        </div>
        <?php 
        $i+= 1;
      }
      ?>
    </div>
  </div>
  
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>