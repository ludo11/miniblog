<?php

class Favoris {
    public $id_favoris;
    public $id_user;
    public $id_annonce;
    public $favoris;

    
    public function __construct($id_favoris, $id_user, $id_annonce, $favoris) {
        $this->id_favoris = $id_favoris;
        $this->id_user = $id_user;
        $this->id_annonce = $id_annonce;
        $this->favoris = $favoris;
        
    }
    
    public function addFav($array){
        try{
         $db = db::getInstance();
        
        $id_user = $_SESSION['id'] ;
        
        $id_annonce = $array['id_annonce'];
       
            
   
 
        $req = $db->prepare('INSERT INTO favoris (id_user, id_annonce ) VALUES (:id_user, :id_annonce )');
          
            $req->bindValue(':id_user', $id_user);
            $req->bindValue(':id_annonce', $id_annonce);
           
            $req->execute($array);
        }catch (PDOException $e){
            return $perdu = FALSE;
        }
        
        
    }
    public function searchIdAnnonce($id_annonce){
     
        
        $db = db::getInstance();
        //on verifie si c'est un entier
        
        $req = $db->prepare("SELECT  *   FROM favoris WHERE id_annonce = :id_annonce");
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute(array('id_annonce' => $id_annonce));
        $annonce = $req->fetch();
        
        return new Favoris($annonce['id_favoris'], $annonce['id_user'], $annonce['id_annonce'], $annonce['favoris']);
        
        
        
    }
    
     public static function deleteFav($array){
        $id = $_GET['id'];
        $db= db::getInstance();
        $req = $db->prepare('DELETE FROM favoris WHERE id_favoris = '.$id.' ');
       
        $req->execute($array);
    }
//    public function idAnnonce(){
//         $db = db::getInstance();
//         $listeFavoris = [];
//      
//        $req = $db->prepare("SELECT * FROM `annonce` INNER JOIN favoris ON favoris.id_annonce = annonce.id INNER JOIN connection ON favoris.id_user = connection.id
// ");
//        //la requete est prete on remplace :id avec la valeur $id
//        $req->execute();
//        foreach ($req->fetchall() as $annonce) {
//        
//        $listeFavoris[] = new Favoris($annonce['id'],$annonce['titre'],$annonce['description'],$annonce['titre'],$annonce['tel'],$annonce['id_user'], $annonce['tel'],  $annonce['tel']);
//    }
//    return $listeFavoris;
//    }
    
}