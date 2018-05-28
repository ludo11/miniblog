

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
   <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
</div>
   <?php }?>


<section id="formMessage">
<form id="connexion"   action="?controller=posts&action=insert" method="POST">
   
    <input    type="hidden" name="author" id="author" value="<?php echo $_SESSION['user'] ?>"/>
    <p><label>Titre</label>
        <input type="text" name="title" placeholder="Titre" id="titre"/></p>
    
    <label>Message</label>
    
    <input type="text" name="content"  id="message"/>
    <button type="submit" class="btn btn-primary mb-2">Modifier</button>
</form>
</section>
<!--<p>Ajouter un message</p>

<form method="POST" action="?controller=posts&action=insert">
<label>Autheur</label>
<input type="hidden" name="author" id="author" value="<?php echo $_SESSION['user'] ?>"/>
<label>Titre</label>
<input type="text" name="title" placeholder="Titre du post"/>
<label>Message</label>
<input type="text" name="content" placeholder="Message"/>


<input type="submit" id="submit"/>

</form>-->


