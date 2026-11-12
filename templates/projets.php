<?php
global $titre , $description ;
$titre="Projets";
$description="Ceci est ma page pour voir mes projets  pour le portfolio de RAZANAVAHY Tokinaiina Joahn";
$error = null;
try{
    $mysql = connect_bd("mysql:host=localhost;dbname=portfolio;charset=utf8", "root", "Tokiniaina");

    $projets = $mysql->query("SELECT * FROM Projet")->fetchAll();
}catch (PDOException $e){
    $error = "Erreur de connection à la base de donnés, veillez essayer plus tard ou veillez me contacter aussi pour le problème";
}

?>


<main class="page-projets">
    <section class="competences-intro projets-intro">
        <p class="competences-intro__label">Portfolio</p>
        <h2 class="titre_page">MES PROJETS</h2>
        <h1>Construisons quelque chose ensemble.</h1>
        <p>Découvrez une sélection de projets et les solutions que j'ai conçues.</p>
    </section>
    <?php if(isset($error)) : ?>
        <section class="parents_centrage">
            <div class="error"><?= $error ?></div>
        </section>
    <?php else : ?>
        <section class="Projet" aria-label="Mes projets">
            <?php if (empty($projets)): ?>
                <p class="projet-vide">Aucun projet disponible pour le moment.</p>
            <?php else: ?>
                <?php foreach ($projets as $projet): ?>
                    <article class="projet-card">
                        <section class="projet-card__image">
                            <img src="images/images_projets/<?= $projet['Image']; ?>" alt="Aperçu du projet">
                        </section>
                        <div class="projet-card__contenu">
                            <h4><?=$projet['nom']; ?></h4>
                            <p class="projet-card__description">
                                <?=$projet['Description']; ?>
                            </p>
                            <a  class="projet-card__lien" href="<?=$projet['Github']; ?>">Voir le projet sur github</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif ?>
        </section>

    <?php endif ?>

    <?php
    require "structure_base/service.php";
    ?>
</main>
