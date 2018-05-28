<?php

class CommentsController {
      public function index() {
        
        $comments = Comments::all();
        
        require_once('views/comments/index.php');
    }
    
       public function viewComments() {
        
//          var_dump($id_billet);
       require_once('views/comments/comments.php');
   }
   
   public function addComments(){
       
//       $comments = Post::viewCommentaire($_GET['id_billet']);
       $comments = Comments::addComments(array(
            'id_billet'=> $_POST['id_billet'],
            'auteur'=> $_SESSION['user'],
            'commentaire'=> $_POST['commentaire'],
             
            
     ));
        
       self::index();
   }
}