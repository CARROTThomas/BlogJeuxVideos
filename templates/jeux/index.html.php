


<div class="container row d-flex ">

    <?php foreach ($jeux as $jeu) : ?>

        <div class="d-flex justify-content-evenly p-3 col-4">
            <div style="width: 350px; height: 370px" class="d-flex flex-column justify-content-between border border-info rounded p-3">
                <div class="d-flex flex-column align-items-center mb-2">
                    <div style="height: 180px" class="text-center d-flex flex-column ">
                        <h2><?=$jeu->getTitle() ?></h2>
                        <p><strong><?= $jeu->getContent() ?></strong></p>
                    </div>
                    <img height="100px" src="images/<?= $jeu->getImage() ?>" alt="imgJeux">
                </div>
                <a href="?type=jeux&action=show&id=<?= $jeu->getId() ?>" class="btn btn-primary m-1">Voir +</a>
            </div>
        </div>

    <?php endforeach; ?>

</div>

