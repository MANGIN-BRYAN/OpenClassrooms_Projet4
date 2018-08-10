<?php

class MembresModel
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

    function getInfos() {
        $membre = $this->db->prepare("SELECT pseudo, email FROM membres WHERE id = ?");
        $membre->execute([$_SESSION["membre"]]);
        $membre = $membre->fetch();
        
        return $membre;
    }

    function connexion($pseudo, $password) {

        $connexion = $this->db->prepare("SELECT id, password FROM membres WHERE pseudo = ?");
        $connexion->execute([$pseudo]);
        $connexion = $connexion->fetch();
        
        if(password_verify($password, $connexion->password)) {
            $_SESSION["membre"] = $connexion->id;
            return true;
        } else {
            return false;
        }
    }

    function inscription($pseudo, $email, $password) {
        $inscription = $this->db->prepare("INSERT INTO membres(pseudo, email, password) VALUES(:pseudo, :email, :password)");
        $inscription->execute([
                "pseudo" => htmlentities($pseudo),
                "email" => htmlentities($email),
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ]);            
        $id = $this->db->lastInsertId();
        return $id;
    }

    function checkExistUser($pseudo) {
        $resultat = $this->db->prepare("SELECT COUNT(*) as n FROM membres WHERE pseudo = ?");
        $resultat->execute([$pseudo]);
        $resultat = $resultat->fetch()->n;
    
        return $resultat;
    }

}