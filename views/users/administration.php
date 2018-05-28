<?php
 if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert">
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
     <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p></div>
   <?php }?>
<?php if($_SESSION['role']['role']  === "2"){ ?>
<a href='?controller=posts&action=modif&id' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="modifier">Modifier un billet</a>
    
<a href='?controller=posts&action=supp&id=' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="supprimer">Supprimer un billet</a>

 <a href='?controller=users&action=supp&id=' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="supprimer">Liste des membres</a>   
    
  <a href='?controller=users&action=viewGestion&id=' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="supprimer">Gestion des membres</a>     
    
  <a href='?controller=annonces&action=supp&id=' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="supprimerAnnonce">Supprimer une annonce</a>
  <a href='?controller=annonces&action=modif&id' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="modifierAnnonce">Modifier une annonce</a> 
  <div id="info"><p><?php echo 'Nombre d\'inscrit sur le forum : <strong>'.$inscrit['COUNT(*)'].'</strong> membres'; ?></p>
      <p><?php echo 'Nombre de posts sur le forum : <strong>'.$nbPost['COUNT(*)'].'</strong> posts'; ?></p>
      <p><?php echo 'Nombre de commentaires  : <strong>'.$nbComments['COUNT(*)'].'</strong> commentaires'; ?></p>
  
  </div>
    
    
    
    
<?php }