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
</head>

<body>
    <?php
    require(PROJECT_PATH.'/components/navbar.php');
    require(PROJECT_PATH.'/services/utenteService.php');
     ?> 
    <div class="container-fluid">
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
    </div>




</body>

</html>