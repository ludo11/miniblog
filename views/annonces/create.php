<section id="formMessage">
<form id="connexion"   action="?controller=annonces&action=insertAnnonce" method="POST" enctype="multipart/form-data">
    
    <label for="inputState">Categories</label>
  
<select name="categories" id="role" class="form-control">
    
      <?php $i = 0;
    foreach ($categories as $categorie){ 
        $i++;  ?>
    <option value="<?php echo $i ?>"><?php echo $categorie->name; ?></option>
   
    <?php } ?>
</select>
    
    <input    type="hidden" name="auteur" id="author" value="<?php echo $_SESSION['user'] ?>"/>
    <p><label>Titre</label>
        <input type="text" name="titre" placeholder="Titre" id="titre"/></p>
    
    <label>Description</label>
 
    <input type="text" name="description"  id="message"/><br>
    <label>Images</label>
    <input type="file" name="images"  id=""/><br>
    <label for="inputState">Region</label>
    <select name="localisation" id="categories" class="form-control">
       
    <?php   $i =0;
    foreach ($regions as $region){
        $i++;
     ?>
    <option value="<?php echo $i; ?>"><?php echo $region->name; ?></option>
    <?php } ?>
</select>
    <input type="tel" name="tel"  id="tel"/><br>
    <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
</form>
</section>

