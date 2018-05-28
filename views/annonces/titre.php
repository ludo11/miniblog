

<?php foreach ($rechercheTitre as $rechercheDetail){ ?>

<section id="contenuPost">
   
    <p id="entete"> Titre :<?php echo $rechercheDetail->titre .' : '. ''?>    <strong> <?php echo $rechercheDetail->auteur; ?></strong>
   
    </p>
   <p>Contenue : <?php echo $rechercheDetail->description?><br> 
    <?php echo $rechercheDetail->images; ?>
   tel :<?php echo $rechercheDetail->tel; ?></p>
   
</section> 



<?php } if(empty($rechercheDetail)){
    echo ' <h4>Aucun Résultat a votre recherche</h4>' ;
}

