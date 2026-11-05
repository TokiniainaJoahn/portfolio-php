<?php
$titre = "Contact";
?>

<main>
    <section class="contact_intro">
        <h2 class="titre_page">CONTACT</h2>
        <h1>Construisons quelque chose ensemble.</h1>
    </section>

    <article class="contact_article">
        <section class="divers_contact">
            <h2>Parlons si vous avez des projets ou des conseils à me donner.</h2>
            <p>Une idée de collaboration ou une opportunité ?</p>
            <p>Envoyez-moi un email et je vous répondrai rapidement.</p>
            <div>
                <section class="section_a_propos section_a_propos_1">
                    <a href="mailto:tokyainas8@gmail.com"><img src="/images/logo/social.png" alt="Email"></a>
                    <div>
                        <h2>Email</h2>
                        <h3>tokyainas8@gmail.com</h3>
                        <h4>Réponse généralement sous 0 à 10 heures.</h4>
                    </div>
                </section>
            </div>
            <div>
                <section class="section_a_propos">
                    <a href="#"><img src="/images/logo/github.png" alt="GitHub"></a>
                    <a href="#"><img src="/images/logo/linkedin.png" alt="LinkedIn" style="margin-left: -10px;"></a>
                    <div>
                        <h2>GitHub / LinkedIn</h2>
                        <p>Consultez mes projets et mon parcours professionnel.</p>
                    </div>
                </section>
            </div>
            <p class="slogan">Disponible pour vos projets, collaborations et opportunités professionnelles.</p>
        </section>

        <form action="/contact" method="POST">
            <h2>Envoyez-moi un message par email</h2>

            <label for="nom_complet">Nom complet</label><br>
            <input type="text" id="nom_complet" name="nom" class="input_style" placeholder="Votre nom" required><br>

            <label for="email" class="label_contact">Entrez votre email :</label><br>
            <input type="email" id="email" name="email_destination" class="input_style" placeholder="email@example.com" required><br>

            <label for="sujet" class="label_contact">Entrez ici le sujet :</label><br>
            <input type="text" id="sujet" name="sujet" class="input_style" placeholder="Objet de votre demande" required><br>

            <label for="message" class="label_contact">Message :</label><br>
            <textarea name="message" id="message" placeholder="Décrivez votre projet" class="input_message" required></textarea><br>

            <input type="submit" class="btn_submit" value="Envoyez le message">
        </form>
    </article>

    <?php require __DIR__ . "/structure_base/service.php"; ?>
</main>
