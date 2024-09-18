<?php

use App\Entity\Livre;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $nbPage = $_POST['nb_page'];
    $livres=new Livre();
    $livres->setTitre($titre);
    $livres->setAuteur($auteur);
    $livres->setNbPages($nbPage);

}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un livre</title>
</head>
<body>
<h1>Ajouter un livre</h1>
<form action="" method="post" class=" mx-auto w-50 p-5" novalidate>
    <div class="mb-3">
        <label for="titre" class="form-label">Titre *</label>
        <input type="text"
               class="form-control <?= (isset($erreurs["titre"])) ? "border border-2 border-danger" : "" ?>"
               name="titre"
               id="titre"
               value="<?= $titre ?>"
               placeholder="Top Gun">
        <?php if (isset($erreurs["titre"])): ?>
            <p class="form-text text-danger"><?= $erreurs["titre"] ?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="duree" class="form-label">Nombre de pages *</label>
        <input type="number"
               class="form-control <?= (isset($erreurs["nb_page"])) ? "border border-2 border-danger" : "" ?>"
               name="nb_page"
               id="nb_page"
               value="<?= $nbPage ?>"
               placeholder="">
        <?php if (isset($erreurs["nb_page"])): ?>
            <p class="form-text text-danger"><?= $erreurs["nb_page"] ?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Titre *</label>
        <input type="text"
               class="form-control <?= (isset($erreurs["auteur"])) ? "border border-2 border-danger" : "" ?>"
               name="auteur"
               id="auteur"
               value="<?= $auteur ?>"
               placeholder="Top Gun">
        <?php if (isset($erreurs["auteur"])): ?>
            <p class="form-text text-danger"><?= $erreurs["auteur"] ?></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
</body>
</html>