<?php
class Post  {
    public $id;
    public  $author;
    public $title;
    public $content;
    public $created_date;
    
    

    
    public function __construct($id, $author, $title, $content,$created_date ) {
        $this->id = $id;
        $this->author = $author;
        $this->title = $title;
        $this->content = $content;
        $this->created_date_fr = $created_date;
        
    }
    
    public static function all() {
        $table = 'Post';
        $listePost = My_model::getAll($table);
        foreach ($listePost as $post){
            $list[] = new Post($post['id'], $post['author'],$post['title'] , $post['content'], $post['created_date']);
        }
        //j initialise mon tableau vide
//        $list =[];
//        // on recupere l'instance de la connexion de la base de donnée
//        $db = db::getInstance();
//        // on passe la requete a la base de donnée
//        $req = $db->query("SELECT id, author, title, content,  DATE_FORMAT(created_date, '%d/%m/%Y %Hh%i') AS created_date_fr FROM Post ORDER BY created_date_fr DESC");
//        //on parcour toute les infos stocker dans la base post
//        foreach ($req->fetchall() as $post) {
//            $list[] = new Post($post['id'], $post['author'],$post['title'] , $post['content'], $post['created_date_fr']);
//        }
        return $list;
    }
    public static function find($id) {
        
        $db = db::getInstance();
        //on verifie si c'est un entier
        $id = intval($id);
        $req = $db->prepare("SELECT id, author, title, content,  DATE_FORMAT(created_date, '%d/%m/%Y %Hh%i') AS created_date_fr FROM Post WHERE id= :id");
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        
        return new Post($post['id'], $post['author'],$post['title'] , $post['content'],$post['created_date_fr']);
    }
    
    public static function create($array) {
        
        $db = db::getInstance();
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $created = date('Y,m,d h:i:s');
        //var_dump($db);
        
        $req = $db->prepare('INSERT INTO Post (author, title, content, created_date) VALUES (:author, :title, :content, :created_date)');
       //var_dump($req);
            $req->bindValue(':author', $author);
            $req->bindValue(':title', $title);
            $req->bindValue(':content', $content);
            $req->bindValue(':created_date', $created);
            $req->execute();
       
       
       
    }
    public  static function update($array){
        $db= db::getInstance();
        $req = $db->prepare('UPDATE Post SET  title = :title, content = :content WHERE id = :id');
       
        $req->execute($array);
      
        
    }
    public static function delete($array){
        $id = $_GET['id'];
        $db= db::getInstance();
        $req = $db->prepare('DELETE FROM Post WHERE id = '.$id.' ');
       
        $req->execute($array);
    }
    
    public static function viewCommentaire($id){
        $db = db::getInstance();
      
        $comments = $db->prepare('SELECT *  FROM commentaires WHERE id_billet = ? ');
        $comments->execute(array($id));
        
      
//        var_dump($comments);
        
        return $comments;
    }  
    
   
}
