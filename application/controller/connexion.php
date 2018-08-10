<?php


class Connexion extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // chargement des Vues
        require 'application/views/templates/header.php';
        require 'application/views/membre/connexion.php';
        require 'application/views/templates/footer.php';
    }

    public function login() {
        extract($_POST);
        $erreur = "Les identifiants sont erronés";

        $membres_model = $this->loadModel('MembresModel');
        $check = $membres_model->connexion($pseudo, $password);

        if($check === true) {
            header("Location: ".URL."compte");
        } else {
            require 'application/views/templates/header.php';
            require 'application/views/membre/connexion.php';
            require 'application/views/templates/footer.php';
        }
    }

    public function logout(){
        unset($_SESSION["membre"]);
        header("Location: ".URL."connexion");
    }
}