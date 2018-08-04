<?php
   session_start();
        require_once "fonctions/bdd.php";
        include_once "fonctions/blog.php";

$bdd = bdd();
$article = article();
$nb_commentaires = nb_commentaires();
$commentaires = commentaires();
        if(!empty($_POST))
                  $erreur = commenter();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska - Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php include "header.php" ?>
 
          <!--==========================
    Section home
  ============================-->
<section id="home">
  <div class="home-container article-container">
    <div class="container article">
        <div class="row">
            <form method="post" action="index.php">
                <div class="col-sm-10">
                    <input type="text" name="query" placeholder="Rechercher un article ...">
                </div>
                <div class="col-sm-2">
                    <input type="submit" value="OK!">
                </div>
            </form>
        </div>
        <div class="row">
            <article>
                <div class="col-sm-5">
                    <img src="img/<?= $article["image"] ?>" alt="<?= $article["image"] ?>">
                </div>
                <div class="col-sm-7">
                    <p class="date">Posté le <time datetime="<?= $article["publication"] ?>"><?= formattage_date($article["publication"]) ?></time></p>
                    <h1><?= $article["titre"] ?></h1>
                    <p><?= $article["contenu"] ?></p>
                </div>
            </article>
        </div>
    </div>
    <div class="container commentaires">
        <div class="row">
            <div class="col-xs-12">
                <h3>Commentaires (<?= $nb_commentaires ?>)</h3>
            </div>
        </div>
        <?php
        foreach($commentaires as $commentaire) :
        ?>
        <div class="row commentaire">
            <div class="col-xs-12">
                <p class="date">Posté par <?= $commentaire["pseudo"] ?> le <time datetime="<?= $commentaire["publication"] ?>"><?= formattage_date($commentaire["publication"]) ?></time> :</p>
                <p><?= $commentaire["commentaire"] ?></p>
            </div>
        </div>
        <?php
        endforeach;
        if(isset($_SESSION["membre"])) :
        ?>
        <div class="row">
            <div class="col-xs-12">
                <form method="post" action="">
                    <?php
                    if(isset($erreur)) :
                    if($erreur) :
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message erreur"><?= $erreur ?></div>
                        </div>
                    </div>
                    <?php
                    else :
                    ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="message confirmation">Votre commentaire a bien été posté</div>
                        </div>
                    </div>
                    <?php
                    endif;
                    endif;
                    ?>
                    <textarea name="commentaire" placeholder="Votre commentaire *"></textarea>
                    <input type="submit" value="Commenter">
                </form>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
  </section><!-- #home -->

    <?php include "footer.php" ?>


</body>
</html>
