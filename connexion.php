<?php
   session_start();
      if(isset($_SESSION["membre"]))
      header("Location: compte.php");

require_once "fonctions/bdd.php";
include_once "fonctions/membre.php";

$bdd = bdd();
           if(!empty($_POST))
                     $erreur = connexion();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska - Connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php include "header.php" ?>
   
      <!--==========================
  Hero Section
============================-->
  <section id="home">
    <div class="home-container">
      <div class="row">
        <h3>Se connecter !</h3>
    </div>
        <form method="post" action="" class="col-sm-6 col-xs-12">
            <?php
            if(isset($erreur)) :
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="message erreur"><?= $erreur ?></div>
                </div>
            </div>
            <?php
            endif;
            ?>
            <div class="row">
                <input type="text" name="pseudo" placeholder="Pseudo *" value="<?php if(isset($_POST["pseudo"])) echo $_POST["pseudo"] ?>">
            </div>
            <div class="row">
                <input type="password" name="password" placeholder="Mot de passe *">
            </div>
            <div class="row">
                <input type="submit" class="button pressed" value="Me connecter!">
            </div>
    </div>
  </section><!-- #hero -->
    <?php include "footer.php" ?>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            jQuery(".login").addClass('menu-active');
        });
    </script>
</body>
</html>
