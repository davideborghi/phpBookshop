<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHPBOOKSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a href="<?=PROJECT_FOLDER?>" class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Libri</a>
        <a class="nav-link" href="#">Autori</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Generi</a>
        
      </div>
      
    </div>
    
    <?php 
      
      if (isset($_SESSION['CURRENT_USER'])){
        $user = $_SESSION['CURRENT_USER'];
        ?>
      
      <span class="nav-link active">Bentornato <?= $user->nome ?> <?= $user->cognome?></span>
      <form action="<?=PROJECT_FOLDER?>pages/login.php" method="POST">
        <button class="btn btn-outline-light pull-right">Profilo</button>
        
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