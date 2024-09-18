<?php

// controller FRONTAL => Routeur
// Toutes les  requêtes des  utilisateurs passent par ce fichier

use App\Controllers\AccueilController;
use App\Dao\LivreDao;

require_once __DIR__ . "/../vendor/autoload.php";
// Chargement des variables d'environnement
$dotEnv=\Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotEnv->load(); // Charger les variables d'environnement .env dans $_ENV

// Configurer la connexion à la base de données
$db= new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}",
    $_ENV['DB_USER'],$_ENV['DB_PASSWORD']);

// Mise en place du routing
$route= $_GET["route"] ?? "accueil";
// Tester la valeur de $route
switch ($route) {
    case "accueil":
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->accueil();
        break;
    case "livre-list":
        // $livreDao est une dépendance de $livreController
        $livreDao= new LivreDao($db);
        $livreController = new \App\Controllers\LivreController($livreDao);
        $livreController->liste();
        break;
    case "livre-detail":
        $idLivre=null;
        if (isset($_GET["id_livre"])) {
            $idLivre = $_GET["id_livre"];
        }
        if ($idLivre) {
            $livreDao= new LivreDao($db);
            $livreController = new \App\Controllers\LivreController($livreDao);
            $livreController->details($idLivre);
            break;
        } else {
            echo "Essaye encore";
            break;
        }
    case "ajouter-livre":

        if ($titre && $auteur && $nbPage) {
            $livreDao= new LivreDao($db);
            $livreController = new \App\Controllers\LivreController($livreDao);
            $livreController->ajouter($titre,$auteur,$nbPage);
        }

    break;

    default:
        echo "Yokoso watashi no Soul Society";
        break;
}
//if ($route==="accueil") {
//    // Créer un objet AccueilController
//    $accueilController = new \App\Controllers\AccueilController();
//    $accueilController->accueil();
//} else {
//    echo "Yokoso watashi no Soul Society";
//}