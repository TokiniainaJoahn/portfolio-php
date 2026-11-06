const CLE_THEME = "portfolio-theme";
const THEME_SOMBRE = "sombre";
const THEME_CLAIR = "clair";
const LIMITE_MENU_MOBILE = 768;

const root = document.documentElement;
const btnMode = document.querySelector(".mode_nuit");
const header = document.querySelector("header");
const navigation = header?.querySelector("nav");

function lireTheme() {
    try {
        return localStorage.getItem(CLE_THEME);
    } catch (erreur) {
        return null;
    }
}

function sauvegarderTheme(theme) {
    try {
        localStorage.setItem(CLE_THEME, theme);
    } catch (erreur) {
        // Le portfolio reste utilisable si le stockage du navigateur est désactivé.
    }
}

function themeActuel() {
    return root.classList.contains("theme-clair") ? THEME_CLAIR : THEME_SOMBRE;
}

function appliquerTheme(theme) {
    const estClair = theme === THEME_CLAIR;

    root.classList.toggle("theme-clair", estClair);
    sauvegarderTheme(theme);

    if (btnMode) {
        btnMode.setAttribute(
            "aria-label",
            estClair ? "Activer le mode sombre" : "Activer le mode clair"
        );
        btnMode.setAttribute("title", estClair ? "Mode sombre" : "Mode clair");
    }
}

function basculerTheme() {
    appliquerTheme(themeActuel() === THEME_SOMBRE ? THEME_CLAIR : THEME_SOMBRE);
}

const themeSauvegarde = lireTheme();
appliquerTheme(themeSauvegarde === THEME_CLAIR ? THEME_CLAIR : THEME_SOMBRE);

if (btnMode) {
    btnMode.addEventListener("click", basculerTheme);
}

if (header && navigation) {
    navigation.id = navigation.id || "navigation-principale";

    let boutonMenu = header.querySelector(".bouton-menu");

    if (!boutonMenu) {
        boutonMenu = document.createElement("button");
        boutonMenu.type = "button";
        boutonMenu.className = "bouton-menu";
        boutonMenu.innerHTML = '<span class="bouton-menu__barres" aria-hidden="true"><span></span><span></span><span></span></span>';
        navigation.before(boutonMenu);
    }

    boutonMenu.setAttribute("aria-controls", navigation.id);
    boutonMenu.setAttribute("aria-expanded", "false");
    boutonMenu.setAttribute("aria-label", "Ouvrir le menu de navigation");

    function menuEstOuvert() {
        return header.classList.contains("menu-actif");
    }

    function fermerMenu() {
        header.classList.remove("menu-actif");
        document.body.classList.remove("menu-ouvert");
        boutonMenu.setAttribute("aria-expanded", "false");
        boutonMenu.setAttribute("aria-label", "Ouvrir le menu de navigation");
    }

    function ouvrirMenu() {
        header.classList.add("menu-actif");
        document.body.classList.add("menu-ouvert");
        boutonMenu.setAttribute("aria-expanded", "true");
        boutonMenu.setAttribute("aria-label", "Fermer le menu de navigation");

        const premierLien = navigation.querySelector("a");
        if (premierLien) {
            premierLien.focus();
        }
    }

    boutonMenu.addEventListener("click", () => {
        menuEstOuvert() ? fermerMenu() : ouvrirMenu();
    });

    navigation.querySelectorAll("a").forEach((lien) => {
        lien.addEventListener("click", fermerMenu);
    });

    document.addEventListener("keydown", (evenement) => {
        if (evenement.key === "Escape" && menuEstOuvert()) {
            fermerMenu();
            boutonMenu.focus();
        }
    });

    document.addEventListener("click", (evenement) => {
        if (
            window.innerWidth < LIMITE_MENU_MOBILE &&
            menuEstOuvert() &&
            !header.contains(evenement.target)
        ) {
            fermerMenu();
        }
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth >= LIMITE_MENU_MOBILE) {
            fermerMenu();
        }
    });
}
