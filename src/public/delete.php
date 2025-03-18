<?php
// Inclure la connexion à la base de données
require_once(__DIR__ . '/../app/connectDB.php');

// Vérification de l'ID dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID du joueur non spécifié.");
}

$pdo = connectDB();
$id = intval($_GET['id']);  // Sécuriser l'ID en entier

// Récupérer les infos du joueur
$stmt = $pdo->prepare("SELECT * FROM players WHERE id = ?");
$stmt->execute([$id]);
$player = $stmt->fetch();

if (!$player) {
    die("Joueur non trouvé.");
}

// Affichage du texte de confirmation
echo "Joueur trouvé : " . htmlspecialchars($player['name']) . " de l'équipe " . htmlspecialchars($player['team']) . " au poste de " . htmlspecialchars($player['position']) . ".";

// Traitement de la suppression si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    // Suppression de l'image associée, si elle existe
    $imagePath = __DIR__ . '/../uploads/' . $player['team'] . '/' . $player['position'] . '/' . $player['players_image'];

    if (file_exists($imagePath)) {
        if (is_file($imagePath)) {
            unlink($imagePath); // Supprimer le fichier
        } elseif (is_dir($imagePath)) {
            deleteDirectory($imagePath); // Supprimer le répertoire non vide
        }
    }

    // Suppression des données du joueur
    $stmt = $pdo->prepare("DELETE FROM players WHERE id = ?");
    $stmt->execute([$id]);

    // Redirection après suppression
    header("Location: admin.php");
    exit;
}

// Fonction pour supprimer un répertoire non vide
function deleteDirectory($dirPath)
{
    if (is_dir($dirPath)) {
        $files = array_diff(scandir($dirPath), array('.', '..')); // Liste les fichiers et sous-dossiers
        foreach ($files as $file) {
            $filePath = $dirPath . DIRECTORY_SEPARATOR . $file;
            if (is_dir($filePath)) {
                deleteDirectory($filePath); // Suppression récursive des sous-dossiers
            } else {
                unlink($filePath); // Suppression des fichiers
            }
        }
        rmdir($dirPath); // Suppression du répertoire vide
    }
}
?>

<!-- Formulaire de suppression -->
<form method="POST" action="delete.php?id=<?= $id ?>">
    <button type="submit" name="confirm_delete">Confirmer la suppression</button>
</form>

<!-- Formulaire pour annuler la suppression et rediriger vers l'index -->
<form method="POST" action="index.php">
    <button type="submit">Annuler la suppression</button>
</form>