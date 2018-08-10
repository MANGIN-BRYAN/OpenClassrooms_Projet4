<?php

// chargement application config (rapport d'erreur, etc.)
require 'application/config/config.php';

// chargement application class
require 'application/libs/application.php';
require 'application/libs/controller.php';

// démarre l'application
$app = new Application();