<?php

class Categories extends My_model{
    public $id;
    public $name;
    
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
   
    }
    
     public static function findCat($id_categorie) {
        
        $db = db::getInstance();
        //on verifie si c'est un entier
      
        $req = $db->prepare("SELECT *   FROM categorie WHERE id_categorie = :id_categorie ");
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute(array('id_categorie' => $id_categorie));
        $categorie = $req->fetch();
        
        return   new Categories($categorie['id_categorie'], $categorie['name']);
    }
    
    public static function listeCat(){
        $table = 'categorie';
        $categories = My_model::getAll($table);
        foreach ($categories as $categorie){
             $listCat[] = new Categories($categorie['id_categorie'], $categorie['name']);
        }
//        $listCat =[];
//        // on recupere l'instance de la connexion de la base de donnée
//        $db = db::getInstance();
//        
//        // on passe la requete a la base de donnée
//        $req = $db->query('SELECT * FROM categorie');
//       
//        //on parcour toute les infos stocker dans la base post
//        foreach ($req->fetchall() as $categorie) {
//            $listCat[] = new Categories($categorie['id_categorie'], $categorie['name']);
//        }
        return $listCat;
    }
    public static function search(){
         $db = db::getInstance();
        //on verifie si c'est un entier
        $annonceListe =[];
        $titre = $_POST['titre'];
        $id = $_POST['categories'];
        $id_region = $_POST['region'];
        $req = $db->query("SELECT * FROM `annonce` WHERE (annonce.categories = $id) AND (annonce.localisation = $id_region ) OR annonce.titre = '$titre' ");
        //la requete est prete on remplace :id avec la valeur $id
       
        foreach($req->fetchall() as $annonce){   
        $annonceListe[] =  new Annonces($annonce['id'], $annonce['titre'], $annonce['description'], $annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur']);
        }
        return $annonceListe;
    } 
}
