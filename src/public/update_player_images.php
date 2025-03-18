<?php
// Configuration de la base de données
$servername = "db";  // Docker compose: "db"
$username = "ego";
$password = "Jinpachi";
$dbname = "neo_egoist_league";

// Connexion à la base de données avec PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Définir le chemin du dossier des images (dans Docker)
$image_directory = "/var/www/html/images/";

// Vérifier si le dossier existe
if (!is_dir($image_directory)) {
    die("Le dossier des images n'existe pas : " . $image_directory);
}

// Récupérer tous les dossiers des équipes
$teams = glob($image_directory . "team/*", GLOB_ONLYDIR);

foreach ($teams as $team_directory) {
    // Récupérer le nom de l'équipe (nom du dossier)
    $team_name = basename($team_directory);

    // Vérifier si l'équipe est Bastard Munchen pour le debug
    if ($team_name === "Bastard Munchen") {
        echo "Team: $team_name <br>";
    }

    // Récupérer l'image de l'équipe (image directement dans le dossier de l'équipe)
    $team_image_path = $team_directory . "/" . $team_name . ".jpg";  // Assure-toi que l'image est au format .jpg ou ajuste selon l'extension

    // Afficher le chemin de l'image pour le débogage
    echo "Chemin de l'image de l'équipe : $team_image_path<br>";

    // Vérifier si l'image existe
    if (!file_exists($team_image_path)) {
        echo "Aucune image trouvée pour l'équipe $team_name.<br>";
        continue; // Passer à l'équipe suivante si l'image n'existe pas
    }

    // Récupérer les dossiers des positions dans chaque équipe (FW, DF, GK, MF)
    $positions = glob($team_directory . "/players/*", GLOB_ONLYDIR);

    foreach ($positions as $position_directory) {
        // Récupérer la position (FW, DF, GK, MF)
        $position_name = basename($position_directory);

        // Récupérer toutes les images de cette position pour l'équipe
        $images = glob($position_directory . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        if (empty($images)) {
            echo "Aucune image trouvée dans le dossier de la position $position_name pour l'équipe $team_name.<br>";
        }

        foreach ($images as $image) {
            // Récupérer le nom du fichier sans extension
            $image_filename = basename($image);  // ex: "yoichi_isagi.jpg"
            $name = pathinfo($image_filename, PATHINFO_FILENAME);  // ex: "yoichi_isagi"
            $image_path = "/team/$team_name/players/$position_name/$image_filename";  // ex: "images/team/Ajajax/players/FW/yoichi_isagi.jpg"

            // Vérifier si le joueur existe déjà en base de données pour cette équipe et position
            $check_sql = "SELECT COUNT(*) as count FROM players WHERE name = :name AND team = :team AND position = :position";
            $stmt = $conn->prepare($check_sql);
            $stmt->execute([':name' => $name, ':team' => $team_name, ':position' => $position_name]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row['count'] == 0) {
                // Insérer le joueur dans la base de données avec son équipe, son image, et son poste
                $insert_sql = "INSERT INTO players (name, players_image, team, team_image, position)
                               VALUES (:name, :players_image, :team, :team_image, :position)";
                $stmt = $conn->prepare($insert_sql);
                $stmt->execute([
                    ':name' => $name,
                    ':players_image' => $image_path,
                    ':team' => $team_name,
                    ':team_image' => $team_image_path,  // Utilisation du chemin de l'image de l'équipe
                    ':position' => $position_name
                ]);
                echo "Joueur ajouté : $name ($image_path)<br>";

                // Afficher l'image du joueur
                echo "<img src='$image_path' alt='$name' style='max-width: 100px;'><br>";
            } else {
                echo "Le joueur '$name' existe déjà en base de données pour l'équipe $team_name à la position $position_name.<br>";
            }
        }
    }
}

// Fermer la connexion
$conn = null;
