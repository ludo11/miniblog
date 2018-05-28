<?php

Class AnnoncesController  {
   

    public function index() {
        $annonces = Annonces::all();
//        var_dump($annonces);
        $regions = Region::listeRegion();
        $catego = Categories::listeCat();

        foreach ($catego as $cat) {
            $catArray[$cat->id] = $cat->name;
        }
        foreach ($regions as $nom) {
            $regionArray[$nom->id_region] = $nom->name;
        }


        require_once('views/annonces/index.php');
    }

    public function show() {
        if (!isset($_GET['id']) && ($_GET['id']) > 0) {
            return call('pages', 'error');
        } else {
            $annonces = Annonces::all();
//        var_dump($_GET['id']);
//        var_dump($_GET['categories']);
            $detail = Annonces::find($_GET['id']);
//            var_dump($detail);
//            $categories = Annonces::categorie();
//            $localisation = Annonces::localisation();
            $nomCategorie = Categories::findCat($_GET['categories']);
//            var_dump($nomCategorie);
            $regionNom = Region::findRegion($_GET['localisation']);

            require_once('views/annonces/show.php');
        }
    }

    public function create() {
        $categories = Categories::listeCat();
        $regions = Region::listeRegion();
        $annonces = Annonces::all();
//            $localisations = Annonces::localisation();
//            var_dump($categorie);
        require_once('views/annonces/create.php');
    }

    public function insertAnnonce() {
        $tel = $_POST['tel'];
        if( preg_match (" #^[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?[0-9]{2}?$# " , $tel)) {

            $tel++;


            $extension = strtolower(substr(strrchr($_FILES["images"]["name"], '.'), 1));

            $tmp_name = $_FILES["images"]["tmp_name"];

            $name = 'images/' . $_SESSION['id'] . '_' . $_SESSION['user'] . time() . '.' . $extension;
            move_uploaded_file($tmp_name, $name);

            $annonce = Annonces::create(array(
                        'titre' => $_POST['titre'],
                        'description' => $_POST['description'],
                        'categories' => $_POST['categories'],
                        'images' => $name,
                        'localisation' => $_POST['localisation'],
                        'tel' => $_POST['tel'],
                        'auteur' => $_POST['auteur'],
            ));
        } else {
            echo 'Télephonne incorect veuillez donner un numéro de telephone a 10 chiffres';
        }

        self::index();

//        require_once('views/annonces/index.php');
    }

    public function modif() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        } else {
            $annonces = Annonces::all();
            $findId = Annonces::find($_GET['id']);
            require_once('views/annonces/update.php');
        }
    }

    public function update() {
        $extension = strtolower(substr(strrchr($_FILES["images"]["name"], '.'), 1));

        $tmp_name = $_FILES["images"]["tmp_name"];

        $name = 'images/' . $_SESSION['id'] . '_' . $_SESSION['user'] . time() . '.' . $extension;
        move_uploaded_file($tmp_name, $name);
        $modif = Annonces::update(array(
                    'id' => $_GET['id'],
                    'titre' => $_POST['titre'],
                    'description' => $_POST['description'],
                    'images' => $name,
                    'tel' => $_POST['tel'],
        ));
        var_dump($_FILES);
    }

    public function supp() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        } else {
            $annonceId = Annonces::find($_GET['id']);
            $annonces = Annonces::all();
            require_once('views/annonces/delete.php');
        }
    }

    public function delete() {
        $annonce = Annonces::delete(array(
//                'id'=> $_GET['id'],
                    'titre' => $_POST['titre'],
                    'description' => $_POST['description'],
                    'auteur' => $_POST['auteur']
        ));
        
        $annonces = Annonces::all();
        $regions = Region::listeRegion();
        $catego = Categories::listeCat();

        foreach ($catego as $cat) {
            $catArray[$cat->id] = $cat->name;
        }
        foreach ($regions as $nom) {
            $regionArray[$nom->id_region] = $nom->name;
        }
        require_once('views/annonces/index.php');
    }

    public function resultSearch() {
        $regions = Region::listeRegion();
        $catego = Categories::listeCat();

        foreach ($catego as $cat) {
            $catArray[$cat->id] = $cat->name;
        }
        foreach ($regions as $nom) {
            $regionArray[$nom->id_region] = $nom->name;
        }

        $recherche = Categories::search();
//     var_dump($rechercheTitre);
        require_once('views/annonces/recherche.php');
    }

    public function titreSearch() {
        $rechercheTitre = Annonces::searchTitre($_POST['titre']);
//        var_dump($rechercheTitre);
    }

    public function favoris() {

        $id_annonce = Annonces::find($_GET['id']);

        $addFavoris = Favoris::addFav(array(
                    'id_user' => $_SESSION['id'],
                    'id_annonce' => $_GET['id'],
        ));
        if ($addFavoris === FALSE) {
            echo 'Vous l\'avez déja ajouter a vos favoris :(';
            self::index();
        }
    }

    public function vueFavoris() {

        $detailFavoris = Annonces::listeFavoris();

//       var_dump($detailFavoris);

        require_once('views/annonces/favoris.php');
    }

    public function suppFav() {

        $supprime = Favoris::deleteFav(array(
                    'id_favoris' => $_GET['id'],
        ));
        self::index();
    }
    public function vueMail(){
        require_once('views/annonces/email.php');
    }
    
     public function envoi(){
        $envoie = User::email();
        var_dump($envoie);
        
        self::index();
    }

}
