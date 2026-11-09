<?php

require '../vendor/autoload.php';

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

$match = $server->match();

if($match){
    require "../templates/structure_base/header.php";
    $match["target"]();
    require "../templates/structure_base/footer.php";
};