<?php
// Inclure la connexion à la base de données
require_once(__DIR__ . '/../app/managers/DatabaseManager.php');

// Se connecter à la base de données
$pdo = getConnexion();

// Récupérer les joueurs
$stmt = $pdo->query("SELECT * FROM player");
$players = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joueurs</title>
</head>

<body>
    <header>
        <a href="login.php"> Se connecter</a>
    </header>
    <h1>Liste des Joueurs</h1>

    <?php foreach ($players as $player): ?>
        <section class="player">
            <h2><?php echo htmlspecialchars($player['name']); ?></h2>
            <p>Club: <?php echo htmlspecialchars($player['team']); ?></p>
            <p>Position: <?php echo htmlspecialchars($player['position']); ?></p>
            <img src="/assets/images/players/<?php echo $player['players_image'] ? htmlspecialchars($player['players_image']) : 'default.jpg'; ?>" alt="<?php echo htmlspecialchars($player['name']); ?>" style="width: 150px;">
        </section>
    <?php endforeach; ?>

</body>

</html>