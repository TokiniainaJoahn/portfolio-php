<?php

require '../vendor/autoload.php';
require "../templates/fonction.php";
require "../templates/admin/auth.php";


$server = new AltoRouter();

$server->map("GET" , "/" , function(){
    require "../templates/index.php";
});

$server->map("GET" , "/competences" , function(){
    require "../templates/competence.php";
});

$server->map("GET" , "/projets" , function(){
    session_start();
    if (est_connecte()){
        header('Location: /');
        exit();
    }
    require "../templates/projets.php";
});

$server->map("GET" , "/download" , function(){
    send_file("Cv_Tokiniaina_Joahn.pdf" , "mon_cv/mon_cv.pdf");
});

$server->map("GET" , "/Deconnection" , function(){
    session_start();
    if(est_connecte()){
        unset($_SESSION["role"]);
        unset($_SESSION["email"]);
        session_destroy();
        header("Location: /");
        exit();
    }
    header("Location: /");
    exit();
});

$server->map("GET|POST", "/contact", function() {
    session_start();
    if (est_connecte()){
        header('Location: /');
        exit();
    }
    require "../templates/contacter.php";
});

$server->map("GET" , "/login" , function(){
    session_start();
    if (est_connecte()){
        header('Location: /');
        exit();
    }
    require '../templates/admin/login.php';
});

$server->map("GET" , "/projet_admin" , function(){
    session_start();
    if (!est_connecte()){
        $_SESSION["message"] = "Vous devez vous connecter en tant qu'administrateur";
        header('Location: /login');
        exit();
    }
    require '../templates/admin/projet_admin.php';
});

$server->map("GET" , "/ajouter_projet" , function(){
    session_start();
    if (!est_connecte()){
        $_SESSION["message"] = "Vous devez vous connecter en tant qu'administrateur";
        header('Location: /login');
        exit();
    }
    require '../templates/admin/ajouter_projet.php';
});

$server->map("POST" , "/ajoute_projet" , function(){
    $file = $_FILES["image"];
    $valid_extensions = ["png" , "jpg"];
    if($file["error"] != 0 ){
        $_SESSION["message"] = "Erreur lors de la soumission du fichier " . $file["error"];
        header("Location: /ajouter_projet");
        exit();
    }
    $fileExtension = pathinfo($file["name"] , PATHINFO_EXTENSION);
    if(!in_array(strtolower($fileExtension) , $valid_extensions , true)){
        $_SESSION["message"] = "Fichier non accepté, les fichier accepté sont: " . $valid_extensions;
        header("Location: /ajouter_projet");
        exit();
    }
    $nom_aleatoire = date("YmdHis") . bin2hex(random_bytes(8));
    $file["name"] = $nom_aleatoire . "." . $fileExtension ;
    try{
        $mysql = connect_bd("mysql:host=localhost;dbname=portfolio;charset=utf8", "root", "Tokiniaina");
    
        $query = $mysql->prepare("INSERT INTO Projet (Description , Github , Image , nom) VALUES (? , ? , ? , ?)");
        $query->execute([$_POST["Description"] , $_POST["Github"] , $file["name"] , $_POST["nom_projet"]]);        

    }catch (PDOException $e){
        $_SESSION["message"] = "Veillez reyessayer plus tard on n'as pas pu enregistrer le projet";
        header("Location: /ajouter_projet");
        exit();
    }
    move_uploaded_file(
        $file["tmp_name"] , "images/images_projets/" . $file["name"]
    );
    header("Location: /ajouter_projet");
    exit();
});

$server->map("POST" , "/auth" , function(){
    try{
        $mysql = connect_bd("mysql:host=localhost;dbname=portfolio;charset=utf8", "root", "Tokiniaina");
    
        $query = $mysql->prepare("SELECT * FROM utilisateur WHERE email= :email");
        $query->execute(["email" => $_POST["email"]]);
        $donnes = $query->fetch();
        

    }catch (PDOException $e){
        $error = "Vous n'avez pas pu s'authentifier";
        header('Location: /login');
    }
    if($_POST["email"] == $donnes["email"] && password_verify($_POST["mdp"] , $donnes["mdp"])){
        session_start();
        $_SESSION["role"] = "Administrateur";
        $_SESSION["email"] = $_POST["mdp"];
        $_SESSION["message"] = "Bienvenue sur la page d'acceuil vous êtes connectés en mode Administrateur et vous avec les droits d'Administrateur";
        header('Location: /');
        exit();
    }else{
        $_SESSION["message"] = "Email ou mots de passe incorrect veillez reyessayer";
        header('Location: /login');
        exit();
    }

});

$match = $server->match();

if($match){
    session_start();
    ob_start();
    $match["target"]();
    $contenent = ob_get_clean();
    if (!est_connecte()){
        require "../templates/structure_base/layouts.php";
    }else{
        require "../templates/structure_base/layouts_admin.php";
    }
};