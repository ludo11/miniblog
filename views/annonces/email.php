

<section id="formMessage">
<form id="connexion"   action="?controller=annonces&action=envoi" method="POST" enctype="multipart/form-data">
    
    <label for="inputState">Envoyer un mail à :</label>
 
    
    <input    type="text" name="auteur" id="author" value="<?php echo $_SESSION['user'] ?>" disabled="disabled"/>
    <p><label>Titre</label>
        <input type="text" name="object" placeholder="object" id="titre"/></p>
    
    <label>Description</label>
 
    <input type="text" name="message"  id="message" placeholder="Votre message"/><br>
   
    
    <input type="email" name="expediteur"  id="tel" placeholder="votre mail"/><br>
    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
</form>
</section>