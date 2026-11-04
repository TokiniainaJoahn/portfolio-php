<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Connection</title>
    </head>
    <body>
        <h1>Bienvenue sur la page de connection</h1>

        <form action="/post/auth/admin" method="POST">

            <label for="email">Entrez votre email :</label>
            <input type="email" name="email">

            <label for="mdp">Entrez votre mots de passe :</label>
            <input type="password" name="mdp">

            <input type="submit">

        </form>
        
    </body>
</html>