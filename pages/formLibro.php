<?php 

    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
    require_once (PROJECT_PATH.'/models/libro.php');
    require_once(PROJECT_PATH.'services/libroService.php');
    require_once(PROJECT_PATH.'services/autoreService.php');
    $libroService = new LibroService();
    $autoreService = new AutoreService();
    if ((isset($_POST['action']) && $_POST['action']=='EliminaAutore')){
        $libroService->eliminaAutore($_POST['idLibro'],$_POST['idAutore']);
        die('OK');
    }
    if(isset($_POST["action"])){
        if ($_POST["action"] == 'AggiungiAutore'){
            $libroService->aggingiAutore($_POST['idLibro'],$_POST['idAutore']);
            die('OK');
        }
    }
    
    $tuttiAutori = $autoreService->getAllAutori();
    $autoriDelLibro =[];
    if (isset($_POST["SalvaLibro"])){
        $updateRes = $libroService->upsertLibro($_POST['id'], $_POST['titolo'],$_POST['editore'], $_POST['urlAnteprimaCopertina']);
    }
    $libroTrovato = new Libro(0, '','','');    
    $libroTrovato->autori = [];
    $queryID="";
    if (isset($_GET['id'])){
        $idLibro = $_GET['id'];
        $libroTrovato = $libroService->getById($idLibro);
        $queryID = "?id=$idLibro";
        $autoriDelLibro =  $autoreService->getAutoriOfLibro($idLibro);
        $libroTrovato->autori = $autoriDelLibro;
    }
?>
<html>


<head>
    <title>
        MondaMari
    </title>
    <?php require(PROJECT_PATH.'/components/scripts.php');?>
</head>

<body>
    <?php require(PROJECT_PATH.'/components/navbar.php');?>

    <div class="container">
    
        <div class="row">
            <div class="col">
                <h1 class="text-center">
                    <?php if(isset($_GET['id'])){
                        echo 'Modifica';
                    }else{
                        echo 'Inserisci nuovo';
                    } ?> libro
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
        <div class="row">
            <div class="col-4">
                Autori: <em>Attenzione: gli autori vengono aggiornati automaticamente ad ogni click fatto</em>
            </div>
        </div>
        <div class="row">
            <?php
                foreach($tuttiAutori as $autore){
                    $ischecked="";
                    if ($libroTrovato->isAutore($autore->id)){
                        $ischecked = "checked";
                    }

            ?>
            <div class="col-3">
                <div class="form-check">
                    <input class="form-check-input" onclick="clickedAuthor(<?= $autore->id?>)" type="checkbox" value="<?= $autore->id?>" id="<?= $autore->id?>" <?=$ischecked?>>
                    <label class="form-check-label" for="flexCheckChecked">
                    <?= $autore->nome?>
                    </label>
                </div>
                
            </div>
            <?php } //chiude foreach
             ?>
        </div>
        
        </form>
    </div>
    <script>
    function clickedAuthor(idAutore){
        console.log(idAutore);
        console.log();
        var isChecked = $("#"+idAutore).prop('checked');
        console.log(isChecked);
        var idLibro = <?=$idLibro?>;
        console.log(isChecked, idAutore, idLibro);
        if (isChecked){
            //have to insert the association
            $.post("<?=PROJECT_FOLDER?>pages/formLibro.php", {action:'AggiungiAutore',idLibro: idLibro, idAutore:idAutore})
                .done(function( data ) {
                
            }); 
        }
        else{
            //have to delete the association
            $.ajax({
                url: '<?=PROJECT_FOLDER?>pages/formLibro.php',
                type: 'POST',
                dataType: 'json',
                data: {action:'EliminaAutore',idLibro: idLibro, idAutore:idAutore},
                error: function(response) {
                    console.log('ok');
                }
                
            });
       
        }

    }
    </script>

</body>

</html>