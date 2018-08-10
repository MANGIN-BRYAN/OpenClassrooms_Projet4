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
 
        // chargement des vues. avec les vues, nous pouvons echo $articles
        require 'application/views/templates/header.php';
        require 'application/views/admin/index.php';
        require 'application/views/templates/footer.php';
    }

    public function posts()
    {
        $articles_model = $this->loadModel('ArticlesModel');
        $posts = $articles_model->getAllArticles();

        // chargement des vues. avec les vues, nous pouvons echo $articles
        require 'application/views/templates/header.php';
        require 'application/views/admin/posts.php';
        require 'application/views/templates/footer.php';
    }

    public function post()
    {
          extract($_POST);
    
            $validation = true;
            $erreurs = [];
            
            if(empty($titre) || empty($contenu)) {
                $validation = false;
                $erreurs[] = "Tous les champs sont requis";
            }
            
            if(!isset($_FILES["file"]) OR $_FILES["file"]["error"] > 0) {
                $validation = false;
                $erreurs[] = "Un fichier doit être indiqué";
            }
            
            if($validation) {
                $image = basename($_FILES["file"]["name"]);
                
                move_uploaded_file($_FILES["file"]["tmp_name"], ROOT.'/public/img/' . $image);
                $articles_model = $this->loadModel('ArticlesModel');
                $insertid = $articles_model->postArticle($titre, $contenu, $image);
                
                if($insertid > 0) {
                    unset($_POST["titre"]);
                    unset($_POST["contenu"]);
                } else {
                    $erreurs[] = "MySQL Insert error";
                }
            }
        require 'application/views/templates/header.php';
        require 'application/views/admin/index.php';
        require 'application/views/templates/footer.php';
    }

    public function get($id_article)
    {
        $articles_model = $this->loadModel('ArticlesModel');
        $post = $articles_model->getArticle($id_article);

        // chargement des vues. avec les vues, nous pouvons echo $articles
        require 'application/views/templates/header.php';
        require 'application/views/admin/modifier.php';
        require 'application/views/templates/footer.php';
    }

    public function modifier($id_article)
    {
        $erreur = "";

        extract($_POST);
        
        if(!empty($titre) AND !empty($contenu)) {
            $articles_model = $this->loadModel('ArticlesModel');
            $n = $articles_model -> modifierArticle($id_article, $titre, $contenu);
            if($n != 1)
              $erreur .= "MySQL Update Error";
        }
        else
            $erreur .= "Les champs doivent contenir quelque chose";
        header("Location: ".ADMIN_URL."home/get/".$id_article);
    }

    public function supprimer($id_article) {

        $articles_model = $this->loadModel('ArticlesModel');
        $image = $articles_model->getImage($id_article);
        if($image)       
            unlink(ROOT.'/public/img/' . $image);

        $n = $articles_model->supprimer($id_article);
        
        header("Location: ".ADMIN_URL."posts");
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

}
