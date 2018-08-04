<?php
   session_start();

     require_once "fonctions/bdd.php";
     include_once "fonctions/contact.php";

$bdd = bdd();

          if(!empty($_POST))
                    $erreurs = contact();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska - Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php include "header.php" ?>
    
<section id="home">
  <div class="home-container contact-container">
        <div class="row">
            <div class="col-xs-12">
                <h3>Contactez-moi !</h3>
            </div>
        </div>
        <form method="post" action="">
            
                  <?php
           
                     if(isset($erreurs)) :
                     if($erreurs) :
                     foreach($erreurs as $erreur) :
                  ?>
           
            <div class="row">
                <div class="col-xs-12">
                    <div class="message erreur"><?= $erreur ?></div>
                </div>
            </div>
            
                  <?php
                     endforeach;
                     else :
                  ?>
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="message confirmation">Votre message a bien été envoyé !</div>
                </div>
            </div>
            
                <?php
                     endif;
                     endif;
                ?>
            
            <div class="row">
                <div class="col-sm-6">
                    <input type="text" name="nom" placeholder="Votre nom *" value="<?php if(isset($_POST["nom"])) echo $_POST["nom"] ?>">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="email" placeholder="Votre adresse email *" value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea name="texte" placeholder="En quoi puis-je vous aider ? *"><?php if(isset($_POST["texte"])) echo $_POST["texte"] ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" value="Envoyer!">
                </div>
            </div>
        </form>
      </div>
  </section><!-- #hero -->
  <?php include "footer.php" ?>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <script type="text/javascript">
      jQuery(document).ready(function( $ ) {
          jQuery(".contact").addClass('menu-active');
      });
  </script>  
</body>
</html>
