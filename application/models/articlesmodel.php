<?php

class ArticlesModel
{
    /**
     * Chaque modèle nécessite une connexion à la base de données, transmise au modèle
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('La connexion à la base de données n\'a pas pu être établie.');
        }
    }

    /**
     * Get all Articles from database
     */
    public function getAllArticles()
    {
        $sql = "SELECT id, titre, accroche, publication, image FROM articles ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    /**
     * Get Article from database
     */

    public function getArticle($id){
        
        $article = $this->db->prepare("SELECT id, titre, contenu, publication, image FROM articles WHERE id = ?");
        $article->execute([$id]);
        $article = $article->fetch();
        
        if(empty($article))
            header("Location: index.php");
        else
            return $article;

    }

    public function getArticles($query) {
        $recherche = $this->db->prepare("SELECT id, titre, accroche, publication, image FROM articles WHERE titre LIKE :query OR contenu LIKE :query ORDER BY id DESC");
        $recherche->execute([
            "query" => '%' . $query . '%'
        ]);
        $recherche = $recherche->fetchAll();
        
        return $recherche;
    }

}
