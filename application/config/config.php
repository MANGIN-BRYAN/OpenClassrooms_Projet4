<?php

/**
 * Configuration
 *
 */

/**
 * Configuration pour: rapport d'erreur
 * Utile pour montrer chaque petit problème pendant le développement, mais ne montre que des erreurs matérielles dans la production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

/**
 * Configuration pour: Project URL
 * Mettre son URL ici, pour le développement local "127.0.0.1" ou "localhost" (plus sous-dossier)
 */
define('URL', 'http://'.$_SERVER['HTTP_HOST'].'/index.php/');
define('ADMIN_URL', 'http://'.$_SERVER['HTTP_HOST'].'/admin/index.php/');
define('ASSEST_URL', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('ROOT', $_SERVER["DOCUMENT_ROOT"]);

/**
 * Configuration pour: Base de données
 * C'est l'endroit où vous définissez les informations d'identification de votre base de données, le type de base de données, etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'blogp4');
define('DB_USER', 'root');
define('DB_PASS', '');

/*
* fonctions communes
*/
function formattage_date($publication) {
    $publication = explode(" ", $publication);
    $date = explode("-", $publication[0]);
    $heure = explode(":", $publication[1]);
    
    $mois = ["", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    
    $resultat = $date[2] . ' ' . $mois[(int)$date[1]] . ' ' . $date[0] . ' à ' . $heure[0] . 'h' . $heure[1];
    
    return $resultat;
}

