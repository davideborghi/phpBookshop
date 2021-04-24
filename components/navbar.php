<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHPBOOKSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Libri</a>
        <a class="nav-link" href="#">Autori</a>
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Generi</a>
        
      </div>
      
    </div>
    <?php 
      if (isset($_SESSION['CURRENT_USER'])){?>
      Bentornato 
        <button class="btn btn-outline-light pull-right">Profilo</button>
        <button class="btn btn-outline-light pull-right">Logout</button>  
      <?php
      }
      else{?>
        <button class="btn btn-outline-light pull-right">Login</button>
        <button class="btn btn-outline-light pull-right">Registrati</button>  
      <?php
      }
    ?>
    
  </div>
</nav>