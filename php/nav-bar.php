<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Smart Search</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../inicio">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../perfil"> Perfil</a>
      </li>
      <?php
      if($_SESSION['id'] % 2 == 1){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="../produtos">Meus Produtos</a>  
        </li>
        <?php
      }
      ?>
      <li class="nav-item">
        <a class="nav-link" href='../php/logout.php'>Sair</a>  
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="../procurar/index.php">
      <input class="form-control mr-sm-2" type="search" name="termo" placeholder="Search" aria-label="Search" required="">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>