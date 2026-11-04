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
    <link rel="stylesheet" href="/style.css">
    <title>
        <%if(titre){%>
            <%=titre%>
        <%}else{%>
            Portfolio RAZANAVAHY Tokiniaina Joah
        <%}%>
    </title>
</head>
<body>

    <header>
        <div class="mon_nom">
            <span>Tokiniaina</span> Joahn
        </div>

        <nav>
            
            <a href="/" <%if(titre == "Acceuil"){%>
                            class ="mon_place"
                        <%}%> >Acceuil</a>
            <a href="/competences"  <%if(titre == "Competence"){%>
                                        class ="mon_place"
                                    <%}%> >Competence</a>
            <a href="/projets"  <%if(titre == "Projets"){%>
                                    class ="mon_place"
                                <%}%> >Mes projet</a>
            <a href="/contact"  <%if(titre == "Me " + "Contacter"){%>
                                    class ="mon_place"
                                <%}%> >Me contacter</a>

        </nav>

        <div class="logo_btn">
            <button type="button" class="mode_nuit" aria-label="Activer le mode clair" title="Mode clair">
                <img src="/icons8-sun-100.png" alt="" class="soleil">
                <img src="/icons8-do-not-disturb-ios-100.png" alt="" class="lune">
            </button>
            <img src="/logo_T.png" alt="Logo Tokiniaina" class="image_logo">
        </div>
    </header>