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
    require "../templates/projets.php";
});
$server->map("GET" , "/download" , function(){
    require "../templates/download.php";
});

$server->map("GET|POST", "/contact", function() {
    require "../templates/contacter.php";
});

$server->map("GET" , "/login" , function(){
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
    require "../templates/structure_base/header.php";
    $match["target"]();
    require "../templates/structure_base/footer.php";
};