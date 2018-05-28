<?php if (isset($_SESSION['user'])) { ?>
    <div class="alert alert-primary" role="alert">
        <p>
            Bienvenue :


            <?php echo $_SESSION['user']; ?></p><p><a href="?controller=users&action=deconnexion">Deconnexion</a> </p>
        <p><a href="?controller=users&action=viewProfil&id=<?php echo $_SESSION['id'] ?>">Mon profil :</a> </p>
        <p><a href="?controller=annonces&action=vueFavoris">Mes Favoris :</a> </p>
    </div>
<?php }
?>

<div class="row ">

<?php foreach ($recherche as $rechercheDetail){ ?>
    <div class="col-md-6">


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $rechercheDetail->images; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $annonceTitre = strtoupper($rechercheDetail->titre); ?></h5>
                    <p class="card-text"><?php echo $rechercheDetail->description ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $catArray[$rechercheDetail->categories]; ?></li>
                    <li class="list-group-item"><?php echo $regionArray[$rechercheDetail->localisation]; ?> </li>
                    <li class="list-group-item"><?php echo $rechercheDetail->tel; ?></p></li>
                    <li class="list-group-item"><?php echo $rechercheDetail->auteur; ?></p></li>
                </ul>
                <div class="card-body">
                    <a href="?controller=annonces&action=show&id=<?php echo $annonce->id ?>&categories=<?php echo $annonce->categories ?>&localisation=<?php echo $annonce->localisation ?>" class="card-link">Détail</a>
                    <p>
                        <a href="?controller=annonces&action=favoris&id=<?php echo $annonce->id ?>"  role="button" aria-pressed="true" id="ajouterAnnonce"><button  type="button" class="btn btn-warning">Ajouter favoris</button></a><p>
                        <!--    <a href="#" class="card-link">Another link</a>-->
                </div><br><br></div><br><br>
</div>




<?php } if(empty($rechercheDetail)){
    echo ' <h4>Aucun Résultat a votre recherche</h4>' ;
} ?> </div>
<?php

 