<?php

function call($controller, $action) {
    require_once('controllers/'.$controller.'_controller.php');
    
    switch ($controller) { 
        case 'pages':
            $controller = new PagesController();
        break;
        
        case 'posts' :
            //chargement des models
            require_once('models/my_model.php');
            require_once('models/post.php');
            $controller = new PostsController();
        break;    
        
        case 'comments' :
            //chargement des models
            require_once('models/comments.php');
            require_once('models/my_model.php');
            $controller = new CommentsController();
        break;    
    
        case 'users' :
            require_once('PHPMailer-master/src/PHPMailer.php');
            
            require_once('models/my_model.php');
            require_once('models/user.php');
            $controller = new UsersController();
         break;
        
     
         case 'annonces' :
             require_once('models/user.php');
            require_once('models/my_model.php');
            require_once('models/favoris.php');
            require_once('models/region.php');
            require_once('models/categories.php'); 
            require_once('models/annonces.php');
            $controller = new AnnoncesController();
        break;
    }
    
    $controller->{ $action }();
    
}

//on definit les routes
$routes = array('pages'=> ['home', 'error'],
                     'posts'=> ['nbComment','index', 'show','create','insert','update','modif','delete','supp'],
                     'comments'=> ['comments','viewComments','addComments','index'],
                     'users'=>['updateProfilMdp','index','newUser','verif','loock','deconnexion','connexion','login','connect','getRole', 'redirAdmin', 'deleteUser', 'administration','supp','delete', 'gestion','viewGestion','droit','profil','viewProfil'],
                     'annonces'=>['envoi','vueMail','email' ,'suppFav','vueFavoris','favoris','titre','resultSearch','recherche','listeCat','index','all','show','create','insertAnnonce','update','modif','delete','supp','titreSearch']);
    



if(array_key_exists($controller, $routes))  {
    if (in_array($action, $routes[$controller])) {
        call($controller , $action);
    }else {
        call('pages', 'error');
    }
} else {
  call('pages','error'); 
}    
