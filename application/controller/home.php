<?php

/**
 * Class Home
 *
 * Note:
 * Ne pas'utiliser le même nom pour class et method, car cela pourrait déclencher un __construct (inattendu) de la classe.
 * C'est un comportement vraiment étrange, mais documenté ici: http://php.net/manual/fr/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // charger un modèle, effectuer une action, transmettre les données renvoyées à une variable
        // NOTE: please write the name of the model "LikeThis"
        $articles_model = $this->loadModel('ArticlesModel');
        $articles = $articles_model->getAllArticles();

        // chargement des vues. avec les vues, nous pouvons echo $articles
        require 'application/views/templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/templates/footer.php';
    }

    public function get($id_article)
    {
        $articles_model = $this->loadModel('ArticlesModel');
        $article = $articles_model->getArticle($id_article);


        $commentaires_model = $this->loadModel('CommentairesModel');
        $nb_commentaires = $commentaires_model->getNbCommentaires($id_article);
        $commentaires = $commentaires_model->getCommentaires($id_article);
        // chargement des vues. avec les vues, nous pouvons echo $articles
        require 'application/views/templates/header.php';
        require 'application/views/home/article.php';
        require 'application/views/templates/footer.php';
    }

    public function search()
    {
        $query = $_POST['query'];
        
        $articles_model = $this->loadModel('ArticlesModel');
        $articles = $articles_model->getArticles($query);

        // chargement des vues. avec les vues, nous pouvons echo $articles
        require 'application/views/templates/header.php';
        require 'application/views/home/index.php';
        require 'application/views/templates/footer.php';

    }

    public function commenter($id_article)
    {
        $erreur = "";

        extract($_POST);

        if(!empty($commentaire)) {
            $commentaires_model = $this->loadModel('CommentairesModel');
            $insertid = $commentaires_model->postCommenter($id_article, $commentaire);
            if($insertid > 0){
                header("Location: ".URL."home/get/".$id_article);
            } else {
                $erreur .= "MySQL Insert Error";
            }
        }
        else
            $erreur .= "Vous devez écrire du texte";
    }

}
