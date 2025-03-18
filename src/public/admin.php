<?php
// Inclure la connexion à la base de données
require_once(__DIR__ . '/../app/connectDB.php');

// Se connecter à la base de données
$pdo = connectDB(); // Appel de la fonction pour initialiser $pdo

// Récupérer les joueurs
$stmt = $pdo->query("SELECT * FROM players");
$players = $stmt->fetchAll();

// Trier les joueurs en fonction du chemin de l'image
usort($players, function ($a, $b) {
    $pathA = strpos($a['players_image'], 'uploads/') === 0 ? 'uploads/' : 'images/';
    $pathB = strpos($b['players_image'], 'uploads/') === 0 ? 'uploads/' : 'images/';
    return strcmp($pathA, $pathB);
});

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joueurs</title>
</head>

<body>
    <h1>Liste des Joueurs</h1>

    <?php foreach ($players as $player): ?>
        <div class="player">
            <h2><?php echo htmlspecialchars($player['name']); ?></h2>
            <p>Club: <?php echo htmlspecialchars($player['team']); ?></p>
            <p>Position: <?php echo htmlspecialchars($player['position']); ?></p>
            <img src="/<?php echo htmlspecialchars($player['players_image']); ?>" alt="<?php echo htmlspecialchars($player['name']); ?>" style="width: 150px;">
            <a href="update.php?id=<?php echo $player["id"]; ?>">modifier un joueur</a>
            <a href="delete.php?id=<?php echo $player["id"]; ?>">supprimer un joueur</a>


        </div>
    <?php endforeach; ?>
    <div class=formulaire>
        <a href="add.php" title="Cliquez pour ajouter un joueur">Ajouter un joueur</a>
    </div>

</body>

</html>