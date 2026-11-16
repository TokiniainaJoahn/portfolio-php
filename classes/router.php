<?php

namespace class;

class Router{

    private $altorouter;
    private static $instance;

    private function __construct(){
        $this->altorouter = new \AltoRouter();
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance ;
    }

    public function get(string $path , $files_name , string $namePath = null){
        $this->altorouter->map("GET" , $path , $files_name , $namePath);
    }
    
    public function post(string $path , $files_name , string $namePath = null){
        $this->altorouter->map("GET" , $path , $files_name , $namePath);
    }

    public function run(){
        $match = $this->altorouter->match();
        if($match){
            if(is_callable($match["target"])){
                $filePath = $match["target"]();
            }else{
                $filePath = "../templates/" . $match["target"] . ".php";
            }
            ob_start();
            require $filePath;
            $contenent = ob_get_clean();
            require "../templates/structure_base/layouts.php";
        }else{
            echo "404 Error";
        }
    }

    public function generate(string $NamePath){
        return $this->altorouter->generate($NamePath);
    }

}