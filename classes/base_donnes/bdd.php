<?php

namespace class\db ;

class Base_donnes{

    private $db;
    private static $instance_classe;

    public function __construct(){
        require "../config/config.php" ;
        $host = $config_db["db_host"];
        $user = $config_db["db_user"];
        $password = $config_db["db_password"];
        $name = $config_db["db_name"];
                
        $pdo_option = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ];
        $this->db = new \PDO("mysql:host=" . $host . ";dbname=" . $name , $user , $password , $pdo_option);
    }
        
    public static  function getInstance(){
        if (is_null(self::$instance_classe)){
            self::$instance_classe = new Base_donnes();
        }

        return self::$instance_classe ;
    }

    public function querry($query){
        $query = $this->db->query($query);
        return $query->fetchAll();
    }

    public function prepare_execute(string $query ,array $valeurs){
        $query = $this->db->prepare($query);
        $query->execute($valeurs);
        return $query->fetchAll();
    }

}