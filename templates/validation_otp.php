<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validez votre OTP</title>
</head>
<body>

    <?php
    $email_utilisateur = $_GET['email'] ?? '';
    ?>
    <h1>Email de vérification envoyé à : <?= htmlspecialchars($email_utilisateur, ENT_QUOTES, 'UTF-8') ?></h1>
    <h2>Tapez ici pour valider votre OTP :</h2>

    <form action="/Admin/otp/<?= rawurlencode($email_utilisateur) ?>" method="POST">
        <label for="otp">Entrez l'OTP valide :</label>
        <input type="number" id="otp" name="otp" required>
        <input type="submit" value="Valider">
    </form>

</body>
</html>