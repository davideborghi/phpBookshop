
<div class="container container-libro">
    <div class="row">
        <div class="col-md-6">
            <img class="anteprima-copertina" src="<?=$libro->urlAnteprimaCopertina?>">
        </div>
        <div class="col-md-6">
            <div class="titolo-libro">
                <strong>
                    Titolo:
                </strong>
                <?=$libro->titolo?>
            </div>
            <div class="editore-libro">
                <strong>
                    Editore:
                </strong>
                <?=$libro->editore?>
            </div>
            <a href="<?=PROJECT_FOLDER?>pages/libro.php?id=<?=$libro->id?>" class="btn btn-primary" />Scheda libro</a>
        </div>
    </div>
</div>