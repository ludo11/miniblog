<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>

 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
     <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p></div>
   <?php }?>



<h1 class="display-4" id="connecter">Connecter-vous ici</h1>
<section id="formConnect">
<form id="connexion"   action="?controller=users&action=login" method="POST">
    <p><label>Connection  </label>
        <input name="user" type="text" placeholder="Identifiant" id="user"/></p>
    
    <p><label>Mot de passe</label>
        <input type="password" name="mdp" placeholder="mdp" id="mdp"/></p>
    <button type="submit" class="btn btn-primary mb-2">Valider</button>
    
    <a href="?controller=users&action=newUser" class="card-link" id="nouveau">Nouveau utilisateur</a>
</form>
</section>
<?php 

