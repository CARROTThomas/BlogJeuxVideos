<?php foreach ($jeux as $jeu) : ?>

    <hr>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-column">
                <h2><?=$jeu->getTitle() ?></h2>
                <p><strong><?= $jeu->getContent() ?></strong></p>
                <img width="100px" src="./images/<?= $jeu->getImage() ?>" alt="imgJeux">
            </div>
            <a href="?type=jeux&action=show&id=<?= $jeu->getId() ?>" class="btn btn-success">Voir +</a>
        </div>
    <hr>

<?php endforeach; ?>
