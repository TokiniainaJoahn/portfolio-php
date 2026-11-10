<?php 
function connect_bd(string $bd_option , string $user , string $password){
    try{
        return new PDO($bd_option , $user , $password , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }catch(PDOException $e){
        $error = "Erreur de connection à la base de donnes";
        throw new PDOException($error);
    }
};

function envoi_requette(string $query ,objet $bd){
    try{
        return $bd->query($query)->fetch_All();
    }catch(PDOException $e){
        throw new PDOException("Erreur de requette");
    };
};