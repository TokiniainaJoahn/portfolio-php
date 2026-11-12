<main class="main_login">  
    <form action="/ajoute_projet" method="POST" class="form_login"  enctype="multipart/form-data">
        <?php if(isset($_SESSION["message"])) : ?>
            <section class="parents_centrage">
                <div class="error"><?= $_SESSION["message"] ?></div>
            </section>
            <?php unset($_SESSION["message"]); ?>
        <?php endif?>
        <label for="nom_projet">Nom du projet :</label>
        <input type="text" name="nom_projet" class="input_style" placeholder="Entrez le nom du projet">

        <label for="description">Description du projet :</label>
        <textarea type="text" name="Description" class="input_message" style="margin-bottom:10px" placeholder="Entrez la description du projet"></textarea>

        <label for="github" style="margin-top: -10px;">Lien github :</label>
        <input type="url" name="Github" class="input_style" placeholder="Entrez le lien github du projet">
        
        <label for="image">L'image du projet :</label>
        <input type="file" name="image" class="input_file" accept="image/*">
        <button type="submit" class="btn_submit">Ajouter le projet</button>
    </form>
</main>
