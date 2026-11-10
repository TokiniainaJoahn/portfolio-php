<main class="main_login">  
    <form action="" method="POST" class="form_login">
        <label for="description">Description du projet :</label>
        <textarea type="text" name="description" class="input_message" placeholder="Entrez la description du projet"></textarea>

        <label for="github" style="margin-top: -5px;">Lien github :</label>
        <input type="url" name="github" class="input_style" placeholder="Entrez le lien github du projet">
        
        <label for="image">L'image du projet :</label>
        <input type="file" name="image" class="input_file">
        <button type="submit" class="btn_submit">Ajouter le projet</button>
    </form>
</main>