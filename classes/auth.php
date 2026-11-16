<?php

namespace class;

class Authentification{

    private static function activer_session(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }
    
    public static function connection($donnes_utilisateur , $donnes_bdd ){
        $this->activer_session();
        $email_donnes = $donnes_utilisateur["email"];
        $password_donnes = $donnes_utilisateur["mdp"];
        if($email_donnes == $donnes_bdd["email"] && password_verify($donnes_bdd["mdp"] , $password_donnes)){
            $_SESSION["role"] = "Administrateur";
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["message"] = "Bienvenue sur la page d'acceuil vous êtes connectés en mode Administrateur et vous avec les droits d'Administrateur";
            return true ;
        };
        $_SESSION["message"] = "Email ou mots de passe incorrect veillez reyessayer";
        return false;
    }

    public static function est_autorise(){
        self::activer_session();
        $role =  $_SESSION["role"] ?? null ;
        $email = $_SESSION["email"] ?? null ;
        if(isset($role , $email)){
            return true ;
        }else{
            $_SESSION["message"] = "Désolé vous n'avez pas acces a cette ressouce";
            return false ;
        }
    }
}