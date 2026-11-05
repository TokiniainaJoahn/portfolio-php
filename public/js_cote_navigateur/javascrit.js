const CLE_THEME = "portfolio-theme";
const THEME_SOMBRE = "sombre";
const THEME_CLAIR = "clair";

const root = document.documentElement;
const btnMode = document.querySelector(".mode_nuit");

function themeActuel() {
    return root.classList.contains("theme-clair") ? THEME_CLAIR : THEME_SOMBRE;
}

function appliquerTheme(theme) {
    const estClair = theme === THEME_CLAIR;

    root.classList.toggle("theme-clair", estClair);
    localStorage.setItem(CLE_THEME, theme);

    if (btnMode) {
        btnMode.setAttribute(
            "aria-label",
            estClair ? "Activer le mode sombre" : "Activer le mode clair"
        );
        btnMode.setAttribute("title", estClair ? "Mode sombre" : "Mode clair");
    }
}

function basculerTheme() {
    const suivant = themeActuel() === THEME_SOMBRE ? THEME_CLAIR : THEME_SOMBRE;
    appliquerTheme(suivant);
}

const themeSauvegarde = localStorage.getItem(CLE_THEME);
appliquerTheme(themeSauvegarde === THEME_CLAIR ? THEME_CLAIR : THEME_SOMBRE);

if (btnMode) {
    btnMode.addEventListener("click", basculerTheme);
}
