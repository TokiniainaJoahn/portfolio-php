<?php
$_SESSION["role"] = "Admin";
$_SESSION["email"] = "klhkjsf";

function est_connecte(){
    if (isset($_SESSION["role"]) && isset($_SESSION["email"])){
        return true ;
    }else{
        return false;
    }
}