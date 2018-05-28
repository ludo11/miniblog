<?php
class Comments  {
    public $id;
    public $id_billet;
    public $auteur;
    public $commentaire;
    public $date_commentaire;
    
    public function __construct($id, $id_billet, $auteur, $commentaire, $date_commentaire) {
        $this->id = $id;
        $this->id_billet = $id_billet;
        $this->auteur = $auteur;
        $this->commentaire = $commentaire;
        $this->date_commentaire = $date_commentaire;
    }
    
     public static function all() {
         $table ="commentaires";
         $commentaire = My_model::getAll($table);
         foreach($commentaire as $comment) {
              $listComment[] = new Comments($comment['id'], $comment['id_billet'], $comment['auteur'], $comment['commentaire'], $comment['date_commentaire']);
         }
        //j initialise mon tableau vide
//        $listComment =[];
//        // on recupere l'instance de la connexion de la base de donnée
//        $db = db::getInstance();
//        
//        // on passe la requete a la base de donnée
//        $req = $db->query('SELECT * FROM commentaires');
//       
//        //on parcour toute les infos stocker dans la base post
//        foreach ($req->fetchall() as $comment) {
//            $listComment[] = new Comments($comment['id'], $comment['id_billet'], $comment['auteur'], $comment['commentaire'], $comment['date_commentaire']);
//        }
//         var_dump($comments);
        return $listComment;
    }
    public static function find($id) {
        
        $db = db::getInstance();
        //on verifie si c'est un entier
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM commentaires WHERE id= :id_billet');
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute(array('id_billet' => $id));
        $comment = $req->fetch();
        
        return new Comments($comment['id'], $comment['id_billet'], $comment['auteur'], $comment['commentaire'], $comment['date_commentaire']);
    }
    
    
    
   
 public static function addComments($array){
         $db = db::getInstance();
         $id_billet = $array['id_billet'];
         $auteur = $array['auteur'];
         $commentaire = $array['commentaire'];
        
//        var_dump($db);
        
        $req = $db->prepare('INSERT INTO commentaires  ( id_billet, auteur, commentaire, date_commentaire) VALUES ( :id_billet , :auteur, :commentaire, Now())');
           
            $req->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
            $req->bindValue(':auteur', $auteur, PDO::PARAM_STR);
            $req->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        
            $req->execute($array);
//            var_dump($req);
    }
   
    
}