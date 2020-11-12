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

    $email = $_POST['email'];
    switch ($op) {

      case 'att':
        if($email != $_SESSION['email']){
          if(!verificarEmail($email)){
            $email = $_SESSION['email'];
          }
          else{ 
            $aviso = "Esse email já esta em uso!";
          }
        }

        $senha = $_POST['senha-atual'];
        $senhaNova = $_POST['senha-nova'];
        $reSenhaNova = $_POST['re-senha-nova'];
        $nome = $_POST['nome'];
        if($senhaNova != ""){
          if($senhaNova == $reSenhaNova){
            $senha = md5($senhaNova);
          }  
        }

        $update = "UPDATE usuario SET nm_email = ?, cd_senha = ?, nm_usuario = ? WHERE cd_usuario = ?";

        $cmd = $conexao->prepare($update);

        $cmd->bindParam(1, $email);
        $cmd->bindParam(2, $senha);
        $cmd->bindParam(3, $nome);
        $cmd->bindParam(4, $_SESSION['id']);

        $cmd->execute();

        if($_SESSION['id']%2 == 1){

          $update = "UPDATE endereco SET nm_endereco = ?, cd_numero_endereco = ?, nm_cidade = ?, nm_bairro = ?, cd_complemento = ?, sg_uf = ? where cd_loja in (select cd_loja from endereco e join usuario u on u.cd_usuario = l.fk_usuario_loja join loja l on e.fk_loja_endereco = l.cd_cnpj where u.cd_usuario = ?);";

          $cmd = $conexao->prepare($update);

          $cmd->bindParam(1, $_POST['rua']);
          $cmd->bindParam(2, $_POST['numero']);
          $cmd->bindParam(3, $_POST['cidade']);
          $cmd->bindParam(4, $_POST['bairro']);
          $cmd->bindParam(5, $_POST['complemento']);
          $cmd->bindParam(6, $_POST['uf']);
          $cmd->bindParam(7, $_SESSION['id']);

          $cmd->execute();

          $update = "UPDATE loja SET cd_cep = ? WHERE fk_usuario_loja = ?";

          $cmd = $conexao->prepare($update);

          $cmd->bindParam(1, $_POST['cep']);
          $cmd->bindParam(2, $_SESSION['id']);

          $cmd->execute();
        }

        header("location: #"); 
      break;

      case 'delete':
      $delete = "DELETE FROM usuario WHERE cd_usuario = :id";  

      $cmd = $conexao->prepare($delete);

      $cmd->bindValue(":id", $_SESSION['id']);

      $cmd->execute();

      header("location: ../php/logout.php"); 

      break;
    }


  } 
}catch (PDOException $e) {
  $aviso = "Erro ao realizar operação. ". $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include '../php/links-head.php'; ?>
</head>
<body>
  <style type="text/css">
    label{
      font-weight: 700;
    }
  </style>
  <?php include '../php/nav-bar.php'; ?>
  <div class="container">
    <h1 class="text-center mt-3">Meu Perfil #<?=$_SESSION['id']?></h1>
    <span class="text-center" style="color: red">
      <?=$aviso?>
    </span>
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
        <input type="password" class="form-control" name="senha-atual" value="<?=$dados[0]['cd_senha']?>" readonly>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>