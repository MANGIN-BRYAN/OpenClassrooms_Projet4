<?php

/**
 * C'est la "classe du contrôleur de base". Tous les autres "vrais" contrôleurs étendent cette classe.
 */
class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * Chaque fois qu'un contrôleur est créé, ouvrez également une connexion de base de données. L'idée est d'avoir une seule connexion
     * cela peut être utilisé par plusieurs modèles (il existe des frameworks qui ouvrent une connexion par modèle).
     */
    function __construct()
    {
        $this->openDatabaseConnection();
    }

    /**
     * Ouvre la connexion à la base de données avec les informations d'identification de l'application / config / config.php
     */
    private function openDatabaseConnection()
    {
        // définir les options (facultatives) de la connexion PDO. dans ce cas, nous définissons le mode de récupération sur
        // "objets", ce qui signifie que tous les résultats seront des objets, comme ceci: $ result-> nom_utilisateur!
        // Par exemple, le mode d'extraction FETCH_ASSOC renverrait des résultats tels que: $ result ["user_name]!
        // @see http://www.php.net/manual/fr/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // génère une connexion à la base de données à l'aide du connecteur PDO
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
    }

    /**
     * Charge le modèle avec le nom donné.
     * loadModel("SongModel") inclurait models / songmodel.php et créerait l'objet dans le contrôleur, comme ceci:
     * $songs_model = $this->loadModel('SongsModel');
     * Notez que le nom de la classe de modèle est écrit dans "CamelCase", le nom du fichier du modèle est le même en minuscules
     * @param string $model_name Le nom du modèle
     * @return object model
     */
    public function loadModel($model_name)
    {
        require 'application/models/' . strtolower($model_name) . '.php';
        // retourne le nouveau modèle (et passe la connexion à la base de données au modèle)
        return new $model_name($this->db);
    }
}
