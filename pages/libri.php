<html>

<?php 
    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
 ?>
<head>
    <title>
        MondaMari
    </title>
    <script type="text/javascript" src="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= PROJECT_FOLDER?>assets/styles.css" />
    
</head>

<body>
    <?php
    require(PROJECT_PATH.'/components/navbar.php');
    require(PROJECT_PATH.'/services/utenteService.php');
     ?> 
    <div class="container-fluid">
    <?php if(isset($user)){ ?>
        <div class="row">
            <div class="col-4">
                <a href="<?= PROJECT_FOLDER?>pages/formLibro.php" class="btn btn-success mt-10">
                    Inserisci libro
                </a>
            </div>
        </div>
    <?php }?>

        <div class="row">

            <link rel="stylesheet" href="<?= PROJECT_FOLDER?>assets/libroComponent.css" />
            <?php require(PROJECT_PATH.'services/libroService.php') ?>
            <?php 
            $libroService = new LibroService();
            if (isset($_GET['idAutore'])){
                $libri = $libroService->getLibriByAutore($_GET['idAutore']);
            }else{
                
                $libri = $libroService->getAllLibri();
            }
                if (isset($libri)){

                
                foreach ($libri as $libro) {
            ?>
            <div class="col-md-4">
                <?php include(PROJECT_PATH.'components/libroComponent.php'); ?>
            </div>
            <?php

            }
        }
        else{
            echo 'Nessun Libro';
        }
            ?>
        </div>

    </div>
    </div>




</body>

</html>