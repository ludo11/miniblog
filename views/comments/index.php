<?php  session_start() ?>

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
    <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
    <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
</div>
   <?php }?>
 


<?php foreach($comments as $comment) { ?>
<p>
    <?php echo $comment->auteur; ?>
   
    <?php echo $comment->commentaire; ?>
     <?php echo $comment->date_commentaire; ?>
  

<?php } ?>


