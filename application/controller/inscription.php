<?php


class Inscription extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // chargement des vues
        require 'application/views/templates/header.php';
        require 'application/views/membre/inscription.php';
        require 'application/views/templates/footer.php';
    }

    public function register()
    {
        extract($_POST);
    
        $validation = true;
        $erreurs = [];

        $membres_model = $this->loadModel('MembresModel');
        
        if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)) {
            $validation = false;
            $erreurs[] = "Tous les champs sont requis";
        }
        
        if($membres_model->checkExistUser($pseudo)) {
            $validation = false;
            $erreurs[] = "Ce nom d'utilisateur est déjà pris";
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreurs[] = "L'adresse e-mail n'est pas valide";
        }
        elseif($emailconf != $email) {
            $validation = false;
            $erreurs[] = "L'adresse e-mail de confirmation est incorrecte";
        }
        
        if($passwordconf != $password) {
            $validation = false;
            $erreurs[] = "Le mot de passe de confirmation est incorrect";
        }

        if($validation) {

            $insertid = $membres_model->inscription($pseudo, $email, $password);
            if($insertid > 0) {
                unset($_POST["pseudo"]);
                unset($_POST["email"]);
                unset($_POST["emailconf"]);
                
                require 'application/views/templates/header.php';
                require 'application/views/membre/connexion.php';
                require 'application/views/templates/footer.php';
                exit();
            } else {
                $erreurs[] = "MySQL Insert error";
            }
        }

        require 'application/views/templates/header.php';
        require 'application/views/membre/inscription.php';
        require 'application/views/templates/footer.php';
    }

}