<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des livres</title>
</head>
<body>
<a href="index.php">Accueil</a>
<h1>Liste des livres</h1>
<?php foreach ($livres as $livre): ?>
    <li><?php echo $livre->getTitre(); ?></li><a href="index.php?route=livre-detail&id_livre=<?=$livre->getId() ?>">Détails</a>

<?php endforeach; ?>
<a href="index.php?route=ajouter-livre">Ajouter un livre</a>
</body>
</html>