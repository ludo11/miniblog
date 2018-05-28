
<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
    <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
    <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
</div>
   <?php }?>
    <div class="shadow-lg p-3 mb-5 bg-white rounded"> 
        <h1 class="display-4" id="titre">Bienvenue sur mon mini blog</h1>
    </div> 

<div class="container">
  <div class="row">
    <div class="col-sm">
     
    </div>
    <div class="col-sm">
        <div class="card" style="width: 48rem;">
        <div class="card-body">
            <h5 class="card-title">Mini blog</h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text">Bienvenue sur mon blog pour pouvoir poster sur le forum
            vous devez etre connecté si vous n'avez pas de compte vous pouvez en créer un bonne visite.</p>
            <?php   if(empty($_SESSION['user'])){; ?>
            <a href="?controller=users&action=connect" class="card-link">Connexion</a>
            <a href="?controller=users&action=newUser" class="card-link">Nouveau utilisateur</a>
            <?php } ?>
                <?php if(isset($_SESSION['user'])){ ?>
                    <h4>Vous etes connecté retour au forum <a href="?controller=posts&action=index" class="card-link">ici</a></h4>
                <?php }?>
    
        </div>
        </div>
 
    </div>
    <div class="col-sm">
<!--      dernier membre inscrit :-->
    </div>
  </div>
</div>


    




