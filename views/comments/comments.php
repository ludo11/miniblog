

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
</div>
  
<h1>Ajouter un commentaire</h1>
<section id="formMessage">
<form id="connexion"   action="?controller=comments&action=addComments" method="POST">
    
   <input    type="hidden" name="id_billet" id="author" value="<?php echo $_GET['id']; ?>"/>
    <input    type="hidden" name="auteur" id="author" value="<?php echo $_SESSION['user'] ?>"/>
   
    
    <label>Message</label>
    
    <input type="text" name="commentaire"  id="message"/>
    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
</form>
</section>






 <?php }?>
<a href='?controller=posts&action=show&id=<?php echo $_GET['id']; ?>'>Retour au billet</a>
