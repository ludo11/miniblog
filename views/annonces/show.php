<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert">
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
      <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
       <p><a href="?controller=annonces&action=vueFavoris">Mes Favoris :</a> </p>
</div>
   <?php }

 ?>

<div class="card mb-3">
   
  <div class="card-body">
      <h5 class="card-title"><strong>TITRE :</strong><?php echo $detail->titre ?></h5>
      <p class="card-text"><strong>Description :</strong><?php echo $detail->description ?></p>
      <p class="card-text"><small class="text-muted"><strong>Catégorie :</strong><?php echo $nomCategorie->name ?></small></p>
    <p class="card-text"><small class="text-muted"><strong>Région :</strong><?php echo $regionNom->name?></small></p>
    <p class="card-text"><small class="text-muted"><strong>Telephonne   :</strong><?php echo $detail->tel  ?></small></p>
    <a href="?controller=annonces&action=vueMail" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="envoyerMail">Contacter</a>
    <img class="card-img-top" id="imageShow" src="<?php echo $detail->images; ?>" alt="Card image cap" style="width: 18rem;">
  </div>
</div>



