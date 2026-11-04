<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php $titreAdmin = $titre ?? "Administration"; ?>
        <?= htmlspecialchars($titreAdmin, ENT_QUOTES, "UTF-8") ?>
    </title>
</head>
<body>

    <header>
        <nav>
            
            <a href="/Admin/Acceuil">Acceuil</a>
            <a href="/Admin/projets">Projet</a>

        </nav>
    </header>