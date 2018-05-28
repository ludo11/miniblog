

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :

     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
   <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
</div>
   <?php }?>
 
 <h3>Modifiez votre post :  <strong><?php echo  $_SESSION['user']; ?></strong></h3><br>
<?php foreach ($posts as $post){ ?>
<form method="POST" action="?controller=posts&action=update&id=<?php echo $post->id; ?>">
<label>Auteur :</label>
<input type="text" name="author" id="author" value="<?php echo $post->author; ?>" disabled="disabled"/>
<label>Titre :</label>
<input type="text" name="title" value="<?php echo $post->title; ?>"/>
<label>Message :</label>
<input type="text" name="content" value="<?php echo $post->content; ?>"/>


 <button type="submit" class="btn btn-primary mb-2">Modifier</button>

</form>
<?php } 