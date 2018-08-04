<?php
   session_start();
      if(!isset($_SESSION["membre"]))
      header("Location: connexion.php");

require_once "fonctions/bdd.php";
include_once "fonctions/membre.php";
include_once "fonctions/blog.php";

$bdd = bdd();
$infos = infos();
$commentaires = commentaires_user();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska - Compte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php include "header.php" ?>
          <!--==========================
    Section Hero
  ============================-->
  <section id="compte">
    <div class="hero-container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Bienvenue <?= $infos["pseudo"] ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>Adresse e-mail : <?= $infos["email"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h1>Derniers commentaires !</h1>
            </div>
        </div>
        <?php
        foreach($commentaires as $commentaire) :
        ?>
        <div class="row commentaire">
            <div class="col-xs-12">
                <p class="date">Posté sur l'article "<?= $commentaire["titre"] ?>" le <time datetime="<?= $commentaire["publication"] ?>"><?= formattage_date($commentaire["publication"]) ?></time> :</p>
                <p><?= $commentaire["commentaire"] ?></p>
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
  </section><!-- #hero -->
  <?php include "footer.php" ?>
      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            jQuery(".account").addClass('menu-active');
        });
    </script>
</body>
</html>
