


<div class="d-flex justify-content-around mb-5">
    <a href="?type=jeux&action=show&id=<?= $jeux->getId() ?>" class="btn">retour</a>
    <h1>Update ce jeu !!</h1>
</div>
<form class="d-flex flex-column form-control justify-content-between align-items-center" enctype="multipart/form-data" action="?type=jeux&action=change" method="post">
    <input class="m-2" type="hidden" name="idUpdate" value="<?= $jeux->getId()?>">
    <input class="m-2" type="text" name="titleUpdate" value="<?= $jeux->getTitle() ?>">
    <input class="m-2" type="text" name="contentUpdate" value="<?= $jeux->getContent() ?>">
    <input class="m-2" type="file" name="imageUpdate" value="<?= $jeux->getImage() ?>">
    <button type="submit" class="btn btn-success">update</button>
</form>