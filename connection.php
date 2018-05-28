<?php

class db {
    //
    protected static $instance = NULL ;
   

    //constructeur vide pour s'en servir 
    public function __construct(){
       
    }
    
    
    private function __clone() {
        
    }
    
    public static function getInstance(){
        //on verifie si l'instance existe sinon on la créee
        if(!isset(self::$instance)) {
            //le self fait reference a la classe donc ici db
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            //on creer l'instance 
            self::$instance = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '',$pdo_options);
        }
        return self::$instance;
    }

    
    
    
    
    
    
    
    
}

