<?php 
    require_once('../constants.php');
    require_once(PROJECT_PATH.'services/sessioneService.php');
    require_once(PROJECT_PATH.'services/autoreService.php');
    $autoreService = new AutoreService();
    $autoreTrovato = new Autore(0, '','');    
    $queryID="";
    
    if (isset($_POST['SalvaAutore'])){
        $updateRes = $autoreService->upsertAutore($_POST['id'], $_POST['nome'],$_POST['urlFotoAutore']);
    
    }
    if (isset($_GET['id'])){
        $idAutore = $_GET['id'];        
        $autoreTrovato = $autoreService->getById($idAutore);
        $queryID = "?id=$idAutore";
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
                    } ?> Autore
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
        <form method='post' action="<?=PROJECT_FOLDER?>pages/formAutore.php<?= $queryID?>">
        <div class="row">
        
            <div class="col-4">
                Nome:
            </div>
            <div class="col-8">
                <input type="hidden" name="id" value="<?=$autoreTrovato->id?>" />
                <input type="text" class="form-control" name="nome" value="<?= $autoreTrovato->nome?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Url Foto Autore:
            </div>
            <div class="col-8">
                <input type="text" class="form-control" name="urlFotoAutore" value="<?= $autoreTrovato->urlFotoAutore?>" />
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <input type="submit" class="btn btn-success" name="SalvaAutore" value="Salva Autore" />
            </div>
        </div>
        
        </form>
    </div>
    <script>
    function clickedAuthor(idAutore){
        console.log(idAutore);
        console.log();
        var isChecked = $("#"+idAutore).prop('checked');
        console.log(isChecked);
        var idautore = <?=$idautore?>;
        console.log(isChecked, idAutore, idautore);
        if (isChecked){
            //have to insert the association
            $.post("<?=PROJECT_FOLDER?>pages/formautore.php", {action:'AggiungiAutore',idautore: idautore, idAutore:idAutore})
                .done(function( data ) {
                
            }); 
        }
        else{
            //have to delete the association
            $.ajax({
                url: '<?=PROJECT_FOLDER?>pages/formautore.php',
                type: 'POST',
                dataType: 'json',
                data: {action:'EliminaAutore',idautore: idautore, idAutore:idAutore},
                error: function(response) {
                    console.log('ok');
                }
                
            });
       
        }

    }
    </script>

</body>

</html>