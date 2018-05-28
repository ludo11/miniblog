<?php foreach($annonces as $annonce) { ?>

<form method="POST" action="?controller=annonces&action=delete&id=<?php echo $annonce->id; ?>">
   
 
<label>Auteur :</label>   
<input type="text" name="auteur" id="author" value="<?php echo $annonce->auteur; ?>"/>
<label>Titre :</label>
<input type="text" name="titre" value="<?php echo $annonce->titre; ?>"/>
<label>Message :</label>
<input type="text" name="description" value="<?php echo $annonce->description; ?>"/>

 <button type="submit" class="btn btn-primary mb-2">Supprimer</button>
<!--<input type="submit" id="submit"/>-->

</form>
<?php } 


