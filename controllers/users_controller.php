<?php

class UsersController {

    public function newUser() {

        require_once('views/users/index.php');
    }

    public function verif() {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        $mdp = sha1($mdp);
        $confirm = $_POST['confirm_mdp'];
        $confirm = sha1($confirm);
        if ($mdp === $confirm) {
            $user = User::inscription(array(
                        'user' => $_POST['user'],
                        'mdp' => $mdp,
                        'mail' => $mail,
            ));

            $_SESSION['user'] = $_POST['user'];
            $_SESSION['role'] = User::getRole($_POST['user']);
            $_SESSION['id'] = User::getRole($_POST['user']);
            var_dump($_SESSION['id']);

//            header('Location: http://miniblogmvc.bwb/index.php?controller=users&action=newUser');
            header('Location: http://miniblogmvc.bwb/index.php?controller=posts&action=index');
            require_once('views/users/index.php');
        } else {
            echo '<h1>Mot de passe non identique';
            require_once('views/users/index.php');
        }
    }

    public function connect() {
        require_once('views/users/connexion.php');
    }

    public function login() {

        if (isset($_POST['user']) && isset($_POST['mdp'])) {
            $userVrai = User::connexion(array(
                        'user' => $_POST['user'],
//                'role'=> $_POST['user'],
            ));

            if (sha1($_POST['mdp']) === $userVrai['mdp']) {
                //session_start();
                $_SESSION['user'] = $_POST['user'];
                //$_SESSION['id'] = $userVrai['id'];
                $_SESSION['role'] = User::getRole($_POST['user']);
                $_SESSION['id'] = $_SESSION['role']['id'];

                header('Location: http://miniblogmvc.bwb/index.php?controller=posts&action=index');

                exit();
            } else {
                $_SESSION['user'] = false;
                require_once('views/users/connexion.php');
                echo'<h1 id="erreur">pseudo ou mot de passe non valide</h1>';
//                var_dump($_SESSION);
            }
        }
    }

    public function deconnexion() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: http://miniblogmvc.bwb/index.php');
        exit();
    }

    public function redirAdmin() {
        $inscrit = User::nbinscrit();
        $nbPost = User::nbPost();
        $nbComments = User::nbCommentaire();
        require_once('views/users/administration.php');
    }

    public function supp() {
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        } else {
            $user = User::find($_GET['id']);
            $users = User::all();
            require_once('views/users/deleteUser.php');
        }
    }

    public function delete() {

        $users = User::deleteUser(array(
                    'id' => $_GET['id'],
        ));
        $users = User::all();
        echo'Le membre avec l\'ID' . ' ' . '' . $_GET['id'] . ' a bien était supprimé';
        require_once('views/users/deleteUser.php');
    }

    public function viewGestion() {
        $users = User::all();

        require_once('views/users/gestion.php');
    }

    public function droit() {

        $users = User::update(array(
                    'id' => $_GET['id'],
                    'role' => $_POST['role'],
                    'mail' => $_POST['mail'],
        ));

        $users = User::all();
        require_once('views/users/gestion.php');
    }

    public function viewProfil() {

        $users = User::find($_GET['id']);

        $profilComment = User::profilCommentaire();
        $profilPost = User::profilPost();
        $dernierPost = User::dernierPost();

//     var_dump($dernierPost);

        require_once('views/users/profil.php');
    }

    public function profil() {
        $updateMail = User::update(array(
                    'id' => $_GET['id'],
                    'role' => $_POST['role'],
                    'mail' => $_POST['mail'],
        ));
        $users = User::find($_GET['id']);
        $profilComment = User::profilCommentaire();
        $profilPost = User::profilPost();
        require_once('views/users/profil.php');
    }

    public function updateProfilMdp() {
        if (($_POST['user']) && ($_POST['mdp'])) {
            $userVrai = User::connexion(array(
                        'user' => $_POST['user'],
            ));

            if (sha1($_POST['ancien_mdp']) === $userVrai['mdp']) {
                $mdp = sha1($_POST['mdp']);
//                $mdp = sha1($mdp);
                $confirm = sha1($_POST['confirm_mdp']);
//                $confirm = sha1($confirm);
                if ($mdp === $confirm) {
                    $updateMdp = User::updateMdp(array(
                                'id' => $_GET['id'],
                                'mdp' => sha1($_POST['mdp']),
                    ));
                    echo 'Mise a jour mot de passe réussi';
                    self::viewProfil();
                } else {
                    echo 'mdp et confirmation mdp ne sont pas identique';
                    self::viewProfil();
                }
            }
        } else {
            echo 'ancien mdp erronné';
            self::viewProfil();
        }
    }
   

}
