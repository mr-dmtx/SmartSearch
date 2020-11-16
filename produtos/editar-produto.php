<?php 
try {

  session_start();
  require $_SERVER['DOCUMENT_ROOT'] . '/php/connection-database.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/php/cliente.php';

  if(!isset($_SESSION['email']) or $_SESSION['id'] % 2 == 0){
    header("location: ../login/login.php");
  }

  $submit = $_POST['submit'] ?? null;

  if(!is_null($submit)){
    $produto = $_POST['nome_produto'] ?? null;
    $descricao_prod = $_POST['descricao_prod'] ?? null;
    $valor_prod = $_POST['preco_produto'] ?? null;

    if(!is_null($produto) and !is_null($descricao_prod) and !is_null($valor_prod)){
     if($submit == "edit"){
      //update
      $update = "UPDATE produto SET nm_produto = ?, ds_produto = ?, vl_produto = ? WHERE cd_produto = ? and fk_loja_produto in (SELECT cd_cnpj FROM loja where fk_usuario_loja = ?);";

      $cmd = $conexao->prepare($update);

      $cmd->bindParam(1, $produto);
      $cmd->bindParam(2, $descricao_prod);
      $cmd->bindParam(3, $valor_prod);
      $cmd->bindParam(4, $_GET['p']);
      $cmd->bindParam(5, $_SESSION['id']);

      $cmd->execute();

      header('Location: index.php');
      
     }
     elseif ($submit == "delete") {
       //delete
      $delete = "delete from produto where cd_produto = ? and fk_loja_produto in (SELECT cd_cnpj FROM loja where fk_usuario_loja = ?);";

      $cmd = $conexao->prepare($delete);

      $cmd->bindParam(1, $_GET['p']);
      $cmd->bindParam(2, $_SESSION['id']);

      $cmd->execute();

      header('Location: index.php');
     }
    }
  }
  
    $select = "select * from produto p join loja l on l.cd_cnpj = p.fk_loja_produto join usuario u on u.cd_usuario = l.fk_usuario_loja where u.cd_usuario = ? and cd_produto = ?;";

    $cmd = $conexao->prepare($select);

    $cmd->bindParam(1, $_SESSION['id']);
    $cmd->bindParam(2, $_GET['p']);

    $cmd->execute();

    $v = $cmd->fetch();
  
  

} catch (Exception $e) {
  echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include '../php/links-head.php'; ?>
</head>
<body>
	<?php include '../php/nav-bar.php'; ?>
  <div class="container mt-5">
    <h2 class="text-center mb-3">Editar Produto</h2>
    <form class="row justify-content-center" method="POST">
      <div class="form-group col-md-6">
        <label>Nome:</label>
        <input type="text" class="form-control" name="nome_produto" value="<?=$v['nm_produto']?>" required="">
      </div>
      <div class="w-100"></div>
      <div class="form-group col-md-6">
        <label>Descrição</label>
        <textarea class="form-control" name="descricao_prod" maxlength="100" required=""><?=$v['ds_produto']?></textarea>
      </div>
      <div class="w-100"></div>
      <div class="form-group col-md-6">
        <label>Preço:</label>
        <input type="number" class="form-control" name="preco_produto" id="preco_produto" step="any" value="<?=$v['vl_produto']?>" required="">
      </div>
      <div class="w-100"></div>
       <button type="submit" class="btn btn-warning col-5 mb-2 font-weight-bold" name="submit" value="edit">Editar produto</button>
       <div class="w-100"></div>
       <button type="submit" class="btn btn-danger col-5 mb-2 font-weight-bold" name="submit" value="delete">Deletar produto</button>
       <div class="w-100"></div>
       <div class="w-100"></div>
      <a href="index.php" class="btn btn-primary col-5 mb-5 font-weight-bold">Voltar</a>
  </div>
  
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>