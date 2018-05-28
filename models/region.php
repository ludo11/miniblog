<?php

class Region {
    public $id_region;
    public $name;
    
    
    public function __construct($id, $name) {
        $this->id_region = $id;
        $this->name = $name;
   
    }
    
    public static function listeRegion(){
        $table = 'region';
        $regions = My_model::getAll($table);
        foreach ($regions as $categorie){
             $listRegion[] = new Region($categorie['id_region'], $categorie['name']);
        }
        
//        $listRegion =[];
//        // on recupere l'instance de la connexion de la base de donnée
//        $db = db::getInstance();
//        
//        // on passe la requete a la base de donnée
//        $req = $db->query('SELECT * FROM region');
//       
//        //on parcour toute les infos stocker dans la base post
//        foreach ($req->fetchall() as $categorie) {
//            $listRegion[] = new Region($categorie['id_region'], $categorie['name']);
//        }
        return $listRegion;
    }
    
    public static function findRegion($id_region) {
        
        $db = db::getInstance();
        //on verifie si c'est un entier
      
        $req = $db->prepare("SELECT *   FROM region WHERE id_region = :id_region ");
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute(array('id_region' => $id_region));
        $region = $req->fetch();
        
        return   new Region($region['id_region'], $region['name']);
    }
    
}
