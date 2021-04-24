<html>

<?php 
    require_once('constants.php');
 ?>
<head>
    <title>
        MondaMari
    </title>
    <script type="text/javascript" src="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
</head>

<body>
    <?php
    
    require(PROJECT_PATH.'/services/utenteService.php');
    $utenteService = new UtenteService();
    $user = $utenteService->login('utente', 'password');
    var_dump($user);
     require(PROJECT_PATH.'/components/navbar.php') ?>
    <div class="container-fluid">
        <div class="row">

            <link rel="stylesheet" href="<?= PROJECT_FOLDER?>assets/libroComponent.css" />
            <?php require(PROJECT_PATH.'services/libroService.php') ?>
            <?php 
                $libroService = new LibroService();
                $libri = $libroService->getAllLibri();
                foreach ($libri as $libro) {
            ?>
            <div class="col-md-4">
                <?php include(PROJECT_PATH.'components/libroComponent.php'); ?>
            </div>
            <?php

            }
            ?>
        </div>

    </div>
    </div>




</body>

</html>