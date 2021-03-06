<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHPBOOKSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a href="<?=PROJECT_FOLDER?>" class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="<?=PROJECT_FOLDER?>pages/libri.php">Libri</a>
        <a class="nav-link" href="<?=PROJECT_FOLDER?>pages/autori.php">Autori</a>
        <?php if (isset($_SESSION['CURRENT_USER'])){ ?>
        <a href="<?=PROJECT_FOLDER?>pages/profilo.php" class="btn btn-outline-light pull-right">Profilo</a>  
        <?php } ?>
      </div>
      
    </div>
    
    <?php 
      
      if (isset($_SESSION['CURRENT_USER'])){
        $user = $_SESSION['CURRENT_USER'];
        ?>
      
      <span class="nav-link active">Bentornato <?= $user->nome ?> <?= $user->cognome?></span>
      
      <form action="<?=PROJECT_FOLDER?>pages/login.php" method="POST">
          <input type="submit" Name="Logout" Value="Logout" class="btn btn-outline-light pull-right" />  
        </form>
      <?php
      }
      else{?>
        <a href="<?=PROJECT_FOLDER?>pages/login.php" class="btn btn-outline-light pull-right">Login</a>
        <a href="<?=PROJECT_FOLDER?>pages/registrati.php" class="btn btn-outline-light pull-right">Registrati</a>  
      <?php
      }
    ?>
    
    
  </div>
</nav>