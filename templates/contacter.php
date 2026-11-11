<?php
global $titre , $description ;
$titre="Contact";
$description="Ceci est la page pour contacter RAZANAVAHY Tokinaiina Joahn";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$resultat = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $champs_requis = ["nom", "email_destination", "sujet", "message"];
    $champs_manquants = array_filter($champs_requis, function ($champ) {
        return !isset($_POST[$champ]) || trim($_POST[$champ]) === "";
    });

    if ($champs_manquants) {
        $resultat = [
            "success" => false,
            "titre" => "Informations incomplètes",
            "message" => "Veuillez remplir tous les champs du formulaire."
        ];
    } elseif (!filter_var(trim($_POST["email_destination"]), FILTER_VALIDATE_EMAIL)) {
        $resultat = [
            "success" => false,
            "titre" => "Adresse email invalide",
            "message" => "Veuillez saisir une adresse email correcte."
        ];
    } else {
        $nom = trim($_POST["nom"]);
        $mail_reply = trim($_POST["email_destination"]);
        $sujet = str_replace(["\r", "\n"], " ", trim($_POST["sujet"]));
        $message = trim($_POST["message"]);

        try {
            $mailer = new PHPMailer(true);

            $mailer->isSMTP();
            $mailer->Host = "smtp.gmail.com";
            $mailer->SMTPAuth = true;
            $mailer->Username = "tokiniaina3108@gmail.com";
            $mailer->Password = "rtklmxvqjjmomggk";
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mailer->Port = 465;
            $mailer->CharSet = PHPMailer::CHARSET_UTF8;
            $mailer->SMTPDebug = SMTP::DEBUG_OFF;

            $mailer->setFrom("tokiniaina3108@gmail.com", "Portfolio");
            $mailer->addAddress("tokyainas8@gmail.com");
            $mailer->addReplyTo($mail_reply, $nom);

            $mailer->isHTML(true);
            $mailer->Subject = $sujet;
            $mailer->Body = "<p><strong>Nom :</strong> " . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . "</p>"
                . "<p><strong>Email :</strong> " . htmlspecialchars($mail_reply, ENT_QUOTES, 'UTF-8') . "</p>"
                . "<p><strong>Message :</strong></p><p>"
                . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</p>";
            $mailer->AltBody = "Nom : {$nom}\nEmail : {$mail_reply}\n\nMessage :\n{$message}";

            $mailer->send();

            $resultat = [
                "success" => true,
                "titre" => "Message envoyé",
                "message" => "Votre email a bien été envoyé. Je vous répondrai dès que possible."
            ];
        } catch (\Throwable $erreur) {
            error_log("Erreur d'envoi de l'email : " . $erreur->getMessage());
            $resultat = [
                "success" => false,
                "titre" => "Email non envoyé",
                "message" => "Une erreur technique empêche l'envoi. Veuillez réessayer plus tard."
            ];
        }
    }
}
?>

<main>
    <section class="contact_intro">
        <h2 class="titre_page">CONTACT</h2>
        <h1>Construisons quelque chose ensemble.</h1>
    </section>

    <?php if ($resultat !== null): ?>
        <article class="contact_article">
            <section class="divers_contact">
                <h2><?= htmlspecialchars($resultat["titre"], ENT_QUOTES, "UTF-8") ?></h2>
                <p><?= htmlspecialchars($resultat["message"], ENT_QUOTES, "UTF-8") ?></p>
                <a href="/contact" class="btn_submit retour_contact">
                    <?= $resultat["success"] ? "Envoyer un autre message" : "Retour au formulaire" ?>
                </a>
            </section>
        </article>
    <?php else: ?>
        <article class="contact_article">
            <section class="divers_contact">
                <h2>Parlons si vous avez des projets ou des conseils à me donner.</h2>
                <p class="petit_intro">Une idée de collaboration ou une opportunité ?</p>
                <p class="petit_intro">Envoyez-moi un email et je vous répondrai rapidement.</p>
                <div>
                    <section class="section_a_propos section_a_propos_1">
                        <a href="mailto:tokyainas8@gmail.com"><img src="/images/logo/social.png" alt="Email"></a>
                        <div>
                            <h2>Email</h2>
                            <h3>tokyainas8@gmail.com</h3>
                            <h4>Réponse généralement sous 0 à 10 heures.</h4>
                        </div>
                    </section>
                </div>
                <div class="linkedin_github">
                    <section class="section_a_propos">
                        <a href="#"><img src="/images/logo/github.png" alt="GitHub"></a>
                        <a href="#"><img src="/images/logo/linkedin.png" alt="LinkedIn" class="icone_reseau_compacte"></a>
                        <div>
                            <h2>GitHub / LinkedIn</h2>
                            <p>Consultez mes projets et mon parcours professionnel.</p>
                        </div>
                    </section>
                </div>
                <p class="slogan">Disponible pour vos projets, collaborations et opportunités professionnelles.</p>
            </section>

            <form method="POST" action="/contact">
                <h2>Envoyez-moi un message par email</h2>

                <label for="nom_complet">Nom complet</label><br>
                <input type="text" id="nom_complet" name="nom" class="input_style" placeholder="Votre nom" required><br>

                <label for="email" class="label_contact">Entrez votre email :</label><br>
                <input type="email" id="email" name="email_destination" class="input_style" placeholder="email@example.com" required><br>

                <label for="sujet" class="label_contact">Entrez ici le sujet :</label><br>
                <input type="text" id="sujet" name="sujet" class="input_style" placeholder="Objet de votre demande" required><br>

                <label for="message" class="label_contact">Message :</label><br>
                <textarea name="message" id="message" placeholder="Décrivez votre projet" class="input_message" required></textarea><br>

                <input type="submit" class="btn_submit" value="Envoyez le message" name="submit">
            </form>
        </article>
    <?php endif; ?>

    <?php require __DIR__ . "/structure_base/service.php"; ?>
</main>
