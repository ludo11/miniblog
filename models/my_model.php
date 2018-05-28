<?php

class My_model   {
    public $table;
  


    public function __construct() {

    }

    public static function getAll($table) {
        $db = db::getInstance();
        $resultat = [];
        $req = $db->query("SELECT * FROM $table  ");
        $req->execute();
//        var_dump($req);
        foreach ($resultat = $req->fetchall(PDO::FETCH_ASSOC) as $ligne=>$valeur) {
          
        }
          
           return $resultat;
    
    }
    
    public static function find($table, $id){
        $db = db::getInstance();
        $req  = $db->prepare("SELECT * FROM $table WHERE id = :id");
        $req->execute(array('id' => $id));
        $result = $req->fetch();
         return $result;
       
    }
    
    public  static function update($table, $array, $valeur){
        $db= db::getInstance();
        $req = $db->prepare("UPDATE $table SET $valeur WHERE id = :id");
       
        $req->execute($array);
      
//        var_dump($req);
    }
    
    
    
}

