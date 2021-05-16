<?php 
    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');

$idLibro = $_GET['id'];

require_once(PROJECT_PATH.'services/libroService.php');
$libroService = new LibroService();
$librotrovato = $libroService->getById($idLibro);
?>
<html>
<head>
    <title>
        MondaMari
    </title>
    <script type="text/javascript" src="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?=PROJECT_FOLDER?>lib/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css" />
</head>

<body>
    <?php require(PROJECT_PATH.'/components/navbar.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <img src="<?=$librotrovato->urlAnteprimaCopertina?>" />
            </div>
            <div class="col-8">
            <div class="">
            <h1><?= $librotrovato->titolo ?>
            </div>
                
            </div>

        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h1>Autori</h1>
            </div>
        </div>
    </div>




</body>

</html>