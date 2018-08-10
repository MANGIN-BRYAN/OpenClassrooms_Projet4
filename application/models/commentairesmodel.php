<?php

class CommentairesModel
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


    public function getNbCommentaires($id_article) {
        $nb_commentaires = $this->db->prepare("SELECT COUNT(*) as nb FROM commentaires WHERE id_article = ?");
        $nb_commentaires->execute([$id_article]);
        $nb_commentaires = $nb_commentaires->fetch()->nb;

        return $nb_commentaires;
    }

    public function getCommentaires($id_article) {
        $commentaires = $this->db->prepare("SELECT commentaires.*, membres.pseudo FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id AND commentaires.id_article = ?");
        $commentaires->execute([$id_article]);
        $commentaires = $commentaires->fetchAll();
        
        return $commentaires;
    }

    public function getCommentairesUser() {
        $commentaires = $this->db->prepare("SELECT commentaires.*, articles.titre FROM commentaires INNER JOIN articles ON commentaires.id_article = articles.id AND commentaires.id_membre = ?");
        $commentaires->execute([$_SESSION["membre"]]);
        $commentaires = $commentaires->fetchAll();
        
        return $commentaires; 
    }

    public function postCommenter($id_article, $commentaire) {
        $commenter = $this->db->prepare("INSERT INTO commentaires(id_membre, id_article, commentaire) VALUES(:id_membre, :id_article, :commentaire)");
        $commenter->execute([
            "id_membre" => $_SESSION["membre"],
            "id_article" => $id_article,
            "commentaire" => nl2br(htmlentities($commentaire))
        ]);
        $id = $this->db->lastInsertId();
        return $id;
    }

}