<?php 

    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
    require_once (PROJECT_PATH.'/models/libro.php');
    //echo PROJECT_PATH.'services/utenteService.php';
    //require_once(PROJECT_PATH.'services/utenteService.php');
    require_once(PROJECT_PATH.'services/libroService.php');
    $libroService = new LibroService();
    if (isset($_POST["SalvaLibro"])){
        $updateRes = $libroService->upsertLibro($_POST['id'], $_POST['titolo'],$_POST['editore'], $_POST['urlAnteprimaCopertina']);
    }
    $libroTrovato = new Libro(0, '','','');    
    $queryID="";
    if (isset($_GET['id'])){
        $idLibro = $_GET['id'];
        
        $test = $libroService->getById($idLibro);
        $libroTrovato = $test;
        $queryID = "?id=$idLibro";
    }
    
    
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
    <?php require(PROJECT_PATH.'/components/navbar.php');?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">
                    Inserisci nuovo libro
                </h1>
            </div>

        </div>
        <?php
        if (isset($updateRes) && $updateRes == TRUE){?>
        <div class="alert alert-success" role="alert">
                Operazione completata con successo
            </div> 
        <?php
        }
        else{
            if (isset($updateRes) && $updateRes == FALSE){?>
                <div class="alert alert-danger" role="alert">
                Si è verificato un errore
            </div> 
            <?php
            }
        }
        ?>
        <form method='post' action="<?=PROJECT_FOLDER?>pages/formLibro.php<?= $queryID?>">
        <div class="row">
        
            <div class="col-4">
                Titolo:
            </div>
            <div class="col-8">
                <input type="hidden" name="id" value="<?=$libroTrovato->id?>" />
                <input type="text" class="form-control" name="titolo" value="<?= $libroTrovato->titolo?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Editore:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="editore" value="<?= $libroTrovato->editore?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                UrlAnteprimaCopertina:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="urlAnteprimaCopertina" value="<?= $libroTrovato->urlAnteprimaCopertina?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <input type="submit" class="btn btn-success" name="SalvaLibro" value="Salva Libro" />
            </div>
        </div>
        </form>
    </div>

</body>

</html>