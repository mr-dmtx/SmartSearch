<?php 
try {
  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . '/php/connection-database.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';

  if(!isset($_SESSION['email'])){
    header("location: ../login/login.php");
  }

  $idLoja = $_GET['loja'] ?? null;

  if($idLoja%2 == 0 and is_null($idLoja)){
    header("location: ../login/login.php"); 
  }

  $infoLoja = "select * from usuario join loja on fk_usuario_loja = cd_usuario join endereco on fk_loja_endereco = loja.cd_cnpj where cd_usuario = ?;";

  $cmd = $conexao->prepare($infoLoja);

  $cmd->bindParam(1, $idLoja);

  $cmd->execute();

  $info = $cmd->fetch();

  $prodsLoja = "select * from usuario join loja on fk_usuario_loja = cd_usuario join produto on fk_loja_produto = cd_cnpj where cd_usuario = ?;";

  $cmd = $conexao->prepare($prodsLoja);

  $cmd->bindParam(1, $idLoja);

  $cmd->execute();

  $prodsLoja = $cmd->fetchAll();

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
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"><?=$info['nm_usuario']?></h1>
        <p class="lead"><?=$info['nm_endereco']?>, <?=$info['cd_numero_endereco']?>, <?=$info['cd_complemento']?>, <?=$info['nm_bairro']?>, <?=$info['nm_cidade']?>, <?=$info['sg_uf']?></p>
        <p class="lead">Email: <a href="mailto: <?=$info['nm_email']?> "><?=$info['nm_email']?></a> | Telefone: <?=$info['cd_telefone']?></p>
      </div>
    </div>
    <div class="row row-cols-sm-2 row-cols-md-3">
    <?php 
        if($prodsLoja){
          //var_dump($prodsLoja);
          foreach ($prodsLoja as $produto) {
            ?>
            <div class="col mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title"><?=$produto['nm_produto']?></h5>
                  <h6 class="card-subtitle mb-2 text-muted">R$ <?=$produto['vl_produto']?> | <?=$produto['nm_usuario']?></h6>
                  <p class="card-text"><?=$produto['ds_produto']?></p>
                </div>
              </div>
              </div>
            <?php 
          }
        }

     ?>
     </div>
  </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>