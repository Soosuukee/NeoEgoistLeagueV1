<?php
// Inclure la connexion à la base de données
require_once(__DIR__ . '/../app/connectDB.php');

// Se connecter à la base de données
$pdo = connectDB(); // Appel de la fonction pour initialiser $pdo

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID du joueur non spécifié.");
}

$id = intval($_GET['id']);

// Récupérer les infos du joueur
$stmt = $pdo->prepare("SELECT * FROM player WHERE id = ?");
$stmt->execute([$id]);
$player = $stmt->fetch();

if (!$player) {
    die("Joueur non trouvé.");
}

// Affichage du texte de confirmation avec le modèle et la marque (ou les informations pertinentes pour un joueur)
echo "Joueur trouvé : " . htmlspecialchars($player['name']) . " de l'équipe " . htmlspecialchars($player['team']) . " au poste de " . htmlspecialchars($player['position']) . ".";
?>

<!-- Formulaire de suppression -->
<form method="POST" action="delete.php?id=<?= $id ?>">
    <button type="submit" name="confirm_delete">Confirmer la suppression</button>
</form>

<!-- Formulaire pour annuler la suppression et rediriger vers l'index -->
<form method="POST" action="index.php">
    <button type="submit" formaction="index.php">Annuler la suppression</button>
</form>

<?php
// Traitement de la suppression si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    // Suppression de l'image associée, si elle existe
    $imagePath = __DIR__ . '/../uploads/' . $player['team'] . '/' . $player['position'] . '/' . $player['players_image'];
    if (file_exists($imagePath)) {
        unlink($imagePath); // Supprimer l'image du répertoire
    }

    // Suppression des données du joueur
    $stmt = $pdo->prepare("DELETE FROM player WHERE id = ?");
    $stmt->execute([$id]);

    // Redirection après suppression
    header("Location: players_list.php");
    exit;
}
?>