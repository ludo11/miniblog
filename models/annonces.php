<?php
class Annonces  {
    public $id;
    public $titre;
    public $description;
    public $categories;
    public $images;
    public $localisation;
    public $tel;
    public $auteur;
    public $table = 'annonce';
     
    
    public function __construct($id, $titre, $description, $categories, $images, $localisation, $tel, $auteur) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->categories = $categories;
        $this->images = $images;
        $this->localisation = $localisation;
        $this->tel = $tel;
        $this->auteur = $auteur;
        
        
        
        
    }
    
    public static function all() {
        $table = 'annonce';
        $liste = My_model::getAll($table);
        foreach ($liste as $annonce){
            $annonces[] = new Annonces($annonce['id'], $annonce['titre'], $annonce['description'], $annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur']); 
        }
//        //j initialise mon tableau vide
//        $listAnnonce =[];
//        // on recupere l'instance de la connexion de la base de donnée
//        $db = db::getInstance();
//        
//        // on passe la requete a la base de donnée
//        $req = $db->query('SELECT * FROM annonce  ');
//       
//        //on parcour toute les infos stocker dans la base post
//        foreach ($->fetchall(PDO::FETCH_ASSOC) as $annonce) {
//                
//            $annonces[] = new Annonces($annonce['id'], $annonce['titre'], $annonce['description'], $annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur']);
//        }
        return $annonces;
    
    }
    
    public static function categorie(){ 
        $id = $_GET['id'];
        $listCategorie = [];
        $db = db::getInstance();
        $req = $db->prepare(" SELECT * FROM categorie, annonce WHERE categorie.id_categorie = $id  ");
        $req->execute();
        $listCategorie = $req->fetch();
        return $listCategorie;
   }
   
   public static function localisation(){ 
        $id = $_GET['id'];
       
        $listLocalisation = [];
        $db = db::getInstance();
        $req = $db->prepare("SELECT annonce.localisation AS localisation_nom , region.name AS region_nom   FROM annonce,region WHERE (annonce.localisation = $id) = (region.id_region = $id) ");
        $req->execute();
        $listLocalisation = $req->fetch();
        return $listLocalisation;
   }
   
    public static function find($id) {
        $table = 'annonce';
        $annonce = My_model::find($table, $id);
        
//        $db = db::getInstance();
//        //on verifie si c'est un entier
//        $id = intval($id);
//        $req = $db->prepare("SELECT  *   FROM annonce WHERE id= :id");
//        //la requete est prete on remplace :id avec la valeur $id
//        $req->execute(array('id' => $id));
//        $annonce = $req->fetch(PDO::FETCH_ASSOC);
        return new Annonces($annonce['id'], $annonce['titre'], $annonce['description'], $annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur']);
    }
    
    public static function create($array) {
        
        $db = db::getInstance();
        
        $titre = $array['titre'];
        $description = $array['description'];
        $categories = $array['categories'];
        $images = $array['images'];
        $localisation = $array['localisation'];
        $tel = $array['tel'];
        $auteur = $array['auteur'];
        
       
        
        $req = $db->prepare('INSERT INTO annonce (titre, description, categories, images, localisation, tel, auteur) VALUES (:titre, :description, :categories, :images, :localisation, :tel, :auteur)');

            $req->bindValue(':titre', $titre);
            $req->bindValue(':description', $description);
            $req->bindValue(':categories', $categories);
            $req->bindValue(':images', $images);
            $req->bindValue(':localisation', $localisation);
            $req->bindValue(':tel', $tel);
            $req->bindValue(':auteur', $auteur);
            
            
            $req->execute($array);
           
            
       
       
       
    }
     public  static function update($array){
         $table = 'annonce';
         $valeur = "titre = :titre, description = :description, images = :images ,tel = :tel";
         $miseJour = My_model::update($table, $array, $valeur);
//        $db= db::getInstance();
//        $req = $db->prepare('UPDATE annonce SET titre = :titre, description = :description, images = :images ,tel = :tel WHERE id = :id');
       
       
      
        
    }
    
      public static function delete($array){
        $id = $_GET['id'];
        $db= db::getInstance();
        $req = $db->prepare('DELETE FROM annonce WHERE id = '.$id.' ');
    
        $req->execute($array);
    }
    
    
    public static function searchTitre(){
         $db = db::getInstance();
        //on verifie si c'est un entier
         
        $titre = $_POST['titre'];
        $listeTitre = [];
        $req = $db->query("SELECT *   FROM annonce WHERE titre= '$titre' ");
        //la requete est prete on remplace :id avec la valeur $id
         foreach ($req->fetchall(PDO::FETCH_ASSOC) as $annonce) {
        
         $listeTitre[] = new Annonces($annonce['id'], $annonce['titre'], $annonce['description'], $annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['auteur']);
         }
           return $listeTitre;
    }
    
    public function listeFavoris(){
         $db = db::getInstance();
         $listeFavoris = [];
         $id = $_SESSION['id'];
        $req = $db->prepare("SELECT * FROM `annonce` INNER JOIN favoris ON favoris.id_annonce = annonce.id INNER JOIN connection ON favoris.id_user = connection.id 
 ");
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute();
        foreach ($req->fetchall(PDO::FETCH_ASSOC) as $annonce) {
        
        $listeFavoris[] = new Annonces($annonce['id_annonce'], $annonce['titre'], $annonce['description'], $annonce['categories'], $annonce['images'], $annonce['localisation'], $annonce['tel'], $annonce['id_favoris']);
    }
    return $listeFavoris;
    }
    

    
    
  
}
