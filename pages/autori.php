<html>

<?php 
    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
 ?>
<head>
    <title>
        MondaMari
    </title>
    <?php require(PROJECT_PATH.'/components/scripts.php');?>
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
                <a href="<?= PROJECT_FOLDER?>pages/formAutore.php" class="btn btn-success mt-10">
                    Inserisci autore
                </a>
            </div>
        </div>
    <?php }?>
        <div class="row">

            <link rel="stylesheet" href="<?= PROJECT_FOLDER?>assets/libroComponent.css" />
            <?php require(PROJECT_PATH.'services/autoreService.php') ?>
            <?php 
                $autoreService = new AutoreService();
                $autori= $autoreService->getAllAutori();
                foreach ($autori as $autore) {
            ?>
            <div class="col-md-4">
                <?php include(PROJECT_PATH.'components/autoreComponent.php'); ?>
            </div>
            <?php

            }
            ?>
        </div>

    </div>
    




</body>

</html>