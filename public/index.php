<?php

require '../vendor/autoload.php';

$server = new AltoRouter();

$server->map("GET" , "/" , function(){
    require "../templates/index.php";
});

$server->map("GET" , "/competence" , function(){
    require "../templates/competence.php";
});

$server->map("GET" , "/projets" , function(){
    require "../templates/projets.php";
});

$server->map("GET" , "/conatct" , function(){
    require "../templates/contact.php";
});

$match = $server->match();

if($match){
    require "../templates/structure_base/header.php";
    $match["target"]();
    require "../templates/structure_base/footer.php";
};