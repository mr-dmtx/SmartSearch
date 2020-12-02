<nav class="navbar navbar-expand-lg navbar-warning bg-warning">
  <a class="navbar-brand text-dark" href="#">Smart Search</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-dark" href="../inicio">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="../perfil"> Perfil</a>
      </li>
      <?php
      if($_SESSION['id'] % 2 == 1){
        ?>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../produtos">Meus Produtos</a>  
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../catalogo/loja.php?loja=<?=$_SESSION['id']?>">Meu Catalogo</a>  
        </li>
        <?php
      }
      ?>
      <li class="nav-item">
        <a class="nav-link text-dark" href='../php/logout.php'>Sair</a>  
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="../procurar/index.php">
      <input class="form-control" type="search" name="termo" placeholder="Procurar" aria-label="Search" required="">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Procurar</button>
    </form>
  </div>
</nav>
<?php 

  $url = $_SERVER["REQUEST_URI"]; 

  $page = explode("/", $url);

  if($page[1] == "inicio" || $page[1] == "procurar"){

    ?>
    <div class="container mt-5">
<form class="form-inline my-2 my-lg-0 justify-content-center" method="get" action="../procurar/index.php">
      <input class="form-control col-8" type="search" name="termo" placeholder="Procurar" aria-label="Search" required="">
      <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Procurar</button>
    </form>
    </div>
    <?php

  }

?>
