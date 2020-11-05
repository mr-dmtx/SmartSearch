<?php 
  try {
    session_start();

    require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/php/connection-database.php';
    if(!isset($_SESSION['email'])){
      header("location: ../login/login.php");
    }
    $aviso = '';
    $select = "";
    $id = $_SESSION['id'];
    
    if($id%2 == 0){

      $select = "SELECT * FROM usuario WHERE cd_usuario = :id";
    }

    else{
      $select = "select * from loja l join usuario u on u.cd_usuario = l.fk_usuario_loja join endereco e on e.fk_loja_endereco = l.cd_cnpj where cd_usuario = :id;";
    }

    $cmd = $conexao->prepare($select);

    $cmd->bindParam(":id", $_SESSION['id']);

    $dados = $cmd->execute();
    
    $dados = $cmd->fetchAll();

    $op = $_POST['submit'] ?? null;

    if(!is_null($op)){
      $email = $_SESSION['email'];
      switch ($op) {
        case 'att':
          if ($id%2 == 0) {
            
          }

          break;
        case 'delete':
          try {
              $delete = "DELETE FROM usuario WHERE cd_usuario = :id";  

              $cmd = $conexao->prepare($delete);

              $cmd->bindValue(":id", $_SESSION['id']);

              $cmd->execute();
              
              header("location: ../php/logout.php"); 

          } catch (PDOException $e) {
              $aviso = "Erro ao deletar conta. ". $e->getMessage();
          }

          break;
      }
    }
    
  } catch (Exception $e) {
    echo $e->getMessage();
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Smart Search</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <style type="text/css">
    label{
      font-weight: 700;
    }
  </style>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Smart Search</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="../perfil/index.php"> Perfil</a>
      <a class="nav-link" href='../php/logout.php'>Sair</a>
    </div>
  </div>
</nav>
<div class="container">
<h1 class="text-center mt-3">Meu Perfil #<?=$_SESSION['id']?></h1>
<form class="row justify-content-center" method="POST">
  <div class="form-group col-md-6">
    <label>Nome:</label>
    <input type="text" class="form-control" name="nome" value="<?=$dados[0]['nm_usuario']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Email:</label>
    <input type="email" class="form-control" name="email" value="<?=$dados[0]['nm_email']?>">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Senha atual:</label>
    <input type="password" class="form-control" name="senha-atual">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Nova senha:</label>
    <input type="password" class="form-control" name="senha-nova">
  </div>
  <div class="w-100"></div>
  <div class="form-group col-md-6">
    <label>Repita a nova senha:</label>
    <input type="password" class="form-control" name="re-senha-nova">
  </div>
  <?php 
    if($_SESSION['id']%2 == 1){
      require 'loja-form.php';
    }
   ?>
  <div class="w-100"></div>
    <button type="submit" class="btn btn-primary col-md-5 mb-2" name="submit" value="att">Atualizar dados</button>
    <div class="w-100"></div>
    <button type="submit" class="btn btn-danger col-md-5 mb-5" name="submit" value="delete">Deletar conta</button>
</form>
</div>
</body>
</html>