<?php
function articles() {
    global $bdd;
    
    $articles = $bdd->query("SELECT id, titre, accroche, publication, image FROM articles ORDER BY id DESC");
    $articles = $articles->fetchAll();
    
    return $articles;
}

function article() {
    global $bdd;
    
    $id = (int)$_GET["id"];
    
    $article = $bdd->prepare("SELECT id, titre, contenu, publication, image FROM articles WHERE id = ?");
    $article->execute([$id]);
    $article = $article->fetch();
    
    if(empty($article))
        header("Location: index.php");
    else
        return $article;
}

function formattage_date($publication) {
    $publication = explode(" ", $publication);
    $date = explode("-", $publication[0]);
    $heure = explode(":", $publication[1]);
    
    $mois = ["", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    
    $resultat = $date[2] . ' ' . $mois[(int)$date[1]] . ' ' . $date[0] . ' à ' . $heure[0] . 'h' . $heure[1];
    
    return $resultat;
}




















