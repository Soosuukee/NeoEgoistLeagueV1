<?php
// Inclure la connexion à la base de données
require_once(__DIR__ . '/../app/connectDB.php');

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID du joueur non spécifié.");
}
$pdo = connectDB();
$id = intval($_GET['id']);

// Récupérer les infos du joueur
$stmt = $pdo->prepare("SELECT * FROM players WHERE id = ?");
$stmt->execute([$id]);
$player = $stmt->fetch();

if (!$player) {
    die("Joueur non trouvé.");
}

// Récupérer les équipes valides (les 5 définies dans la table player)
$teamsQuery = $pdo->query("SELECT DISTINCT team FROM players");
$teams = $teamsQuery->fetchAll(PDO::FETCH_COLUMN);

// Traitement du formulaire d'update
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $team = htmlspecialchars($_POST['team']);
    $position = htmlspecialchars($_POST['position']);
    $jersey_number = $_POST['jersey_number'] !== "" ? intval($_POST['jersey_number']) : null;

    // Vérification que l'équipe fait bien partie des équipes valides
    if (!in_array($team, $teams)) {
        die("Équipe invalide.");
    }

    // Gestion de l'upload de l'image du joueur
    $imageName = $player['players_image']; // Garde l'image actuelle par défaut
    if (!empty($_FILES['players_image']['name'])) {
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $imageFileType = strtolower(pathinfo($_FILES['players_image']['name'], PATHINFO_EXTENSION));

        if (!in_array($imageFileType, $allowedTypes)) {
            die("Format d'image non valide.");
        }

        // Vérification que le fichier est bien une image
        $check = getimagesize($_FILES['players_image']['tmp_name']);
        if ($check === false) {
            die("Ce fichier n'est pas une image.");
        }

        $targetDir = "uploads/" . $team . "/" . $position . "/";
        $imageName = uniqid(bin2hex(random_bytes(5)) . "_", true) . "." . $imageFileType;
        $targetFile = $targetDir . $imageName;

        if (!move_uploaded_file($_FILES['players_image']['tmp_name'], $targetFile)) {
            die("Erreur lors de l'upload.");
        }
    }

    // Mise à jour des données
    $stmt = $pdo->prepare("UPDATE players SET name = ?, team = ?, position = ?, jersey_number = ?, players_image = ? WHERE id = ?");
    $stmt->execute([$name, $team, $position, $jersey_number, $imageName, $id]);

    // Redirection après succès
    header("Location: index.php?id=$id");
    exit;
}

?>

<form method="POST" action="update.php?id=<?= $id ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($player['id']) ?>">

    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($player['name']) ?>" required>

    <label for="team">Équipe :</label>
    <select name="team" id="team" required>
        <?php foreach ($teams as $team): ?>
            <option value="<?= htmlspecialchars($team) ?>" <?= $player['team'] === $team ? 'selected' : '' ?>>
                <?= htmlspecialchars($team) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="position">Poste :</label>
    <select name="position" id="position" required>
        <?php foreach (['GK', 'DF', 'MF', 'FW'] as $pos): ?>
            <option value="<?= $pos ?>" <?= $player['position'] === $pos ? 'selected' : '' ?>>
                <?= $pos ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="jersey_number">Numéro de maillot :</label>
    <input type="number" name="jersey_number" id="jersey_number" value="<?= htmlspecialchars($player['jersey_number']) ?>" min="1">

    <label for="players_image">Image du joueur :</label>
    <input type="file" name="players_image" id="players_image">

    <button type="submit">Mettre à jour</button>
</form>