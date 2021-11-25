
<div class="container container-libro">
    <div class="row">
        <div class="col-md-6">
            <img class="anteprima-copertina" src="<?=$autore->urlFotoAutore?>">
        </div>
        <div class="col-md-6">
            <div class="titolo-libro">
                <strong>
                    <?=$autore->nome?>
                </strong>
            </div>
            <div class="editore-libro">
                
            </div>
            <div>
                <a href="<?=PROJECT_FOLDER?>pages/libri.php?idAutore=<?=$autore->id?>" class="btn btn-primary" />Vai ai libri dell'autore</a>
            </div>
            <?php if(isset($user)){ ?>
            <div class="mt-10">
            <a href="<?=PROJECT_FOLDER?>pages/formAutore.php?id=<?=$autore->id?>" class="btn btn-warning" />Modifica Autore</a>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>
