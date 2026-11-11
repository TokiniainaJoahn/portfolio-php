<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        (function () {
            try {
                if (localStorage.getItem("portfolio-theme") === "clair") {
                    document.documentElement.classList.add("theme-clair");
                }
            } catch (e) {}
        })();
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Syne:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/images/logo/logo_T.png" type="image/png">
    <title><?= htmlspecialchars($titre ?? "Portfolio RAZANAVAHY Tokiniaina Joahn", ENT_QUOTES, "UTF-8") ?></title>
    <meta name="description" content="<?= $description ?? "" ?>">
    <meta name="google-site-verification" content="xd4USxrqjMU05p2M-B4Wke1cqOuRxsVvwCBk02HmpoY" />
</head>
<body>

    <header>
        <div class="mon_nom">
            <span>Tokiniaina</span> Joahn
        </div>

        <nav id="navigation-principale" aria-label="Navigation principale">
            <a href="/"<?= ($titre ?? "") == "Acceuil" ? ' class="mon_place"' : "" ?>>Accueil</a>
            <a href="/competences"<?= ($titre ?? "") == "Compétences" ? ' class="mon_place"' : "" ?>>Compétences</a>
            <a href="/projets"<?= ($titre ?? "") == "Projets" ? ' class="mon_place"' : "" ?>>Projets</a>
            <a href="/contact"<?= ($titre ?? "") == "Contact" ? ' class="mon_place"' : "" ?>>Me contacter</a>
        </nav>

        <div class="logo_btn">
            <button type="button" class="bouton-menu" aria-controls="navigation-principale" aria-expanded="false" aria-label="Ouvrir le menu de navigation">
                <span class="bouton-menu__barres" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
            <button type="button" class="mode_nuit" aria-label="Activer le mode clair" title="Mode clair">
                <img src="/images/logo/icons8-sun-100.png" alt="" class="soleil">
                <img src="/images/logo/icons8-do-not-disturb-ios-100.png" alt="" class="lune">
            </button>
            <img src="/images/logo/logo_T.png" alt="Logo Tokiniaina" class="image_logo">
        </div>
    </header>


    <?= $contenent ?? "" ?>

    
    <footer>
        <section class="icone_footer" aria-label="Réseaux sociaux">
            <a href="https://github.com/TokiniainaJoahn"><img src="/images/logo/github.png" alt="GitHub"></a>
            <a href="tel:+261330959118"><img src="/images/logo/icons8-phone-96.png" alt="Contact"></a>
            <a href="mailto:tokyainas8@gmail.com"><img src="/images/logo/social.png" alt="Email"></a>
            <a href="https://wa.me/261380794479?s=t"><img src="/images/logo/whatsapp.png" alt="WhatsApp"></a>
            <a href="https://www.facebook.com/profile.php?id=61592624470806"><img src="/images/logo/icons8-facebook-96.png" alt="LinkedIn"></a>
            <a href="https://mg.linkedin.com/in/tokiniaina-joahn-razanavahy-652988432"><img src="/images/logo/linkedin.png" alt="LinkedIn"></a>
            <a href="https://www.instagram.com/tokiniainajoahn/"><img src="/images/logo/icons8-instagram-96.png" alt="LinkedIn"></a>
        </section>

        <section>
            <a href="/download" class="btn_telechargement_cv">Telechargez mon cv ici</a>
        </section>

        <section class="footer_copy">© 2026 Tokiniaina Joahn | Tous droits réservés</section>
    </footer>

    <script src="/js_cote_navigateur/javascrit.js"></script>
    
</body>
</html>


