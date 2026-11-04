<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validez votre OTP</title>
</head>
<body>

    <h1>Email de verification OTP envoyé a votre email : <%=email_utilisateur%></h1>
    <h2>Tapez ici pour validez votre OTP :</h2>
    
    <form action="/post/auth/otp/<%=email_utilisateur%>" method="POST">

        <label for="otp">Entrez l'OTP Valide :</label>
        <input type="number" name="otp">

        <input type="submit">

    </form>
</body>
</html>