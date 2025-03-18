<?php
require_once(__DIR__ . '/../app/connectDB.php');
session_start(); // Démarrer la session pour gérer les messages de succès

// Se connecter à la base de données
$pdo = connectDB(); // Appel de la fonction pour initialiser $pdo

// Tableau pour stocker les erreurs
$errors = [];

// Récupérer toutes les équipes de la base de données
$query = "SELECT DISTINCT team FROM players";
$stmt = $pdo->query($query);
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer tous les postes de la base de données
$query_post = "SELECT DISTINCT position FROM players";
$stmt_post = $pdo->query($query_post);
$positions = $stmt_post->fetchAll(PDO::FETCH_ASSOC);

// Traitement du formulaire si le bouton est cliqué
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les valeurs envoyées par le formulaire
    $name = htmlspecialchars($_POST['name']);
    $team = htmlspecialchars($_POST['team']);
    $position = htmlspecialchars($_POST['position']);

    // Vérifier si le nom, l'équipe et le poste sont valides
    if (empty($name)) {
        $errors[] = "Le nom du joueur est requis.";
    }

    if (empty($team)) {
        $errors[] = "L'équipe est requise.";
    }

    if (empty($position)) {
        $errors[] = "Le poste est requis.";
    }

    // Vérifier si le joueur existe déjà dans la même équipe avec le même nom et le même poste
    $sql_check = "SELECT * FROM players WHERE name = :name; ";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([
        ':name' => $name,
    ]);
    $player = $stmt->fetch();


    // Si un joueur est trouvé, ajouter une erreur
    if ($player != false) {
        $errors[] = "Un joueur avec ce nom existe déjà.";
    }

    // Si aucune erreur, insérer le joueur dans la base de données
    if (empty($errors)) {

        // Traitement des fichiers images
        if (isset($_FILES['player_image']) && $_FILES['player_image']['error'] == 0) {
            // Créer le chemin du dossier s'il n'existe pas
            $upload_dir = __DIR__ . '/../uploads/' . $team . '/' . $position . '/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Définir le chemin de l'image du joueur
            $players_image = $upload_dir . basename($_FILES['player_image']['name']);
            // Déplacer l'image dans le répertoire approprié
            if (!move_uploaded_file($_FILES['player_image']['tmp_name'], $players_image)) {
                $errors[] = "Une erreur est survenue lors du téléchargement de l'image du joueur.";
            }
        }
        // Enregistrer le chemin relatif dans la base de données
        $relative_image_path = 'uploads/' . $team . '/' . $position . '/' . basename($_FILES['player_image']['name']);

        $sql = "INSERT INTO players (name, players_image, team, position)
                VALUES (:name, :players_image, :team, :position)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':players_image' => $relative_image_path ?? '', // Utiliser le chemin relatif
            ':team' => $team,
            ':position' => $position
        ]);

        // Stocker un message de succès dans la session
        $_SESSION['success_message'] = "Joueur ajouté avec succès !";

        // Redirection vers la page d'index
        header("Location: admin.php");
        exit; // Ne pas oublier de quitter après la redirection
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un joueur</title>
</head>

<body>

    <h1>Ajouter un joueur</h1>

    <!-- Affichage des erreurs s'il y en a -->
    <?php
    if (!empty($errors)) {
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
    }
    ?>

    <!-- Formulaire d'ajout de joueur -->
    <form method="POST" action="add.php" enctype="multipart/form-data">
        <label for="name">Nom du joueur:</label>
        <input type="text" id="name" name="name" placeholder="Entrez le nom du joueur" required><br>

        <label for="position">Poste:</label>
        <select id="position" name="position" required>
            <option value="" disabled selected>Sélectionner un poste</option>
            <?php
            // Afficher les postes récupérés depuis la base de données
            foreach ($positions as $position) {
                echo "<option value='" . $position['position'] . "'>" . $position['position'] . "</option>";
            }
            ?>
        </select><br>

        <label for="team">Équipe:</label>
        <select id="team" name="team" required>
            <option value="" disabled selected>Sélectionner une équipe</option>
            <?php
            // Afficher les équipes récupérées depuis la base de données
            foreach ($teams as $team) {
                echo "<option value='" . $team['team'] . "'>" . $team['team'] . "</option>";
            }
            ?>
        </select><br>

        <label for="player_image">Image du joueur:</label>
        <input type="file" id="player_image" name="player_image"><br>

        <input type="submit" value="Ajouter le joueur">
    </form>

</body>

</html>