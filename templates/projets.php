<?php
$titre = "Projets";
require __DIR__ . "/structure_base/header.php";
?>

<main>
    <section>
        <h2 class="titre_page">MES PROJETS</h2>
        <h1>Construisons quelques choses ensemble.</h1>
    </section>

    <section class="Projet" aria-label="Mes projets">
        <?php if (empty($projets)): ?>
            <p>Aucun projet disponible pour le moment.</p>
        <?php else: ?>
            <?php foreach ($projets as $projet): ?>
                <?php
                $image = texteProjet($projet, ["Image", "image", "images"]);
                $titreProjet = texteProjet($projet, ["Titre", "titre", "nom"]);
                $description = texteProjet($projet, ["Description", "description"]);
                $github = texteProjet($projet, ["Github", "github"]);
                ?>
                <article class="projet-card">
                    <div class="projet-card__image">
                        <?php if ($image !== ""): ?>
                            <img src="<?= $image ?>" alt="Aperçu du projet <?= $titreProjet ?: "GitHub" ?>">
                        <?php endif; ?>
                    </div>
                    <div class="projet-card__contenu">
                        <h3><?= $titreProjet ?: "Projet GitHub" ?></h3>
                        <p class="projet-card__description"><?= $description ?></p>
                        <?php if ($github !== ""): ?>
                            <a class="projet-card__lien" href="<?= $github ?>" target="_blank" rel="noopener noreferrer">
                                Voir le projet sur GitHub
                            </a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>

    <?php require __DIR__ . "/structure_base/service.php"; ?>
</main>

<?php require __DIR__ . "/structure_base/footer.php"; ?>