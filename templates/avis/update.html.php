


<div class="d-flex justify-content-around mb-5">
    <a href="?type=jeux&action=show&id=<?= $avis->getJeuxId() ?>" class="btn">retour</a>
    <h1>Update cette Avis !!</h1>
</div>
<form class="d-flex flex-column form-control justify-content-between align-items-center" enctype="multipart/form-data" action="?type=avis&action=change" method="post">
    <input class="m-2" type="hidden" name="idUpdate" value="<?= $avis->getId()?>">
    <input class="m-2" type="text" name="contentUpdate" value="<?= $avis->getContent() ?>">
    <button type="submit" class="btn btn-success">update</button>
</form>
