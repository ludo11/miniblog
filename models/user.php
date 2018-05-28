<?php

class User {

    public $id;
    public $user;
    public $mdp;
    public $confirm_mdp;
    public $resultat;
    public $role;
    public $mail;

    public function __construct($id, $user, $mdp, $role, $mail) {
        $this->id = $id;
        $this->user = $user;
        $this->mdp = $mdp;
        $this->role = $role;
        $this->mail = $mail;
    }

    public static function all() {
        $table = 'connection';
        $connect = My_model::getAll($table);
        foreach ($connect as $user) {
            $list[] = new User($user['id'], $user['user'], $user['mdp'], $user['role'], $user['mail']);
        }
        return $list;

//        //j initialise mon tableau vide
//        $list =[];
//        // on recupere l'instance de la connexion de la base de donnée
//        $db = db::getInstance();
//        // on passe la requete a la base de donnée
//        $req = $db->query('SELECT * FROM connection ORDER BY user');
//        //on parcour toute les infos stocker dans la base post
//        foreach ($req->fetchall() as $user) {
//            $list[] = new User($user['id'], $user['user'],$user['mdp'] , $user['role'], $user['mail']);
//        }
    }

    public static function find($id) {

        $db = db::getInstance();
        //on verifie si c'est un entier
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM connection WHERE id= :id');
        //la requete est prete on remplace :id avec la valeur $id
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        return new User($user['id'], $user['user'], $user['mdp'], $user['role'], $user['mail']);
    }

    public function inscription($array) {
        $db = db::getInstance();
        $user = $_POST['user'];
        $mdp = sha1($_POST['mdp']);
        $role = "0";
        $mail = $_POST['mail'];
        $req = $db->prepare("INSERT INTO connection (user, mdp, role, mail) VALUES (:user, :mdp , :role, :mail)");
        //var_dump($req);
        $req->bindValue(':user', $user);
        $req->bindValue(':mdp', $mdp);
        $req->bindValue(':role', $role);
        $req->bindValue(':mail', $mail);
        $req->execute();
    }

    public function connexion($array) {

        $db = db::getInstance();

        $req = $db->prepare('SELECT * FROM connection WHERE user = :user');
//         var_dump($db);
        $req->execute($array);
        $resultat = $req->fetch();
//         var_dump($resultat);
        return $resultat;

//         
    }

    public function recup($user) {
        $user = $_POST['user'];
        $db = db::getInstance();
//        var_dump("SELECT role FROM connection WHERE user = $user");
        $req = $db->prepare("SELECT id, user, mdp, mail FROM connection WHERE  user = \"$user\"");
        $req->execute();
        $role = $req->fetch();

        return $profil['id'];
    }

    public function getRole($user) {
        $user = $_POST['user'];
        $db = db::getInstance();
//        var_dump("SELECT role FROM connection WHERE user = $user");
        $req = $db->prepare("SELECT id, role FROM connection WHERE user = \"$user\"");
        //var_dump($req);
        $req->execute();
        $role = $req->fetch();

        return $role;
    }

    public static function deleteUser($array) {
        $id = $_GET['id'];
        $db = db::getInstance();
        $req = $db->prepare('DELETE FROM connection WHERE id = ' . $id . ' ORDER BY user ');

        $req->execute($array);
    }

    public static function verifUser() {
        $user = $_POST['user'];
        $db = db::getInstance();
        $req = $db->query("SELECT user FROM connection WHERE user = '.$user.'");

        $pseudo = $req->fetch();

        return $pseudo;
    }

    public static function update($array) {
        $db = db::getInstance();
        $req = $db->prepare('UPDATE connection SET  role = :role, mail = :mail  WHERE id = :id');

        $req->execute($array);
    }

    public static function nbinscrit() {

        $db = db::getInstance();
        $req = $db->query("SELECT COUNT(*) FROM connection  ");
        $inscrit = $req->fetch();


        return $inscrit;
    }

    public static function nbPost() {

        $db = db::getInstance();
        $req = $db->query("SELECT COUNT(*) FROM Post  ");
        $nbPosts = $req->fetch();


        return $nbPosts;
    }

    public static function nbCommentaire() {

        $db = db::getInstance();
        $req = $db->query("SELECT COUNT(*) FROM commentaires  ");
        $nbComments = $req->fetch();


        return $nbComments;
    }

    public static function profilCommentaire() {
        $user = $_SESSION['user'];
        $db = db::getInstance();
        $req = $db->query("SELECT COUNT(*) FROM commentaires WHERE auteur = '$user' ");
        $nbComment = $req->fetch();


        return $nbComment;
    }

    public static function profilPost() {
        $user = $_SESSION['user'];
        $db = db::getInstance();
        $req = $db->query("SELECT COUNT(*) FROM Post WHERE author = '$user' ");
        $profilPost = $req->fetch();


        return $profilPost;
    }

    public static function dernierPost() {
        $user = $_SESSION['user'];
        $db = db::getInstance();
        $req = $db->query("SELECT title, content, created_date FROM Post WHERE author = '$user' ORDER BY created_date DESC LIMIT 0,1");
        $req->execute();
        $dernier = $req->fetch();
//        var_dump($dernier);
//        var_dump($user);
        return $dernier;
    }

    public static function updateMdp($array) {
        $mdp = $_POST['mdp'];
        $db = db::getInstance();
        $req = $db->prepare("UPDATE connection SET   mdp = :mdp  WHERE id = :id");

        $req->execute($array);
    }
        public static function email(){
          
            mail('lfalandry@hotmail.com', 'essai', 'bloooooooo');
   
        }
}
