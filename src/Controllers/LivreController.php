<?php

namespace App\Controllers;

use App\Dao\LivreDao;

class LivreController
{
    private LivreDao $dao;

    /**
     * @param LivreDao $dao
     */
    public function __construct(LivreDao $dao)
    {
        $this->dao = $dao;
    }

    public function liste() {
        // Fait appel au modèle afin de récupérer les données de la BD
        $livres = $this->dao->selectAll();
        //Fait appel à la vue afin de renvoyer la page
        require_once __DIR__ . "/../../views/livre/liste.php";
    }
    public function details(int $idLivre)
    {
        // Fait appel au modèle afin de récupérer les données de la BD

        $livre = $this->dao->selectById($idLivre);
        //Fait appel à la vue afin de renvoyer la page
        if (!empty($livre)) {
            require_once __DIR__ . "/../../views/livre/detail.php";
        } else {
            echo "Essaye de nouveau";
        }
    }
    public function ajouter(string $titre,string  $auteur,int  $nbPage)
    {
        require_once __DIR__ . "/../../views/livre/ajouter.php";
        $this->dao->ajouterLivre( $titre,  $auteur, $nbPage);
    }
}