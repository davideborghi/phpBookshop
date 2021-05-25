<?php 

    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
    //echo PROJECT_PATH.'services/utenteService.php';
    //require_once(PROJECT_PATH.'services/utenteService.php');
    
    
    if(isset($_POST['ModificaProfilo'])){
        $uteService = new UtenteService();
        $updateRes = $uteService->aggiornaUtente($_POST['vecchiaEmail'],$_POST['email'], $_POST['nome'], $_POST['cognome']);
        if($updateRes == true){
            $_SESSION['CURRENT_USER'] = new Utente($_POST["nome"], $_POST["cognome"], $_POST["email"], '');
        }
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
                    I tuoi dati
                </h1>
            </div>

        </div>
        <?php
        if (isset($updateRes) && $updateRes == TRUE){?>
        <div class="alert alert-success" role="alert">
                Aggiornamento effettuato con successo
            </div> 
        <?php
        }
        else{
            if (isset($updateRes) && $updateRes == TRUE){?>
                <div class="alert alert-danger" role="alert">
                Si è verificato un errore
            </div> 
            <?php
            }
        }
        ?>
        <form method='post' action="<?=PROJECT_FOLDER?>pages/profilo.php">
        <div class="row">
        
            <div class="col-4">
                Email:
            </div>
            <div class="col-8">
                
                <input type="hidden" class="form-control" name="vecchiaEmail" value="<?= $user->email?>" />
                <input type="email" class="form-control" name="email" value="<?= $user->email?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Nome:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="nome" value="<?= $user->nome?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Cognome:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="cognome" value="<?= $user->cognome?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <input type="submit" class="btn btn-success" name="ModificaProfilo" value="Modifica Profilo" />
            </div>
        </div>
        </form>
    </div>

</body>

</html>