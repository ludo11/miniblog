

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert">
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
      <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
</div>
   <?php }?>
 <?php foreach($posts as $post) { ?>
<?php } ?>
<a href="?controller=posts&action=create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="ajouter">Ajouter un post</a>

 <?php 
 if($_SESSION['role']['role']  === "2"){ ?>

<a href='?controller=users&action=redirAdmin' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="administration">Administration</a>

   <?php }?>
    
<?php foreach($posts as $post) { ?>
<section id="contenuPost">
    <p id="entete">  <?php echo $post->created_date_fr; ?><strong> <?php echo $post->author; ?></strong>
 
    </p>
    <p>Titre : <?php echo $post->title; ?><br> 
    <?php echo $post->content; ?></p>
    <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>voir le contenu</a>
</section> 
    
<br>
   
    <?php if(isset($_SESSION['admin'])){ ?>
    <a href='?controller=posts&action=supp&id=<?php echo $post->id; ?>'>Supprimer un billet</a>
     <?php }?>

<?php }