<?php
class PostsController {
    public function index() {
       
        $posts = Post::all();
//        var_dump($posts);
        require_once('views/posts/index.php');
    }
    
    public function show(){
        if(!isset($_GET['id']) && ($_GET['id']) > 0){
            return call('pages', 'error');
        }else{
            $toto = Post::find($_GET['id']);
            $comments = Post::viewCommentaire($_GET['id']); 
            
            require_once('views/posts/show.php');
            
        }

    }
    
    public function create(){
            
            require_once('views/posts/create.php');
           
        
    }
    public function insert(){
        
        $post = Post::create(array(
                'author'=> $_POST['author'],
                'title'=> $_POST['title'],
                'content'=> $_POST['content']
     ));
        $posts = Post::all();
        require_once('views/posts/index.php');
    }
    

    public function modif(){
         if(!isset($_GET['id'])){
            return call('pages', 'error');
        }else{
            $posts = Post::all();
            $post = Post::find($_GET['id']);
            require_once('views/posts/update.php');
        }

        
    }
    
   public function update(){
       $post = Post::update(array(
                'id'=> $_GET['id'],
               
                'title'=> $_POST['title'],
                'content'=> $_POST['content']
     ));
        $posts = Post::all();
        require_once('views/posts/index.php');
   }
   
   public function supp(){
       if(!isset($_GET['id'])){
            return call('pages', 'error');
        }else{
            $post = Post::find($_GET['id']);
            $posts = Post::all();
            require_once('views/posts/delete.php');
        }
   }
   
   public function delete(){
       $post = Post::delete(array(
//                'id'=> $_GET['id'],
                'author'=> $_POST['author'],
                'title'=> $_POST['title'],
                'content'=> $_POST['content']
     ));
    
        self::index();
   }

 
 
}    