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


<?php if ($_SESSION['role']['role'] === "2") { ?>

    <a href='?controller=users&action=redirAdmin' class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="annonceAdministration">Administration</a>
    
<?php } ?>

    <a href="?controller=annonces&action=create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="rajouterAnnonce">Ajouter une annonce</a>






    <section id="menuRecherche">
<form id="connexion"   action="?controller=annonces&action=resultSearch&recherche" method="POST">
    <p><label>Rechercher une annonce par categorie et région</label>


        <select class="form-control form-control-lg"  name="categories"  >
<?php
foreach ($catego as $categorie => $valeur) {
//                $valeur1++;
    ?>
                <option value="<?php echo $valeur->id ?>"><?php echo $valeur->name; ?></option>
            <?php } ?>

        </select>
        <select class="form-control form-control-lg"  name="region"  >
            <?php
            $i = 0;
            foreach ($regions as $region) {
                $i++;
                ?>
                <option value="<?php echo $i ?>"><?php echo $region->name; ?></option>

<?php } ?>
        </select>
        <label> Titre en option</label>

        <input name="titre" type="search" />
        <input class="btn btn-primary btn-lg active" type="submit" value="Rechercher"/></p>
</form> <br><br>

</section>

<!--<form id="connexion"   action="?controller=annonces&action=titreSearch&titre" method="POST">
    <label> Titre en option</label>

    <input name="titre" type="search" />
    <input type="submit"/>
</form> <br><br> -->
<h4>Derniere annonce posté</h4>
<div class="row ">

<?php foreach ($annonces as $annonce) { ?>



        <div class="col-md-4">


            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $annonce->images; ?>" alt="Card image cap" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $annonceTitre = strtoupper($annonce->titre); ?></h5>
                    <p class="card-text"><?php echo $annonce->description ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $catArray[$annonce->categories]; ?></li>
                    <li class="list-group-item"><?php echo $regionArray[$annonce->localisation]; ?> </li>
                    <li class="list-group-item"><?php echo $annonce->tel; ?></p></li>
                    <li class="list-group-item"><?php echo $annonce->auteur; ?></p></li>
                </ul>
                <div class="card-body">
                    <a href="?controller=annonces&action=show&id=<?php echo $annonce->id ?>&categories=<?php echo $annonce->categories ?>&localisation=<?php echo $annonce->localisation ?>" class="card-link">Détail</a>
                    <p>

                        <a href="?controller=annonces&action=favoris&id=<?php echo $annonce->id ?>"  role="button" aria-pressed="true" id="ajouterAnnonce"><button  type="button" class="btn btn-warning">Ajouter favoris</button></a><p>
                     
                        <!--    <a href="#" class="card-link">Another link</a>-->
                </div><br><br></div><br><br>
        </div>

<?php } ?> 
</div>
