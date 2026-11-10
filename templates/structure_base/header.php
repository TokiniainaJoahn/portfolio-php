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
    <title><?= htmlspecialchars($titre ?? "Portfolio RAZANAVAHY Tokiniaina Joah", ENT_QUOTES, "UTF-8") ?></title>
    <meta name="google-site-verification" content="xd4USxrqjMU05p2M-B4Wke1cqOuRxsVvwCBk02HmpoY" />
</head>
<body>

    <header>
        <div class="mon_nom">
            <span>Tokiniaina</span> Joahn
        </div>

        <nav id="navigation-principale" aria-label="Navigation principale">
            <a href="/"<?= ($titre ?? "") === "Accueil" ? ' class="mon_place"' : "" ?>>Accueil</a>
            <a href="/competences"<?= ($titre ?? "") === "Compétences" ? ' class="mon_place"' : "" ?>>Compétences</a>
            <a href="/projets"<?= ($titre ?? "") === "Projets" ? ' class="mon_place"' : "" ?>>Projets</a>
            <a href="/contact"<?= ($titre ?? "") === "Contact" ? ' class="mon_place"' : "" ?>>Me contacter</a>
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