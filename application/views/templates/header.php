<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MY SUPER BLOG - Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<!-- header -->
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">        
        <h1><a href="<?php echo URL; ?>">MY SUPER BLOG</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="home"><a href="<?php echo URL; ?>">Home</a></li>
          <li class="contact"><a href="<?php echo URL; ?>contact">Contact</a></li>
          <?php
            if(isset($_SESSION["membre"])) :
            ?>
           <li class="account"><a href="<?php echo URL; ?>compte">Mon account</a></li>
            <li class="logout"><a href="<?php echo URL; ?>connexion/logout">Deconnexion</a></li>
            <?php
            else :
            ?>
            <li class="login"><a href="<?php echo URL; ?>connexion">Connexion</a></li>
            <li class="register"><a href="<?php echo URL; ?>inscription">Inscription</a></li>
            <?php
            endif;
            ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
