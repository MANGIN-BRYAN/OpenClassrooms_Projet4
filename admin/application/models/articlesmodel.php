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
            exit('Database connection could not be established.');
        }
    }

    /**
     * Obtenir tous les articles de la base de données
     */
    public function getAllArticles()
    {
        $sql = "SELECT id, titre, accroche, publication, image FROM articles ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
    /**
     * Obtenir les articles de la base de données
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

    public function modifierArticle($id, $titre, $contenu) {
            $modifier = $this->db->prepare("UPDATE articles SET titre = :titre, accroche = :accroche, contenu = :contenu WHERE id = :id");
            $modifier->execute([
                "titre" => htmlentities($titre),
                "accroche" => substr(htmlentities($contenu), 0, 200),
                "contenu" => nl2br(htmlentities($contenu)),
                "id" => $id
            ]);
            $n = $modifier->rowCount();
            return $n;
    }

    public function postArticle($titre, $contenu, $image) {
        $poster = $this->db->prepare("INSERT INTO articles(titre, accroche, contenu, image) VALUES(:titre, :accroche, :contenu, :image)");
        $poster->execute([
            "titre" => htmlentities($titre),
            "accroche" => substr(htmlentities($contenu), 0, 200),
            "contenu" => nl2br(htmlentities($contenu)),
            "image" => htmlentities($image)
        ]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function getImage($id) {
        $image = $this->db->prepare("SELECT image FROM articles WHERE id = ?");
        $image->execute([$id]);
        $image = $image->fetch()->image;

        return $image;
    }

    public function supprimer($id) {
        $supprimer = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        $supprimer->execute([$id]);

        $n = $supprimer->rowCount();
        return $n;
    }
}
