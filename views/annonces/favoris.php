<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert">
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
      <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
       <p><a href="?controller=annonces&action=vueFavoris">Mes Favoris :</a> </p>
</div>
   <?php } ?><h1 class="display-4">Vos Favoris</h1>

<?php foreach($detailFavoris as $listeFavoris) { ?>

 <div class="list-group" id="favorisListe">
            <a href="?controller=annonces&action=show&id=<?php echo $listeFavoris->id;  ?>&categories=<?php echo $listeFavoris->categories  ?>&localisation=<?php echo $listeFavoris->localisation  ?>"  class="list-group-item list-group-item-action list-group-item-primary"><img id="miniature" src="<?php echo $listeFavoris->images  ?>" alt="image"><?php echo $listeFavoris->titre ; ?><p><?php echo $listeFavoris->description ; ?> </p>Telephone :<?php echo $listeFavoris->tel ; ?></a>
          
            <a href='?controller=annonces&action=suppFav&id=<?php echo $listeFavoris->auteur;  ?>' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="supprimer">Supprimer</a>
            
 </div>


<br>
   
    <?php if(isset($_SESSION['admin'])){ ?>
    
     <?php }?>

<?php }