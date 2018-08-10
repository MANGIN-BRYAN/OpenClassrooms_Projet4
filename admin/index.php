<?php


// charger application config (rapport d'erreur etc.)
require '../application/config/config.php';

// charger application class
require 'application/libs/application.php';
require 'application/libs/controller.php';

// démarrer l'application
$app = new Application();