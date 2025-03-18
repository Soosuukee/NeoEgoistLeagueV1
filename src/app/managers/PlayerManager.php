<?php
require_once('DatabaseManager.php');
require_once(__DIR__ . '/../entities/Player.php');
require_once(__DIR__ . '/../entities/Team.php');
require_once(__DIR__ . '/../entities/Country.php');
require_once(__DIR__ . '/../entities/Position.php');
require_once(__DIR__ . '/../entities/Image.php');
require_once(__DIR__ . '/../entities/PlayerImage.php');


class PlayerManager extends DatabaseManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectPlayerByID(int $id): ?Player
    {
        $query = $this->db->prepare("
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        WHERE p.id = :id;
        ");

        $query->execute([":id" => $id]);
        $player = $query->fetch(PDO::FETCH_ASSOC);

        if ($player !== false) {
            // Instanciation des objets
            $team = new Team(
                $player['team_id'],
                $player['team_name'],
                new Country($player['team_country_id'], $player['country_name'], $player['flag']), // Pays de l'équipe
                $player['is_in_nel'],
                $player['team_image']
            );

            $country = new Country(
                $player['country_id'],
                $player['country_name'],
                $player['flag']
            );

            $position = new Position(
                $player['position_id'],
                $player['position_name']
            );

            // Si une image existe, instancier l'objet Image
            $image = null;
            if ($player['image_id'] !== null) {
                $image = new Image(
                    $player['image_id'],
                    $player['image_url']
                );
            }

            // Créer l'objet Player avec ses propriétés
            return new Player(
                $player['player_id'],
                $player['player_name'],
                $player['jersey_number'],
                $team, // L'objet Team
                $country, // L'objet Country
                $position, // L'objet Position
                $image // L'objet Image (peut être null si aucune image n'est liée)
            );
        }
        return null;
    }
    public function selectAllPlayers(): array
    {
        $queryAll = $this->db->prepare("
        SELECT 
            p.id AS player_id, p.name AS player_name, p.number, 
            t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
            c.id AS country_id, c.name AS country_name, c.flag,
            po.id AS position_id, po.name AS position_name,
            i.id AS image_id, i.url as image_url
        FROM players p
        JOIN team t ON p.team_id = t.id
        JOIN country c ON p.country_id = c.id
        JOIN position po ON p.position_id = po.id
        LEFT JOIN player_image pi ON pi.player_id = p.id
        LEFT JOIN image i ON pi.image_id = i.id
        ");

        $queryAll->execute();
        $players = [];

        while ($player = $queryAll->fetch(PDO::FETCH_ASSOC)) {
            if ($player !== false) {
                // Instanciation des objets
                $team = new Team(
                    $player['team_id'],
                    $player['team_name'],
                    new Country($player['team_country_id'], $player['country_name'], $player['flag']),
                    $player['is_in_nel'],
                    $player['team_image']
                );

                $country = new Country(
                    $player['country_id'],
                    $player['country_name'],
                    $player['flag']
                );

                $position = new Position(
                    $player['position_id'],
                    $player['position_name']
                );

                // Si une image existe, instancier l'objet Image
                $image = null;
                if ($player['image_id'] !== null) {
                    $image = new Image(
                        $player['image_id'],
                        $player['image_url']
                    );
                }

                // Créer l'objet Player avec ses propriétés
                $players[] = new Player(
                    $player['player_id'],
                    $player['player_name'],
                    $player['jersey_number'],
                    $team,
                    $country,
                    $position,
                    $image
                );
            }
        }

        return $players;  // Retourner tous les joueurs récupérés

    }
    public function addPlayer(Player $player): void
    {
        $queryAdd = $this->db->prepare("
        INSERT INTO player (name,jersey_number,team_id,country_id,position_id)
        VALUES (:name, :jersey_number, :team_id, :country_id, :position_id)
        ");

        $queryAdd->execute([
            ':name' => $player->getName(),
            ':jersey_number' => $player->getNumber(),
            ':team_id' => $player->getTeam()->getId(),
            ':country_id' => $player->getCountry()->getId(),
            ':position_id' => $player->getPosition()->getId()
        ]);
    }
    public function updatePlayer(Player $player): void
    {
        $queryUpdate = $this->db->prepare("
        UPDATE player
        SET name = :name, jersey_number = :jersey_number, team_id = :team_id, country_id = :country_id, position_id = :position_id
        WHERE id = :id
        ");

        $queryUpdate->execute([
            ':name' => $player->getName(),
            ':jersey_number' => $player->getNumber(),
            ':team_id' => $player->getTeam()->getId(),
            ':country_id' => $player->getCountry()->getId(),
            ':position_id' => $player->getPosition()->getId()
        ]);
    }
    public function deletePlayer(int $id): void
    {
        $queryDelete = $this->db->prepare("
        DELETE FROM player WHERE id = :id ");
        $queryDelete->execute([':id' => $id]);
    }
    public function getPlayersByTeam(int $teamId): array
    {
        $queryTeam = $this->db->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.team_id = :teamId;
        ");

        $queryTeam->execute([":teamId" => $teamId]);
        return $queryTeam->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPlayersByCountry(int $countryId): array
    {
        $queryCountry = $this->db->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.country_id = :countryId;
        ");

        $queryCountry->execute([":countryId" => $countryId]);
        return $queryCountry->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPlayersByPosition(int $positionId): array
    {
        $queryPosition = $this->db->prepare("
            SELECT 
                p.id AS player_id, p.name AS player_name, p.number, 
                t.id AS team_id, t.name AS team_name, t.country_id AS team_country_id, t.is_in_nel, t.team_image,
                c.id AS country_id, c.name AS country_name, c.flag,
                po.id AS position_id, po.name AS position_name,
                i.id AS image_id, i.url as image_url
            FROM players p
            JOIN team t ON p.team_id = t.id
            JOIN country c ON p.country_id = c.id
            JOIN position po ON p.position_id = po.id
            LEFT JOIN player_image pi ON pi.player_id = p.id
            LEFT JOIN image i ON pi.image_id = i.id
            WHERE p.position_id = :positionId;
        ");

        $queryPosition->execute([":positionId" => $positionId]);
        return $queryPosition->fetchAll(PDO::FETCH_ASSOC);
    }
}
