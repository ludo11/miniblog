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

<h3>Modifiez votre annonce :  <strong><?php echo $_SESSION['user']; ?></strong></h3><br>
<?php foreach ($annonces as $annonce) { ?>
    <form method="POST"id="updateAnnonce" enctype="multipart/form-data" action="?controller=annonces&action=update&id=<?php echo $annonce->id; ?>">
        <div class="form-group">
            <label>Titre :</label>
            <input type="text" name="titre" id="author" value="<?php echo $annonce->titre; ?>" />
            <label>Description :</label>
            <input type="text" name="description" value="<?php echo $annonce->description; ?>"/>
            <label>Telephone :</label>
            <input type="text" name="tel" value="<?php echo $annonce->tel; ?>"/>

            <input type="file" name="images" value="<?php echo $annonce->images; ?>"/>
            <button type="submit" class="btn btn-primary mb-2">Modifier</button>
        </div>
    </form><BR>
<?php
} 