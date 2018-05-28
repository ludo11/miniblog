<?php session_start() ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        
   
        <meta charset="UTF-8">
        <title>Blog</title>
    </head>
    <body>

        <header>
            <div class="container" id="menu">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="../" role="tab" aria-controls="pills-home" aria-selected="true">Acceuil</a>
                    </li>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="?controller=posts&action=index" role="tab" aria-controls="pills-profile" aria-selected="false">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="?controller=annonces&action=index" role="tab" aria-controls="pills-profile" aria-selected="false">Petites annonces</a>
                    </li>
                    <?php } ?>
                    <?php if(empty($_SESSION['user'])){ ?>
                     <li class="nav-item">
                         <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="?controller=users&action=connect" role="tab" aria-controls="pills-contact" aria-selected="false">Connection</a>
                    </li>
                     <?php } ?>
                </ul>
                
                



             
             </div>
        </header>
        <div class="container">
            
            <?php require_once('routes.php'); ?>
         </div>   
        <footer>
            
        </footer>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      
    </body>
</html>
