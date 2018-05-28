

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
      <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p></div>
   <?php }?>

<h3><strong>Administration : </strong> <br>Liste des membres  </h3><br>

<?php foreach($users as $user) { ?>

<form method="POST" action="?controller=users&action=delete&id=<?php echo $user->id; ?>">
   
 
  
<input type="text" name="user" id="author" value="<?php echo $user->user; ?>" disabled="disabled"/>


 <button type="submit" class="btn btn-primary mb-2">Supprimer</button>
<!--<input type="submit" id="submit"/>-->

</form>
<?php } 