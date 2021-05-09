<?php 

    require_once('../constants.php');
    //echo PROJECT_PATH.'services/utenteService.php';
    require_once(PROJECT_PATH.'services/sessioneService.php');
    require_once(PROJECT_PATH.'services/utenteService.php');
    var_dump($_SESSION['CURRENT_USER']);
    
?>
<html>


<head>
    <title>
        MondaMari
    </title>
    <script type="text/javascript" src="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= PROJECT_FOLDER?>assets/styles.css" />
</head>

<body>
    <?php require(PROJECT_PATH.'/components/navbar.php'); ?>

</body>

</html>