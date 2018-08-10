<?php

class Application
{
    /** @var null Le contrôleur */
    private $url_controller = null;

    /** @var null La méthode (du contrôleur ci-dessus), souvent aussi appelée "action" */
    private $url_action = null;

    /** @var null Parameter one */
    private $url_parameter_1 = null;

    /** @var null Parameter two */
    private $url_parameter_2 = null;

    /** @var null Parameter three */
    private $url_parameter_3 = null;

    /**
     * "Démarre" l'application:
     * Analyser les éléments d'URL et appelle le contrôleur / la méthode correspondant ou le "fallback"
     */
    public function __construct()
    {
        // créer un tableau avec des parties d'URL dans $url

        $this->splitUrl();
        // vérifier le contrôleur: un tel contrôleur existe-t-il?
        if (file_exists('./application/controller/' . $this->url_controller . '.php')) {

            // Si oui, alors chargez ce fichier et créez ce contrôleur
            // exemple: si le contrôleur serait "voiture", alors cette ligne se traduirait par: $ this-> car = new car ();
            require './application/controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

            // vérifiez la méthode: une telle méthode existe-t-elle dans le contrôleur?
            if (method_exists($this->url_controller, $this->url_action)) {

                // appeler la méthode et lui passer les arguments
                if (isset($this->url_parameter_3)) {
                    // se traduira par quelque chose comme $this->home->method($param_1, $param_2, $param_3);
                    $this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2, $this->url_parameter_3);
                } elseif (isset($this->url_parameter_2)) {
                    // se traduira par quelque chose comme $this->home->method($param_1, $param_2);
                    $this->url_controller->{$this->url_action}($this->url_parameter_1, $this->url_parameter_2);
                } elseif (isset($this->url_parameter_1)) {
                    // se traduira par quelque chose comme $this->home->method($param_1);
                    $this->url_controller->{$this->url_action}($this->url_parameter_1);
                } else {
                    // si aucun paramètre n'est donné, il suffit d'appeler la méthode sans paramètres, comme $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }
            } else {
                // default/fallback: appele la méthode index() du contrôleur sélectionné
                $this->url_controller->index();
            }
        } else {
            // URL invalide, alors affichez simplement home/index
            require './application/controller/home.php';
            $home = new Home();
            $home->index();
        }
    }

    /**
     * Obtenir et diviser l'URL
     */
    private function splitUrl()
    {
       // if (isset($_GET['url'])) {

            // Diviser URL
            $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);//rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

           // var_dump($url); exit();

            // Mettre des parties d'URL dans les propriétés appropriées
            // Par ailleurs, la syntaxe ici n'est qu'une forme abrégée de if / else, appelée "Opérateurs Ternaires".
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controller = (isset($url[3]) ? $url[3] : null);
            $this->url_action = (isset($url[4]) ? $url[4] : null);
            $this->url_parameter_1 = (isset($url[5]) ? $url[5] : null);
            $this->url_parameter_2 = (isset($url[6]) ? $url[6] : null);
            $this->url_parameter_3 = (isset($url[7]) ? $url[7] : null);

            // pour le débogage. décommentez ceci s'il y a des problèmes avec l'URL
            // echo 'Controller: ' . $this->url_controller . '<br />';
            // echo 'Action: ' . $this->url_action . '<br />';
            // echo 'Parameter 1: ' . $this->url_parameter_1 . '<br />';
            // echo 'Parameter 2: ' . $this->url_parameter_2 . '<br />';
            // echo 'Parameter 3: ' . $this->url_parameter_3 . '<br />';
        }
  //  }
}
