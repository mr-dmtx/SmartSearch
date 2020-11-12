<?php 
  try {
    session_start();

    require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/php/connection-database.php';

    $aviso = "";

    if(!isset($_SESSION['email'])){
      header("location: ../login/login.php");
    }

    $pesquisa = preg_replace('/[^[:alpha:]_]/', '', $_GET['termo']);

    $select = "select * from usuario u join loja l on l.fk_usuario_loja = u.cd_usuario join endereco e on e.fk_loja_endereco = l.cd_cnpj where u.cd_usuario%2 = 1 and u.nm_usuario like '%$pesquisa%'";

    $cmd = $conexao->prepare($select);

    $v = $cmd->execute();

    $v = $cmd->fetchAll();

    if(!$v){
      $aviso = "<b>Nenhum resultado encontrado para ". $_GET['termo']."!</b>";
    }

    
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
<div class="container">
  <p><?=$aviso?></p>
  <div class="card-group">
  <?php 
    foreach ($v as $loja) {
      ?>
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?=$loja['nm_usuario']?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?=$loja['nm_email']?> | <?=$loja['cd_telefone']?></h6>
          <p class="card-text"><?=$loja['nm_endereco']?>, <?=$loja['cd_numero_endereco']?>, <?=$loja['cd_complemento']?>, <?=$loja['nm_bairro']?>, <?=$loja['nm_cidade']?>, <?=$loja['sg_uf']?></p>
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