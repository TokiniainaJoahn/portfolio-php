<?php

require '../vendor/autoload.php';
require "../templates/fonction.php";
require "../templates/admin/auth.php";

require "../classes/auth.php";
require "../classes/router.php";
require "../classes/base_donnes/bdd.php";
require "../classes/file_management.php";

$router = \class\Router::getInstance();

$bd = \class\db\Base_donnes::getInstance();

$router->get("/" , "index" , "Acceuil");
$router->get("/competences" , "competence" , "Competence");
$router->get("/projet" , function() use ($bd){
            if (\class\Authentification::est_autorise()){
                header('Location: /');
                exit();
            }
            return "../templates/projets.php";
        } , "projet");

$router->get("/contact", function(){
            if (\class\Authentification::est_autorise()){
                header('Location: /');
                exit();
            }
            return "../templates/contacter.php";
        } , "contact");
$router->get("/download" , function(){
            \class\download::send_file_download("mon_cv/mon_cv.pdf" , "CV_RAZANAVAHY_Tokiniaina_Joahn.pdf");
        } , "download");

$router->get("/login" , function(){
    if (\class\Authentification::est_autorise()){
        header('Location: /');
        exit();
    }
    return '../templates/admin/login.php';
});

$router->get("/Deconnection" , function(){
            if(\class\Authentification::est_autorise()){
                unset($_SESSION["role"]);
                unset($_SESSION["email"]);
                session_destroy();
                header("Location: /");
                exit();
            }
            header("Location: /");
            exit();
        });

$router->get("/projet_admin" , function(){
            if ( !(\class\Authentification::est_autorise()) ){
                header('Location: /login');
                exit();
            }
            return '../templates/admin/projet_admin.php';
        });

$router->get("/ajouter_projet" , function(){
            if ( !(\class\Authentification::est_autorise()) ){
                header('Location: /login');
                exit();
            }
            return '../templates/admin/ajouter_projet.php';
        });

$router->post("/ajoute_projet" , function(){
    $file = $_FILES["image"];

    $file_uploader = new upload();

    $file_uploader->renrename_file();
    
    try{
        $mysql = new \class\db\Base_donnes("portfolio");

        $query = "INSERT INTO Projet (Description , Github , Image , nom) VALUES (? , ? , ? , ?)" ;
    
        $parametres_query = [
            $_POST["Description"] , 
            $_POST["Github"] , 
            $file["name"] , 
            $_POST["nom_projet"]
        ];
        $query = $mysql->prepare_execute($query , $parametres_query);   

    }catch (PDOException $e){
        $_SESSION["message"] = "Veillez reyessayer plus tard on n'as pas pu enregistrer le projet";
        header("Location: /ajouter_projet");
        exit();
    }

    $file_uploader->upload();

    header("Location: /ajouter_projet");
    
    exit();
});

$router->post("/auth" , function(){
    try{
        $mysql = new \class\db\Base_donnes("portfolio");

        $query = "SELECT * FROM utilisateur WHERE email= :email" ;
        $parametres_query = [
            "email" => $_POST["email"]
        ];
    
        $donnes_bdd = $mysql->prepare_execute($query , $parametres_query);

    }catch (PDOException $e){
        $error = "Vous n'avez pas pu s'authentifier";
        header('Location: /login');
    }

    $donnes_utilisateur = [
        "email" => $_POST["email"],
        "mdp" => $_POST["mdp"]
    ];

    $authorized = \class\Authentification::connection($donnes_utilisateur , $donnes_bdd);

    if($authorized){
        header('Location: /');
        exit();
    }
    header('Location: /login');
    exit();

});

$router->run();