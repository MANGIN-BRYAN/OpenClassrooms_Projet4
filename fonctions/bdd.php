<?php
function bdd() {
    try {
        $bdd = new PDO("mysql:dbname=blogp4;host=localhost", "root", "");
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    
    return $bdd;
}