<?php 
    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');

$idLibro = $_GET['id'];

require_once(PROJECT_PATH.'services/libroService.php');
require_once(PROJECT_PATH.'services/autoreService.php');
$libroService = new LibroService();
$librotrovato = $libroService->getById($idLibro);
$autoreService = new AutoreService();
$autori = $autoreService->getAutoriOfLibro($idLibro);

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
    <?php require(PROJECT_PATH.'/components/navbar.php') ?>
    <div class="container">
        <div class="row mt-10">
            <div class="col-4">
                <a href="<?= PROJECT_FOLDER?>pages/formLibro.php?id=<?= $_GET['id']?>" class="btn btn-success mt-10">
                    Modifica libro
                </a>

            </div>
        </div>
        <div class="row mt-10">
            <div class="col-4">
                <img class="col-12" src="<?=$librotrovato->urlAnteprimaCopertina?>" />
            </div>
            <div class="col-8">
                <div class="">
                    <h1><?= $librotrovato->titolo ?></h1>
                </div>
                
                <?php if(isset($autori)){
                    foreach($autori as $autore){
                 ?>
                <div>
                    <?= $autore->nome?>
                </div>
                    <?php 
                 }
                 } ?>
                
            </div>

        </div>

    </div>




</body>

</html>