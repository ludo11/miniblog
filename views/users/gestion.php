
<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>

  <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p></div>

    <?php } ?>

<h3><strong>Administration : </strong> <br>Gestion des membres  </h3><br>

<?php foreach($users as $user) { ?>

<form method="POST" action="?controller=users&action=droit&id=<?php echo $user->id; ?>">
   
 
  
<input type="text" name="user" id="author" value="<?php echo $user->user; ?>" disabled="disabled"/>


<label for="inputState"></label>
<select name="role" id="role" class="form-control">
    <option selected value="<?php echo $user->role; ?>">Privillège</option>
        <option value="<?php echo $user->role = 2; ?>">Admin</option>
        <option value="<?php echo $user->role = 0; ?>">membre</option>
      </select>

<input type="email" name="mail" id="author" value="<?php echo $user->mail; ?>" />


<br><button type="submit" class="btn btn-primary mb-2">Valider</button><br><br>
<!--<input type="submit" id="submit"/>-->

</form>
<?php } 