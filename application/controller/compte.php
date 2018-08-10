<?php


class Compte extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        $membres_model = $this->loadModel('MembresModel');
        $infos = $membres_model->getInfos();

        $commentaires_model = $this->loadModel('commentairesModel');
        $commentaires = $commentaires_model->getCommentairesUser();
        // chargement des Vues
        require 'application/views/templates/header.php';
        require 'application/views/compte/index.php';
        require 'application/views/templates/footer.php';
    }


}