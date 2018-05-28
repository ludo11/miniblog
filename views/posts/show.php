

<?php if(isset($_SESSION['user'])){ ?>
<div class="alert alert-primary" role="alert" >
  <p>
   Bienvenue :
 
 
     <?php echo  $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
      <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
</div>
   <?php }?>
 
<div id="billet">
    
    <p> <strong> Auteur :</strong>
        <?php echo($toto->author) ?></p>

 <p><strong>Titre :</strong>
     <?php echo($toto->title) ?></p>

 <p> <strong> Contenu :</strong></p>
 <p>  <?php echo($toto->content) ?></p>

 <p><strong> Date :</strong>
     <?php echo($toto->created_date_fr) ?></p>



</div>
<br>


<br>

<section id="commentaires">
<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-header">Commentaires</div>
  <div class="card-body">
      <?php
        while ($comment = $comments->fetch())
        {
        ?>
      <p><strong><?= $comment['auteur'] .'</strong> <br> ' .$comment['commentaire'] .'<br> '.$comment['date_commentaire']?> </p>
           
        <?php
        }
        ?>
    <a href='?controller=comments&action=viewComments&id=<?php echo $toto->id; ?>'>Ajouter un commentaire</a>
    <p class="card-text"></p>
  </div>
</div>
</section>    
 
   






