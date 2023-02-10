


<div class="d-flex justify-content-between">
    <a href="index.php" class="btn d-flex align-items-center"><span class="material-symbols-outlined me-1">arrow_back</span>retour</a>
    <div class="d-flex">
        <a href="index.php?type=jeux&action=remove&id=<?= $jeux->getId() ?>" class="btn btn-danger m-1"><span class="material-symbols-outlined">delete</span></a>
        <a href="index.php?type=jeux&action=change&id=<?= $jeux->getId() ?>" class="btn btn-warning m-1"><span class="material-symbols-outlined">edit</span></a>
    </div>
</div>

<div class="d-flex flex-column justify-content-center align-items-center mt-3">

    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1><?= $jeux->getTitle() ?></h1>
        <h4><?= $jeux->getContent() ?></h4>
        <img width="550px" height="300px" src="images/<?= $jeux->getImage() ?>" alt="blabla">
    </div>
</div>

<hr>

<div>
    <form method="post" class="form d-flex" action="index.php?type=avis&action=create">
        <input style="background-color: rgba(29,27,27,0)" class="form-control"  type="text" name="content" placeholder="add a comment">
        <input name="jeuxId" class="form-control" type="hidden" value="<?= $jeux->getId() ?>">
        <button class="btn btn-primary m-2" type="submit">Send</button>
    </form>
</div>
<hr class="mb-1">
<?php foreach ($avis as $avi) : ?>

<div class="d-flex justify-content-between align-items-center">
    <p><?= $avi->getContent() ?></p>
    <div class="d-flex">
        <a href="index.php?type=avis&action=remove&id=<?= $avi->getId() ?>" class="btn m-1"><span class="material-symbols-outlined">delete</span></a>
        <a href="index.php?type=avis&action=change&id=<?= $avi->getId() ?>&idJeux=<?= $avi->getJeuxId() ?>" class="btn m-1"><span class="material-symbols-outlined">edit</span></a>
    </div>
</div>
    <hr>

<?php endforeach; ?>

