
<div class="d-flex justify-content-between">
    <a href="index.php" class="btn">retour</a>
    <div class="d-flex flex-column">
        <a href="index.php?type=jeux&action=remove&id=<?= $jeux->getId() ?>" class="btn btn-danger m-1">supprimer</a>
        <a href="index.php?type=jeux&action=change&id=<?= $jeux->getId() ?>" class="btn btn-warning m-1">Update</a>
    </div>
</div>

<div class="d-flex flex-column justify-content-center align-items-center mt-3">

    <div class="d-flex flex-column align-items-center">
        <h1><?= $jeux->getTitle() ?></h1>
        <h4><?= $jeux->getContent() ?></h4>
        <img src="http://localhost/BlogJeuxVideos/images/<?= $jeux->getImage() ?>" alt="blabla">
    </div>
</div>

<hr>

<div>
    <form method="post" class="form d-flex" action="index.php?type=avis&action=create">
        <input class="form-control"  type="text" name="content" placeholder="add a comment">
        <input name="jeuxId" class="form-control" type="hidden" value="<?= $jeux->getId() ?>">
        <button class="btn btn-primary m-2" type="submit">Send</button>
    </form>
</div>
<hr class="mb-1">
<?php foreach ($avis as $avi) : ?>

<div class="d-flex justify-content-between align-items-center">
    <p><?= $avi->getContent() ?></p>
    <div class="d-flex flex-column">
        <a href="index.php?type=avis&action=remove&id=<?= $avi->getId() ?>" class="btn btn-danger m-1">supprimer</a>
        <a href="index.php?type=avis&action=change&id=<?= $avi->getId() ?>&idJeux=<?= $avi->getJeuxId() ?>" class="btn btn-warning m-1">Update</a>
    </div>
</div>
    <hr>

<?php endforeach; ?>

