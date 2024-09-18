<?php

namespace App\Dao;

use App\Entity\Livre;

class LivreDao
{
    private \PDO $db;
    // Envoyer la requête "SELECT * FROM Livre"
    // Retourner les enregistrements sous la forme d'un tableau de la classe Livre
    /**
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll() : array {
        $requete=$this->db->query("SELECT * FROM livre");
        $livresDB=$requete->fetchAll(\PDO::FETCH_ASSOC);
        // Mapping relationnel vers objet
        $livres= [];
        foreach ($livresDB as $livreDB) {
            $livre=new Livre();
            $livre->setId($livreDB['id_livre']);
            $livre->setTitre($livreDB['titre_livre']);
            $livre->setAuteur($livreDB['auteur']);
            $livre->setNbPages($livreDB['nb_page']);
            $livres[]=$livre;
        }
        return $livres;
    }
    public function selectById(int $idLivre) : ?Livre {
        $requete=$this->db->query("SELECT * FROM livre WHERE id_livre=$idLivre");
        $livresDB=$requete->fetchAll(\PDO::FETCH_ASSOC);


            $livre=new Livre();
            $livre->setTitre($livresDB[0]['titre_livre']);
            $livre->setAuteur($livresDB[0]['auteur']);
            $livre->setNbPages($livresDB[0]['nb_page']);


        return $livre;
    }
    public function ajouterLivre (string $titre, string $auteur, int $nbPage) : void {
        $requete=$this->db->prepare("INSERT INTO livre VALUES (?,?,?)");
        $requete->bindParam(1, $titre);
        $requete->bindParam(2, $auteur);
        $requete->bindParam(3, $nbPage);
        $requete->execute();
    }
}