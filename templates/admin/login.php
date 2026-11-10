<main class="main_login">
    <form action="/auth" method="POST" class="form_login">
        <?php if($error) : ?>
            <label for="error" class="error"><?= $error ?></label>
        <?php endif ?>
        <label for="email">Votre address gmail :</label>
        <input type="email" name="email" class="input_style" required placeholder="example@gmail.com">

        <label for="mdp">Mots de passe :</label>
        <input type="password" name="mdp" class="input_style" required placeholder="Entrez votre mots de passe">
        <button type="submit" class="btn_submit">Connection</button>
    </form>
</main>
