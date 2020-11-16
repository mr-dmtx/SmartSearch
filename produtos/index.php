<?php 
try {
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . '/php/connection-database.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';

  if(!isset($_SESSION['email']) or $_SESSION['id'] % 2 == 0){
    header("location: ../login/login.php");
  }

  $select = "select * from usuario u join loja l on l.fk_usuario_loja = u.cd_usuario join produto p on p.fk_loja_produto = l.cd_cnpj where u.cd_usuario == ?;";

  $cmd = $conexao->prepare($select);

  $cmd->bindParam(1, $_SESSION['id']);

  $cmd->execute();

  $v = $cmd->fetchAll();

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
    <div class="row">
      <div class="col-12">
        <a href="/produtos/adicionar-produto.php" class="btn btn-primary mb-5">Adicionar novo produto ao catalogo</a>
      </div>
    </div>
    <div class="row row-cols-sm-2 row-cols-md-3">
      <?php
      $i = 0;
      foreach ($v as $produto) {
        ?>
        <div class="col mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?=$produto['nm_produto']?>  <a href="/produtos/editar-produto.php?p=<?=$produto['cd_produto']?>"><img src="../css/bootstrap-icons-1.1.0/pencil-square.svg" alt="pencil square icon" width="20" height="20" title="Editar informações"></a></h5>

            <h6 class="card-subtitle mb-2 text-muted">R$ <?=$produto['vl_produto']?> | <?=$produto['nm_usuario']?></h6>
            <p class="card-text"><?=$produto['ds_produto']?></p>
          </div>
        </div>
        </div>
        <?php 
      }
      ?>
    </div>
  </div>
  
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>