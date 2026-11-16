<?php

namespace class;

class upload{

    private $file;

    public function __construct($fileToUpload){
        if($fileToUpload["error"] == 0){ 
            $this->file = $fileToUpload;
        }else{
            $this->file = null;
        }
    }

    public function rename_file(){
        $fileExtension = strtolower(pathinfo($this->file["name"] , PATHINFO_EXTENSION));
        $name_uniq = uniqid() . Date("YmdH") . "." . $fileExtension;
        $this->file["name"] = $name_uniq;        
    }

    public function upload(){
        $PathToPlace = "images/images_projets/" . $this->file["name"];
        move_uploaded_file($this->file["tmp_name"] , $PathToPlace);
    }

};

class download{

    public static function send_file_download(string $filePath ,string $nameOnSend){
        $size = filesize($filePath);
        header("Content-Disposition: attachement ; filename=" . $nameOnSend);
        header("Content-lenght: $size");
        readfile($filePath);
    }

}