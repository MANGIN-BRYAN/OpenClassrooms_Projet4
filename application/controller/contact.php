<?php


class Contact extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // chargement des Vues
        require 'application/views/templates/header.php';
        require 'application/views/contact/index.php';
        require 'application/views/templates/footer.php';
    }

    public function sendContact() {

        extract($_POST);
        
        $validation = true;
        $erreurs = [];
        
        if(empty($nom) || empty($email) || empty($texte)) {
            $validation = false;
            $erreurs[] = "Tous les champs sont requis";
        }
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreurs[] = "L'adresse e-mail n'est pas valide";
        }
        
        if($validation) {
            $to = "averynewlife@gmail.com";
            $sujet = 'Nouveau message de ' . $nom;
            $message = '
            <h1>Nouveau message de ' . $nom .'</h1>
            <h2>Email : ' . $email . '</h2>
            <p>' . nl2br($texte) . '</p>
            ';
            $headers = 'De: ' . $nom . ' <' . $email . '>' . "\r\n";
            $headers .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            
            mail($to, $sujet, $message, $headers);
            
            unset($_POST["nom"]);
            unset($_POST["email"]);
            unset($_POST["texte"]);
        }
        
        require 'application/views/templates/header.php';
        require 'application/views/contact/index.php';
        require 'application/views/templates/footer.php';
    }

}